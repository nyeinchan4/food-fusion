# Food Fusion - Docker Production Setup Makefile

.PHONY: help build up down restart logs clean seed backup restore

# Default target
help:
	@echo "Food Fusion Docker Commands:"
	@echo "  make build      - Build all Docker images"
	@echo "  make up         - Start all services"
	@echo "  make down       - Stop all services"
	@echo "  make restart    - Restart all services"
	@echo "  make logs       - View all logs"
	@echo "  make clean      - Remove all containers and volumes (CAUTION)"
	@echo "  make seed       - Seed database with sample data"
	@echo "  make migrate    - Run database migrations"
	@echo "  make backup     - Backup database"
	@echo "  make restore    - Restore database from backup"
	@echo "  make shell-be   - Access backend shell"
	@echo "  make shell-fe   - Access frontend shell"
	@echo "  make shell-db   - Access database shell"

# Build images
build:
	docker-compose build

# Start services
up:
	docker-compose up -d

# Stop services
down:
	docker-compose down

# Restart services
restart:
	docker-compose restart

# View logs
logs:
	docker-compose logs -f

# Clean everything (removes volumes)
clean:
	@echo "WARNING: This will delete all data. Press Ctrl+C to cancel."
	@sleep 5
	docker-compose down -v
	docker system prune -f

# Seed database
seed:
	docker-compose exec backend php artisan db:seed

# Run migrations
migrate:
	docker-compose exec backend php artisan migrate --force

# Backup database
backup:
	@mkdir -p backups
	docker-compose exec database mysqldump -u food_user -pfood food_fusion > backups/backup_$$(date +%Y%m%d_%H%M%S).sql
	@echo "Backup created in backups/"

# Restore database (requires BACKUP_FILE variable)
restore:
	@test -n "$(BACKUP_FILE)" || (echo "Usage: make restore BACKUP_FILE=backups/backup.sql" && exit 1)
	docker-compose exec -T database mysql -u food_user -pfood food_fusion < $(BACKUP_FILE)
	@echo "Database restored from $(BACKUP_FILE)"

# Backend shell
shell-be:
	docker-compose exec backend sh

# Frontend shell
shell-fe:
	docker-compose exec frontend sh

# Database shell
shell-db:
	docker-compose exec database mysql -u food_user -pfood food_fusion

# Clear Laravel caches
clear-cache:
	docker-compose exec backend php artisan optimize:clear

# View service status
status:
	docker-compose ps

# Rebuild and restart
rebuild:
	docker-compose down
	docker-compose build --no-cache
	docker-compose up -d
