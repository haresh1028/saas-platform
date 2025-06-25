# SaaS Project Management System (Laravel 10)

A SaaS-based project management platform built with Laravel 10. This app includes:

- Role-based authentication using Spatie
- User subscription to Free, Basic, or Premium plans
- Project creation and management based on plan limits
- Admin dashboard for managing users, roles, and projects

## Features

- Laravel Breeze authentication
- Spatie Roles and Permissions
- Plan-based project access (Free, Basic, Premium)
- Admin-only access to user, role, and subscription management
- Soft-deletes and pagination for projects
- REST API for external access (optional)

## Tech Stack

- Laravel 10
- Laravel Breeze (Auth scaffolding)
- Spatie Laravel Permission
- MySQL
- Tailwind CSS
- Alpine.js

## Installation

```bash
git clone https://github.com/haresh1028/saas-platform.git
cd saas-platform
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve
