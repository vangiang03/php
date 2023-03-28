<?php
session_start();
include("function.php");
isset($_POST['email'])?$email=$_POST['email']:$email="";
isset($_POST['password'])?$password=$_POST['password']:$password="";
//Bước 1: Kết mối đến CSDL "cdnqtm21a"
//Bước 2: Thực thi truy vấn đến CSDL
$query="SELECT * FROM `account` where email='{$email}' and password='{$password}'and status=1";
$result=mysqli_query($connect,$query);
//Bước 3: Đếm số record trả về từ câu truy vấn
$total=mysqli_num_rows($result);
if($total==1)
{   $row=mysqli_fetch_assoc($result);//Tách dòng trà về từ truy vấn
    $_SESSION['login_status']=true;
    $_SESSION['name']=$row['name'];
    $_SESSION['img']=$row['img'];
    header("location:index.php");
}
else
{
    $_SESSION['login_status']=false;
}

?>
<html>

<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <srcipt src="vendor/bootstrap/css/bootstrap.min.css">
        </script>
</head>

<body>
    <form action="" method="POST" style="width:50%;margin:10% auto">
        <h1>Đăng ký thông tin</h1>
        <p>
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="" />
        </p>
        <p>
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="" />
        </p>
        <p class="text-center">
            <button type="submit" class="btn btn-danger" name="sbm">Thực hiện</button>
        </p>
    </form>
</body>

</html>