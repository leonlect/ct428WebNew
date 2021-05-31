<?php

//Lay du lieu chuoi string ben kia ve
$userName = $_GET['userName'];
// echo $response;
if (isset($userName)) {
 require 'connect.php';
 $sql = "select * from thanhvien where tendangnhap = '".$userName."';";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        echo "<p style='color: red'>Tên đăng nhập đã tồn tại !</p>";
    }else{
        echo "<p style='color: green'>Available !</p>";
    }
}
?>