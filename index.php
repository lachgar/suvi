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
        include_once 'service/OrganismeService.php';
        $o = new OrganismeService();
        $o->create(new Organisme(0, "org1", "06782732", "0587292", "bana@gmail.com", "www.ofppt.com", "con1", "Casa"));
        ?>
    </body>
</html>
