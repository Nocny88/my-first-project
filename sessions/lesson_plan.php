<?php

$arr = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII");
echo "<div class='plan-search'>
<form method=post>
<div>Pokaz plan dla semestru: <select name=semestr>
<option>wybierz&nbsp</option>";
for ($i=1;$i<=8;$i++) {
echo "<option value=$i>$arr[$i]</option>";
}
echo "</select></div>
<div><input type='submit' name='wyslij' value='pokaż'></div>
</form>
<a href='javascript:window.print();'><img src='img/printer.png' width=30px /></a>
</div>
<div class='print'>
";



if (isset($_POST['wyslij'])) {
$res = my_sql($_POST['semestr'], "select_plan");

if(mysql_num_rows($res) == 0) {
echo "BRAK PLANU DLA TEGO SEMSETRU";
}

while($row = mysql_fetch_array($res)) {


$lessons = explode('|', $row[2]);

$arr = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII");
for ($i=1;$i<=8;$i++) {
if ($row[5] == $i) {
$sem = $arr[$i];
}}
/*
echo "<pre>";
echo "arr:";
print_r ($row);
echo "</pre><br/>";


echo "<pre>";
echo "arr:";
print_r ($les);
echo "</pre><br/>";
*/
echo "
<div class='plan'>
<table>
<tr><th colspan=5>PLAN LEKCJI NA DZIEŃ: ".$row[1]." SEMESTR: $sem </th></tr>
<tr><th>Przedmiot</th><th>Uwagi</th><th>Sala</th><th>Początek zajęć</th><th>Koniec zajęć</th></tr>";
for ($i=0;$i<count($lessons);$i++) {
$lessons_exploded[$i] = explode('*', $lessons[$i]);
echo "<tr><td>".$lessons_exploded[$i][0]."</td><td>".$lessons_exploded[$i][2]."</td><td>".$lessons_exploded[$i][1]."</td><td>".$lessons_exploded[$i][3]."</td><td>".$lessons_exploded[$i][4]."</td></tr>";
}
echo "</table>
</div>";

}} else {

$res = my_sql($empty, "show_plan2");

while($row = mysql_fetch_array($res)) {

$lessons = explode('|', $row[2]);

$arr = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII");
for ($i=1;$i<=8;$i++) {
if ($row[5] == $i) {
$sem = $arr[$i];
}}
/*
echo "<pre>";
echo "arr:";
print_r ($row);
echo "</pre><br/>";


echo "<pre>";
echo "arr:";
print_r ($les);
echo "</pre><br/>";
*/

echo "
<div class='plan'>
<table>
<tr><th colspan=5>PLAN LEKCJI NA DZIEŃ: ".$row[1]." SEMESTR: $sem</th></tr>
<tr><th>Przedmiot</th><th>Uwagi</th><th>Sala</th><th>Początek zajęć</th><th>Koniec zajęć</th></tr>";
for ($i=0;$i<count($lessons);$i++) {
$lessons_exploded[$i] = explode('*', $lessons[$i]);
echo "<tr><td>".$lessons_exploded[$i][0]."</td><td>".$lessons_exploded[$i][2]."</td><td>".$lessons_exploded[$i][1]."</td><td>".$lessons_exploded[$i][3]."</td><td>".$lessons_exploded[$i][4]."</td></tr>";
}
echo "</table>
</div>";
}

}
echo '</div>';
?>
