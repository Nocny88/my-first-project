<?
//=====================STAŁE====================================================
define('DBHOST', 'localhost');
define('DBUSER', 'southpaw_zaoczne');
define('DBPASS', 'master000');
define('DBNAME', 'southpaw_zaoczne');
//====================TWORZENIE BAZY============================================
function db_zaoczne_lo() {
  $dbname = DBNAME;
  mysql_query("CREATE DATABASE $dbname"); 
  echo mysql_error();
}
//=======================TWORZENIE TABEL========================================
function table_article_lo() {
  mysql_query("CREATE TABLE article_lo
  (id INT NOT NULL AUTO_INCREMENT,
  author_lo CHAR(20) NOT NULL,
  time_lo TIMESTAMP,
  content_lo LONGTEXT NOT NULL,
  header_lo CHAR(80) NOT NULL,
  PRIMARY KEY (id))");
  echo mysql_error();
}
//================================
function table_items_lo() {
  mysql_query("CREATE TABLE items_lo
  (id INT NOT NULL AUTO_INCREMENT,
  author_it CHAR(20) NOT NULL, 
  time_it TIMESTAMP,
  sem_it CHAR(20) NOT NULL,
  item_it CHAR(20) NOT NULL,
  school_it CHAR(20) NOT NULL,
  header_it CHAR(20) NOT NULL,
  content_it LONGTEXT NOT NULL,
  PRIMARY KEY (id))");
  $err = mysql_error();
  echo $err;
}
//================================
function table_plan_lo() {
  mysql_query("CREATE TABLE plan_lo
  (id INT NOT NULL AUTO_INCREMENT,
  name_lo VARCHAR(100) NOT NULL, 
  date_lo TIMESTAMP,
  content_lo VARCHAR(1200) NOT NULL,
  PRIMARY KEY (id))");
  $err = mysql_error();
  echo $err;
}
//==================USTAWIANIE ADMINA===========================================
function set_admin() {
  mysql_query("CREATE TABLE users_lo 
  (id INT NOT NULL AUTO_INCREMENT, 
  login_lo CHAR(40) NOT NULL, 
  haslo_lo CHAR(40) NOT NULL, 
  PRIMARY KEY (id))");
  
  mysql_query("INSERT INTO users_lo (login_lo, haslo_lo) VALUES ('Charmusz', 'zaocznelo')");
  echo mysql_error();
}
//==============================================================================
function login() {
  if(!$_SESSION['logged']) {
      if(isset($_POST['name'])) {
        $_POST['name'] = clear($_POST['name']);
        $_POST['password'] = clear($_POST['password']);
        //$_POST['password'] = codepass($_POST['password']);
        $res = my_sql($empty, "login");
          if(mysql_num_rows($res) > 0) {
            $row = mysql_fetch_assoc($res);
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $row['id'];
            header("Refresh:0");
            } else {
            echo "<div class='in-box2 top-5px'>
            Podany login i/lub hasło jest nieprawidłowe.
            </div>";
            }
        } else {
        echo '<div class="in-box2 top-5px"><form method="post">
        Strona admina, musisz sie zalogować
        <input type="text" value="'.$_POST['name'].'" name="name">
        <input type="password" value="'.$_POST['password'].'" name="password">
        <input type="submit" value="Zaloguj">
        </form></div>';
        }
    } 
}
//==============================================================================
function clear($text) {
  if(get_magic_quotes_gpc()) {
    $text = stripslashes($text);
    }

  $text = trim($text);
  $sql = mysql_connect (DBHOST, DBUSER, DBPASS);
  $text = mysql_real_escape_string($text);
  mysql_close ($sql);
  $text = htmlspecialchars($text); 
  return $text;
}
//==============================================================================
function codepass($password) {return sha1(md5($password).'#!%kad67');}
//==============================================================================
function is_admin() {
  if ($_SESSION['id'] != 1) {
  header("Location: administrator");
  break;
  }
}
//==============================================================================
function admin_menu($row0, $zm) {
  if ($_SESSION['id'] == 1) {
    if ($zm == "article") {
    return "<a href=edit=$row0>Edytuj</a><a href=del=$row0>Usuń</a><a href=add=1>Dodaj</a>";
    } elseif ($zm == "material") {
    return"<a href=edit_mat=$row0>Edytuj</a><a href=del_mat=$row0>Usuń</a><a href=add_mat=1>Dodaj</a>";
    } else {
    return"<a href='/edit_page=$row0'>Edytuj</a>";
    }
  }
}
//==============================================================================
if(!isset($_SESSION['logged'])) {
  $_SESSION['logged'] = false;
  $_SESSION['id'] = -1;
}
//==============================================================================
function url() {
  $d_url = $_SERVER['REQUEST_URI'];
  $d_url = trim($d_url, '/');
  
  if (substr($d_url, 0, 3) == "add" || substr($d_url, 0, 3) == "del" || substr($d_url, 0, 4) == "edit" || substr($d_url, 0, 7) == "article"     || substr($d_url, 0, 8) == "material" || substr($d_url, 0, 16) == "materialy_strona" || substr($d_url, 0, 15) == "artykuly_strona" || substr($d_url, 0, 12) == "plany_strona" || substr($d_url, 0, 8) == "del_file" || substr($d_url, 0, 9) == "edit_page") {
    $d_url = explode('=', $d_url);
    } else {
    $d_url = explode('/', $d_url);
    }
      
  switch ($d_url[0]) {
    case "artykuly_strona":
    $_GET['crumb_page'] = "strona główna";
    $_GET['load_page'] = "articles/index_articles.php";
    $_GET['page'] = $d_url[1];
    break;
        
    case "":
    $_GET['crumb_page'] = "strona główna";
    $_GET['load_page'] = "articles/index_articles.php";
    break;
        
    case "article":
    $_GET['crumb_page'] = "strona główna";
    $_GET['load_page'] = "articles/article.php"; 
    $_GET['id'] = $d_url[1];
    break;
    
    case "edit_page":
    $_GET['crumb_page'] = 'edycja strony '.$d_url[1];
    $_GET['load_page'] = 'admin/edit_page.php';
    $_GET['edit_page'] = $d_url[1];
    break;
        
    case "add":
    $_GET['crumb_page'] = "strona główna";
    $_GET['crumb_menu'] = "dodaj artykuł";
    $_GET['load_page'] = "articles/index_articles.php"; 
    $_GET['add'] = $d_url[1];
    break;
        
    case "del":
    $_GET['crumb_page'] = "";
    $_GET['load_page'] = "articles/index_articles.php"; 
    $_GET['del'] = $d_url[1];
    break;
        
    case "edit":
    $_GET['crumb_page'] = "strona główna";
    $_GET['crumb_menu'] = "edytuj artykuł";
    $_GET['load_page'] = "articles/index_articles.php"; 
    $_GET['edit'] = $d_url[1];
    break;
        
    case "logout":
    $_GET['crumb_page'] = "strona główna";
    $_GET['load_page'] = "articles/index_articles.php";
    $_SESSION['logged'] = false;
    $_SESSION['id'] = -1;
    break;
        
    case "o_nas":
    $_GET['crumb_page'] = "o nas";
    $_GET['load_page'] = "about/index_about.php";
    
    switch ($d_url[1]) {     
      
      case "":
      $_GET['load_menu'] = "o_nas.php";
      break;
      
      case "przydatne_linki":
      $_GET['crumb_page'] = "przydatne linki";
      $_GET['load_menu'] = "linki.php";
      break;
      
      case "rady_materialy":
      $_GET['crumb_menu'] = "rady i ciekawe materiały";
      $_GET['load_menu'] = "rady_mat.php";
      break;
      
      case "galeria":
      $_GET['crumb_menu'] = "galeria";
      $_GET['load_menu'] = "galeria.php";
      break;
    }
    break;
        
    case "harmonogram_roku":
    $_GET['crumb_page'] = "harmonogram";
    $_GET['load_page'] = "harmonogram/index_harmo.php";
    switch ($d_url[1]) {
      
      case "":
      $_GET['load_menu'] = "harmo.php";
      break;
            
      case "organizacja_roku":
      $_GET['crumb_menu'] = "oganizacja roku szkolnego";
      $_GET['load_menu'] = "organizacja.php";
      break;
       
      case "terminy_probnych_matur":
      $_GET['crumb_menu'] = "terminy próbnych matur";
      $_GET['load_menu'] = "terminy.php";
      break;
      
      case "kalendarz_przygotowan":
      $_GET['crumb_menu'] = "kalendarz przygotowań do matury";
      $_GET['load_menu'] = "kalendarz.php";
      break;
       
    }
    break;
        
    case "egzamin_maturalny":
    $_GET['crumb_page'] = "egzamin maturalny";
    $_GET['load_page'] = "exams/index_exams.php";
    switch ($d_url[1]) {   
      case "":
      $_GET['load_menu'] = "egzamin_mat.php";
      break;
      
      case "deklaracje":
      $_GET['crumb_menu'] = "deklaracje";
      $_GET['load_menu'] = "deklaracje.php";
      break;
      
      case "egzamin_pisemny":
      $_GET['crumb_menu'] = "egzamin pisemny";
      $_GET['load_menu'] = "pisemny.php";
      break;
      
      case "egzamin_ustny":
      $_GET['crumb_menu'] = "egzamin ustny";
      $_GET['load_menu'] = "ustny.php";
      break;
      
      case "arkusze_egzaminacyjne":
      $_GET['crumb_menu'] = "arkusze egzaminacyjne";
      $_GET['load_menu'] = "arkusze.php";
      break;
      
      case "arkusze_mat":
      $_GET['crumb_menu'] = "arkusze egzaminacyjne Matematyka";
      $_GET['load_menu'] = "arkusze_mat.php";
      break;
      
      
      case "egzamin_zawodowy":
      $_GET['crumb_menu'] = "egzamin zawodowy";
      $_GET['load_menu'] = "egzamin_zaw.php";
      break;
      }
    break;
       
    case "materialy":
    $_GET['crumb_page'] = "materiały";
    $_GET['load_page'] = "materials/index_materials.php";
    break;
        
    case "materialy_strona":
    $_GET['crumb_page'] = "materiały";
    $_GET['load_page'] = "materials/index_materials.php";
    $_GET['page'] = $d_url[1];
    break;
        
    case "material":
    $_GET['crumb_page'] = "materiały";
    $_GET['load_page'] = "materials/material.php"; 
    $_GET['id'] = $d_url[1];
    break;
        
    case "add_mat":
    $_GET['crumb_page'] = "materiały";
    $_GET['crumb_menu'] = "Dodaj materiał";
    $_GET['load_page'] = "materials/add_material.php"; 
    $_GET['add_mat'] = $d_url[1];
    break;
        
    case "del_mat":
    $_GET['crumb_page'] = "";
    $_GET['load_page'] = "materials/index_materials.php"; 
    $_GET['del_mat'] = $d_url[1];
    break;
        
    case "edit_mat":
    $_GET['crumb_page'] = "materiały";
    $_GET['crumb_menu'] = "edytuj materiał";
    $_GET['load_page'] = "materials/edit_material.php"; 
    $_GET['edit_mat'] = $d_url[1];
    break;
        
    case "kontakt":
    $_GET['crumb_page'] = "kontakt";
    $_GET['load_page'] = "contact/contact.php";
    break;
        
    case "zjazdy":
    $_GET['crumb_page'] = "terminarz zjazdów";
    $_GET['load_page'] = "sessions/sessions.php";
    break;
    
    case "plan_lekcji":
    $_GET['crumb_page'] = "plan lekcji";
    $_GET['load_page'] = "sessions/lesson_plan.php";
    break;
      
    case "administrator":
    $_GET['crumb_page'] = "administrator";
    $_GET['crumb_menu'] = "plany lekcji";
    $_GET['load_page'] = "admin/admin.php";
    break;
    
    case "add_plan":
    $_GET['crumb_page'] = "administrator";
    $_GET['crumb_menu'] = "dodaj plan lekcji";
    $_GET['add_plan'] = 1;
    $_GET['load_page'] = "admin/admin.php";
    break;
    
    case "del_plan":
    $_GET['del_plan'] = $d_url[1];
    $_GET['load_page'] = "admin/admin.php";
    break;
    
    case "edit_plan":
    $_GET['crumb_page'] = "administrator";
    $_GET['crumb_menu'] = "edytuj plan lekcji";
    $_GET['edit_plan'] = $d_url[1];
    $_GET['load_page'] = "admin/admin.php";
    break;
    
    case "plany_strona":
    $_GET['crumb_page'] = "administrator";
    $_GET['crumb_menu'] = "plany lekcji";
    $_GET['load_page'] = "admin/admin.php";
    $_GET['page'] = $d_url[1];
    break;
    
        case "wgraj_pliki":
    $_GET['crumb_page'] = "administrator";
    $_GET['crumb_menu'] = "wgraj pliki";
    $_GET['load_page'] = "admin/upload.php";
    $_GET['page'] = $d_url[1];
    break;
    
    case "del_file":
    $_GET['del_file'] = $d_url[1];
    $_GET['load_page'] = "admin/upload.php";
    break;

  }
}
//==============================================================================
function breadcrumbs() {
  $cr1 = $_GET['crumb_page'];
  $cr2 = $_GET['crumb_menu'];
      
  $arr = array ();
  if (!empty($_POST['szkola']))
    $arr[] = "$_POST[szkola]";
  if (!empty($_POST['semestr']))
    $arr[] = "semestr: $_POST[semestr]";
  if (!empty($_POST['przedmiot']))
    $arr[] = "$_POST[przedmiot]";

  if (empty($cr2)) {
    if (!empty($arr)) {
      $cr3 = implode('&nbsp&nbsp|&nbsp&nbsp', $arr);
      return "$cr1&nbsp&nbsp|&nbsp&nbsp<b>$cr3</b>";
      } else {
      return "<b>$cr1</b>";
      }
  } else {
  return "$cr1&nbsp&nbsp|&nbsp&nbsp<b>$cr2</b>";
  }
}      
//==============================================================================
function title() {
  if (!isset($_GET['crumb_menu'])) {
    return "Zaoczne LO - ".$_GET['crumb_page'];
  } else {
    return "Zaoczne LO - ".$_GET['crumb_menu'];
  }
}
//==============================================================================
function article_img($id) {
  if ($_FILES['file']['size'] != 0) {
    $file_is = $_FILES['file']['type'];

  if ($file_is != 'image/jpeg') {
    if ($file_is != 'image/png') {
      echo 'blad MIME';
      exit; 
  }}

  if (isset($id)) {
    $image_id = $id;
    } else {
    // 
    $res = my_sql($empty, "last");
while($row = mysql_fetch_array($res, MYSQL_BOTH)) {
$image_id = $row[0];
break;
}
    }

  $_FILES['file']['name'] = "article_img_".$image_id;

  if ($_FILES['file']['error'] > 0) {
    echo "problem:";
  
    switch ($_FILES['file']['error'] > 0) {
      case 1:
      echo "blad 1";
      break;
    
      case 2:
      echo "blad 2";
      break;
  
      case 3:
      echo "blad 3";
      break;
  
      case 4:
      echo "blad 4";
      break;
  
      case 5:
      echo "blad 5";
      break;
  
      case 6:
      echo "blad 6";
      break;
  
      case 7:
      echo "blad 7";
      break;
    }
  exit;
  }

  if ($file_is == 'image/jpeg') {
    $format = "jpeg";
    } elseif ($file_is == 'image/png') {
      $format = "png";
    }

  $upload_to = 'img/article_img/'.$_FILES['file']['name'].'.'.$format;

  if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $upload_to)) {
      echo "plik nie moze byc skopoiowany do katalogu";
      exit;
    }} else {
      echo "jakis tam problem";
      echo $_FILES['file']['name'];
      exit;
    }

  $max_height = 207;
  $max_width = 207;

  list($width, $height) = GetImageSize($upload_to);

  $xscale = $width / $max_width;
  $yscale = $height / $max_height;

  if ($yscale > $xscale) {
    $new_width = round($width * (1 / $yscale));
    $new_height = round($height * (1 /$yscale));
    } else {
    $new_width = round($width * (1 / $xscale));
    $new_height = round($height * (1 /$xscale));
    }

    $new_sized_image = imagecreatetruecolor($new_width, $new_height);
    $white = imagecolorallocate($new_sized_image, 255, 255, 255);
    imagefill($new_sized_image, 0, 0, $white);

    if (substr($upload_to, -4) == "jpeg") {   
      $orig_temp_img = imagecreatefromjpeg($upload_to);
      } elseif (substr($upload_to, -3) == "png") {   
      $orig_temp_img = imagecreatefrompng($upload_to);
      }

  imagecopyresampled($new_sized_image, $orig_temp_img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

  imagejpeg($new_sized_image, $upload_to, 75);
  imagedestroy($new_sized_image);
  }
}
//==============================================================================
function load_article_img($row0) {
  if (file_exists("img/article_img/article_img_$row0.jpeg")) {
    return "img/article_img/article_img_$row0.jpeg";
  } elseif (file_exists("img/article_img/article_img_$row0.png")) {
    return "img/article_img/article_img_$row0.png";
  } else {
    return "img/article_img/article_no_img.png"; 
  }
}
//==============================================================================
function date_time($row2) {
  return substr($row2, 0, -3);
}
//==============================================================================
function my_sql($zm, $par) {
  
  switch ($par) {
    case "article":
    $query = "SELECT * FROM article_lo WHERE id = $zm";
    break;
  
    case "add":
    $query = "INSERT INTO article_lo (content_lo, header_lo) VALUES ('$_POST[content]', '$_POST[header]')";
    break;
  
    case "del":
    is_admin();
    $query = "DELETE FROM article_lo WHERE id = $zm";
    del_art_img($zm);
    break;
  
    case "edit":
    $query = "UPDATE article_lo SET content_lo = '$_POST[content]', header_lo = '$_POST[header]' WHERE id = $zm";
    break; 
  
    case "material":
    $table = "items_lo";
    $query = "SELECT * FROM items_lo WHERE id = $zm";
    break;
    
    case "material_list":
    $query = "SELECT * FROM items_lo";
    break;
  
    case "add_mat":
    $query = "INSERT INTO items_lo (sem_it, item_it, header_it, content_it, school_it) VALUES ('$_POST[sem]', '$_POST[item]', '$_POST[header]', '$_POST[content]', '$_POST[school]')";
    break;
  
    case "del_mat":
    is_admin();
    $query = "DELETE FROM items_lo WHERE id = $zm";
    break;

    case "edit_mat":
    $query = "UPDATE items_lo SET header_it = '$_POST[header]', content_it = '$_POST[content]', sem_it = '$_POST[sem]', item_it = '$_POST[item]', school_it = '$_POST[school]' WHERE id = $zm";
    break;
  
    case "paginator":
    $query = 'SELECT COUNT(*) as all_posts FROM article_lo';
    break;
  
    case "paginator1":
    $query = "SELECT * FROM article_lo ORDER BY id DESC LIMIT $zm[0], $zm[1]";
    break;
  
    case "paginator2":
    $query = 'SELECT COUNT(*) as all_posts FROM items_lo';
    break;
  
    case "paginator3":
    $query = "SELECT * FROM items_lo ORDER BY id DESC LIMIT $zm[0], $zm[1]";
    break;
    
    case "paginator4":
    $query = 'SELECT COUNT(*) as all_posts FROM plan_lo';
    break;
    
    case "paginator5":
    $query = "SELECT * FROM plan_lo ORDER BY ts DESC LIMIT $zm[0], $zm[1]";
    break;
  
    case "material_search":
    $query = "SELECT * FROM items_lo $zm";
    break;
  
    case "login":
    $query = "SELECT id FROM users_lo WHERE login_lo = '{$_POST['name']}' AND haslo_lo = '{$_POST['password']}' LIMIT 1";
    break;
    
    case "add_plan":
    $zm = explode('#', $zm);
    $query = "INSERT INTO plan_lo (date_lo, sem_lo, show_lo, content_lo) VALUES ('$zm[0]', '$zm[2]', '$zm[1]', '$zm[3]')";
    break;
  
    case "show_plan":
    $query = "SELECT * FROM plan_lo";
    break;
    
    case "show_plan2":
    $query = "SELECT * FROM plan_lo WHERE show_lo = 'tak'";
    break;
    
    case "del_plan":
    $query = "DELETE FROM plan_lo WHERE id = $zm";
    break;
    
    case "edit_plan":
    $zm = explode('#', $zm);
    $query = "UPDATE plan_lo SET date_lo = '$zm[0]', sem_lo = '$zm[2]', show_lo = '$zm[1]', content_lo = '$zm[3]' WHERE id = $_GET[edit_plan]";
    break;

    case "plan":
    $query = "SELECT * FROM plan_lo WHERE id = $zm;";
    break;
    
    case "last":
    $query = "SELECT id FROM article_lo ORDER BY id DESC LIMIT 1";
    break;

    case "select_plan":
    $query = "SELECT * FROM plan_lo WHERE sem_lo = $zm AND show_lo = 'tak' ORDER BY id DESC";
    break;

    case "add_file":
    $zm = explode('.', $zm);         
    $query = "INSERT INTO file_lo (name_lo, ext_lo) VALUE ('$zm[0]', '$zm[1]')";
    break;
    
    case "file_link":
    $query = "SELECT * FROM file_lo";
    break;
    
   case "img_link":
    $query = "SELECT * FROM file_lo WHERE ext_lo = 'jpg' OR ext_lo = 'png'";
    break;
    
   case "del_file":
    $query = "DELETE FROM file_lo WHERE name_lo = '$zm'";
    break;

   case "load_site":
   $query = "SELECT content_si FROM site_si WHERE page_si = '$zm'";
   break;
   
   case "save_site":
   $zm = explode('~', $zm);
   $query = "UPDATE site_si SET content_si = '$zm[1]' WHERE page_si = '$zm[0]'";
   break;
  }
  
  $sql = mysql_connect (DBHOST, DBUSER, DBPASS);  
  mysql_select_db(DBNAME);
  mysql_query('set names utf8');
  $res = mysql_query($query);
  $err = mysql_error();
  mysql_close ($sql);
  
  
  
  if (empty($err)) {
    return $res;
    } else {
    echo $err;
    }
}
//==============================================================================
function del_art_img($row0) {
  if (file_exists("img/article_img/article_img_$row0.jpeg")) {
    unlink("img/article_img/article_img_$row0.jpeg");
    } elseif (file_exists("img/article_img/article_img_$row0.png")) {
    unlink("img/article_img/article_img_$row0.png");
    }
}
//==============================================================================
function ext_links() {
$res = my_sql($empty, "file_link");
$zm = 0;
while($row = mysql_fetch_array($res)) {
$arr[$zm] = "{title: '".$row[1]."', value: 'http://southpaw.linuxpl.eu/admin/files/".$row[1].".".$row[2]."'}";
$zm++; 
}

$imploded = implode(',', $arr);
$save_this_shit = ' echo "['.$imploded.']"; ';
$wp = fopen('tinymce/mylist.php', 'wb');
fwrite($wp, '<?php ');
fseek($wp, 6);
fwrite($wp, $save_this_shit);
fseek($wp, -1, SEEK_END);
fwrite($wp, ' ?');
fwrite($wp, '>');
fclose($wp);

}
//==============================================================================
function ext_imgs() {
$res = my_sql($empty, "img_link");
$zm = 0;
while($row = mysql_fetch_array($res)) {
$arr[$zm] = "{title: '".$row[1]."', value: 'http://southpaw.linuxpl.eu/admin/files/".$row[1].".".$row[2]."'}";
$zm++; 
}

$imploded = implode(',', $arr);
$save_this_shit = ' echo "['.$imploded.']"; ';
$wp = fopen('tinymce/imglist.php', 'wb');
fwrite($wp, '<?php ');
fseek($wp, 6);
fwrite($wp, $save_this_shit);
fseek($wp, -1, SEEK_END);
fwrite($wp, ' ?');
fwrite($wp, '>');
fclose($wp);
}
//==============================================================================
function add_undrline($zm) {
$zm = explode(' ', $zm);
$zm = implode('_', $zm);
return $zm;
}
//==============================================================================
function rem_undrline($zm) {
$zm = explode('_', $zm);
$zm = implode(' ', $zm);
return $zm;
}
//==============================================================================
function header_img() {
switch ($_GET['crumb_page']) {
  
  case 'harmonogram':
  $zm = 'harmonogram.jpg';
  break;
  
  case 'kontakt':
  $zm = 'contact2.jpg';
  break;

  case 'materiały':
  $zm = 'materials.jpg';
  break;
  
  case 'egzamin maturalny':
  $zm = 'exams.jpg';
  break;
  
  case 'terminarz zjazdów':
  $zm = 'schools.jpg';
  break;
  
  case 'o nas':
  $zm = 'about.jpg';
  break;
  
  case 'strona główna':
  $zm = 'home.jpg';
  break;
  
  case 'plan lekcji':
  $zm = 'schools.jpg';
  break;
  
  default:
  $zm = 'header.jpg';
  break;
  }
echo "<img src='/img/$zm' alt='obraz nagłówka'>";
}
?>