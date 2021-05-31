<?php
 session_start(); //Khởi tạo session
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập JS</title>
    <style>
      table {
        margin: 5px 5px 5px 5px;
        background-color: #d3d3d3;
        border-collapse: collapse;
        padding: 5px;
      }

      form {
        margin-left: auto;
        margin-right: auto;
        width: fit-content;
        /* padding: 1px 1px 1px 1px; */
        padding: 5px;
        border: 1px solid black;
      }
      td {
        /* border: 1px solid purple; */
        padding: 15px 1px 15px 18px;
      }

      .td2 {
        padding-left: 15px;
      }

      .right {
        float: right;
        margin-right: 42px;
      }

      .footer-text{
        text-align: center;
        color: blue;
      }

      .center{
        text-align: center;
        color: red;
      }

    </style>
  </head>
  <body>
  <div class="center">
      <p>ĐĂNG NHẬP TÀI KHOẢN</p>
      <p>Bạn chưa có tài khoản ? <a href="dangky.html">Click vào đây</a> để đăng ký</p>
    </div>
    <form action="xuly_dangnhap.php" method="POST" onsubmit="return validateForm();">
      <table>
        <tr>
          <td>Tên đăng nhập:</td>
          <td class="td2"><input type="text" name="tendangnhap" id="userName" /></td>
        </tr>
        <tr>
          <td></td>
          <td><p id="idUserName"></p></td>
        </tr>
        <tr>
          <td>Mật khẩu:</td>
          <td class="td2"><input type="password" name="matkhau"  id="passWord"  /></td>
        </tr>
        <tr>
          <td></td>
          <td><p id="idPassWord"></p></td>
        </tr>
        <tr>
          <td></td>
          <td class="td2, right">
            <input type="submit" value="Login" />
          </td>
        </tr>
      </table>
    </form>
    <div class="footer-text"><p>Họ tên sinh viên: Lê Duy Anh</p><p>MSSV: S1800005</p></div>
    <script>
      function validateForm() {
        document.getElementById("idUserName").innerHTML = "";
        document.getElementById("idPassWord").innerHTML = "";
        //Dat bien kiem tra = true;
        check = true;
        //Lay cac gia tri tu id userName va passWord
        var userName = document.getElementById("userName").value;
        var passWord = document.getElementById("passWord").value;
        //Kiem tra userName co trong khong
        if (userName.length < 1) {
          //neu trong thi thay doi phan tu p co id = idUserName hien len dong chu Tên đăng nhập không được để trống
          document.getElementById("idUserName").style.color = "red";
          document.getElementById("idUserName").innerHTML =
            "Tên đăng nhập không được để trống !";
          check = false;
        }
        //Kiẹm tra passWord co trong khong
        if (passWord.length < 1) {
          document.getElementById("idPassWord").style.color = "red";
          document.getElementById("idPassWord").innerHTML =
            "Mật khẩu không được để trống !";
          check = false;
        }
        return check;
      }
    </script>
  </body>
</html>
