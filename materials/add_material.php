<?
is_admin();
include "tinymce/tinymce.php";
if (isset($_POST['wyslij'])) {
my_sql($empty, "add_mat");
header("Location: /materialy");
}
else
{
echo "
<div class=article-full-box>
<form method=post>
<div class=article-full-header><input type=text name=header value=Naglówek  autocomplete=off maxlength=129 /></div>

<div class=material-options>

<span>Szkoła</span><select name='school'>
<option>wybierz</option>
<option value='Liceum ogólnokształcące'>Liceum ogólnokształcące</option>
<option value='Technikum'>Technikum</option>
<option value='Technikum'>Technikum uzupełniające</option>
<option value='Studium policealne'>Studium policealne</option>
<option value='Kursy eksternistyczne'>Kursy eksternistyczne</option>
<option value='Kursy kwalfikacyjne'>Kursy kwalfikacyjne</option></select>

Semestr<select name='sem'>
<option>wybierz</option>
<option value='I'>I</option>
<option value='II'>II</option>
<option value='III'>III</option>
<option value='IV'>IV</option>
<option value='V'>V</option>
<option value='VI'>VI</option>
<option value='VII'>VII</option>
<option value='VIII'>VIII</option></select>

<span>Przedmiot</span><select name='item'>
<option>wybierz</option>
<option value='Język Polski'>Język Polski</option>
<option value='Język Angielski'>Język Angielski</option>
<option value='Język Rosyjski'>Język Rosyjski</option>
<option value='Matematyka'>Matematyka</option>
<option value='Fizyka'>Fizyka</option>
<option value='Chemia'>Chemia</option>
<option value='Biologia'>Biologia</option>
<option value='Geografia'>Geografia</option>
<option value='Historia'>Historia</option></select>
</div>


<textarea class=text-area name=content></textarea>
<div class=article-full-footer><input type=submit name=wyslij value=zapisz></div>

</form></div>";
}
?>