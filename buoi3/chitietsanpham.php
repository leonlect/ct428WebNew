<?php
 session_start();
 $idsp = $_GET['idsp']; //Lấy về idsp từ bảng Danh sách sản phẩm truyền qua link với biến idsp bên file danhsachsanpham.php
 // echo $idsp;
 if(!isset($_SESSION['id'])) {
  header('Location: dangnhap.html');
 }
 require 'connect.php';
 $sql = "SELECT * FROM sanpham WHERE idsp = ".$idsp."";
 // echo $sql;
$result = $con->query($sql);
if($result -> num_rows > 0) {
 $row = $result->fetch_assoc();
 $tensp = $row['tensp'];
 $chitietsp = $row['giasp'];
 $giasp = $row['giasp'];
 $hinhanhsp = $row['hinhanhsp'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Buổi 3 - Chi tiết sản phẩm</title>
 <style>
   table {
    margin-left: auto;
    margin-right: auto;
   }

  .tableChild {
   width: 600px;
   border: 1px solid black;
   border-collapse: collapse;
   background-color: white;
  }

  .tableChild th {
   background-color: rgb(187 , 187, 187);
    text-align: center;
    font-weight: bold;
    padding: 5px;
  }

  .tableChild td {
    text-align: left;
    padding: 5px;
  }

  .imgSize {
   width: 150px;
   height: 150px;
  }

  .textCenter {
   text-align: center;
  }

 </style>
</head>
<body>
 <div class='textCenter'>
  <h2 >Chi tiết sản phẩm bạn đang xem</h2>
 </div>
<table border='1' class='tableChild'>
    <tr>
     <th>Hình ảnh sản phẩm</th>
     <th>Tên sản phẩm</th>
     <th>Chi tiết sản phẩm</th>
     <th>Giá sản phẩm</th>
    </tr>
    <?php
       echo "<tr>";
       echo "<td><img src='".$hinhanhsp."' alt='hinhsp'  class='imgSize'></td>";
       echo "<td>".$tensp."</td>";
       echo "<td>".$chitietsp."</td>";
       echo "<td>".$giasp."(VND)</td>";
       echo "</tr>";
    ?>
</body>
</html>
