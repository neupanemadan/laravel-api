# Task Scheduler API

Task Scheduler API is a simple task scheduling application developed using Laravel REST API. It includes JWT authentication for secure access and has been Dockerized for easy deployment. Continuous integration (CI) is set up to ensure that all tests pass before code can be merged.

## Features
- **JWT Authentication:** Secure user authentication using JSON Web Tokens (JWT).
- **Task Scheduling:** Users can create, update, and manage tasks through the API.
- **Dockerized Deployment:** The application is Dockerized, making it easy to deploy and manage in various environments.
- **Continuous Integration:** CI is configured to run tests automatically, ensuring code quality before merging.

## Installation

Follow these steps to set up and run the Task Scheduler API locally:

1. Clone the repository:

   ```bash
   git clone https://github.com/neupanemadan/laravel-api.git

2. Install Composer Dependencies:

   ```bash
    composer install

3. Create an .env File:

    Duplicate the `.env.example` file in the project root directory.
    Rename the duplicated file to `.env`.
    Open the `.env` file and modify the environment variables as needed, including the database configuration.

4. Generate an Application Key:

   ```bash
    php artisan key:generate

5. Generate Jwt Token:

   ```bash
    php artisan jwt:secret

6. Run Database Migrations:

   ```bash
    php artisan migrate

7. Start the Development Server:

   ```bash
    php artisan serve

Open your browser or API client and access the API at http://localhost:8000.
Refer to the API documentation for available endpoints and usage.

