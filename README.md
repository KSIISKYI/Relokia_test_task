### This project was developed as a test task by Relokia company

## Used technologies:

:point_right: PHP 7.4

:point_right: docker

:point_right: Guzzle

## Installation:
1. Clone the repository:
```
git clone https://github.com/KSIISKYI/Relokia_test_task.git
```
2. Move to root application directory:
```
cd Relokia_test_task/
```
3. Rename .env.example to .env:
```
mv .env.example .env
```
4. Set credentials for zendesk.com in .env file

5. Run docker on your local machine

6. Сreate and run images
```
docker-compose up -d
```
7. Composer install 
```
docker-compose exec -it php composer install
```
8. Run the script
```
http://localhost/index.php
```

#### Enjoy :joy:
