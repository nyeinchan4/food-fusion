# 🐳 Food Fusion - Docker Production Setup

Complete production-ready Docker setup with separated backend, frontend, and database containers.

## 📦 What's Included

| File | Purpose |
|------|---------|
| `Dockerfile.backend` | Laravel PHP-FPM container |
| `Dockerfile.frontend` | Multi-stage build: Node (build) → Nginx (serve) |
| `docker-compose.yml` | Orchestrates all services |
| `docker/nginx/default.conf` | Nginx configuration for frontend |
| `.dockerignore` | Excludes unnecessary files from builds |
| `.env.docker.example` | Production environment template |
| `Makefile` | Convenient command shortcuts |
| `docker-start.sh` | One-command quick start script |

## 🚀 Quick Start (3 Commands)

```bash
# 1. Setup environment
cp .env.docker.example .env

# 2. Start everything
./docker-start.sh

# 3. Open browser
# http://localhost
```

Or use the Makefile:

```bash
make build
make up
```

## 🏗️ Architecture

```
┌─────────────────────────────────────────────────────┐
│                    Port 80                          │
│              Frontend (Nginx)                       │
│     - Serves built Vite assets                      │
│     - Proxies PHP to backend                        │
└────────────┬────────────────────────────────────────┘
             │
             │ FastCGI (port 9000)
             ▼
┌─────────────────────────────────────────────────────┐
│              Backend (PHP-FPM)                      │
│     - Laravel application                           │
│     - Auto-runs migrations                          │
└────────────┬────────────────────────────────────────┘
             │
             │ MySQL (port 3306)
             ▼
┌─────────────────────────────────────────────────────┐
│              Database (MariaDB 10.11)               │
│     - Persistent volume                             │
│     - Auto-imports SQL on first start               │
└─────────────────────────────────────────────────────┘

         Additional Worker Container:
         ┌──────────────────────────┐
         │   Queue Worker           │
         │   - Processes jobs       │
         └──────────────────────────┘
```

## 📋 Services

- **frontend** - Nginx serving static assets (port 80)
- **backend** - PHP-FPM running Laravel (internal port 9000)
- **database** - MariaDB 10.11 (port 3306)
- **queue** - Laravel queue worker

## ⚡ Common Commands

```bash
# View all available commands
make help

# Start services
make up

# View logs
make logs

# Stop services
make down

# Seed database
make seed

# Run migrations
make migrate

# Backup database
make backup

# Access backend shell
make shell-be

# Access database
make shell-db

# Clear Laravel cache
make clear-cache

# Restart everything
make restart

# Rebuild from scratch
make rebuild
```

## 🔧 Configuration

### Environment Variables

Edit `.env` file (copy from `.env.docker.example`):

```env
APP_NAME=FoodFusion
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:your-key-here

DB_CONNECTION=mysql
DB_HOST=database
DB_DATABASE=food_fusion
DB_USERNAME=food_user
DB_PASSWORD=secure_password_here
```

### Port Mapping

Default ports (can be changed in `docker-compose.yml`):
- Frontend: 80 → 80
- Database: 3306 → 3306

## 🧪 Testing Locally

The Docker setup mimics production but runs locally:

```bash
# 1. Start services
make up

# 2. Watch logs
make logs

# 3. Test the app
curl http://localhost/health

# 4. Check database
make shell-db
```

## 📊 Database Management

### Auto-Import on First Start

Place SQL files in `food_fusion_database/` - they'll auto-import on first container start.

### Manual Seed

```bash
make seed
```

### Backup

```bash
make backup
# Creates: backups/backup_YYYYMMDD_HHMMSS.sql
```

### Restore

```bash
make restore BACKUP_FILE=backups/backup_20260801_143000.sql
```

## 🛡️ Production Deployment

### Before Deploying

1. ✅ Change all default passwords in `.env`
2. ✅ Set `APP_DEBUG=false`
3. ✅ Generate new `APP_KEY`
4. ✅ Configure SSL/TLS certificates
5. ✅ Set up automated backups
6. ✅ Configure firewall rules
7. ✅ Test locally first

### Deploy to Server

```bash
# On your server
git clone <repo-url>
cd food-fusion
cp .env.docker.example .env
# Edit .env with production values
./docker-start.sh
```

### Add SSL (Production)

1. Update `docker/nginx/default.conf` for HTTPS
2. Mount SSL certificates in `docker-compose.yml`
3. Use Let's Encrypt with Certbot

See [docker-setup-guide.md](docker-setup-guide.md) for detailed production configuration.

## 🐛 Troubleshooting

### Services Won't Start

```bash
# Check logs
make logs

# Check status
docker-compose ps

# Rebuild clean
make rebuild
```

### Database Connection Error

```bash
# Verify database is healthy
docker-compose ps database

# Check environment
docker-compose exec backend env | grep DB_
```

### Permission Issues

```bash
docker-compose exec backend chmod -R 775 storage bootstrap/cache
```

### Port Already in Use

Edit `docker-compose.yml` and change the port mapping:

```yaml
frontend:
  ports:
    - "8080:80"  # Use 8080 instead of 80
```

## 📚 Documentation

- **[docker-setup-guide.md](docker-setup-guide.md)** - Comprehensive Docker guide
- **[local-run-setup.md](local-run-setup.md)** - Native PHP/Node development setup
- **[README.md](README.md)** - Project overview

## 🔄 Development vs Production

| Feature | Local Dev | Docker Production |
|---------|-----------|-------------------|
| Setup | `php artisan serve` | `docker-compose up` |
| Database | Local MySQL | Containerized MariaDB |
| Assets | `npm run dev` | Pre-built in image |
| Queue | Manual `queue:work` | Auto-started container |
| Isolation | No | Complete |
| Portability | Limited | High |

## 📝 Default Credentials

After seeding database:

**Admin:**
- Email: admin@gmail.com
- Password: @dminPassword

**Test User:**
- Email: test@gmail.com
- Password: password

## 🚨 Security Checklist

- [ ] Changed default database password
- [ ] Generated new APP_KEY
- [ ] Set APP_DEBUG=false
- [ ] Configured HTTPS/SSL
- [ ] Set up firewall
- [ ] Enabled automated backups
- [ ] Restricted database port (3306)
- [ ] Reviewed Nginx security headers

## 💡 Tips

1. **Use Makefile** - Easier than remembering Docker commands
2. **Check logs first** - `make logs` when debugging
3. **Backup regularly** - `make backup` before changes
4. **Test locally** - Always test Docker setup locally before deploying
5. **Monitor resources** - Use `docker stats` to check usage

## 🎯 Next Steps

1. Test locally: `./docker-start.sh`
2. Verify all services: `make status`
3. Check logs: `make logs`
4. Access app: http://localhost
5. Configure for your domain
6. Set up SSL certificates
7. Deploy to production server

---

**Quick Start:** `./docker-start.sh`  
**All Commands:** `make help`  
**Full Guide:** [docker-setup-guide.md](docker-setup-guide.md)
