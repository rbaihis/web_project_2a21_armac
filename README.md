# web_project_2a21_armac

#  DATA_BASE_details:  nommez "armac"

# seif <<# tables "users" and "admin"

# "users" :

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


INSERT INTO users (name,email,password) VALUES ('a','a@a.a','aaa');

# "admin" :

CREATE TABLE admin (
   adminid VARCHAR(50) NOT NULL PRIMARY KEY,
   adminpassword VARCHAR(50) NOT NULL,
   INDEX(adminid)
) ENGINE=InnoDB CHARSET=utf8;

INSERT INTO admin (adminid, adminpassword) VALUES ('admin','adminpassword');
# ------------ end seif table-------------------------


# Mouhamed <<# Table "service"

CREATE TABLE `service` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  `NOM` varchar(10) NOT NULL,
  `PRIX` float NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Mouhamed<<# end mouhamed table.
# ---------- end Mouhamed table------------

