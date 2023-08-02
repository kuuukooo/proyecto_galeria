<?php
require("./basededatos/basededatos.php");
$posts = array();
$stmt = $conn->prepare("SELECT * From posts");
$stmt->execute();
while($row = $results = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($posts, $row);
}

?>