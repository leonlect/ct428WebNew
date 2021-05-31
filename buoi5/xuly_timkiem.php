<?php
session_start();
$ID = $_SESSION['id'];
if(isset($_GET['data'])){
$data = $_GET['data'];
require 'connect.php';
// $con = mysqli_connect("localhost","root","","buoi3");
// Kiểm tra kết nối
if (mysqli_connect_errno()){
echo "Lỗi kết nối: " . mysqli_connect_error();
}

$sql = "SELECT tensp FROM sanpham WHERE tensp LIKE '$data%' and idtv=".$ID.";";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
echo $row['tensp']."</br>";
}
//Đóng kết nối
mysqli_close($con);

}
?>