<?php
//Khởi tạo và kiềm tra SESSION trước
session_start();
// echo $_SESSION['id'];

// Lấy idtv từ $_SESSION['id'] để lưu lại cho việc thêm vào bảng sanpham và các giá trị bên form.
$tensp = $_POST['tensp'];
// echo $tensp."<br>";
$chitietsp = $_POST['chitietsp'];
// echo $chitietsp."<br>";
$giasp = $_POST['giasp'];
// echo $giasp."<br>";
$path = "./sanpham/" . $_FILES['hinhanhsp']['name'];
move_uploaded_file($_FILES['hinhanhsp']['tmp_name'], $path);
// echo $path."<br>";
$idtv = $_SESSION['id'];
// echo "IDTV: ".$idtv;

if(isset($_SESSION['id'])) //Nếu tồn tại SESSION thì xử lý ko thì phải quay về dangnhap.html
{
 require 'connect.php';
 $sql = " INSERT INTO sanpham(tensp, chitietsp, giasp, hinhanhsp, idtv) VALUES ('".$tensp."', '".$chitietsp."', '".$giasp."', '".$path."', '".$idtv."') ";
 // echo $sql;
 $con->query($sql);
 $con->close();
 // echo "<h2 style='text-align: center'>Thêm sản phẩm mới thành công !</h2>";
 header ('Location: danhsachsp.php');
}
else {
 header ('Location: dangnhap.html');
}
?>