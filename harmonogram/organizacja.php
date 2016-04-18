<?php
$res = my_sql('organizacja', "load_site");
while($row = mysql_fetch_array($res))
echo "$row[0]";
echo admin_menu('organizacja', 'page');
?>