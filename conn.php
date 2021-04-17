<?php
    $dbhost = 'remotemysql.com:3306';
    $dbuser = 'BMrCpNyYIO';
    $dbpass = 'WbNWgCpG4j';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

     mysqli_select_db($conn, 'BMrCpNyYIO');
?>