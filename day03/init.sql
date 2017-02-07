
create database day03;
grant all on day03.* to mno@localhost identified by 'rabbit';

use day03;

create table storedCoin (
  id int not null auto_increment primary key,
  yen1000 int,
  yen500 int,
  yen100 int,
  yen50 int,
  yen10 int
);

insert into storedCoin (yen1000, yen500, yen100, yen50, yen10) values (10, 10, 10, 10, 10);
