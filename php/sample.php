<html>
<head>
<script defer src="http://localhost:8000/socket.io/socket.io.js"></script>
<script defer src="../js/client.js"></script>
<?php
$email=$_GET['name'];
//$new=$_GET['email'];
?>
</head>
<body onload='Name("<?php echo $email ?>")'>
<?php include "../main.php" ?>
</body>
</html>