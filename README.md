
# ขั้นตอนการ Build Project
```sh
 $ docker build -t rmutsb_car .
 $ docker network create mynetwork
 $ docker run -d --name myweb --network mynetwork --restart always -p 80:80 \
   rmutsb_car

 $ docker pull bitnami/mysql:5.7
 $ docker run -d --name mysql --network mynetwork --restart always \
   -e MYSQL_ROOT_PASSWORD=password -e MYSQL_DATABASE=car_rmutsb \
   bitnami/mysql:5.7

```

# ขั้นตอนการสร้าง Database 
```sh
เข้าไปใน container mysql 
$ docker exec -it  ContainerName sh

พิมพ์คำสั่งต่อไปนี้ 
$ mysql -u root -p password
$ use car_rmutsb
$ mysql -u username -root p password < SQLrmutsbcar.sql
$ quit

```
