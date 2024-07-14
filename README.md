# URL Shortener

## Setup

1. Install PHP + node.js `asdf install` (ensure listed deps are installed https://github.com/asdf-community/asdf-php)
    - alternatively if on macos `brew install php composer`
1. Setup docker dependencies `docker compose up`
1. Install Service dependencies `composer install`
1. Install UI build dependencies `npm install`
1. Copy .env.example into .env `cp .env.example .env`

## Development

1. Run DB migrations `php artistan migrate`
1. Setup encryption keys `php artisan key:generate`
1. Run the UI build `npm run dev`
1. Run the app `php artisan serve`
1. Navigate to localhost:8000
