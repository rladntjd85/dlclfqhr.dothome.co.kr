<?php
  include('./dbConn.php');
  include_once('lib/common.lib.php');

  //search와 field 선언 및 값 받는지 확인

  $search = "";

  $sql_add = "";

  $page = "";

  $field = "";

  if (isset($_REQUEST['search'])) {
    $search = $_REQUEST['search'];
  }

  if (isset($_REQUEST['field'])) {
    $field = $_REQUEST['field'];
  }

  if ($search) {
    $sql_add .="and $field like '%$search%'";
  }

  $sql = "select count(*) as cnt from board where 1 {$sql_add}";

  $result = sql_query($sql);

  $cnt = mysqli_fetch_assoc($result);

  $total_count = $cnt['cnt'];

  $page_rows = 5;

  if(!$total_count){
     $total_count = 0;
   }

  if(isset($_REQUEST['page'])){
    $page = $_REQUEST['page'];
  }

  if(!$page) {
    $page = 1;
  }

  if($page < 1) {
    $page = 1;
  }

  $total_page = ceil($total_count / $page_rows);

  $from_record = ($page - 1) * $page_rows;

  $query = "select * from board where 1 {$sql_add} order by id desc limit {$from_record}, $page_rows";

  $result = sql_query($query);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/default.css">
  </head>
  <body>
    <table border="1" width="500" align="center" style="margin-top: 20px;text-align: center;">
      <tr style="background-color: black;color: white;">
        <td>번호</td>
        <td>제목</td>
        <td>글쓴이</td>
        <td>날짜</td>
        <td>조회</td>
      </tr>
      <?php
        for ($i=0; $row = mysqli_fetch_assoc($result); $i++) {
      ?>
        <tr>
          <td><?=$row['id']?></td>
          <td><a href="view.php?id=<?=$row['id']?>"><?=$row['title']?></a></td>
          <td><?=$row['name']?></td>
          <td><?=$row['wdate']?></td>
          <td><?=$row['view']?></td>
        </tr>
      <?php
        }
      ?>
    </table>
    <div align="center" style="margin: 10px;">
      <?=get_paging($page_rows, $page, $total_page,'list0.php?');?>
    </div>
    <div align="center">
      <form method="get" action="<?php $PHP_SELF?>">
        <span>
          <select name="field">
            <option value="title">제목</option>
            <option value="name">글쓴이</option>
          </select>
        </span>
        <span>
          <input type="text" name="search" value="<?=$search?>">
          <input type="submit" value="검색">
        </span>
      </form>
      <div align="center" style="margin-top: 10px;">
        <a href="register.html">회원가입</a>
        <a href="write.php">글쓰기</a>
    </div>
    </div>
  </body>
</html>
