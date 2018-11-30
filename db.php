<?php
$server='localhost';	
$username='root';
$password='';
$con=mysql_connect($server,$username,$password);	
if(!$con)					
	die("can not connect to the server $server");
$q=mysql_query('CREATE DATABASE IF NOT EXISTS products',$con);	
if(!$q)
	die("failed to create the database");	
mysql_select_db('products');
$sql="
CREATE TABLE IF NOT EXISTS client (
cust_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
phone varchar(11),
address varchar(100)
)
";
$q=mysql_query($sql);	
if(!$q)
	echo mysql_error();	
$sql="
CREATE TABLE IF NOT EXISTS category (
cat_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
)
";
mysql_query($sql);	

mysql_query("insert into category values('','OUR Product'),('','OUR Product'),('','OUR Product'),('','OUR Product')");

$sql="
CREATE TABLE IF NOT EXISTS prod (
prod_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
cat_id INT NOT NULL,
name VARCHAR(100) NOT NULL,
img VARCHAR(100) NOT NULL,
price DECIMAL(4,2) NOT NULL,
offer_price DECIMAL(4,2) NOT NULL,
sales INT,
description TEXT NOT NULL,
origin VARCHAR(50) NOT NULL,
foreign key prod(cat_id) references category(cat_id)
)
";
mysql_query($sql);
//---initial insert here---
mysql_query("insert into prod values('',1,'product1','images/picture1.jpg',21.10,17.00,3,'this is a product description','paris')
,('',1,'product2','images/picture2.jpg',22.50,19.70,3,'this is a product description','England')
,('',2,'product3','images/picture3.jpg',14.50,13.00,3,'this is a product description','paris')
,('',2,'product4','images/picture4.jpg',10.75,9.00,3,'this is a product description','England')
,('',2,'product5','images/picture5.jpg',12.45,10.00,3,'this is a product description','paris')
,('',2,'product6','images/picture6.jpg',30.10,25.50,3,'this is a product description','paris')
,('',3,'product7','images/picture7.jpg',15.00,14.00,3,'this is a product description','paris')
,('',3,'product8','images/picture8.jpg',20.00,15.50,3,'this is a product description','England')
,('',3,'product9','images/picture9.jpg',9.00,7.50,7,'this is a product description','paris')
,('',4,'product10','images/picture10.jpg',14.50,12.50,3,'this is a product description','paris')
,'',4,'product11','images/picture10.jpg',14.00,10.50,3,'this is a product description','paris')
,'',4,'product12','images/picture10.jpg',15.75,12.75,3,'this is a product description','paris')
");
$s=mysql_query("create table order (
order_id int not null auto_increment primary key,
cust_id int not null,
name varchar(100) not null,
code varchar(50) not null,
company varchar(100),
street varchar(100) not null,
line2 varchar(100),
town varchar(100) not null,
country varchar(100) not null,
phone varchar(13),
date varchar(50),
price decimal(6,2),
foreign key order(cust_id) references client(cust_id)
)");
if(!$s)

	die("fail to create");
?>