#Steps to run

1. clone the repository
2. cd into the project directory 
3. in a terminal run the following commands
    - composer install
    - cp .env.example .env
    - php artisan key:generate
    - php artisan migrate (enter y if prompted)
    - php artisan db:seed
    - npm install
    - npm run build
    - php artisan serve