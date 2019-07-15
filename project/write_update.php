<?php
    include('./dbConn.php');

    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    if ($_POST['w'] == '') {

      echo $query =
      " insert into board
        set name  = '{$_POST['name']}',
            email = '{$_POST['email']}',
            pass = '$pass',
            title = '{$_POST['title']}',
            comment = '{$_POST['comment']}',
            wdate = NOW(),
            ip = '{$_SERVER['REMOTE_ADDR']}',
            view = 0
      ";
      //exit;
      sql_query($query);

      Header("Location:list0.php");

    }else if ($_POST['w'] == 'u'){

      $query = 
        "update board 
         set name  = '{$_POST['name']}',
            email = '{$_POST['email']}',
            title = '{$_POST['title']}',
            comment = '{$_POST['comment']}',
            wdate = NOW()
            where id = $_POST[id]
        ";
      sql_query($query);

      Header("Location:view.php?id=$_POST[id]");
    }
?>
