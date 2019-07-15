<?php
  include('./dbConn.php');
  include_once('lib/common.lib.php');

  $query = "select * from board where id = $_GET[id]";
  $result = sql_query($query);
  $row = mysqli_fetch_assoc($result);

  $query = "update board set view = view+1 where id = $_GET[id]";
  sql_query($query);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="1" width="500" align="center" style="margin-top: 20px;">
      <tr>
        <td style="text-align: center;" colspan="4">
          <?=$row['title']?>
        </td>
      </tr>
      <tr>
        <td style="text-align: center;">글쓴이</td>
        <td><?=$row['name']?></td>
        <td style="text-align: center;">이메일</td>
        <td><?=$row['email']?></td>
      </tr>
      <tr>
        <td style="text-align: center;">날 짜</td>
        <td><?=$row['wdate']?></td>
        <td style="text-align: center;">조회수</td>
        <td><?=$row['view']?></td>
      </tr>
      <tr>
        <td colspan="4"><?=$row['comment']?></td>
      </tr>
      <tr>
        <td colspan="3">
          <a href="list0.php">[목록보기]</a>
          <a href="update.php?id=<?=$row['id']?>">[수정]</a>
          <span onclick="if(!confirm('삭제 하시겠습니까?')){return false;}"><a href="delete.php?id=<?=$row['id']?>">[삭제]</a></span>
        </td>
        <td align="right">
          <?php

            $query = "select id from board where id < $_GET[id] order by id desc limit 0, 1";
            $result = sql_query($query);
            $prev_id = mysqli_fetch_assoc($result);

            if($prev_id['id']){
              echo "<a href=view.php?id=$prev_id[id]><span>[이전]</span></a>";
            }else{
              echo "[이전]";
            }

            $query = "select id from board where id > $_GET[id] order by id asc limit 0, 1";
            $result = sql_query($query);
            $next_id = mysqli_fetch_assoc($result);

            if($next_id['id']){
              echo "<a href=view.php?id=$next_id[id]><span>[다음]</span></a>";
            }else{
              echo "[다음]";
            }

          ?>
      </td>
      </tr>
    </table>
  </body>
</html>
