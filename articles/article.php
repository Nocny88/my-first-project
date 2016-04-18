<?php
echo '<div class=print>';
$res = my_sql($_GET['id'], "article");

while($row = mysql_fetch_array($res)) {
echo "
<div class=article-full-box>
<div class=article-full-header>$row[4]</div>
<div class=article-full-content>$row[3]</div>
<div class=article-full-footer>Data dodania: ".date_time($row[2])."<a href='javascript:window.print();'><img src='img/printer.png' width=30px /></a></div>
</div>";
}
echo '</div>';
?>