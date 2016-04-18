<?php
$month = array('miesiąc', 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');

$sem = array('sem', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII');

$hour_start = array('start', '8.10', '9.00', '10.40', '12.20', '14.00', 'rozp.');

$hour_end = array('stop', '8.55', '10.30', '12.10', '13.50', '15.30', 'zak.');

$item = array('item', 'przedmiot', 'Język Polski', 'Język Angielski', 'Język Rosyjski', 'Matematyka', 'Fizyka', 'Chemia', 'Biologia', 'Geografia', 'Historia', 'Okienko');

if (substr(date("m"), 0, 1) == 0) {
$number_month = substr(date("m"), 1, 1);
} else {
$number_month = substr(date("m"), 0, 2);
}

for ($i=1;$i<=12;$i++) {
if($number_month == $i) {
$name_month = $month[$i];
}}

for ($i=1;$i<=12;$i++) {
if ($name_month != $month[$i]) {
$other_month[$i] = "<option value=$i>$month[$i]</option>";
}}

echo "
<script type='text/javascript'>
function SelectAll(id) {
   document.getElementById(id).focus();
   document.getElementById(id).select();
} </script>";

echo "
<form method=post>
<div class=plan>
<table>

<th colspan=5>
Plan lekcji na dzień: <input type=text id=dzien name=dzien value=".date("d")." onClick=SelectAll('dzien');>
<select name=miesiac>
<option value=".date("m").">$name_month</option>";
for ($i=1;$i<=12;$i++) {
echo $other_month[$i];
}
echo "
</select>
<input type=text name=rok id=rok value=".date("Y")." onClick=SelectAll('rok');>
| SEMESTR: 
<select name=se>";
for ($i=1;$i<=8;$i++) {
echo "<option value=$i>$sem[$i]</option>";
}
echo "
</th>

<tr><th>Przedmiot</th><th>Uwagi</th><th>Sala</th><th>Początek zajęć</th><th>Koniec zajęć</th></tr>";
for ($i=1;$i<=6;$i++) {
echo "
<tr>
<td><select name=p$i>";
for ($j=1;$j<=11;$j++) {
echo "<option value='".$item[$j]."'>".$item[$j]."</option>";
}
echo "
</select></td>
<td><input type=text name=u$i id=u$i value=uwagi maxlength=38 onClick=SelectAll('u$i');></td>
<td><input type=text name=s$i id=s$i value=sala maxlength=16 onClick=SelectAll('s$i');></td>
<td><input type=text name=r$i id=r$i value=".$hour_start[$i]." maxlength=10 onClick=SelectAll('r$i');></td>
<td><input type=text name=k$i id=k$i value=".$hour_end[$i]." maxlength=10 onClick=SelectAll('k$i');></td>
</tr>";
}
echo "

<tr>
<td colspan=4>
Widoczny<input type='radio' name='w' value='tak'>Tak
<input type='radio' name='w' value='nie' checked>Nie
</td>
<td>
<input type=submit name=wyslij value=zapisz>
</td>
</tr>

</table>
</div>
</form>";
?>