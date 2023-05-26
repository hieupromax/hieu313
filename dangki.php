<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
<head>
    <title>    </title>
</head>
<body>
    <form action="" method="POST"> 
        <table> 
            <tr>
            <td> User ID: </td>
            <td> <input type="text" name="user_id"> </td> 
            </tr> 
            <tr>
            <td> UserName: </td>
            <td> <input type="text" name="username"> </td> 
            </tr> 
            <tr>
            <td> Password: </td>
            <td> <input type="password" name="password"> </td> 
            </tr> 
            <tr>
                <td>
                   <input type="submit" name="register" value="Đăng ký tài khoản">
                </td> 
            </tr> 
        </table> 
    </form>
    <?php
//B1: Kết nối đến MySQL
$connect = mysqli_connect('localhost','root','','dmo');
if($connect == true){
echo "Kết nối thành công";
}
else{
echo "Kết nối thất bại";
}
//Nhận dữ liệu từ form 
if(isset($_POST['register'])){
    $user_id = $_POST['user_id'];  
    $username =  $_POST['username'];
    $password = $_POST['password'];
//B2: Xây dựng câu truy vấn
$sql ="INSERT INTO users VALUES('$user_id','$username','$password')"; 
//B3: Thực thi truy vấn
$result = mysqli_query($connect,$sql);
if($result) {
echo "<script> alert('Thêm mới thành công') </script>";
}
else{
echo "<script> alert('Thêm mới thất bại') </script>";
}
}
?>
</body>