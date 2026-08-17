# Food Fusion Local Run Setup (Linux)

This guide helps you run Food Fusion on your local Linux machine before deploying to a cloud server.

## 1. Project Analysis Summary

From this repository:

- Framework: Laravel 12 (PHP 8.2+ required)
- Backend deps: Composer packages
- Frontend tooling: Vite + TailwindCSS + DaisyUI (Node.js 18+ required)
- Database default in environment: MySQL (`DB_CONNECTION=mysql`)
- Queue/session/cache are configured to use database tables (`QUEUE_CONNECTION=database`, `SESSION_DRIVER=database`, `CACHE_STORE=database`)
- Seeders are available for sample data (`DatabaseSeeder` calls all seeders)
- SQL dump is available at `food_fusion_database/food-fusion-db.sql`

Because session, cache, and queue use database tables, migrations are important for a stable local run.

## 2. Prerequisites

Install these first:

- PHP 8.2 or newer
- Composer
- Node.js 18 or newer and npm
- MySQL 8+ (or MariaDB 10.3+)
- Git

Quick version check:

```bash
php -v
composer -V
node -v
npm -v
mysql --version
git --version
```

## 3. Clone and Enter Project

```bash
git clone https://github.com/KhantZaya/food-fusion.git
cd food-fusion
```

If you already have the project folder, just enter it:

```bash
cd /home/nyeinchan/D-partation/NC-Dir/DevOps-Project/food-fusion
```

## 4. Install Dependencies

```bash
composer install
npm install
```

## 5. Environment Setup

Create local environment file and app key:

```bash
cp .env.example .env
php artisan key:generate
```

## 6. Database Setup (MySQL)

Open MySQL and create DB (name can be changed):

```bash
mysql -u root -p
```

Inside MySQL shell:

```sql
CREATE DATABASE food_fusion_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

Update `.env` database values:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=food_fusion_db
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

## 7. Choose One Data Initialization Method

### Option A (Recommended): Migrate + Seed

Best for development consistency:

```bash
php artisan migrate
php artisan db:seed
```

### Option B: Import Existing SQL Dump

Use provided dump when you need prebuilt data snapshot:

```bash
mysql -u root -p food_fusion_db < food_fusion_database/food-fusion-db.sql
```

If you import dump, do not run `migrate:fresh` unless you want to wipe imported data.

## 8. Storage Link and Permissions

```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

If permissions still fail on Linux, ensure your current user owns the project directory.

## 9. Build Frontend Assets

For development:

```bash
npm run dev
```

For production-like local test:

```bash
npm run build
```

## 10. Run the App Locally

In a new terminal (keep `npm run dev` running if using it):

```bash
php artisan serve
```

Open:

- http://127.0.0.1:8000

## 11. Optional: Run Queue Worker Locally

Because queue driver is set to database, run this for queued jobs:

```bash
php artisan queue:work
```

## 12. One-Command Dev Mode (Optional)

This project has a Composer script that starts server, queue listener, logs, and Vite together:

```bash
composer run dev
```

## 13. Useful Local Commands

```bash
php artisan optimize:clear
php artisan config:clear
php artisan route:list
php artisan migrate:status
```

## 14. Troubleshooting

### SQLSTATE / DB Connection Error

- Verify MySQL is running
- Check `.env` DB credentials
- Confirm database exists
- Run:

```bash
php artisan config:clear
php artisan cache:clear
```

### Session/Cache Table Missing

Run migrations:

```bash
php artisan migrate
```

### Frontend Not Loading / Vite Manifest Error

Build assets:

```bash
npm install
npm run build
```

or run dev server:

```bash
npm run dev
```

### Permission Denied in `storage` or `bootstrap/cache`

```bash
chmod -R 775 storage bootstrap/cache
```

## 15. Before Cloud Deployment Checklist

Confirm these locally first:

- App runs without errors on `php artisan serve`
- Migrations run cleanly on empty DB
- Seeder works (if using seeded deployment)
- Frontend assets compile (`npm run build`)
- Storage symlink works (`php artisan storage:link`)
- Queue jobs process (if queue is required)
- `.env` is not committed

## 16. Docker Production Setup (Alternative)

For production-ready Docker deployment with separate containers, see **[docker-setup-guide.md](docker-setup-guide.md)**.

Quick Docker start:

```bash
cp .env.docker.example .env
docker-compose up -d --build
```

Access at http://localhost

---

**Local Development** = This guide (native PHP/Node)  
**Docker Production** = [docker-setup-guide.md](docker-setup-guide.md)
