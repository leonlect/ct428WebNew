<?php
//Lấy dữ liệu về từ form
$userName = $_POST['userName'];
// echo $userName;
$passWord = $_POST['passWord'];
// echo $passWord;

if (isset($_FILES['avatar']['name'])){
 $path = "./avatar/".$_FILES['avatar']['name'];
 // echo $path;
 move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
}

$gender = $_POST['gender'];
// echo $gender;
$job = $_POST['nghenghiep'];
// echo $job;

//Lấy ra các giá trị trong checkbox phải dùng foreach
$st = "";
if(isset($_POST['sothich']))
 foreach($_POST['sothich'] as $value)
   $st = $st.$value . ", ";

   //Các value của checkbox, radio, dropdown list có thể đặt tiếng Việt
// echo $st;

//Bước 1 Tạo nối kết
require 'connect.php';

//Bước 2 tạo truy vấn
$sql = " INSERT INTO thanhvien(tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
VALUES ('".$userName."',
'".$passWord."',
'".$path."',
'".$gender."',
'".$job."',
'".$st."') ";
// echo $sql;

//Bước 3 thực hiện truy vấn
$con->query($sql);

//Bước 4 đóng nối kết
echo "<h2>Thêm thành viên mới thành công !</h2>";
echo "<h2>Quay về trang <a href='dangnhap.php'>Đăng nhập.</a></h2>";

$con->close();
