Данный проект я разрабатываю в процессе обучения и приобретения навыков работы с фреймворком Yii2.

Реализую стандартный функционал сайта. И пишу дополнительный, на другие темы, для закрепления теории.

Вёрстка в основном была готовая. Футер декоративный, без изменений.

На данный момент для корректной работы сайта - необходимо создать базу данных yii2basic.
Затем выполнить SQL-запрос к базе данных yii2basic:

CREATE TABLE `country` (
  `code` CHAR(2) NOT NULL PRIMARY KEY,
  `name` CHAR(52) NOT NULL,
  `population` INT(11) NOT NULL DEFAULT '0',
  `status` INT(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `country` VALUES ('AU','Australia',24016400, 0);
INSERT INTO `country` VALUES ('BR','Brazil',205722000, 0);
INSERT INTO `country` VALUES ('CA','Canada',35985751, 0);
INSERT INTO `country` VALUES ('CN','China',1375210000, 0);
INSERT INTO `country` VALUES ('DE','Germany',81459000, 1);
INSERT INTO `country` VALUES ('FR','France',64513242, 1);
INSERT INTO `country` VALUES ('GB','United Kingdom',65097000, 0);
INSERT INTO `country` VALUES ('IN','India',1285400000, 0);
INSERT INTO `country` VALUES ('RU','Russia',146519759, 1);
INSERT INTO `country` VALUES ('US','United States',322976000, 0);
