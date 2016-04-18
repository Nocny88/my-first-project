<?php
switch (true) {
case ($_SESSION['logged']!=1):
login();
break;
  
case ($_SESSION['logged']==1):
   
include "admin_header.php";
if ($_GET['add_plan'] == 1) {
include "add_plan.php";
} if ($_GET['del_plan'] >= 1) {
my_sql($_GET['del_plan'], "del_plan");
header("Location: /administrator");
} if ($_GET['edit_plan'] >=1) {
include "edit_plan.php";
}
//@@@@
$res = my_sql($empty, "paginator4");
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
//@@@@
$res = my_sql($arr, "paginator5");; 
while($row = mysql_fetch_array($res, MYSQL_BOTH)) {

if ($row[3] == "tak") {
$dot = "<img src=img/dot.png height=14 width=14>";
} else {
$dot = "";
}

$arr = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII");
for ($i=1;$i<=8;$i++) {
if ($row[5] == $i) {
$sem = $arr[$i];
}}

$lessons = explode('|', $row[2]);

echo "
<div class=plan>
<table>
<tr><th colspan=5>$dot ".$row[1]." SEMESTR: $sem</th></tr>
<tr><th>Przedmiot</th><th>Uwagi</th><th>Sala</th><th>Początek zajęć</th><th>Koniec zajęć</th></tr>";
for ($i=0;$i<count($lessons);$i++) {
$lessons_exploded[$i] = explode('*', $lessons[$i]);
echo "<tr><td>".$lessons_exploded[$i][0]."</td><td>".$lessons_exploded[$i][2]."</td><td>".$lessons_exploded[$i][1]."</td><td>".$lessons_exploded[$i][3]."</td><td>".$lessons_exploded[$i][4]."</td></tr>";
}
echo "<tr><td colspan=5><a href=add_plan>Dodaj</a><a href=del_plan=$row[0]>Usuń</a><a href=edit_plan=$row[0]>Edytuj</a></td></tr>
</table></div>";
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
if($page > 1) echo "<li><a href=plany_strona=$prev>Poprzednia strona</a></li>";

if ($for_start > 1) echo "<li><a href=plany_strona=1>[1]</a></li>";
if ($for_start > 2) echo "<li>...</li>";
for($for_start; $for_start < $for_end; $for_start++) {
if($for_start == $page){
echo "<li>";
}else{
echo "<li>";
}
echo "<a href=plany_strona=".$for_start.">[".$for_start."]</a></li>";
}
if($for_start < $all_pages) echo "<li>...</li>";
if($for_start - 1 < $all_pages) echo "<li><a href=plany_strona=".$all_pages.">[".$all_pages."]</a></li>";

if($page < $all_pages) echo "<li><a href=plany_strona=".$next.">Następna strona</a></li>";
echo "</ul></div>";

}

?>