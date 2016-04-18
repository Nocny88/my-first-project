<?php
echo "
<div class='material-search'>
<form method='post'>
<div>
Szkoła<select name='szkola'>
<option value=''>wybierz</option>
<option value='Liceum ogólnokształcące'>Liceum ogólnokształcące</option>
<option value='Technikum'>Technikum</option>
<option value='Technikum uzupełniające'>Technikum uzupełniające</option>
<option value='Studium policealne'>Studium policealne</option>
<option value='Kursy eksternistyczne'>Kursy eksternistyczne</option>
<option value='Kursy kwalfikacyjne'>Kursy kwalfikacyjne</option></select>
</div>

<div>
Semestr<select name='semestr'>
<option value=''>wybierz</option>
<option value='I'>I</option>
<option value='II'>II</option>
<option value='III'>III</option>
<option value='IV'>IV</option>
<option value='V'>V</option>
<option value='VI'>VI</option>
<option value='VII'>VII</option>
<option value='VIII'>VIII</option></select>
</div>

<div>
Przedmiot<select name='przedmiot'>
<option value=''>wybierz</option>
<option value='Język Polski'>Język Polski</option>
<option value='Język Angielski'>Język Angielski</option>
<option value='Język Rosyjski'>Język Rosyjski</option>
<option value='Matematyka'>Matematyka</option>
<option value='Fizyka'>Fizyka</option>
<option value='Chemia'>Chemia</option>
<option value='Biologia'>Biologia</option>
<option value='Geografia'>Geografia</option>
<option value='Historia'>Historia</option></select>
</div>

<div>
<input type='submit' name='lista' value='lista'>
</div>
<div>
<input type='submit' name='wyslij' value='pokaż'>
</div>
</form>
</div>";

if ($_GET['add_mat'] == 1) {
include "add_material.php";
} elseif ($_GET['del_mat'] >= 1) {
my_sql($_GET['del_mat'], "del_mat");
} elseif ($_GET['edit_mat'] >= 1) {
include "edit_material.php";
} 

if (isset($_POST['wyslij'])) {

$tab = array ();

if (!empty($_POST['szkola'])) {$tab[] = "school_it = '$_POST[szkola]'";}
if (!empty($_POST['semestr'])) {$tab[] = "sem_it = '$_POST[semestr]'";}
if (!empty($_POST['przedmiot'])) {$tab[] = "item_it = '$_POST[przedmiot]'";}

if (!empty($tab)) {
$WHERE = 'WHERE '.implode(' AND ', $tab);
} else {
$WHERE = '';
}
$res = my_sql($WHERE, "material_search");
while($row = mysql_fetch_array($res, MYSQL_BOTH)) 
{
echo "
<div class=material-in-box>
<div class=material-header><h4>$row[6]</h></div>
<div class=material-content><article>$row[7]</article></div>
<div class=material-footer><h6>Semestr: $row[3]&nbsp&nbsp|&nbsp&nbspPrzedmiot: $row[4]&nbsp&nbsp|&nbsp&nbspSzkoła: $row[5]<a href=material=$row[0]>Rozwiń</a>".admin_menu($row[0], material)."</h6></div></div>";
}} elseif (isset($_POST['lista'])) {
$tab = array ();

if (!empty($_POST['szkola'])) {$tab[] = "school_it = '$_POST[szkola]'";}
if (!empty($_POST['semestr'])) {$tab[] = "sem_it = '$_POST[semestr]'";}
if (!empty($_POST['przedmiot'])) {$tab[] = "item_it = '$_POST[przedmiot]'";}

if (!empty($tab)) {
$WHERE = 'WHERE '.implode(' AND ', $tab);
} else {
$WHERE = '';
}
$res = my_sql($WHERE, "material_search");

while($row = mysql_fetch_array($res, MYSQL_BOTH)) 
{
echo "
<div class=materials-headings><a href=material=$row[0]>pokaż</a>$row[6]</div>";
}
} else {



$res = my_sql($empty, "paginator2");
$row = mysql_fetch_array($res);
extract($row);

$on_page = 5;
$nav_num = 7;
$all_pages = ceil($all_posts/$on_page);

if (!isset($_GET['page']) or $_GET['page'] > $all_pages or !is_numeric($_GET['page']) or $_GET['page'] <= 0) {
$page = 1;
} else {
$page = $_GET['page'];
}

$limit = ($page - 1) * $on_page;
$arr = array($limit, $on_page);

$res = $res = my_sql($arr, "paginator3");; 
while($row = mysql_fetch_array($res, MYSQL_BOTH)) 
{
echo "
<div class=material-in-box>
<div class=material-header><h4>$row[6]</h></div>
<div class=material-content><article>$row[7]</article></div>
<div class=material-footer><h6>Semestr: $row[3]&nbsp&nbsp|&nbsp&nbspPrzedmiot: $row[4]&nbsp&nbsp|&nbsp&nbspSzkoła: $row[5]<a href=material=$row[0]>Rozwiń</a>".admin_menu($row[0], material)."</h6></div></div>";
}
if($nav_num > $all_pages) {
$nav_num = $all_pages;
}

$for_start = $page - floor($nav_num/2);
$for_end = $for_start + $nav_num;

if ($for_start <= 0) {$for_start = 1;}

$over_end = $all_pages - $for_end;

if($over_end < 0) {$for_start = $for_start + $over_end + 1;}

$for_end = $for_start + $nav_num;

$prev = $page - 1;
$next = $page + 1;



echo "<div id=page-nav><ul>";
if($page > 1) echo "<li><a href=materialy_strona=$prev>Poprzednia strona</a></li>";

if ($for_start > 1) echo "<li><a href=materialy_strona=1>[1]</a></li>";
if ($for_start > 2) echo "<li>...</li>";
for($for_start; $for_start < $for_end; $for_start++) {
if($for_start == $page){
echo "<li>";
}else{
echo "<li>";
}
echo "<a href=materialy_strona=".$for_start.">[".$for_start."]</a></li>";
}
if($for_start < $all_pages) echo "<li>...</li>";
if($for_start - 1 < $all_pages) echo "<li><a href=materialy_strona=".$all_pages.">[".$all_pages."]</a></li>";

if($page < $all_pages) echo "<li><a href=materialy_strona=".$next.">Następna strona</a></li>";
echo "</ul></div>";

}