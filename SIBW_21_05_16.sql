-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: localhost    Database: SIBW
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `event_id` bigint NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `edited_by` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'Jose Saldaña','Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897'),(2,1,'John Doe','Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-13 18:33:59.627897','2021-04-13 18:33:59.627897'),(3,1,'Juan Paco','Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-14 18:33:59.627897','2021-04-14 18:33:59.627897'),(4,2,'John Doe','Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897'),(5,2,'Julio','Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-13 18:33:59.627897','2021-04-13 18:33:59.627897'),(6,3,'John Doe','Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897'),(7,4,'John Doe','Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897'),(8,5,'Julio','Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-13 18:33:59.627897','2021-04-13 18:33:59.627897'),(9,7,'Julio','Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-13 18:33:59.627897','2021-04-13 18:33:59.627897'),(10,9,'Jose Saldaña','Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam.',NULL,'2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Jose Saldaña','Fiesta','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-12 18:33:59.627897'),(2,'John Doe','Discoteca','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897'),(3,'Paco Luis','Eventos','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-11 18:33:59.627897','2021-04-11 18:33:59.627897'),(4,'Pedro','Comidas de empresa','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-12 18:33:59.627897'),(5,'María','Cumpleaños infantil','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-13 18:33:59.627897'),(6,'Ana','Bodas','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-15 18:33:59.627897'),(7,'Bea','Fiesta sorpresa','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-13 18:33:59.627897'),(8,'Paco','Barra libre','    <p>\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\n      ultricies. Ut vitae aliquet erat.\n    </p>\n    <p>\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\n    </p>\n    <p>\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\n    </p>\n    <p>\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\n    </p>','2021-04-10 18:33:59.627897','2021-04-10 18:33:59.627897'),(9,'Sergio Alonso','Bautizos','    <p>\r\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel mi ac enim pulvinar condimentum. Cras in\r\n      porttitor eros. Mauris quis varius risus, at ullamcorper libero. Nam felis tortor, cursus nec arcu sit amet,\r\n      rutrum efficitur neque. Etiam a aliquet nunc. Duis lacinia, ante non iaculis porttitor, leo magna tempus diam,\r\n      eget mollis magna quam vehicula odio. Fusce a posuere nibh, non imperdiet ipsum. Donec sit amet risus pretium,\r\n      porttitor ligula consectetur, facilisis nisl. Nullam et convallis nisi. Donec fringilla consequat velit, ac\r\n      venenatis velit dictum eu. Curabitur congue lobortis purus in tempus. Cras fringilla nisl ligula, ac fermentum ex\r\n      dapibus scelerisque. Etiam posuere nulla non ultricies porttitor. Nam fermentum sapien sed orci consectetur\r\n      ultricies. Ut vitae aliquet erat.\r\n    </p>\r\n    <p>\r\n      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at\r\n      fringilla metus. Ut dapibus lacus eu nunc iaculis, eget accumsan nisl pretium. Mauris non sapien ac diam dictum\r\n      mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi\r\n      pellentesque dictum efficitur. Integer ut faucibus tortor, sed vulputate dui. Nam in nisl at nisi feugiat\r\n      vestibulum. Aliquam posuere tortor non velit pharetra, sit amet lacinia est eleifend. Vivamus mattis nunc tortor,\r\n      vel eleifend odio varius a. Fusce egestas nulla nulla, in tincidunt urna maximus vel. Ut bibendum viverra lacus a\r\n      interdum. Vivamus scelerisque interdum euismod. Morbi a elit convallis, vestibulum arcu sed, rutrum mi. Nulla\r\n      ultricies libero quis leo vehicula, a mollis augue pulvinar.\r\n    </p>\r\n    <p>\r\n      Nam dignissim egestas sapien, nec tempor tortor iaculis ut. Nunc sagittis in libero sit amet mollis. Vivamus\r\n      porttitor at libero nec porttitor. Curabitur non enim id nulla malesuada tempus et quis quam. Phasellus felis\r\n      diam, convallis vel quam eget, porttitor laoreet mauris. Fusce eu eros at leo pellentesque fringilla. Praesent\r\n      varius risus et turpis porttitor, ac bibendum tortor aliquam. Maecenas lacinia quam vel mattis sollicitudin.\r\n    </p>\r\n    <p>\r\n      Puede obtener más información en <a href=\"https://www.cirquedusoleil.com/es/espectaculos\">la web oficial del circo\r\n        del sol</a> o llamando al <strong>958 123 456 789</strong>.\r\n    </p>','2021-04-10 18:33:59.627897','2021-05-16 14:46:20.000000');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forbidden_words`
--

DROP TABLE IF EXISTS `forbidden_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forbidden_words` (
  `id` bigint NOT NULL,
  `word` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word_UNIQUE` (`word`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forbidden_words`
--

LOCK TABLES `forbidden_words` WRITE;
/*!40000 ALTER TABLE `forbidden_words` DISABLE KEYS */;
INSERT INTO `forbidden_words` VALUES (5,'caca'),(6,'cullo'),(4,'estúpido'),(2,'feo'),(8,'gilipollas'),(9,'idiota'),(3,'imbecil'),(7,'pene'),(10,'puta'),(1,'tonto');
/*!40000 ALTER TABLE `forbidden_words` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_images` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `event_id` bigint NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (2,1,'/public/galleries/2.jpeg'),(3,2,'/public/galleries/3.jpeg'),(4,3,'/public/galleries/4.jpeg'),(5,1,'/public/galleries/5.jpeg'),(6,6,'/public/galleries/6.jpeg'),(7,7,'/public/galleries/7.jpeg'),(8,9,'/public/galleries/8.jpeg'),(9,1,'/public/event_images/1.jpeg'),(10,2,'/public/event_images/2.jpeg'),(11,3,'/public/event_images/3.jpeg'),(12,4,'/public/event_images/4.jpeg'),(13,5,'/public/event_images/5.jpeg'),(14,6,'/public/event_images/6.jpeg'),(15,7,'/public/event_images/7.jpeg'),(16,8,'/public/event_images/8.jpeg'),(17,9,'/public/event_images/9.jpeg');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `event_id` bigint NOT NULL,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,2,'Fiestas'),(2,2,'Noche'),(3,2,'Baile'),(10,1,'test');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `super` tinyint NOT NULL DEFAULT '0',
  `moderator` tinyint NOT NULL DEFAULT '0',
  `manager` tinyint NOT NULL DEFAULT '0',
  `birth_year` int DEFAULT NULL,
  `encrypted_password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jose','jose@mail.com',1,0,0,1989,'$2y$10$8lgBw0mmVkhnbKJAq4pjC.yQ0077UEEczmerEgY2XUrgbf84EJrdm','2021-05-14 09:46:48','2021-05-14 12:20:01'),(2,'juan','juan@mail.com',1,0,0,1989,'$2y$10$ZvD8LB529R8NN.w6mCFI6O2MK8za0FZe72zEDZ.TIAy4plSYUPfa.','2021-05-14 10:32:10','2021-05-14 10:32:28'),(3,'paco','jose@mail.com',1,1,1,1989,'$2y$10$j2DBfhuu4C3HUGlmhzyOFeFuUoKmmoe8Otn6WuyigzyHRNjXiQQpi','2021-05-13 14:13:19','2021-05-14 12:18:39'),(4,'rocio','rocio@mail.com',0,1,1,1989,'$2y$10$jwMP3F3wknQQgtriWH2ztuGMPuU81W2jZCxSb8FH8vO4itKH2n5da','2021-05-14 12:20:48','2021-05-14 12:20:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'SIBW'
--

--
-- Dumping routines for database 'SIBW'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-16 19:03:11
