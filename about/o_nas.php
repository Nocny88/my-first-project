<?php

$res = my_sql('o nas', "load_site");
while($row = mysql_fetch_array($res))
echo "$row[0]";
echo admin_menu('o_nas', 'page');

?>
