# TMDB CLI Project

This project is a Laravel-zero cli application that integrates with The Movie Database (TMDB) API to provide movie information.

## Features

- Search for movies
- View movie details
- List popular movies
- List top-rated movies

## Installation

1. Clone the repository:
  ```
  git clone https://github.com/yourusername/tmdb-laravel.git
  ```

2. Navigate to the project directory:
  ```
  cd tmdb-laravel
  ```

3. Install dependencies:
  ```
  composer install
  ```

4. Copy the `.env.example` file to `.env`:
  ```
  cp .env.example .env
  ```

5. Add your TMDB API key to the `.env` file:
  ```
  TMDB_READ_ACCESS_TOKEN=your_tmdb_api_key
  ```
6. Generate PHAR 
  ```
  php tmdb-cli app:build <app_name>
  ```
7. Run the application:
  ```
  ./build/<app_name>.phar <command>
  ```