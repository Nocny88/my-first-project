<?php
echo "
<script src='tinymce/tinymce.min.js'></script>
<script type='text/javascript'>
tinymce.init({
    selector: '.text-area',
    skin: 'zoacznelo',
    menubar: false,
    statusbar: false,
    target_list: false,
    link_title: false,
    force_p_newlines : false,
    image_description: false,
    plugins: 'textcolor link hr image preview searchreplace table imagetools preview paste',
    paste_as_text: true,
    image_class_list: [
    {title: 'wybierz', value: ''},
    {title: 'po lewej', value: 'float-left'},
    {title: 'po prawej', value: 'float-right'},
    {title: 'tekst nie opływa', value: 'no-float'}],
    fullpage_default_font_family: 'Verdana, sans-serif',
    fullpage_default_font_size: '13px',
    fullpage_default_text_color: 'black',
    toolbar: ['fontsizeselect formatselect | bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify', 
    'undo redo | bullist numlist outdent indent | table | searchreplace link | blockquote hr image preview'],
    imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
    language: 'pl',
    language_url: '/tinymce/js/langs/pl.js',
    browser_spellcheck : true,
    link_list: '/tinymce/mylist.php',
    image_list: '/tinymce/imglist.php',
    table_appearance_options: false,
    table_advtab: false,
    table_cell_advtab: false,
    table_row_advtab: false,
    
    table_default_attributes: {
    cellPadding: '10',
    border: '1',
    borderColor: '#E3E3E3',
    rules: 'all',
    width: '100%',
    class: 'mytable'
    },
  
  });
</script>";
?>