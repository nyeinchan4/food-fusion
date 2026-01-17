# Food Fusion

A comprehensive web application that combines culinary exploration with renewable energy education, built with Laravel 11.

## Features

- **Recipe Management**: Browse, search, and filter recipes with detailed instructions
- **Community Cookbook**: Share and discover user-generated recipes with social features
- **Resource Library**: Download culinary guides and renewable energy educational materials
- **User Authentication**: Secure registration, login, and account management
- **Contact System**: Multi-channel communication with inquiry categorization
- **Responsive Design**: Mobile-first approach using Tailwind CSS and DaisyUI

## Requirements

- PHP 8.2+
- MySQL 8.0+ or MariaDB 10.3+
- Composer
- Node.js 18+ (for asset compilation)
- Git

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/KhantZaya/food-fusion.git
cd food-fusion
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

Edit your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=food_fusion
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Database Migration

```bash
# Run database migrations
php artisan migrate
```

### 6. Database Seeding

```bash
# Seed the database with initial data
php artisan db:seed

# Or run specific seeders
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ResourceSeeder
```

### 7. Asset Compilation

```bash
# Compile frontend assets
npm run build

# For development with hot reloading
npm run dev
```

### 8. Storage Link

```bash
# Create symbolic link for public storage
php artisan storage:link
```

## Running the Application

### Development Server

```bash
# Start Laravel development server
php artisan serve

# Application will be available at http://localhost:8000
```

### Alternative Development Setup

```bash
# Start development server with host and port
php artisan serve --host=0.0.0.0 --port=8000
```

## Available Seeders

The application includes several database seeders:

### UserSeeder
- Creates default admin and user accounts
- Sets up initial user roles and permissions

```bash
php artisan db:seed --class=UserSeeder
```

### ResourceSeeder
- Populates culinary and educational resources
- Sets up resource categories and file references

```bash
php artisan db:seed --class=ResourceSeeder
```

### DatabaseSeeder (All Seeders)
- Runs all available seeders in sequence

```bash
php artisan db:seed
```

## Default Accounts

After running the UserSeeder, you can use these default accounts:

**Admin Account:**
- Email: admin@example.com
- Password: password

**User Account:**
- Email: user@example.com
- Password: password

## File Structure

```
food-fusion/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/              # Eloquent models
│   └── Services/            # Business logic services
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
├── resources/
│   ├── views/               # Blade templates
│   └── js/                  # JavaScript files
├── public/
│   └── storage/             # Publicly accessible files
└── storage/
    └── app/                 # Application file storage
```

## Common Commands

### Database Operations

```bash
# Create a new migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migration (drops all tables)
php artisan migrate:fresh

# Create a new seeder
php artisan make:seeder SeederName
```

### Development Commands

```bash
# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Clear all caches
php artisan optimize:clear

# Show routes
php artisan route:list
```

### Asset Management

```bash
# Install new npm package
npm install package-name

# Build assets for production
npm run build

# Watch for changes during development
npm run dev
```

## Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Verify database credentials in `.env`
   - Ensure database server is running
   - Check database exists and user has proper permissions

2. **Storage Link Issues**
   - Run `php artisan storage:link`
   - Ensure `public/storage` directory exists
   - Check file permissions

3. **Asset Compilation Errors**
   - Run `npm install` to install dependencies
   - Clear cache with `php artisan optimize:clear`
   - Rebuild assets with `npm run build`

4. **Permission Issues**
   - Set proper permissions for storage directories:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

### Debug Mode

Enable debug mode in `.env` for development:

```env
APP_DEBUG=true
APP_ENV=local
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open-sourced software licensed under the MIT license.
