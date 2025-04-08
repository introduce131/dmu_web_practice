### 1번

phpMyAdmin에서 db 이름은 testdb로 생성
그리고 인코딩 형식은 맨 아래에서 2번째 utf8 머시기

### 2번
아래는 SQL문임 복사해서 쓰시길
```
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

### 3번, 게시판 테이블
```sql
CREATE TABLE board(
  num int auto_increment,
  title varchar(50) not null,
  author_id varchar(50) not null,
  author_name varchar(50) not null,
  content varchar(500) not null,
  createDt datetime not null,
  primary key(num)
);
```

### 4번, 게시판의 예시 데이터
```sql
insert into board(title, author_id, author_name, content, createDt) values("첫번쨰 게시글", "chltjrals5016", "최석민", "첫번째 게시글 입니다", now());
insert into board(title, author_id, author_name, content, createDt) values("두번쨰 게시글", "chltjrals5016", "최석민", "두번째 게시글 입니다", now());
insert into board(title, author_id, author_name, content, createDt) values("세번쨰 게시글", "chltjrals5016", "최석민", "세번째 게시글 입니다", now());
insert into board(title, author_id, author_name, content, createDt) values("네번쨰 게시글", "chltjrals5016", "최석민", "네번째 게시글 입니다", now());
insert into board(title, author_id, author_name, content, createDt) values("다섯번쨰 게시글", "chltjrals5016", "최석민", "다섯번째 게시글 입니다", now());
```
