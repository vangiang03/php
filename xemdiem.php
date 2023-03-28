<html>
<head>
    <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <srcipt src="vendor/bootstrap/css/bootstrap.min.css"></script>
</head>
<body>

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Xin chào Admin</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page"><i class="fa-solid fa-house"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link">Quản lý chung</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Tạo mới</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Tìm kiếm</a></li>
        <li class="nav-item"><a href="index.php?cmd=logout" class="nav-link">Logout</a></li>
      </ul>
</header>

<main>
<?php 
if(isset($_GET['action']))
  $action=$_GET['action'];
else
  $action='manage';

switch($action)
{
  case "edit": edit(); break;
  case "del": del(); break;
  case "manage": manage(); break;
  default: manage();
}
function edit()
{
$connect=mysqli_connect("localhost","root","","cdnqtm21a",3306);
isset($_GET['id'])?$id=$_GET['id']:$id="";  
if(isset($_POST['sbm']))
{
isset($_POST['name'])?$name=$_POST['name']:$name="";  
isset($_POST['email'])?$email=$_POST['email']:$email="";
isset($_POST['password'])?$password=$_POST['password']:$password="";
$sql="UPDATE `account` SET 
`password` = '{$password}',
`name` = '{$name}',
`email` = '{$email}'
 WHERE `id` = $id";
if(mysqli_query($connect,$sql))
echo "<script>alert('Thành công');document.location='xemdiem.php'</script>";
else
echo "<script>alert('Thất bại');document.location='xemdiem.php'</script>";
}
$query="SELECT * FROM `account` where `id` = $id ";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_assoc($result);
echo '
 <form action="" method="POST" style="">
    <p>
        <label class="form-label">Name</label>
        <input type="text"  class="form-control"  name="name" value="'.$row['name'].'" />
    </p>
    <p>
        <label class="form-label">Email</label>
        <input type="email"  class="form-control"  name="email" value="'.$row['email'].'" />
    </p>
    <p>
        <label class="form-label">Password</label>
        <input type="password" class="form-control"name="password" value="'.$row['password'].'" />
    </p>
    <p class="text-center">
        <button type="submit" class="btn btn-danger"name="sbm">Thực hiện</button>
    </p>
</form>
 ';
}
function del()
{
  echo "Đây là hàm del/xóa";
}
function manage()
{
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody
  <?php
  $count=1;
   $connect=mysqli_connect("localhost","root","","cdnqtm21a",3306);
   //Bước 2: Thực thi truy vấn đến CSDL
   $query="SELECT * FROM `account`";
   $result=mysqli_query($connect,$query);
   //Bước 3: Đếm số record trả về từ câu truy vấn
  while($row=mysqli_fetch_assoc($result))
  {
      echo "<tr>
      <th scope='row'>".$count++."</th>
      <td>".$row['name']."</td>
      <td>".$row['email']."</td>
      <td>".$row['date']."</td>
      <td><a href='?action=edit&id=".$row['id']."' class='btn btn-warning'><i class='fas fa-edit'></i></a></td>
      <td><a href='?action=del&id=".$row['id']."' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
    </tr> ";
  }
  ?>

  </tbody>
</table>
<?php 
}
?>
</main>

</body>
</html>
