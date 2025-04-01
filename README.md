CREATE TABLE `testdb`.`member` 
( `id` VARCHAR(30) NOT NULL , 
`password` VARCHAR(30) NOT NULL , 
`name` VARCHAR(30) NOT NULL , 
`birth` DATE NOT NULL , 
`address` VARCHAR(200) NOT NULL , 
`email` VARCHAR(50) NOT NULL , 
`createDt` DATETIME NOT NULL , 
`profileText` VARCHAR(300) NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;
