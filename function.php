<?php
function connect()
{
    $connect=mysqli_connect("localhost","root","","cdnqtm21a",3306);
    return $connect;
}
function upload($namefileupload)
{
$target_file = "image/" . basename($_FILES[$namefileupload]["name"]);//5556468.png
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//png
$new_name=time().".".$imageFileType;
$target_file_rename = "image/".$new_name;
$allow=array("png","jpg","gif","webp");
if(in_array($imageFileType,$allow))
{
    if (move_uploaded_file($_FILES[$namefileupload]["tmp_name"], $target_file_rename))
        return  htmlspecialchars( $new_name);
    else 
        return "";
}
else
    return ""; 
}
function msgbox($text,$location)
{
  echo "<script>alert('{$text}');document.location='?cmd={$location}'</script>";
}
$connect=connect();
?>