<?php
is_admin();
if (isset($_POST['wyslij'])) {

$lessons[date] = date("j-m-Y", mktime(0,0,0,$_POST['miesiac'],$_POST['dzien'],$_POST['rok']));
$lessons[show] = $_POST['w'];
$lessons[sem] = $_POST['se'];

for ($i=1;$i<=6;$i++) {
  if ($_POST["p$i"] == "przedmiot" AND $_POST["s$i"] == "sala" AND $_POST["u$i"] == "uwagi") {
    } else {
    $array = array($_POST["p$i"], $_POST["s$i"], $_POST["u$i"], $_POST["r$i"], $_POST["k$i"]); 
    $zm[$i] = implode('*', $array);
  }}

$lessons[cont] = implode('|', $zm); 
$pack = implode('#', $lessons);

echo "<pre>";
print_r ($array);
echo "</pre>";

echo "<pre>";
print_r ($lessons);
echo "</pre>";

echo ($lessons_pack);

my_sql($pack, "add_plan");

header("Location: /administrator");

} else {
include "plan_pattern.php";
}
?>