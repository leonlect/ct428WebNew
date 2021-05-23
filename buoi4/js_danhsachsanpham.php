<?php
session_start();
// echo $_SESSION['tendangnhap'] . " " . $_SESSION['matkhau'];
if (!isset($_SESSION['tendangnhap']) or !isset($_SESSION['matkhau'])) {
 header('location: dangnhap.php' );
}

if(isset($_SESSION['tendangnhap']) and isset($_SESSION['matkhau'])) {
  require("connect.php");
}
$username = $_SESSION['tendangnhap'];
$password = $_SESSION['matkhau'];

$sql = "SELECT * FROM thanhvien WHERE tendangnhap = '$username' AND matkhau = '$password' ";
$result = $con->query($sql);

if ($result->num_rows==0){
header('location: dangnhap.php');
} else {
  $row = $result->fetch_assoc();
  $iduser = $row['id'];
  $sql_product = "SELECT idsp, tensp, giasp, hinhanhsp FROM sanpham WHERE idtv = '$iduser' ";
  $result_product = $con->query($sql_product);
}
// echo "<a href='dangxuat.php'>Đăng xuất</a> ";
?>

<!DOCTYPE html>
<html lang="vn" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Danh sách sản phẩm</title>
    <style>
     .slideProduct {
      display:none;
     }

     #center {
      text-align: center;
     }
    </style>
  </head>
  <body>

    <table>
      <tr>
        <td class="title">
          <h2>Chào bạn: <?php echo $row['tendangnhap']; ?>!</h2>
        </td>
      </tr>
      <tr>
        <td id='center'>
          <?php
            $i = 1;
            while($row_product = $result_product->fetch_assoc()) {
              echo "<div class='slideProduct'>";
                echo "<h3 class='nameproduct'>Tên sản phẩm: ". $row_product['tensp'] ."</h3>";
                echo "<h3 class='nameproduct'>Gía: ". $row_product['giasp'] ."</h3>";
                echo "<a href='chitietsp.php?idsp=". $row_product['idsp'] ."' target='_blank' class='link'>";
                echo "<img src='".$row_product['hinhanhsp']."' alt='hinhanh' style='width: 150px; height=150px;'  name='laptopImg'>";
                // ".$row_product['hinhanhsp']."
                echo "</a>";
                echo "<br />";
                echo "<div class='group-icon'>";
                  echo "<a href='suasanpham.php?idsp=". $row_product['idsp'] ."'><img src='icon/edit.png' style= 'width='30px'; height='30px' ' /></a>";
                  echo "<a href='xoasanpham.php?idsp=". $row_product['idsp'] ."'><img src='icon/delete.png' style= 'width='30px'; height='30px'/></a>";
                echo "</div>";
              echo "</div>";
              $i++;
            }
          ?>

  				<button class="pre-next" onclick="changeSlide(-1)">Previous</button>
          <select name="laptop" onchange="chooseSlide(value)">
            <?php
              $result_product = $con->query($sql_product);
              $i = 1;
              while($row_product = mysqli_fetch_assoc($result_product)) {
      					echo "<option value='". $i ."'>". $row_product['tensp'] ."</option>";
                $i++;
              }
              $con->close();
            ?>
  				</select>
  				<button class="pre-next" onclick="changeSlide(1)">Next</button>
        </td>
      </tr>
      <tr>
        <td class="btn">
          <a href="dangxuat.php"> Đăng xuất </a>
        </td>
      </tr>
    </table>

    <script>
      var slideIndex = 1;
      showSlides(slideIndex);

      function changeSlide(n) {
        showSlides(slideIndex += n);
      }

      function chooseSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName('slideProduct');
        var laptop = document.getElementsByName('laptop')[0];
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
        laptop.value = slideIndex;
      }
    </script>
  </body>
</html>
