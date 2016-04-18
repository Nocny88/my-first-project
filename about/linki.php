<?php
$res = my_sql('linki', "load_site");
while($row = mysql_fetch_array($res))
echo "$row[0]";
echo admin_menu('linki', 'page');
?>