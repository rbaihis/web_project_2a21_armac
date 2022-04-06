#  *********** web_project_2a21_by_armac  ***************             -
* ppt presentation and diagrams => branch : diagram_et_presentation
* website => branch : master
#
<h1> I/ DATA_BASE_DETAILS:</h1>

* <h2> 1)  Database Name  =  "armac"  </h2>
#
#
* <h2> 2)  Tables : </h2>
#
#
* <h3> seif <<# tables "users" and "admin" </h3>

  </h3>"users" : </h3>

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

</h3> "admin" : </h3>

CREATE TABLE admin (
   adminid VARCHAR(50) NOT NULL PRIMARY KEY,
   adminpassword VARCHAR(50) NOT NULL,
   INDEX(adminid)
) ENGINE=InnoDB CHARSET=utf8;

INSERT INTO admin (adminid, adminpassword) VALUES ('admin','adminpassword');
</h3>  ------------ end seif table-------------------------   </h3>
#
#
* </h3> Mouhamed <<# Tables "service"   </h3>

</h3>"service"</h3>    

CREATE TABLE service (
  ID int(11) NOT NULL,
  TYPE varchar(10) NOT NULL,
  NOM varchar(10) NOT NULL,
  PRIX float NOT NULL,
  DESCRIPTION varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


</h3> ------------ end mouhamed table-------------------------   </h3>
#
#



