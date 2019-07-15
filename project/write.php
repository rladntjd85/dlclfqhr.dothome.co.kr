<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>글쓰기</title>
  </head>
  <body>
    <form class="" action="write_update.php" method="post">
      <input type="hidden" name="w" value="">
      <table border="1" style="border-collapse: collapse;border-spacing: 0px 0px;" align="center">
        <caption style="margin: 20px;">글쓰기</caption>
        <tr>
          <td>
            이름 : <input type="text" name="name" value="">
          </td>
        </tr>
        <tr>
          <td>
            email : <input type="email" name="email" value="">
          </td>
        </tr>
        <tr>
          <td>
            비밀번호 : <input type="password" name="pass" value="">
          </td>
        </tr>
        <tr>
          <td>
            제목: <input type="text" name="title" value="">
          </td>
        </tr>
        <tr>
          <td>
            내용 : <textarea name="comment" rows="8" cols="40"></textarea>
          </td>
        </tr>
        <tr>
          <td align="right">
            <input type="submit" name="" value="글쓰기">
            <a href="list0.php">목록</a>
          </td>
        </tr>
      </table>
      
  </form>
  </body>
</html>
