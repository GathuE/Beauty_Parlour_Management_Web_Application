

CREATE TABLE `sensational_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `clientname` varchar(255) DEFAULT NULL,
  `firstvisit` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO sensational_clients VALUES("1","0711530740","Hezekiah Ndungu","2024-07-09");



CREATE TABLE `sensational_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO sensational_employees VALUES("1","SBP-001","Winnie Njeri ");
INSERT INTO sensational_employees VALUES("2","SBP-002","Emmanuel Gathu");



CREATE TABLE `sensational_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientcode` varchar(255) NOT NULL,
  `employeecode` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `redeemable` varchar(255) NOT NULL,
  `employeeretainer` int(11) NOT NULL,
  `businessretainer` int(11) NOT NULL,
  `productretainer` int(11) NOT NULL,
  `rewardpoints` int(11) NOT NULL,
  `date_received` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO sensational_payments VALUES("1","0711530740","SBP-002","admin","S001","3000","no","1500","1500","0","6","2024-07-09");



CREATE TABLE `sensational_redeemhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientcode` varchar(255) NOT NULL,
  `employeecode` varchar(255) NOT NULL,
  `rewardpoints` varchar(255) NOT NULL,
  `date_redeemed` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `sensational_services` (
  `id` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO sensational_services VALUES("S001","Hair ");
INSERT INTO sensational_services VALUES("S002","Products ");
INSERT INTO sensational_services VALUES("S003","Nails");



CREATE TABLE `sensational_useraccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `jobid` varchar(25) NOT NULL,
  `question` int(11) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO sensational_useraccounts VALUES("1","Administrator","Admin","admin","3","$2y$10$3I6NiJ3przqE2kaLnt11meGObdD6o3TLO8HhKrYOJt8Ej.cphKmdG","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO sensational_useraccounts VALUES("2","Cashier","Cashier","cashier","3","$2y$10$WCDRM9jvZ6aYV85iN..OZ.S2ktgs9.1a4mPs8dOOVJlnCAko9dPia","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO sensational_useraccounts VALUES("3","Superadmin","Superadmin","superadmin","1","48d6215903dff56238e52e8891380c8f","e10adc3949ba59abbe56e057f20f883e");

