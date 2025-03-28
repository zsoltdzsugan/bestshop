<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# BestShop

BestShop is an e-commerce platform built with Laravel, designed to provide a seamless online shopping experience. This project is currently in development.

## 🚀 Upcoming Features

- **User Authentication**: Registration, login, and authentication powered by Laravel Breeze.  
- **Product Management**: Add, edit, and delete products with images and descriptions.  
- **Shopping Cart**: Add items to the cart and manage quantities.  
- **Order Processing**: Checkout system with order tracking.  
- **Admin Panel**: Manage users, vendors, products, and orders.
- **Vendor Panel**: Manage vendor products, images, banners etc. 
- **Responsive UI**: A modern and mobile-friendly interface using Tailwind CSS & Alpine.js.  

## 🛠️ Tech Stack

- **Backend**: Laravel 12  
- **Frontend**: Blade, Tailwind CSS, Alpine.js  
- **Database**: MySQL  
- **Authentication**: Laravel Breeze  
- **Containerization**: Docker & Laravel Sail  

## ⚙️ Installation & Usage

### Using Docker Compose

1. **Clone the repository**  
    ```sh
    git clone https://github.com/zsoltdzsugan/bestshop.git
    cd bestshop
    ```
2. **Install dependencies**  
    ```sh
    composer install
    npm install
    ```
3. **Copy the environment file and genereate application key**  
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```
4. **Build and start the containers**  
    ```sh
    docker compose up -d
    ```
5. **Run migrations and seed database**  
    ```sh
    docker compose exec laravel.test php artisan migrate --seed
    ```
6. **Link storage**  
    ```sh
    docker compose exec laravel.test php artisan storage:link
    ```
7. **Run frontend dependencies**  
    ```sh
    npm run dev
    ```
8. **Access the application**  
    ```sh
    http://localhost
    ```

### Using Laravel Sail

1. **Clone the repository**  
    ```sh
    git clone https://github.com/zsoltdzsugan/bestshop.git
    cd bestshop
    ```
2. **Install dependencies**  
    ```sh
    composer install
    npm install
    ```
3. **Copy the environment file and genereate application key**  
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```
4. **Start Laravel Sail**
    ```sh
    ./vendor/bin/sail up -d
    ```
5. **Run migrations and seed database**  
    ```sh
    ./vendor/bin/sail artisan migrate --seed
    ```
6. **Link storage**  
    ```sh
    ./vendor/bin/sail artisan storage:link
    ```
7. **Run frontend dependencies**  
    ```sh
    npm run dev
    ```
8. **Access the application**  
    ```sh
    http://localhost
    ```

### Environment Variables
```sh
    APP_NAME=Laravel
    APP_URL=http://localhost
    
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=bestshop
    DB_USERNAME=sail
    DB_PASSWORD=password
```
### Seeded Test Users
```sh
    name: Test Admin
    username: admin
    email: admin@test.com
    password: password

    name: Test Vendor
    username: vendor
    email: vendor@test.com
    password: password

    name: Test User
    username: user
    email: user@test.com
    password: password
```

## 📜 License
This project is open-source and available under the MIT License.
