# web_project_2a21_armac

#seif <<# nommez la base de données "armac" s'il vous plaît

#seif <<# table basic "users" and "admin"

CREATE TABLE users (
   user_id INTEGER NOT NULL
     AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(50) NOT NULL,
   email VARCHAR(70) NOT NULL UNIQUE,
   password VARCHAR(70) NOT NULL,
   address VARCHAR(50),
   postalcode VARCHAR(8),
   verified  VARCHAR(1),
   INDEX(email)
) ENGINE=InnoDB CHARSET=utf8;

INSERT INTO users (name,email,password) VALUES ('seif','seif@gmail.com','111'); 
INSERT INTO users (name,email,password) VALUES ('a','a@a.a','aaa');


CREATE TABLE admin (
   adminid VARCHAR(50) NOT NULL PRIMARY KEY,
   adminpassword VARCHAR(50) NOT NULL,
   INDEX(adminid)
) ENGINE=InnoDB CHARSET=utf8;

INSERT INTO admin (adminid, adminpassword) VALUES ('admin','adminpassword');

#seif<<# end seif table.
