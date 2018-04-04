# laravel-subscribers-api
REST API development using PHP Laravel 5.6

# STEPS to install:

```

1. Please make sure that you machine should have the composer and PHP version >= 7.0 
2. Open cmd and go to the project directory 
3. Run command --> composer update
4. Copy .env.example with .env file 
5. Run command:  php artisan key:generate
6. Create DB --> subscriber_db (you can choose any name)
7. configure your .env file for database configuration 
8. Run command: php artisan migrate
9. Run Command : php artisan db:seed
10. Check you app using browser with http://localhost/project_directory/public/api/subscribers

```



# CRUD For Subscriber

```

GET : /api/subscribers

```

```

GET : /api/subscribers/{your prmary key id}

```

```

GET : POST : /api/subscribers

BODY : {"name":"talib","email":"talib@gmail.com","state":"active"}

```

```

PUT : /api/subscribers/{your prmary key id}

BODY : {"name":"talib","email":"talib@gmail.com","state":"active"}

```

```

DELETE : /api/subscribers/{your prmary key id}

```


# CRUD For Subscriber Fields

```

GET : /api/subscriber-fields

```

```

GET : /api/subscriber-fields/{your prmary key id}

```


```

POST : /api/subscriber-fields

BODY : {"title":"address","type":"string"}

```

```

PUT : /api/subscriber-fields/{your prmary key id}

BODY : {"title":"address","type":"string"}

```

```

DELETE : /api/subscriber-fields/{your prmary key id}

```
