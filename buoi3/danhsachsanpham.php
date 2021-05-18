<?php
session_start();
$idtv = $_SESSION['id'];
$tendangnhap = $_SESSION['tendangnhap'];
if(isset($_SESSION['id'])) {
 // echo "Hello There !";
 require 'connect.php';

 $sql = " SELECT * FROM sanpham WHERE idtv = '".$idtv."' ";

 $result = $con->query($sql);
 if($result->num_rows > 0) {
  //Duyệt qua từng dòng
  $row = $result->fetch_assoc();
  $
 }
}
else {
 header ('Location: dangnhap.html');
}

?>