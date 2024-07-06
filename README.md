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

4. ctrl+click on the url to open the page or paste the url in a browser
5. login with the following credentials
    - email: tester@example.com
    - password: 1234
6. explore the site