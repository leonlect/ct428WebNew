<?php
 session_start(); //Khởi tạo session
 echo "Your ID is: ".$_SESSION['id'];

 if (!empty($_SESSION['id']) ) {
    //Gán lại id từ SESSION để dùng cho truy vấn
    $id = $_SESSION['id'];

    //Bước 1 kết nối
    require 'connect.php';
    $sql = " SELECT * FROM thanhvien WHERE id = ".$id." ";
    // echo $sql;

    //Bước 2 truy vấn
    $result = $con->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $tendangnhap = $row['tendangnhap'];
      $gioitinh = $row['gioitinh'];
      $nghenghiep = $row['nghenghiep'];
      $sothich = $row['sothich'];
      $avatar = $row['hinhanh'];
    }
}
else {
  header ("Location: dangnhap.php");
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buổi 3 - Thông tin cá nhân</title>
    <style>
      table {
        width: 500px;
        padding: 5px;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid red;
        background-color: lightgray;
      }

      .textRed {
        font-weight: bold;
        font-size: 20px;
        color: red;
      }

      .center {
        text-align: center;
      }

      .borderBottom {
        border-bottom-style: dotted;
        padding-bottom: 5px;
      }

      .imgSize {
        /* border: 1px solid black; */
        margin-top: 5px;
        width: 40%;
      }

      .left {
        float: left;
      }

      .border {
        /* border: 1px solid black; */
      }

      .btnPostion {
        position: relative;
        left: 100px;
        bottom: 30px;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <td colspan="2" class="center textRed borderBottom">Chào bạn: <?php echo $tendangnhap; ?>!</td>
      </tr>
      <tr>
        <td class="imgSize" rowspan="2">
          <img src="<?php echo $avatar; ?>" width="200px" height="200px" />
        </td>
        <td class="left border">
          Nickname: <?php echo $tendangnhap; ?><br />
          Giới tính: <?php echo $gioitinh; ?><br />
          Nghề nghiệp: <?php echo $nghenghiep; ?><br />
          Sở thích: <?php echo $sothich; ?><br />
        </td>
      </tr>
      <tr>
        <td class="left border btnPostion">
          <input type="button" value="Đăng xuất" />
        </td>
      </tr>
    </table>
  </body>
</html>
