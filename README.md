# Employee CRUD project in Laravel 9

## Project Purpose
The purpose of this project is to create a CRUD application for managing employees in Laravel 9. The application will make use of a web service to determine the salary in foreign currency and provide a salary increase projection for a year and a half, considering a 4% increment every 4 months based on the base salary.

## Getting Started
To get started with the project, follow these steps:

---First of all create a database with the name you want, and set the environment variables of it in the .env

1. Install project dependencies by running the following command:
    composer install

2. Install frontend dependencies by running the following command:
    npm install

3. Generate the application key by running the following command:
    php artisan key:generate

4. Run the database migrations to set up the necessary database tables by running the following command:
    php artisan migrate

5. Run the database sessions to populate some data into the database with the following command:
    php artisan db:seed --class=UserSeeder

5. Run app:
    php artisan serve


## Login Credentials
To log in to the application, use the following credentials:
- Email: admin@example.com
- Password: password



## Technologies Used

### Laravel
Laravel is a PHP web application framework that provides an elegant and expressive syntax. It aims to make the development process enjoyable and efficient by providing a wide range of features and conventions. Laravel follows the MVC (Model-View-Controller) architectural pattern, making it easy to organize code and separate concerns. It includes features like routing, database migration, ORM (Object-Relational Mapping), templating engine, and more.

### Laravel Jetstream
Laravel Jetstream is a robust scaffolding library that provides a starting point for Laravel applications. It offers a beautiful, responsive user interface for authentication, two-factor authentication, and API support out of the box. Jetstream utilizes the latest frontend technologies, such as Tailwind CSS and Alpine.js, to provide a modern development experience.

### Laravel Livewire
Laravel Livewire is a full-stack framework for Laravel applications that enables developers to build interactive user interfaces without writing JavaScript code. It combines the best parts of Laravel and Vue.js, allowing you to write dynamic components using PHP and Blade templates. Livewire simplifies the development process by handling server-side rendering, form validation, and real-time updates without the need for manually writing JavaScript code.

---
