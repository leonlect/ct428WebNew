<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>

<body>
 <?php
 $var = "Viet";
 $Var = "Nam";
 echo "Sử dụng biến kiểu String: ";
 echo " $var, $Var "; //Output "Viet, Nam"
 echo "<br/>";
 echo "Khai báo biến mảng: ";
 $var = "Bob";
 echo $var;
 echo "<br/>";
 $var = 123;
 echo $var;
 echo "<br/>";
 $var = array(1, 2, 3, 4, 5);
 for ($i = 0; $i < 5; $i++)
  echo $var[$i] . "<br/>";
 ?>

</body>

</html>