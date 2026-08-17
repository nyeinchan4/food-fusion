# Food Fusion Docker Production Setup

This guide explains how to run Food Fusion with Docker in a production-ready setup with separate containers for backend, frontend, and database.

## Architecture Overview

The Docker setup consists of:

1. **Backend Container** - PHP-FPM running Laravel API (port 9000 internal)
2. **Frontend Container** - Nginx serving built Vite assets (port 80)
3. **Database Container** - MariaDB 10.11 (port 3306)
4. **Queue Worker Container** - Laravel queue processor

## Prerequisites

- Docker 20.10+
- Docker Compose 2.0+

Check versions:

```bash
docker --version
docker-compose --version
```

## Quick Start

### 1. Prepare Environment

Copy the Docker environment file:

```bash
cp .env.docker.example .env
```

Update `.env` with your production values (especially `APP_KEY` and database credentials).

### 2. Build and Start Services

```bash
docker-compose up -d --build
```

This will:
- Build backend and frontend images
- Start MariaDB, backend, queue worker, and frontend containers
- Run migrations automatically
- Serve the application on http://localhost

### 3. Verify Services

Check all containers are running:

```bash
docker-compose ps
```

View logs:

```bash
docker-compose logs -f
```

### 4. Access the Application

Open browser: **http://localhost**

## Detailed Setup Steps

### Build Individual Services

Build only backend:
```bash
docker-compose build backend
```

Build only frontend:
```bash
docker-compose build frontend
```

### Database Operations

#### Seed Database

```bash
docker-compose exec backend php artisan db:seed
```

#### Run Specific Migration

```bash
docker-compose exec backend php artisan migrate --path=/database/migrations/your_migration.php
```

#### Import SQL Dump

```bash
docker-compose exec -T database mysql -u food_user -pfood food_fusion < food_fusion_database/food-fusion-db.sql
```

Or place SQL file in `food_fusion_database/` directory before first start - it will auto-import.

### Backend Commands

Run artisan commands:

```bash
docker-compose exec backend php artisan [command]
```

Examples:

```bash
# Clear all caches
docker-compose exec backend php artisan optimize:clear

# List routes
docker-compose exec backend php artisan route:list

# Generate app key
docker-compose exec backend php artisan key:generate

# Create storage link
docker-compose exec backend php artisan storage:link
```

### Frontend Rebuild

If you change frontend assets and need to rebuild:

```bash
docker-compose build frontend
docker-compose up -d frontend
```

## Service Management

### Start services

```bash
docker-compose up -d
```

### Stop services

```bash
docker-compose down
```

### Stop and remove volumes (CAUTION: deletes database data)

```bash
docker-compose down -v
```

### Restart specific service

```bash
docker-compose restart backend
docker-compose restart frontend
docker-compose restart database
```

### View service logs

```bash
# All services
docker-compose logs -f

# Specific service
docker-compose logs -f backend
docker-compose logs -f frontend
docker-compose logs -f database
docker-compose logs -f queue
```

## Production Deployment Considerations

### 1. Environment Security

- Change default passwords in `.env`
- Generate new `APP_KEY`: `docker-compose exec backend php artisan key:generate`
- Set `APP_DEBUG=false` in production
- Use strong database passwords
- Never commit `.env` to version control

### 2. SSL/TLS Configuration

For production with HTTPS, update `docker/nginx/default.conf`:

```nginx
server {
    listen 443 ssl http2;
    ssl_certificate /etc/nginx/ssl/cert.pem;
    ssl_certificate_key /etc/nginx/ssl/key.pem;
    # ... rest of config
}
```

Mount SSL certificates in docker-compose.yml:

```yaml
frontend:
  volumes:
    - ./ssl:/etc/nginx/ssl:ro
```

### 3. Database Backups

Create backup:

```bash
docker-compose exec database mysqldump -u food_user -pfood food_fusion > backup_$(date +%Y%m%d_%H%M%S).sql
```

Restore backup:

```bash
docker-compose exec -T database mysql -u food_user -pfood food_fusion < backup.sql
```

### 4. Persistent Storage

The setup uses named volumes for:
- `mariadb_data` - Database files (persistent)
- `./storage` - Laravel storage (bind mount)
- `./bootstrap/cache` - Laravel cache (bind mount)

### 5. Scaling Queue Workers

Scale queue workers for higher load:

```bash
docker-compose up -d --scale queue=3
```

### 6. Resource Limits

Add resource limits in `docker-compose.yml`:

```yaml
backend:
  deploy:
    resources:
      limits:
        cpus: '1'
        memory: 512M
      reservations:
        cpus: '0.5'
        memory: 256M
```

## Monitoring and Debugging

### Check container health

```bash
docker-compose ps
```

### Inspect container

```bash
docker inspect food_fusion_backend
docker inspect food_fusion_frontend
docker inspect food_fusion_db
```

### Execute commands in container

```bash
docker-compose exec backend sh
docker-compose exec frontend sh
docker-compose exec database mysql -u food_user -pfood food_fusion
```

### Monitor resource usage

```bash
docker stats
```

## Troubleshooting

### Database Connection Error

1. Check database container is healthy:
   ```bash
   docker-compose ps database
   ```

2. Verify credentials in `.env` match `docker-compose.yml`

3. Test connection:
   ```bash
   docker-compose exec backend php artisan migrate:status
   ```

### Frontend Not Loading

1. Check Nginx logs:
   ```bash
   docker-compose logs frontend
   ```

2. Verify backend is running:
   ```bash
   docker-compose ps backend
   ```

3. Test backend health:
   ```bash
   curl http://localhost/health
   ```

### Permission Issues

Fix storage permissions:

```bash
docker-compose exec backend chmod -R 775 storage bootstrap/cache
docker-compose exec backend chown -R www-data:www-data storage bootstrap/cache
```

### Port Already in Use

If port 80 is busy, change in `docker-compose.yml`:

```yaml
frontend:
  ports:
    - "8080:80"  # Change external port
```

### Rebuild from Scratch

```bash
docker-compose down -v
docker-compose build --no-cache
docker-compose up -d
```

## File Structure

```
food-fusion/
├── Dockerfile.backend          # Backend PHP-FPM container
├── Dockerfile.frontend         # Frontend Nginx container (multi-stage)
├── docker-compose.yml          # Service orchestration
├── .dockerignore              # Exclude files from Docker build
├── .env.docker.example        # Docker environment template
├── docker/
│   └── nginx/
│       └── default.conf       # Nginx configuration
└── food_fusion_database/
    └── food-fusion-db.sql    # Auto-imported on first start
```

## Performance Optimization

### OPcache (PHP)

Add to `Dockerfile.backend`:

```dockerfile
RUN docker-php-ext-install opcache
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
```

### Redis Cache (Optional)

Add Redis service in `docker-compose.yml`:

```yaml
redis:
  image: redis:alpine
  networks:
    - food_fusion_network
```

Update `.env`:
```env
CACHE_STORE=redis
REDIS_HOST=redis
```

## Next Steps

1. Configure domain and SSL certificates for production
2. Set up automated backups
3. Implement monitoring (Prometheus, Grafana)
4. Configure log aggregation
5. Set up CI/CD pipeline for automated deployments

---

For local development without Docker, see [local-run-setup.md](local-run-setup.md).
