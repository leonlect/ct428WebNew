<?php

//Lấy dữ liệu về từ form với value = fname bên trang input.html
$ten = $_POST['fname'];
$ho = $_POST['lname'];
$tuoi = $_POST['age'];
//Lay ve path hinh anh
$path = $_FILES['avatar']['name'];



echo "Your first name is: " . $ten . "<br/>" .
     "Last name is : " . $ho . "<br/>" .
     "Age: " . $tuoi . "<br/>";

// Buoc 1Tao doi tuong ket noi voi 4 tham so
$con = new mysqli("localhost", "root", "", "thanhvien");
$con->set_charset("utf8");
//Buoc 2 Tao cau truy van
$sql = " INSERT INTO info(firstname, lastname, age, avatar)       VALUES ('$ten', '$ho', $tuoi, '$path')  ";
//In ra man hinh thu cau truy van
echo $sql;
//Buoc 3 thuc hien cau truy van
$con->query($sql);
move_uploaded_file($_FILES['avatar']['tmp_name'], $path); //Upload file vao thu muc can chua hinh anh
echo "<br/><h2>Insert Success !</h2>";
//Dong ket noi
$con->close();
?>