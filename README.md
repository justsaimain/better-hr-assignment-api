
## Project Setup

- Please pull the ```master``` branch and run ``` composer update ```.

- Duplicate or Copy ```.env.example``` file and rename it to ```.env```

- Generate new APP_KEY using ```php artisan key:generate```

- Setting up the database

    ```
    DB_DATABASE=api         //database name
    DB_USERNAME=root        //database username
    DB_PASSWORD=password    //database password
    ```
- Migrate the tables using ```php artisan migrate```

- Seed the employees data using ```php artisan db:seed```

- Create the encryption keys of Laravel Passport 

    ```php artisan passport:install```

- Run the application

    ```php artisan serve```