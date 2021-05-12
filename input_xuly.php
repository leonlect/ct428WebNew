<?php

//Lấy dữ liệu về từ form với value = fname bên trang input.html
$ten = $_POST['fname'];
$ho = $_POST['lname'];
$tuoi = $_POST['age'];
//Lay ve path hinh anh
$path;


echo "Your first name is: " . $ten .  ". Last name is : " . $ho . ". Age: " . $tuoi;

// Buoc 1Tao doi tuong ket noi voi 4 tham so
$con = new mysqli("localhost", "root", "", "thanhvien");
$con->set_charset("utf8");
//Buoc 2 Tao cau truy van
$sql = " INSERT INTO info(firstname, lastname, age) VALUES ('$ten', '$ho', $tuoi)  ";
//In ra man hinh thu cau truy van
echo $sql;
//Buoc 3 thuc hien cau truy van
$con->query($sql);
//Dong ket noi
$con->close();