<?php
  include('./dbConn.php');

  $query = "select * from board where 1";
  $result = sql_query($query);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <tr>
        <td>번호</td>
        <td>이름</td>
        <td>제목</td>
      </tr>
      <?php
        for ($i=0; $row = mysqli_fetch_assoc($result); $i++) {
      ?>
        <tr>
          <td><?=$row['id']?></td>
          <td><?=$row['name']?></td>
          <td><?=$row['title']?></td>
        </tr>
      <?php
        }
      ?>
    </table>
    <?php
      mysqli_close($conn);
    ?>
  </body>
</html>
