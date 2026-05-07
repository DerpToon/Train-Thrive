# Train Thrive

Train Thrive is a Laravel-based fitness and e-commerce web application. It combines workout browsing, nutrition/macros tools, product shopping, cart management, checkout, reviews, order management, and admin controls in one platform.

## Project Type

Advanced Web Project

## Main Features

- User registration, login, logout, profile management, and password reset
- Google authentication support through Laravel Socialite
- Workout library with filtering by level and muscle group
- Nutrition/calculator section for calories, protein, carbohydrates, and fats
- Product catalog with categories
- Cart system with add, update, and remove actions
- Checkout flow that creates orders and order items
- Review system
- Admin dashboard for managing:
  - Workouts
  - Calculators / food items
  - Products
  - Categories
  - Users
  - Reviews
  - Orders
- Product image upload support
- Blade-based frontend styled with Tailwind/Vite assets

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade, Tailwind CSS, JavaScript, Alpine.js
- **Build Tool:** Vite
- **Authentication:** Laravel Breeze, Laravel Socialite
- **Database:** MySQL / MariaDB / SQLite depending on `.env` configuration
- **Testing:** Pest / PHPUnit

## Requirements

Make sure the following are installed on your machine:

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL, MariaDB, SQLite, or another Laravel-supported database
- Git

## Installation

Clone the repository:

```bash
git clone https://github.com/DerpToon/Train-Thrive.git
cd Train-Thrive
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database settings inside `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=train_thrive
DB_USERNAME=root
DB_PASSWORD=
```

Run the database migrations:

```bash
php artisan migrate
```

If the project contains seeders, you may also run:

```bash
php artisan db:seed
```

Link storage for uploaded images:

```bash
php artisan storage:link
```

Start the development servers:

```bash
npm run dev
php artisan serve
```

You can also use the included Composer development script:

```bash
composer run dev
```

Then open the local Laravel URL shown in your terminal, usually:

```text
http://127.0.0.1:8000
```

## Google Authentication Setup

If you want Google login to work, add your Google OAuth credentials to `.env`:

```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

Make sure the redirect URI is also configured in your Google Cloud Console.

## Important Routes

The project contains public, authenticated, cart, checkout, review, and admin routes.

Common public pages include:

- `/`
- `/about-us`
- `/shop`
- `/products`
- `/products/{category}`
- `/reviews`

Authenticated pages include:

- `/dashboard`
- `/profile`
- `/workout`
- `/workouts`
- `/calculator`
- `/cart`
- `/checkout`

Admin routes are grouped under:

```text
/admin
```

## Project Structure

```text
app/
  Http/Controllers/      Application controllers
  Models/                Eloquent models

database/
  migrations/            Database table definitions
  seeders/               Optional test/default data

resources/
  views/                 Blade templates
  css/                   Frontend styles
  js/                    Frontend JavaScript

routes/
  web.php                Main web routes
  auth.php               Authentication routes

public/                  Public assets
storage/                 Uploaded files and generated storage files
```

## Main Models

- User
- Workout
- Calculator
- Category
- Product
- Cart
- Order
- OrderItem
- Review

## Admin Notes

The admin area allows authorized users to manage core website data. Before using admin pages, make sure your user table has the correct admin role or permission logic required by the project.

## Testing

To run the test suite:

```bash
php artisan test
```

or:

```bash
composer test
```

## Future Improvements

- Add stronger role and permission management
- Improve product search and filtering
- Add order status notifications
- Add payment gateway integration
- Improve dashboard analytics
- Add more test coverage
- Improve mobile responsiveness for all pages

## Author

Train Thrive was developed as an advanced web project.
