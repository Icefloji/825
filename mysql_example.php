<?php 
$user=$_POST['user'];$pw=$_POST['pw'];
//param 主机，用户名，密码
$con=mysqli_connect("localhost","root","saber"); 
if (mysqli_connect_errno($con)) 
{ 
    echo "连接失败:".mysqli_connect_error(); 
} 
//param 数据库名
mysqli_select_db($con,"snow");
//command
// select * from db_tb where asdf='{$user}';
$result=$con->query("SELECT * FROM user_info");
//result 
while($row = $result->fetch_assoc())
 {
 echo $row['id'].$row['user_pw'];
}
?>