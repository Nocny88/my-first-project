<?php
is_admin();
if (!empty($_GET['del_file'])) {
$zm = rem_undrline($_GET['del_file']);
unlink('admin/files/'.$zm);
$zm = explode('.', $zm);
my_sql($zm[0], 'del_file');
ext_links();
ext_imgs();
header("Location: /wgraj_pliki");
}

include "admin_header.php";

echo "<div class=upload><form enctype=multipart/form-data method=post>
<input type=submit name=wyslij value=zapisz>
<input type=hidden name=MAX_FILE_SIZE value='999999999999999'>
<label class=label_file>
<input type=file name=file>
<span>kliknij aby wgrać plik</span>
</label>

</form></div>";

if (isset($_POST['wyslij'])) {
$zm = explode('_', $_FILES['file']['name']);
$_FILES['file']['name'] = implode(' ', $zm);
$lokalizacja = 'admin/files/'.$_FILES['file']['name'];
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
if (!move_uploaded_file($_FILES['file']['tmp_name'], $lokalizacja)) {
echo "Nie udało się zapisać pliku.";
}

my_sql($_FILES['file']['name'], "add_file");
ext_links();
if ($_FILES['file']['type'] == 'image/jpeg' OR $_FILES['file']['type'] == 'image/png') {
ext_imgs();
}

header("Location: /wgraj_pliki");
}
} else {

$kat = opendir('admin/files/');

echo "
<div class=plan>
<table>
<tr><th>nazwa pliku</th><th>typ</th><th>rozmiar</th><th>data dodania</th><th colspan=2>opcje</th><tr>";
while (false !== ($plik = readdir($kat)))
if ($plik != "." && $plik != "..") {
$path = 'admin/files/'."$plik";
$zm = explode('.', $plik);
echo "
<tr>
<td>".$zm[0]."</td>
<td>.".$zm[1]."</td>
<td>".round(filesize($path)/1024)."kB</td>
<td>".date('d.m.y H:i', filemtime($path))."</td>
<td><a href='".$path."' download>pobierz</a></td>
<td><a href=del_file=".add_undrline($plik).">usun</a></td>
</tr>";
}
closedir($kat);
echo "
</table>
</div>";
}
?>