
# PHP_Laravel8_AvoRed

## Introduction

This project is a step-by-step R&D and implementation guide for building an eCommerce application using AvoRed with Laravel 8.
AvoRed is an open-source Laravel eCommerce package that provides ready-made features like product management, cart, orders, and admin panel.

This project is created for students, freshers, and beginners to understand how Laravel packages work in real projects and how eCommerce functionality can be integrated without building everything from scratch.

---

## Project Overview

The PHP_Laravel8_AvoRed project demonstrates how to install, configure, and use the AvoRed eCommerce framework in a Laravel 8 application.

The project covers:

- Laravel 8 project setup

- AvoRed installation and configuration

- Database migration and admin panel access

- Understanding AvoRed folder structure and workflow

---

## What is AvoRed?

**AvoRed** is an **open-source Laravel-based eCommerce framework**.

It provides ready-made functionality like:

* Product Management
* Category Management
* Shopping Cart
* Orders & Checkout
* Admin Panel

Instead of building an eCommerce system from scratch, we use **AvoRed as a Laravel package**.

> Think of AvoRed as:
> **Laravel + Built-in eCommerce Features**

---

## Why We Do R&D on AvoRed?

R&D (Research & Development) helps us understand:

* How Laravel packages work internally
* How AvoRed integrates with Laravel
* Folder structure and configuration
* How admin authentication works

This is very useful for:

* College practicals
* Viva / interviews
* Real-world Laravel learning

---

## System Requirements

Make sure your system has:

* PHP **7.4 – 8.1**
* Composer
* Node.js & NPM
* MySQL / MariaDB
* Laravel **8.x**

---

## Step 1: Create Laravel 8 Project

Open terminal or command prompt:

```bash
composer create-project laravel/laravel PHP_Laravel8_AvoRed "8.*"
```

Move into project folder:

```bash
cd PHP_Laravel8_AvoRed
```

Check Laravel version:

```bash
php artisan --version
```

Expected output:

```text
Laravel Framework 8.x
```

---

## Step 2: Environment Configuration

Open `.env` file and update database settings:

```env
APP_NAME=PHP_Laravel8_AvoRed
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=avored_db
DB_USERNAME=root
DB_PASSWORD=
```

Create database:

```sql
CREATE DATABASE avored_db;
```

---

## Step 3: Install AvoRed Framework

Install **AvoRed (Laravel 8 compatible version)**:

```bash
composer require avored/framework:5.0.6 --with-all-dependencies
```

This will:

* Download AvoRed framework
* Register service providers automatically

---

## Step 4: Install AvoRed

Run the installation command:

```bash
php artisan avored:install
```

During installation:

* Select **No** for Dummy Data (recommended)
* Enter Admin user details like 

What is your First Name?:
> any_first_name

What is your Last Name?:
> any_last_name

What is your Email Address?:
> admin@gmail.com

What is your Password?:
> password

Confirm Password:
> password

- Password will be hidden while typing — that’s normal.

This command:

* Publishes config files
* Publishes assets
* Publishes migrations
* Sets up admin authentication

---

## Step 5: Publish AvoRed Assets & Config

If assets are not visible, run:

```bash
php artisan vendor:publish --provider="AvoRed\Framework\AvoRedServiceProvider" --force
```

This publishes:

* `config/avored.php`
* `public/vendor/avored` assets

---

## Step 6: Run Database Migrations

```bash
php artisan migrate
```

This creates tables like:

* products
* categories
* orders
* admins
* roles

---

## Step 7: Run Laravel Project

```bash
php artisan serve
```

Open browser:

[http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Step 8: AvoRed Admin Panel

Admin URL:

[http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

Login using admin credentials created during installation.

Default admin login:

```text
Email: admin@gmail.com
Password: password
```

(You can change this later from admin panel)


From admin panel you can manage:

* Products
* Categories
* Orders
* Customers
* CMS Pages

---

## Admin Logout Fix if not work (Important R&D Point)

By default, logout link is not functional.

### Issue

vendor/avored/framework/resources/views/partials/header.blade.php

* Logout route expects **POST**
* Blade file uses `<a href="#">`

Replace this:

```blade
<a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-red-500 rounded hover:text-white">
    {{ __('avored::system.logout') }}
</a>
```

With THIS:

```blade
  <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-red-500 rounded hover:text-white">
                            {{ __('avored::system.logout') }}
                        </button>
  </form>
```

This ensures:

* Correct admin guard logout
* Session invalidation

---

## Output

### AvoRed Login Page

<img width="1918" height="1083" alt="Screenshot 2026-02-04 172857" src="https://github.com/user-attachments/assets/e6134f83-28b0-4c92-ab70-1b6ca402ce30" />

### AvoRed Dashboard

<img width="1919" height="1087" alt="Screenshot 2026-02-04 172945" src="https://github.com/user-attachments/assets/3b6446fb-6ae7-41a8-82ca-d3a79915bf0b" />

---

## Project Folder Structure

```text
PHP_Laravel8_AvoRed
│
├── app/
│   ├── Models/
│   ├── Http/Controllers/
│
├── config/
│   └── avored.php
│
├── database/
│   └── migrations/
│
├── resources/
│   └── views/
│
├── routes/
│   └── web.php
│
├── public/
│   └── vendor/avored/
│
├── vendor/
│   └── avored/framework/
│
├── .env
└── artisan
```

---

Your PHP_Laravel8_AvoRed Project is now ready!
<<<<<<< HEAD
=======

>>>>>>> development
