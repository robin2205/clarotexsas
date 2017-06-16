<?php
  function conectarse()
  {
    if (!($link=mysqli_connect("localhost","root","qwe123*#")))
     {
        echo "Error conectando a la base de datos :X";
        exit();
     }
    if (!mysqli_select_db($link,"clarotexsas"))
     {
        echo "Error seleccionando la base de datos :O";
        exit();
     }
    mysqli_set_charset($link,'utf8');
    return $link;
  }
?>
