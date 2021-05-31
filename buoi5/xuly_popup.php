<?php
 require 'connect.php';
 $idsp = $_GET['idsp'];
 $sql = "select * from sanpham where idsp=".$idsp.";";
 $result = $con->query($sql);
     $row=$result->fetch_assoc();
     $hinhanhsp = $row['hinhanhsp'];
     echo "<img src='".$hinhanhsp."' alt='hinhsp' style='width: 150px; height=150px;'>";


?>

