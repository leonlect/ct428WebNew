<?php
session_start();
$idtv = $_SESSION['id'];
$tendangnhap = $_SESSION['tendangnhap'];
if(!isset($_SESSION['id'])) {
 header ('Location: dangnhap.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Buổi 3 - Danh sách sản phẩm</title>
 <style>
  form {
   margin-left: auto;
   margin-right: auto;
   border: 1px solid red;
   padding: 10px;
   width: fit-content;
   background-color: lightgray;
   height: 300px;
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

  .headerName {
   text-align: center;
   color: red;
   font-weight: bold;
   font-size: 20px;
   margin: 0;
  }

  hr {
   border: 1px dotted red;
   width: 100%;
  }

  .btnLogout {
   position: relative;
   left: 260px;
   bottom: -30px;
  }

 </style>
</head>
<body>
 <?php
  if(isset($_SESSION['id'])) {
   require 'connect.php';
   $sql = " SELECT * FROM sanpham WHERE idtv = ".$idtv." ";
   // echo $sql;
   $result = $con->query($sql);
  }
 ?>
 <form>
  <p class='headerName'>Xin chào bạn <?php echo $tendangnhap; ?>!</p>
  <hr>
  <p'>Danh sách sản phẩm của bạn là:</p>
   <table border='1' class='tableChild'>
    <tr>
     <th>STT</th>
     <th>Tên sản phẩm</th>
     <th>Giá sản phẩm</th>
     <th colspan=3>Lựa chọn</th>
    </tr>
    <?php
     if($result->num_rows > 0) {
      $i = 1; //Dat bien i truoc tien de khoi tao chay trong while
      while($row = $result->fetch_assoc()) {
       echo "<tr>";
       echo "<td>".$i."</td>";
       echo "<td>".$row['tensp']."</td>";
       echo "<td>".$row['giasp']."(VND)</td>";
       echo "<td><a href='chitietsanpham.php'>Xem chi tiết</a></td>";
       echo "<td><a href='suasanpham.php'>Sửa</a></td>";
       echo "<td><a href='xoasanpham.php'>Xóa</a></td>";
       echo "</tr>";
       $i++;
      }
     }
    ?>
   </table>
   <div class='btnLogout'>
     <a href='dangxuat.php'><input type='button' value='Đăng xuất'></a>
    </div>
    </form>
</body>
</html>