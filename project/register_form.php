<?php
    include('./dbConn.php');

    $pass = password_hash($_POST["pw1"], PASSWORD_DEFAULT);

    if ($_POST['w'] == '') {

      echo $query =
      " insert into member
        set id  = '{$_POST['id']}',
            pw = '$pass',
            age = '{$_POST['age']}',
            gender = '{$_POST['gender']}',
            mdate = NOW()
      ";
      //exit;
      sql_query($query);

      Header("Location:login.php");

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
