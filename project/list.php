<?php
  include('./dbConn.php');
  //한 화면에 보일 페이지수
  global $start;
  $start = $_GET['start'];
  $page_num = 5;

  //맨처음 접속할 경우(시작페이지)
  if(!$start) $start = 0;

  //현재 테이블의 전체 개수
  $query = "select count(*) as cnt from board";
  $result = sql_query($query);
  $tmp = mysqli_fetch_assoc($result);
  $total = $tmp['cnt'];


  print $query = "select * from board where 1 order by id desc limit {$_GET['start']}, $page_num";
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
      $pages = $total / $page_num;
      for ($i=0; $i <= $pages;  $i++) {
        $assa = $page_num * $i;
    ?>
        <a href=<?php $PHP_SELF?>?start=<?=$assa?>>[<?=$i?>]</a>
    <?php
      }
      mysqli_close($conn);
    ?>
  </body>
</html>
