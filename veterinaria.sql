/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - veterinaria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`veterinaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `veterinaria`;

/*Table structure for table `administrador` */

DROP TABLE IF EXISTS `administrador`;

CREATE TABLE `administrador` (
  `pnombreadmin` varchar(200) NOT NULL,
  `snombreadmin` varchar(200) NOT NULL,
  `papellidoadmin` varchar(200) NOT NULL,
  `sapellidoadmin` varchar(200) NOT NULL,
  `idadmin` int(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `administrador` */

insert  into `administrador`(`pnombreadmin`,`snombreadmin`,`papellidoadmin`,`sapellidoadmin`,`idadmin`,`mail`,`password`) values ('Amor','Cejas','Gutierrez','Paez',0,'henryelcejas@gmail.com','9874567548'),('Henry','Junior','Parra','Gutierrez',52648954,'kndwksmls@gmail.com','9874567548'),('Lina','Paola','Rueda','Wilches',1045688053,'linarueda@gmail.com','87964587'),('Anyelis','Paola','Parra','Ruiz',1045698645,'anyiparra1012@gmail.com','90101282014'),('Henry','Junior','Paez','Gutierrez',1140855211,'hpaezgutierrez@gmail.com','123456789'),('Carlos','Daniel','Parra','Paez',2147483647,'admin@admin.com','12345678');

/*Table structure for table `mascota` */

DROP TABLE IF EXISTS `mascota`;

CREATE TABLE `mascota` (
  `mascota` varchar(200) NOT NULL,
  `raza` varchar(200) NOT NULL,
  `idusuario` int(200) NOT NULL,
  `idmascota` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idmascota`),
  KEY `FK_mascota_usuario` (`idusuario`),
  CONSTRAINT `FK_mascota_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mascota` */

insert  into `mascota`(`mascota`,`raza`,`idusuario`,`idmascota`) values ('Parrandera','Labradora',0,1),('Yois','Pitbull',876543,2),('Perro','Negro',0,3),('Perro','Negro',0,4),('Amor','Rosa',0,5),('Perro','Rosa',0,6),('Morado','Labrador',0,7),('q','w',0,8),('1','2',0,9),('Perro','w',0,10),('Amor','Chanda',0,11),('Amor','Labrador',0,12),('Perro','Negro',0,13),('Amor','Labrador',0,14),('Amor','Labrador',876543,15),('Amor','Labrador',876543,16);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `nombreusuario` varchar(200) NOT NULL,
  `idusuario` int(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`nombreusuario`,`idusuario`,`mail`,`direccion`,`telefono`) values ('Paola',0,'anyiparra1012@gmail.com','Cra','3222222'),('Lina',876543,'wilcheslina@gmail.com','cra','3876453');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
