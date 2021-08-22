<?php 
session_start();
session_destroy();
$_SESSION=array();
echo "<script>location.href='index.php'</script>";
?>
	
