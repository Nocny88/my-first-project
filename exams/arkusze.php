<?php
$res = my_sql('arkusze', "load_site");
while($row = mysql_fetch_array($res))
echo "$row[0]";
echo admin_menu('arkusze', 'page');
?>