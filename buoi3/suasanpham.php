<?php
 session_start();
 $idsp = $_GET['idsp'];
 $_SESSION['idsp'] = $idsp; //Lưu idsp vào SESSION để có thể xóa đúng idsp
 if(!isset($_SESSION['id'])) {
  header ('Location: dangnhap.html');
 }
 require 'connect.php';
 $sql = " SELECT * FROM sanpham WHERE idsp = ".$idsp."";
 $result = $con->query($sql);
 if($result->num_rows > 0) {
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
 <title>Buổi 3 - Sửa sản phẩm</title>
 <style>
      * {
        margin-left: auto;
        margin-right: auto;
      }
      h2,
      p {
        text-align: center;
      }

      form {
        border: 1px solid black;
        width: fit-content;
        padding: 5px;
      }

      table,
      th,
      td {
        background-color: lightgray;
        text-align: left;
        padding: 5px;
      }

      .dBlock {
        display: inline-block;
      }
  </style>
</head>
<body>
<body>
    <h2 style="color: red">Sửa sản phẩm </h2>
    <p>Vui lòng điền đầy đủ thông tin bên dưới để sửa thông tin sản phẩm</p>
    <form action="xuly_suasp.php" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <th>Tên sản phẩm:</th>
          <td><input type="text" size="20" name="tensp" value='<?php echo $tensp; ?>' /></td>
        </tr>
        <tr>
          <th>Chi tiết sản phẩm:</th>
          <td><textarea rows="5" cols="32" name="chitietsp"><?php echo $chitietsp; ?></textarea></td>
        </tr>
        <tr>
          <th>Giá sản phẩm:</th>
          <td class="dBlock">
            <input type="text" size="20" name="giasp" value='<?php echo $giasp; ?>'/>
          </td>
          <td class="dBlock">(VND)</td>
        </tr>
        <tr>
          <th>Hình sản phẩm:</th>
          <td><input type="file" name="hinhanhsp" /></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Cập nhật sản phẩm" /><input
              type="reset"
              value="Làm lại"
            />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>

</body>
</html>