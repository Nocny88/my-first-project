<?
is_admin();
if (isset($_POST['wyslij'])) {

$lessons[date] = date("j-m-Y", mktime(0,0,0,$_POST['miesiac'],$_POST['dzien'],$_POST['rok']));
$lessons[show] = $_POST['w'];
$lessons[sem] = $_POST['se'];

for ($i=0;$i<$_POST['quanity'];$i++) {
  if ($_POST["p$i"] == "przedmiot" AND $_POST["s$i"] == "sala" AND $_POST["u$i"] == "uwagi") {
    } else {
    $array = array($_POST["p$i"], $_POST["s$i"], $_POST["u$i"], $_POST["r$i"], $_POST["k$i"]); 
    $zm[$i] = implode('*', $array);
  }}

$lessons[cont] = implode('|', $zm); 
$pack = implode('#', $lessons);
echo "<pre>";
print_r($pack);
echo "</pre>";

my_sql($pack, "edit_plan");

header("Location: /administrator");

} else {

$month = array('miesiąc', 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');

$sem = array('sem', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII');

$item = array('item', 'przedmiot', 'Język Polski', 'Język Angielski', 'Język Rosyjski', 'Matematyka', 'Fizyka', 'Chemia', 'Biologia', 'Geografia', 'Historia', 'Okienko');

$hour_start = array('start', '8.10', '9.00', '10.40', '12.20', '14.00', 'rozp.');

$hour_end = array('stop', '8.55', '10.30', '12.10', '13.50', '15.30', 'zak.');

$res = my_sql($_GET['edit_plan'], "plan");

while($row = mysql_fetch_array($res)) {

$zm = explode('|', $row['content_lo']);

for ($i=0;$i<=count($zm)-1;$i++) {
$lesson[$i] = explode('*', $zm[$i]);
}

for ($i=1;$i<=12;$i++) {
if ($month[substr($row[1], 3, 2)] != $month[$i]) {
$other_month[$i] = "<option value=$i>$month[$i]</option>";
}}

for ($i=1;$i<=8;$i++) {
if ($sem[$row[5]] != $sem[$i]) {
$other_sem[$i] = "<option value=$i>$sem[$i]</option>";
}}

$quanity_les = 0;

echo "
<form method=post>
<div class=plan>
<table>

<th colspan=5>
Plan lekcji na dzień: <input type=text id=dzien name=dzien value=".substr("$row[1]", 0, 2)." onClick=SelectAll('dzien');>

<select name=miesiac>
<option value=".substr($row[1], 3, 2).">".$month[substr($row[1], 3, 2)]."</option>";

for ($i=1;$i<=12;$i++) {
echo $other_month[$i];
}
echo "
</select>
<input type=text name=rok id=rok value=".substr("$row[1]", 6, 4)." onClick=SelectAll('rok');>
| SEMESTR: 
<select name=se>
<option value=".$row[5].">".$sem[$row[5]]."</option>";
for ($i=1;$i<=8;$i++) {
echo $other_sem[$i];
}
echo "
</th>

<tr><th>Przedmiot</th><th>Uwagi</th><th>Sala</th><th>Początek zajęć</th><th>Koniec zajęć</th></tr>";
for ($i=0;$i<=count($lesson)-1;$i++) {
echo "
<tr>
<td><select name=p$i>
<option value='".$lesson[$i][0]."'>".$lesson[$i][0]."</option>";

for ($j=3;$j<=11;$j++) {
echo "<option value='".$item[$j]."'>".$item[$j]."</option>";

}
echo "
</select></td>
<td><input type=text name=u$i id=u$i value=uwagi maxlength=38 onClick=SelectAll('u$i');></td>
<td><input type=text name=s$i id=s$i value=sala maxlength=16 onClick=SelectAll('s$i');></td>
<td><input type=text name=r$i id=r$i value=".$hour_start[$i+1]." maxlength=10 onClick=SelectAll('r$i');></td>
<td><input type=text name=k$i id=k$i value=".$hour_end[$i+1]." maxlength=10 onClick=SelectAll('k$i');></td>
</tr>";
$quanity_les++;
}
echo "

<tr>
<td colspan=4>
Widoczny<input type='radio' name='w' value='tak'>Tak
<input type='radio' name='w' value='nie' checked>Nie
</td>
<td>
<input type=hidden name=quanity value=$quanity_les>
<input type=submit name=wyslij value='zapisz zmiany'>
</td>
</tr>

</table>
</div>
</form>";

}
}
?>
