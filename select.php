<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>SELECT ALL DATA FROM info</title>
</head>

<body>
 <?php
 //Buoc 1 Tao chuoi ket noi
 $con = new mysqli("localhost", "root", "", "thanhvien");
 $con->set_charset("utf8");

 //Buoc 2 tao cau truy van
 $sql = " SELECT * FROM info ";
 echo $sql;
 echo "<br/>";
 $resultSet = $con->query($sql);
 //Neu số dòng trả về lớn hơn 0 là có dữ liệu
 if ($resultSet->num_rows > 0) {
  while ($row = $resultSet->fetch_assoc()) //Duyệt qua từng dòng dữ liệu nếu tồn tại dữ liệu
   echo $row['firstname'] . " "
    . $row['lastname'] . " "
    . $row['age'] . "<br/>";
 } else {
  echo "0 results";
 }

 ?>
</body>

</html>