<link rel="stylesheet" href="/lightbox/dist/css/lightbox.min.css" property="stylesheet" />

<?php
$res = my_sql('galeria', "load_site");
while($row = mysql_fetch_array($res))
echo "$row[0]
<a href='/edit_page=galeria'>Edytuj</a>";
?>


<!--tu walnąć pętle do wyświetlania wyników z mysql-->
<a class="example-image-link" href="/img/galerie/obrazek2.jpg" data-lightbox="seria-album">
<img class="example-image" src="/images/obrazek2.jpg" alt=""/></a>

<a class="example-image-link" href="/img/galerie/obrazek3.jpg" data-lightbox="seria-album">
<img class="example-image" src="/img/galerie/obrazek3.jpg" alt="" /></a>
      
<a class="example-image-link" href="/img/galerie/obrazek4.jpg" data-lightbox="seria-album">
<img class="example-image" src="/img/galerie/obrazek4.jpg" alt="" /></a>
      
<a class="example-image-link" href="/img/galerie/obrazek5.jpg" data-lightbox="seria-album">
<img class="example-image" src="/img/galerie/obrazek5.jpg" alt="" /></a>
<!--koniec pęlti-->


<script src="/lightbox/dist/js/lightbox-plus-jquery.min.js"></script>

