<html>
<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	  <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <script src="vendor/ckeditor/ckeditor.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/scripts.js"></script>
</head>
<body>
<main>
<?php
session_start();
include("function.php");
if($_SESSION['login_status']==false)
header("location:login.php");
isset($_GET['cmd'])?$cmd=$_GET['cmd']:$cmd="welcome"; 
include("menu.php");
echo '<div class="container-fluid">';
include($cmd.".php");
?>
      </div>
    </div>
</div>
</main>
</body>
<footer>
<script>
	ClassicEditor
		.create( document.querySelector( '#content' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
</footer>
</html>