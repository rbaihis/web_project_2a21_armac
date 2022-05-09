<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=armac', 'root', '');

$data = array();

$query = "SELECT * FROM reservation ORDER BY idR";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'idR'   => $row["idR"],
  'title'   => $row["email"],
  'date'   => $row["date"]
 );
}

echo json_encode($data);

?>