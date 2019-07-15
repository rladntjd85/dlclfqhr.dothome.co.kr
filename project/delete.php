<?php
    include('./dbConn.php');

      echo $query = "delete from board where id = $_GET[id]";
      //exit;
      sql_query($query);

      Header("Location:list0.php?page=");
?>
