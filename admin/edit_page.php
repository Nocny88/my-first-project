<div class=article-full-box>
<?php
is_admin();
if (isset($_POST['zmiany'])) {
$change = str_replace("'", '"', "$_POST[content]");
$arr = array("$_POST[hidden]", "$change");
$pack = implode('~', $arr);
my_sql($pack, 'save_site');
header('Location: /');
} else {

include 'tinymce/tinymce.php';
$res = my_sql(rem_undrline($_GET['edit_page']), "load_site");
while($row = mysql_fetch_array($res))
echo "
<form method=post>
<textarea class=text-area name=content>".$row[0]."</textarea>
<input type=hidden value='".rem_undrline($_GET['edit_page'])."' name=hidden>
<div class=article-full-footer><input type=submit name=zmiany value=zapisz zmiany></div>
</form>
";
}
?>
</div>