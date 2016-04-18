
<?
is_admin();
include "tinymce/tinymce.php";
if (isset($_POST['wyslij'])) {
my_sql($zm, "add");

  article_img($empty);
  header("Location: /");

} else {
  echo "
  <div class=article-full-box>
  <form method=post enctype=multipart/form-data>
  <div class=article-full-header><input type=text name=header value=Naglówek  autocomplete=off maxlength=99 /></div>
  <input type=hidden name=MAX_FILE_SIZE value=1000000>
  <label class=label_file>
  <input type=file name=file>
  <span>Kliknij aby załadować obraz artykułu</span>
  </label>
  <textarea class=text-area name=content></textarea>
  <div class=article-full-footer><input type=submit name=wyslij value=zapisz></div>
  </form>
  </div>";
}

?>