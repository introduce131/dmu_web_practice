### 1번

phpMyAdmin에서 db 생성
이름은 `testdb`
형식은 `utf8mb4_unicode_ci`

### 2번
아래는 SQL문임 복사해서 쓰시길
```sql
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
```
