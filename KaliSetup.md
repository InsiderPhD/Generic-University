### Manual Instalation (on Kali Linux)

1. sudo apt update
2. sudo apt install composer
3. sudo apt install php-xml
4. git clone https://github.com/InsiderPhD/Generic-University.git
5. cd Generic-University
6. composer update
7. cp .env.example .env

mysql:
8. sudo service mysql status
start if needed
9. sudo service mysql start
10. `mysql` or `sudo mysql -uroot -p`
11. `CREATE USER 'uni'@'localhost' IDENTIFIED BY 'password';`
12. `GRANT ALL PRIVILEGES ON * . * TO 'uni'@'localhost';`
13. `FLUSH PRIVILEGES;`
14. `CREATE DATABASE 'generic';`
15.  and finally `exit`

17. vim (edit file) .env

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=generic
DB_USERNAME=uni
DB_PASSWORD=password

```

:wq ( in case you didn't know how to quit vim :)

18. php artisan migrate
19. php artisan db:seed
20. php artisan key:generate
21. php artisan serve

22. open http://127.0.0.1:8000/

enjoy hacking api :)
