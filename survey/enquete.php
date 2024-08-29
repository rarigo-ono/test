<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>アンケート</title>
  </head>
  <body>
    <form action="enquete.php" method="post">
      あなたが好きな動物は？<br><br>
      <?php
      //リストの項目
      $cake = array('いぬ', 'ねこ', 'りす', 'ハムスター', 'ぶた');
      //ラジオボタンで項目の表示？
      for ($i = 0; $i < count($cake); $i++) {
        print "<input type='radio' name='cn' value='$i'>{$cake[$i]}<br>\n";
      }
      ?>

      <br>

      <input type="submit" name="submit" value="投票">
    </form>
    <table border="1">
      <?php
      // $ed変数に入れるファイルを設定
      $ed = file('enquete.txt');
      for ($i = 0; $i < count($cake); $i++) $ed[$i] = rtrim($ed[$i]);
      if ($_POST['submit']) {
        $ed[$_POST['cn']]++;
        $fp = fopen('enquete.txt', 'w');
        for ($i = 0; $i < count($cake); $i++){
          fwrite($fp, $ed[$i] . "\n");
        }
        fclose($fp);
      }

      for ($i = 0; $i < count($cake); $i++) {
        print "<tr>";
        print"<td>{$cake[$i]}</td>";
        print"<td><table></td>";
        $w = $ed[$i] * 10;
        print "<td width='$w' bgcolor='green'> </td>";
        print "<td>{$ed[$i]} 票</td>";
        print"</tr></table></td>";
        print"</tr>\n";
      }
      ?>
    </table>
  </body>
</html>