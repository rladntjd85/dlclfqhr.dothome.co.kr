<?php
    $conn = mysqli_connect("localhost", "root", "111111", "bbs");

    if ($conn === false) {
      echo mysqli_error($conn);
    }

    function sql_query($query){
       global $conn;
       $result = mysqli_query($conn, $query);
       return $result;
    }

   

?>
