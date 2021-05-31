<?php
session_start();
$idtv = $_SESSION['id'];
$tendangnhap = $_SESSION['tendangnhap'];
if(!isset($_SESSION['id'])) {
 header ('Location: dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Buổi 5 - Danh sách sản phẩm</title>
 <style>
  form {
   margin-left: auto;
   margin-right: auto;
   border: 1px solid red;
   padding: 10px;
   width: fit-content;
   height: fit-content;
   background-color: lightgray;
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
   position: flex;
   /* left: 260px;
   bottom: -30px; */
  }
  .footer-text{
        text-align: center;
        color: blue;
      }
      .search-box {
        align: center;
        margin-left: auto;
        margin-right: auto;
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
 <div class="headerName">DANH SÁCH SẢN PHẨM</div><br>
 <?php
 echo "<div class='search-box headerName'>";
  echo "<input type='text' autocomplete='off' placeholder='Tìm sản phẩm...' onkeyup='livesearch(this.value);'></input>";
  echo "<br>";
  echo "<div id='result'>";
  echo "</div>";
  echo "</div>";
?>
<br>
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
       echo "<td onmouseover='loadPopup(".$row['idsp'].");' onmouseout='hidePopup();'>".$row['tensp']."</td>";
       echo "<td>".$row['giasp']."(VND)</td>";
       //Ở sau  ko cần dấu ?idsp='". $var ."' Nên dùng  ?idsp=".$row['idsp']."'
       echo "<td><a href='#' onclick='chiTietSP(".$row['idsp'].");'>Xem chi tiết</a></td>";
       echo "<td><a href='suasanpham.php?idsp=".$row['idsp']."'><img src='icon/edit.png' width ='20' height = '20'></a></td>";
       echo "<td><a href='xoasanpham.php?idsp=".$row['idsp']."'><img src='icon/delete.png' width ='20' height = '20'></a></td>";
       echo "</tr>";
       $i++;
      }
     }
    ?>
   </table>

    </form>
    <?php
      echo "<p id='response'></p>";
      echo "<div id='showImage'></div>";
    ?>
    <script>
        function chiTietSP(val) {
        var xmlhttp;
        if(window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();

        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("response").innerHTML=xmlhttp.responseText;
          }
        }
      xmlhttp.open("GET", "chitietsanpham.php?idsp="+val, true);
      xmlhttp.send();
    }

    function loadPopup(val){
            var xmlhttp;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    //console.log(hinhanhsp);
                    document.getElementById('showImage').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET","./xuly_popup.php?idsp="+val,true);
            xmlhttp.send();
        }
        function hidePopup(){
            document.getElementById('showImage').innerHTML = "";
        }

        function livesearch(data){
            var xmlhttp;
            var result;
            xmlhttp = new XMLHttpRequest();
            if(data != ""){
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){
                        result = xmlhttp.responseText;
                        document.getElementById("result").innerHTML = result;
                     }
                }
            }
            else {
                document.getElementById("result").innerHTML = "";
            }
            xmlhttp.open("GET", "./xuly_timkiem.php?data=" + data, true);
            xmlhttp.send();
         }

    </script>
        <div class="footer-text"><p>Họ tên sinh viên: Lê Duy Anh</p><p>MSSV: S1800005</p></div>
        <div class='btnLogout'>
     <a href='dangxuat.php'><input type='button' value='Đăng xuất'></a>
    </div>
</body>
</html>