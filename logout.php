<?php
	session_start();
	unset($_SESSION['studentEmail']);
        unset($_SESSION['studentName']);
        unset($_SESSION["studentRegId"]);
        if(isset($_SESSION['adminEmail']))
        {
            unset($_SESSION['adminEmail']);
        unset($_SESSION['adminName']);
        unset($_SESSION["adminRegId"]);
        }
	header("location:login.php");
