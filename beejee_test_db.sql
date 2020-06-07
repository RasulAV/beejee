# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: beejee_test_db
# Generation Time: 2020-06-07 12:41:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `descr` text,
  `isdone` tinyint(1) DEFAULT '0',
  `istouched` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id`, `name`, `email`, `descr`, `isdone`, `istouched`)
VALUES
	(1,'Rasul','rasula@komek.me',' Aenean ultrices nisi justo, nec placerat justo pulvinar eget. Maecenas sit amet augue sit amet nibh congue blandit. Nam est nisl, sodales at malesuada in, suscipit eget dui. Etiam id leo feugiat dui efficitur varius id sit amet orci. Mauris nec ligula sed ante sodales blandit et non eros. Fusce condimentum leo enim, a auctor augue ultrices et. Proin quis gravida sapien, vel mollis lacus. Maecenas ac luctus libero, et interdum urna. Aenean vestibulum, tortor eget fringilla sollicitudin, lectus tellus pulvinar felis, consequat rutrum urna erat sit amet nisl.',1,1),
	(2,'Maxim','a.maxima@komek.me',' Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc luctus nisi non magna consequat malesuada vitae in purus. Donec egestas facilisis orci, sed eleifend nulla accumsan et. Integer non purus varius, consequat lacus in, venenatis quam. Quisque vestibulum eros ac lectus consequat porttitor. Quisque nec volutpat erat. Nulla elementum volutpat convallis. Phasellus mollis nunc enim, eget iaculis est convallis porta. Quisque iaculis, ex sed consequat consectetur, velit urna elementum elit, sit amet euismod tellus ante vel lacus. Vestibulum egestas orci libero, ac venenatis enim tincidunt quis. Maecenas ultrices eget elit a auctor. Quisque vel odio bibendum, tempor orci eget, pulvinar odio. Vestibulum velit augue, ornare a cursus et, tincidunt vitae orci. Nulla facilisi.',1,1),
	(3,'Igor','v.igor@komek.me','Aenean ac leo vestibulum, convallis purus vel, aliquam odio. Maecenas efficitur interdum turpis sed lacinia. Donec sagittis fringilla nulla, sed placerat lorem dapibus sit amet. Ut ac scelerisque odio, aliquam pretium mauris. Duis a nunc quis velit pharetra convallis vitae nec dolor. Integer vulputate augue quam, et convallis nunc aliquam id. Praesent quis turpis metus. Sed id risus risus. Mauris semper auctor nunc, eu accumsan sapien luctus vel. Duis blandit elementum placerat. Nullam porta orci ut ligula semper sagittis. Donec ultricies suscipit ex, eu efficitur augue sagittis sit amet. Integer feugiat neque a nunc porttitor, nec consectetur ipsum cursus. Duis pulvinar consequat nunc. Maecenas efficitur, neque sit amet laoreet rutrum, orci lorem convallis arcu, at elementum lectus libero et risus.',1,1),
	(4,'Axmed','akhmed@komek.me','Duis a nunc quis velit pharetra convallis vitae nec dolor. Integer vulputate augue quam, et convallis nunc aliquam id. Praesent quis turpis metus.',1,1),
	(5,'Borat','s.borats@komek.me','Maecenas efficitur interdum turpis sed lacinia. Donec sagittis fringilla nulla, sed placerat lorem dapibus sit amet. Ut ac scelerisque odio, aliquam pretium mauris. Duis a nunc quis velit pharetra convallis vitae nec dolor. Integer vulputate augue quam, et convallis nunc aliquam id. Praesent quis turpis metus. ',0,1),
	(6,'Sergey','m.sergey@komek.me','Suspendisse at dolor nisi. Quisque congue felis nulla, at auctor erat interdum ut. In hac habitasse platea dictumst. Vivamus imperdiet turpis ac lorem cursus iaculis.Maecenas efficitur interdum turpis sed lacinia. Donec sagittis fringilla nulla, sed placerat lorem dapibus sit amet. Ut ac scelerisque odio, aliquam pretium mauris. Duis a nunc quis velit pharetra convallis vitae nec dolor. Integer vulputate augue quam, et convallis nunc aliquam id. Praesent quis turpis metus. ',0,0),
	(7,'Whisley','b.whisley@komek.me',' Maecenas efficitur interdum turpis sed lacinia. Donec sagittis fringilla nulla, sed placerat lorem dapibus sit amet. Ut ac scelerisque odio, aliquam pretium mauris. Duis a nunc quis velit pharetra convallis vitae nec dolor. Integer vulputate augue quam, et convallis nunc aliquam id. Praesent quis turpis metus. Sed id risus risus. Mauris semper auctor nunc, eu accumsan sapien luctus vel. Duis blandit elementum placerat. Nullam porta orci ut ligula semper sagittis. Donec ultricies suscipit ex, eu efficitur augue sagittis sit amet. Integer feugiat neque a nunc porttitor, nec consectetur ipsum cursus. Duis pulvinar consequat nunc. Maecenas efficitur, neque sit amet laoreet rutrum, orci lorem convallis arcu, at elementum lectus libero et risus.',1,1);

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `password_hash`)
VALUES
	(1,'admin','$2y$10$DWzjz5z6/vIoyDX/7xNiAOy5ym2WQlvz1Y2C9XUHjNe.qpYmpWztK');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
