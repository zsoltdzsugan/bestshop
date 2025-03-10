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
- **Admin Panel**: Manage users, products, and orders.  
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
2. **Copy the environment file**  
    ```sh
    cp .env.example .env
    ```
3. **Generate the application key**  
    ```sh
    docker-compose run --rm app php artisan key:generate
    ```
4. **Build and start the containers**  
    ```sh
    docker-compose up -d
    ```
5. **Run migrations and seed database**  
    ```sh
    docker exec -it bestshop-app php artisan migrate --seed
    ```
6. **Access the application**  
    ```sh
    http://localhost
    ```

### Using Laravel Sail

1. **Install dependencies**  
    ```sh
    composer install
    npm install
    ```
2. **Copy the environment file**  
    ```sh
    cp .env.example .env
    ```
3. **Start Laravel Sail**  
    ```sh
    ./vendor/bin/sail up -d
    ```
4. **Generate the application key**  
    ```sh
    ./vendor/bin/sail artisan key:generate
    ```
5. **Run migrations and seed database**  
    ```sh
    ./vendor/bin/sail artisan migrate --seed
    ```
6. **Run frontend dependencies**  
    ```sh
    composer run dev
    ```
7. **Access the application**  
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

## 📜 License
This project is open-source and available under the MIT License.
