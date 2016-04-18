<?
is_admin();
include "tinymce/tinymce.php";
if (isset($_POST['wyslij'])) {
  my_sql($_GET['edit'], edit);
  article_img($_GET['edit']);
  header("Location: /");
} else {
  $res = my_sql($_GET['edit'], "article");
  while($row = mysql_fetch_array($res, MYSQL_BOTH)) {
    echo'
    <div class="article-full-box">
    <form method="post" enctype="multipart/form-data">
    <div class="article-full-header"><input type="text" value="'.$row[4].'" name="header" autocomplete="off" maxlength=99 /></div>
    <input type=hidden name=MAX_FILE_SIZE value=1000000>
    <label class=label_file>
    <input type=file name=file>
    <span>Kliknij aby załadować obraz artykułu</span>
    </label>
    <textarea class="text-area" name="content">'.$row[3].'</textarea>
    <div class="article-full-footer"><input type="submit" name="wyslij" value="zapisz"></div>
    </form>
    </div>';
  }
}
?>





