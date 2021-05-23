<?php
  session_start();
  $idsp = $_SESSION['idsp'];
   // echo $temp;
  if(!isset($_SESSION['id'])) {
   header ('Location: dangnhap.html');
  }
  $tensp = $_POST['tensp'];
  // echo $tensp;
  $chitietsp = $_POST['chitietsp'];
  // echo $chitietsp;
  $giasp = $_POST['giasp'];
  // echo $giasp;
  $path ="./sanpham/" . $_FILES['hinhanhsp']['name'];
  // echo $path;
  move_uploaded_file($_FILES['hinhanhsp']['tmp_name'], $path);
  require 'connect.php';
  $sql = " UPDATE sanpham
           SET tensp = '".$tensp."' ,chitietsp = '".$tensp."',
               giasp = '".$giasp."' ,hinhanhsp = '".$path."'
           WHERE idsp = ".$idsp."";
  // echo $sql;
  $con->query($sql);
  $con->close();
  header ('Location: js_danhsachsanpham.php');
?>