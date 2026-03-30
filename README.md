# SLMP Technical Exam

A containerized Laravel API for fetching and managing post data. This project utilizes **Laravel Sail** to manage the Docker environment and includes a custom artisan command to sync data from an external REST API.


#Clone the Repository
    git clone https://github.com/Viron1121/slmp_technical_exam.git
    Create .env and copy the format of .env.example
    cd slmp_technical_exam

#Prerequisites
Install Docker Desktop on your machine.
Ensure Docker is running.

#Start the Containers
    Run your Docker containers:
    docker-compose up -d

#Set Up Laravel Inside the App Container
    On project directory slmp_technical_exam
    docker exec -it laravel_app bash (it will be redirected on container folder var/www/html)
    

    composer install --ignore-platform-reqs
    php artisan key:generate
    php artisan migrate

    #CREATE THE DATABASE FROM DOCKER MYSQL SERVER
    docker exec -it laravel_db bash
    docker exec -it laravel_db mysql -u root -p
    password: 123
    
    Ensure your .env database credentials match:
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=slmp_db
    DB_USERNAME=sail
    DB_PASSWORD=123
    
    CREATE DATABASE IF NOT EXISTS slmp_db;

   
   inside of container var/www/html
   php artisan migrate 

    #Command to fetch data from restapi
    php artisan fetch:json-data


POSTMAN
 HTTP type POST
 http://localhost:8000/api/login
 body->raw
 {
  "email": "Sincere@april.biz",
  "password": "password"
}

you should get something the token on body make sure the header is accepting application/json so it outputs the json format

 http type GET
 http://localhost:8000/api/posts

 authorization Bearer Token then put the given token upon logging in

 it should able to fetch all the data from posts


 Contact me at "viron3210@gmail.com" or 09754711573 if you have question regarding in running it on container
 
