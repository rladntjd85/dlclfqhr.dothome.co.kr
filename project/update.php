<?php
  include('./dbConn.php');
  include_once('lib/common.lib.php');

  $query = "select * from board where id = $_GET[id]";
  $result = sql_query($query);
  $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="write_update.php" method="post">
      <input type="hidden" name="w" value="u">
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <table border="1">
        <tr>
          <td>
            이름 : <input type="text" name="name" value="<?=$row['name']?>">
          </td>
        </tr>
        <tr>
          <td>
            email : <input type="email" name="email" value="<?=$row['email']?>">
          </td>
        </tr>
        <tr>
          <td>
            비밀번호 : <input type="password" name="pass" value="">
          </td>
        </tr>
        <tr>
          <td>
            제목: <input type="text" name="title" value="<?=$row['title']?>">
          </td>
        </tr>
        <tr>
          <td>
            내용 : <textarea name="comment" rows="8" cols="40"><?=$row['comment']?></textarea>
          </td>
        </tr>
      </table>
      <input type="submit" name="" value="수정하기">
      <input type=button value="되돌아가기" onclick="history.back(-1)">
  </form>
  </body>
</html>
