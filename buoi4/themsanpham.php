<?php
session_start();
if(!isset($_SESSION['id'])) {
  header ('Location: dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buổi 3 - Thêm sản phẩm</title>
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

      .footer-text{
        text-align: center;
        color: blue;
      }

    </style>
  </head>
  <body>
    <h2 style="color: red">Thêm sản phẩm mới</h2>
    <p>Vui lòng điền đầy đủ thông tin bên dưới để thêm sản phẩm mới</p>
    <form action="xuly_themsp.php" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <th>Tên sản phẩm:</th>
          <td><input type="text" size="20" name="tensp" /></td>
        </tr>
        <tr>
          <th>Chi tiết sản phẩm:</th>
          <td><textarea rows="5" cols="32" name="chitietsp"></textarea></td>
        </tr>
        <tr>
          <th>Giá sản phẩm:</th>
          <td class="dBlock">
            <input type="text" size="20" name="giasp" />
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
            <input type="submit" value="Lưu sản phẩm" /><input
              type="reset"
              value="Làm lại"
            />
          </td>
        </tr>
      </table>
    </form>
    <div class="footer-text"><p>Họ tên sinh viên: Lê Duy Anh</p><p>MSSV: S1800005</p></div>
  </body>
</html>
