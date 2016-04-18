<?php
ob_start();
header('Content-type: text/html; charset=UTF-8');
include "functions.php";
session_start();
url();


//echo $_SERVER['REQUEST_URI'];
//=========================================
//Instalacja
//db_zaoczne_lo ();
//table_users_lo();
//table_article_lo ();
//table_items_lo ();
//set_admin ();
//=========================================
?>
  
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title><?php echo title(); ?></title>
<? include 'main_styles.php'; ?>



<link rel="stylesheet" type="text/css" href="print.css" media="print" />
</head>

<body>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WFP6K2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFP6K2');</script>
<!-- End Google Tag Manager -->

<div id="container">

<div id="header-cont">
<div id="header">
<div id="header-equal">
<div id="header-left"><h4>BARDZO FAJNE LOGO SZKOŁY</h4></div>
<div id="header-right">
<img src='img/cke.jpg' height='45' style='margin-right:20px; margin-bottom:8px;' alt='logo cke'>
<img src='img/godlo.jpg' height='65' style='margin-right:5px; margin-top:-12px;' alt='godło polski'>
</div>
</div>
</div> <!--header-->
<div id="menu">
<div id="left-menu">
<nav>
<ul id="main-menu">

<li><a href="/">Aktualnośći</a></li>


<li><a href="/o_nas">O nas</a>
  <ul>
  <li><a href="/o_nas/rady_materialy">Rady i ciekawe materiały</a></li>
  <li><a href="/o_nas/przydatne_linki">Przydatne linki</a></li>
  <li><a href="/o_nas/galeria">Galeria</a></li>
  </ul>
</li>


<li><a href="/harmonogram_roku">Harmonogram</a>
  <ul>
  <li><a href="/harmonogram_roku/organizacja_roku">Organizacja roku szkolnego</a></li>
  <li><a href="/harmonogram_roku/terminy_probnych_matur">Terminy próbnych matur</a></li>
  <li><a href="/harmonogram_roku/kalendarz_przygotowan">Kalendarz przygotowań do matury</a></li>
  </ul>
</li>


<li><a href="/egzamin_maturalny">Egzamin maturalny</a>
  <ul>
  <li><a href="/egzamin_maturalny/deklaracje">Deklaracje</a></li>
  <li><a href="/egzamin_maturalny/egzamin_pisemny">Egzamin pisemny</a></li>
  <li><a href="/egzamin_maturalny/egzamin_ustny">Egzamin ustny</a></li>
  <li><a href="/egzamin_maturalny/arkusze_egzaminacyjne">Arkusze egzaminacyjne</a></li>
  <li><a href="/egzamin_maturalny/arkusze_mat">Arkusze matematyka</a></li>
  <li><a href="/egzamin_maturalny/egzamin_zawodowy">Egzamin zawodowy</a></li>
  </ul>
</li>

<li><a href="/materialy">Materiały</a></li>

<li><a href="/kontakt">Kontakt</a></li>


</ul>
</nav>
</div>
<nav>
<ul id="right-menu">
<li><a href="/plan_lekcji">Plan lekcji</a>
<ul><li><a href="/zjazdy">Zjazdy</a></li></ul>
</li>
</ul>
</nav>
</div> <!--menu-->
</div>


<div id="header-img"><? header_img(); ?></div>
<div id="bread-crumb"><span><? echo breadcrumbs(); ?></span></div> 