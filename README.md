# Booking Management System

This is a simple Laravel-based Booking App that allows staff and readers to interact with the system. This repository contains the codebase for the application.

## Features

- Staff and Reader roles
- Dashboard for Staff
- Registration for both Staff and Readers
- User status management for Staff users
- Book Create , Update and Delete 
- Login and Logout functionality

## Requirements

- PHP >= 8.1
- Composer
- Laravel >= 10.x
- MySQL >= 5.7
- NodeJS & NPM for front-end assets

## Installation

1. Clone the repository

    ```bash
    git clone https://github.com/AnuruddhaBandara/Book-Management-System.git
    ```

2. Navigate to the project directory

    ```bash
    cd Book-Management-System
    ```

3. Install PHP dependencies

    ```bash
    composer install
    ```

4. Install JavaScript dependencies

    ```bash
    npm install
    ```

5. Build front-end assets

    ```bash
    npm run dev
    ```

6. Copy `.env.example` to `.env`

    ```bash
    cp .env.example .env
    ```

7. Generate application key

    ```bash
    php artisan key:generate
    ```

8. Update `.env` file with your database credentials

9. Run database migrations and seeders

    ```bash
    php artisan migrate --seed
    ```

10. Start the development server

    ```bash
    php artisan serve
    ```

## Usage

Visit `http://localhost:8000` to access the application.

- Admin can log in and view the dashboard, as well as manage user statuses.
- Readers can register and interact with the booking functionalities (still under development).

