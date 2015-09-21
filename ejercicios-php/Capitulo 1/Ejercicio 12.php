<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $relleno = "*";
        $base = 9; 
        for ($contador = 1; $contador <= $base; $contador++) {
            echo $relleno;
        }
        echo "<br>";
        echo "&nbsp" , $relleno , "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" , $relleno, "<br>"; 
        echo "&nbsp&nbsp&nbsp" , $relleno , "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" , $relleno, "<br>"; 
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp" , $relleno , "&nbsp&nbsp&nbsp&nbsp" , $relleno, "<br>"; 
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" , $relleno; 
        
      
        ?>
    </body>
</html>
