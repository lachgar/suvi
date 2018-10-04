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
        $os = new OrganismeService();
        foreach ($os->findAll() as $l) {
            echo $l['nom'] . '<br>';
        }
        $o = $os->findById(2);
        $os->delete($o);
        echo 'ok';
        ?>
    </body>
</html>
