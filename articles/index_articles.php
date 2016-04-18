<?
if ($_GET['add'] == 1) {
include "add_article.php";
} elseif ($_GET['del'] >= 1) {
my_sql($_GET['del'], "del");
header("Location: /");
} elseif ($_GET['edit'] >= 1) {
include "edit_article.php";
} else {


$res = my_sql($empty, "paginator");
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

$res = my_sql($arr, "paginator1");
while($row = mysql_fetch_array($res, MYSQL_BOTH)) 
{
echo "
<div class=article-in-box>
<div class=article-img><img src=".load_article_img($row[0])." alt='obraz artykułu'></div>
<div class=article-header><h4>$row[4]</h4></div>
<div class=article-content>$row[3]</div>
<div class=article-footer-left><h6>Data dodania: ".date_time($row[2])."<a href='article=$row[0]'>Rozwiń</a>".admin_menu($row[0], article)."</h6></div></div>";
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
  if($page > 1) {
  echo "<li><a href='artykuly_strona=$prev'>Poprzednia strona</a></li>";
  }
  if ($for_start > 1) {
  echo "<li><a href='artykuly_strona=1'>[1]</a></li>";
  }
  if ($for_start > 2) {
  echo "<li>...</li>";
  }
  for($for_start; $for_start < $for_end; $for_start++) {
      if($for_start == $page) {
      echo "<li>";
      } else {
      echo "<li>";
      }
      echo "<a href='artykuly_strona=".$for_start."'>[".$for_start."]</a></li>";
  }

  if($for_start < $all_pages) {
  echo "<li>...</li>";
  }
  
  if($for_start - 1 < $all_pages) {
  echo "<li><a href='artykuly_strona=".$all_pages."'>[".$all_pages."]</a></li>";
  }
  
  if($page < $all_pages) {
  echo "<li><a href='artykuly_strona=".$next."'>Następna strona</a></li>";
  }

echo "</ul></div>";

}
?>