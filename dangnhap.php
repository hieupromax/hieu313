<!DOCTYPE html>
<html>
<head>
    <title>    </title>
</head>
<body>





    <!--Tạo form đăng nhập tài khoản -->
    <form action="" method="POST">
        <table>
            <tr>
                <td>UserName  </td>
                <td> <input type="text" name="username"> </td>
            </tr>
            <tr>
                <td>Password </td>
                <td> <input type="password" name="password"> </td>
            </tr>
            </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>
            <tr>
                <td><input type="submit" name="login" value="Đăng nhập"></td>
   </tr>
        </table>        
    </form>

<?php
//B1: Kết nối đến MySQL
$connect = mysqli_connect('localhost','root','','dmo');
if($connect == true){
    echo "";
}
else{
    echo "Kết nối thất bại";
}
if(isset($_POST['login'])){
//Nhận dữ liệu từ form
$username = $_POST['username'];
$password = $_POST['password'];
//B2: Xây dựng câu truy vấn
$sql ="SELECT * FROM users WHERE username='$username' AND password ='$password'";
//B3: Thực thi truy vấn
$result = mysqli_query($connect,$sql);
//B4: Xử lý kết quả
//Đếm số dòng
$count = mysqli_num_rows($result);
if($count==0){
    echo "<script> alert ('Đăng nhập thất bại') </script>";
}
else{
    echo "<script> alert ('Đăng nhập thành công') </script>";

        echo"<script>window.open('index.php','_self')</
        script>";
          $_SESSION['username'] = $username;


        ; 
}
}
?>
</body>
</html>