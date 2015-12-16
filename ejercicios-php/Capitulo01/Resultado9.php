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
            $pesetas =  $_GET['pesetas']; 
            $euros = $pesetas / 166.386;    
            echo "$pesetas Ptas son $euros €";
        ?>
    </body>
</html>
