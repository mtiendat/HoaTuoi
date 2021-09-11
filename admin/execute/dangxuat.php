<?php
	include '../../connect.php';
	if (isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
		unset($_SESSION['chucvu']);
        echo 1;
	}

?>