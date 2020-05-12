Création de la BD
version php:

CREATE TABLE user(
id		integer PRIMARY KEY not null AUTO_INCREMENT,
name	varchar(255),
firstname	varchar(255),
imagename 	varchar(255) default 'default.png',
image 		blob,
email		varchar(255),
password  	varchar(255)
);

version symfony 

ajouter cette ligne dans votre ficher .env

DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/profil_user?serverVersion=5.7
php bin/console doctrine:database:create

lorsque que vous vous connecteur a un utilisateur sa vous redirige a la page initial de symfony mais je ne sais pas pq sa fait ça


version api_platform/react:

ajouter cette ligne dans votre ficher .env

DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/api_platform?serverVersion=5.7
php bin/console doctrine:database:create

