### 1. Clone the Repository
```shell
git clone https://github.com/firdovsi-mamedov/laravel-lucky-links.git
cd laravel-lucky-links
```

### 2. Install PHP Dependencies
```shell
composer install
```

### 3. Install Frontend Dependencies
```shell
npm install
```


### 4. Set Up Environment Variables
```shell
cp .env.example .env
```

```env
APP_NAME=YourAppName
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

For SQLite, create the database file:
```shell
mkdir -p database
touch database/database.sqlite
```

### 5. Generate Application Key
```shell
php artisan key:generate
```

### 6. Run Migrations
```shell
php artisan migrate
```

### 7. Compile Frontend Assets
Compile frontend assets for development:
```shell
npm run dev
```

For production, use:
```shell
npm run build
```

### 8. Run the Development Server
```shell
php artisan serve
```

The application will be available at http://127.0.0.1:8000
