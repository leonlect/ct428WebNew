<?php
 session_start(); //Khởi tạo session
 $_SESSION['id'] = ''; //Gán SESSION là rỗng trước

 //Lấy về giá trị từ form đăng nhập
 $tendangnhap = $_POST['tendangnhap'];
 // echo $tendangnhap;
 $matkhau = $_POST['matkhau'];
 // echo $matkhau;

 //Bước 1 tạo nối kết
 require 'connect.php'; //nạp sẵn file tạo kết nối với db

 //Bước 2 tạo câu truy vấn lấy ra id của người dùng với tên đăng nhập và mk có trong CSDL
$sql = " SELECT id, tendangnhap FROM thanhvien
         WHERE tendangnhap = '".$tendangnhap."'
         AND matkhau = '".$matkhau."' ";
// echo $sql;

//Bước 3 thực hiện truy vấn
$result = $con->query($sql);

if($result->num_rows > 0) {
 //Duyệt qua từng dòng nếu số dòng lớn hơn 0
 $row = $result->fetch_assoc();
 $id = $row['id'];
 $_SESSION['id'] = $id; //lấy ra id để lưu vào biến SESSION
 //Thỏa điều kiện thì vào trang thongtincanhan
 header ("Location: thongtincanhan.php");
}
else {
 //Nếu ko tồn tại trong CSDL thì trả về trang đăng nhập;
 header ("Location: dangnhap.php");
}
?>

