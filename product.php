<?php
$table="product";
if(isset($_GET['action']))
  $action=$_GET['action'];
else
  $action='manage';

switch($action)
{
  case "add": add(); break;
  case "edit": edit(); break;
  case "del": del(); break;
  case "lock": lock(); break;
  case "unlock": unlock(); break;
  case "manage": manage(); break;
  default: manage();
}
function lock()
{ global $connect,$cmd,$table;
  isset($_GET['id'])?$id=$_GET['id']:$id="";  
  $sql="update $table set status=0 where id=$id";
  if(mysqli_query($connect,$sql))
  msgbox('Thành công',$cmd);
  else
  msgbox('Thất bại',$cmd);
}
function unlock()
{ global $connect,$cmd,$table;
  isset($_GET['id'])?$id=$_GET['id']:$id="";  
  $sql="update $table set status=1 where id=$id";
  if(mysqli_query($connect,$sql))
  msgbox('Thành công',$cmd);
  else
  msgbox('Thất bại',$cmd);
}
function add()
{
global $connect,$cmd,$table;
if(isset($_POST['sbm']))
{
isset($_POST['name'])?$name=$_POST['name']:$name="";  
isset($_POST['price'])?$price=$_POST['price']:$price="";
$img=upload('img');
isset($_POST['description'])?$description=$_POST['description']:$description="";
isset($_POST['content'])?$content=$_POST['content']:$content="";
isset($_POST['discount'])?$discount=$_POST['discount']:$discount="";
$sql="INSERT INTO `$table` (`discount`,`name`,`price`,`img`,`description`,`content`) 
VALUES('{$discount}','{$name}','{$price}','{$img}','{$description}','{$content}')";
if(mysqli_query($connect,$sql))
msgbox('Thành công',$cmd);
else
msgbox('Thất bại',$cmd);
}

echo '
 <form action="" method="POST" enctype="multipart/form-data">
    <p>
        <label class="form-label">Name</label>
        <input type="text"  class="form-control"  name="name" value="" />
    </p>
    <p>
        <label class="form-label">Img</label>
        <input type="file"  class="form-control"  name="img" value="" />
    </p>
    <p>
        <label class="form-label">price</label>
        <input type="price"  class="form-control"  name="price" value="" />
    </p>
    <p>
        <label class="form-label">discount</label>
        <input type="discount" class="form-control"name="discount" value="" />
    </p>
    <p>
        <label class="form-label">Description</label>
        <textarea class="form-control"name="description"></textarea>
    </p>
    <p>
        <label class="form-label">Content</label>
        <textarea class="form-control"name="content" id="content"></textarea>
    </p>
    <p class="text-center">
        <button type="submit" class="btn btn-danger"name="sbm">Thực hiện</button>
    </p>
</form>
 ';
}
function edit()
{
  global $connect,$cmd,$table;
isset($_GET['id'])?$id=$_GET['id']:$id="";  
if(isset($_POST['sbm']))
{
isset($_POST['name'])?$name=$_POST['name']:$name="";  
isset($_POST['price'])?$price=$_POST['price']:$price="";

isset($_POST['description'])?$description=$_POST['description']:$description="";
isset($_POST['discount'])?$discount=$_POST['discount']:$discount="";
$tmp=upload('img');$img=$tmp!=''?$tmp:$_POST['currentimg'];
$sql="UPDATE `$table` SET 
`discount` = '{$discount}',
`name` = '{$name}',
`img` = '{$img}',
`description` = '{$description}',
`price` = '{$price}'
 WHERE `id` = $id";
if(mysqli_query($connect,$sql))
msgbox('Thành công',$cmd);
else
msgbox('Thất bại',$cmd);
}
$query="SELECT * FROM `account` where `id` = $id ";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_assoc($result);
echo '
 <form action="" method="POST" enctype="multipart/form-data">
    <p>
        <label class="form-label">Name</label>
        <input type="text"  class="form-control"  name="name" value="'.$row['name'].'" />
    </p>
    <p>
        <label class="form-label">Img</label>
        <input type="file"  class="form-control"  name="img" value="'.$row['img'].'" />
        <input type="hidden"  class="form-control"  name="currentimg" value="'.$row['img'].'" />
    </p>
    <p>
        <label class="form-label">price</label>
        <input type="price"  class="form-control"  name="price" value="'.$row['price'].'" />
    </p>
    <p>
        <label class="form-label">discount</label>
        <input type="discount" class="form-control"name="discount" value="'.$row['discount'].'" />
    </p>
    <p>
    <label class="form-label">Description</label>
    <textarea class="form-control"name="description">'.$row['description'].'</textarea>
</p>
<p>
<label class="form-label">Content</label>
<textarea class="form-control"name="content" id="content">'.$row['content'].'</textarea>
</p>
    <p class="text-center">
        <button type="submit" class="btn btn-danger"name="sbm">Thực hiện</button>
    </p>
</form>
 ';
}
function del()
{ global $connect,$cmd,$table;
  isset($_GET['id'])?$id=$_GET['id']:$id="";  
  $sql="delete from $table where id=$id";
  if(mysqli_query($connect,$sql))
  msgbox('Thành công',$cmd);
  else
  msgbox('Thất bại',$cmd);
 
}
function manage()
{
  global $connect,$cmd,$table;
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên</th>
            <th scope="col">price</th>
            <th scope="col">Date</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody <?php
  $count=1;
   //Bước 2: Thực thi truy vấn đến CSDL
   $query="SELECT * FROM $table";
   $result=mysqli_query($connect,$query);
   //Bước 3: Đếm số record trả về từ câu truy vấn
  while($row=mysqli_fetch_assoc($result))
  {
      if($row['status']==1)
      $tatus=" <td><a href='index.php?cmd=$table&action=lock&id=".$row['id']."' class='btn btn-default'><i class='fas fa-unlock'></i></a></td>";
      else
      $tatus=" <td><a href='index.php?cmd=$table&action=unlock&id=".$row['id']."' class='btn btn-success'><i class='fas fa-lock'></i></a></td>";
     
      echo "<tr>
      <th scope='row'>".$count++."</th>
      <td><img width='40' src='image/".$row['img']."' /></td>
      <td>".$row['name']."</td>
      <td>".$row['price']."</td>
      <td>".$row['date']."</td>
      <td><a href='index.php?cmd=".$cmd."&action=edit&id=".$row['id']."' class='btn btn-warning'><i class='fas fa-edit'></i></a></td>
      <td><a href='index.php?cmd=".$cmd."&action=del&id=".$row['id']."' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
      ". $tatus ."
    </tr> ";
  }
  ?> </tbody>
</table>
<?php 
}
?>