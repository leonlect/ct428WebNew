<?php
 session_start();
 $idsp = $_GET['idsp']; //Lấy về idsp từ bảng Danh sách sản phẩm truyền qua link với biến idsp bên file danhsachsanpham.php
 // echo $idsp;
 if(!isset($_SESSION['id'])) {
  header('Location: dangnhap.php');
 }
 require 'connect.php';
 $sql = "DELETE FROM sanpham WHERE idsp = ".$idsp."";
 // echo $sql;
$result = $con->query($sql);
echo "Xóa sản phẩm thành công !";
header ('Location: js_danhsachsanpham.php');
?>