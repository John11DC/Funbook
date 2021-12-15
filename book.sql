CREATE TABLE `admin` (
  `id` varchar(40) PRIMARY KEY NOT NULL,
  `name` VARCHAR(45) NOT NULL
);


CREATE TABLE `user` (
  `id` varchar(40) PRIMARY KEY NOT NULL,
  `email` varchar(255),
  `password` varchar(255),
  `picture` mediumtext,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `age` int,
  `phone` int,
  `verify` boolean DEFAULT false,
  `admin_Id` varchar(40)
);

CREATE TABLE `book` (
  `id` varchar(40) PRIMARY KEY NOT NULL,
  `createdAt` varchar(255),
  `title` varchar(255),
  `description` longtext NOT NULL,
  `photo` mediumtext,
  `user_Id` varchar(40)
  );

CREATE TABLE `contact` (
  `id` varchar(40) PRIMARY KEY NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
  );


CREATE TABLE `feedback` (
  `id` varchar(40) PRIMARY KEY NOT NULL,
  `comment` LONGTEXT NOT NULL,
  `note` TINYINT NOT NULL,
  `valid` TINYINT(1) NOT NULL DEFAULT 0,
  `user_Id` varchar(40)
);





ALTER TABLE `book` ADD FOREIGN KEY (`user_Id`) REFERENCES `user` (`id`);

ALTER TABLE `user` ADD FOREIGN KEY (`admin_Id`) REFERENCES `admin` (`id`);

ALTER TABLE `feedback` ADD FOREIGN KEY (`user_Id`) REFERENCES `user` (`id`);

-- ALTER TABLE `order` ADD FOREIGN KEY (`user_Id`) REFERENCES `user` (`id`);
