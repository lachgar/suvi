<?php
chdir('..');chdir('..');
include_once 'service/OrganismeService.php';

$os = new OrganismeService();
?>

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
        <style>
            table {font-family: arial, sans-serif;border-collapse: collapse;width: 100%;}
            td, th {border: 1px solid #dddddd;text-align: left;padding: 8px;}
            tr:nth-child(even) {background-color: #dddddd;}
            .valider{background-color: aquamarine;width: 100px;}
        </style>
        <script src="jquery.js"></script>
    </head>
    <body>
        
        <form action="" method="GET">
            <table>
                <tr><td>Id:</td><td><input type="text" name="firstname"><td>Nom:</td><td><input type="text" name="lastname"></td></tr>
                <tr><td>Tel:</td><td><input type="text" name="lastname"></td><td>Fax:</td><td><input type="text" name="lastname"></tr>
                <tr><td>Mail:</td><td><input type="text" name="firstname"><td>Site:</td><td><input type="text" name="lastname"></td></tr>
                <tr><td>Contact:</td><td><input type="text" name="lastname"></td><td>Adresse:</td><td><input type="text" name="lastname"></tr>
                <tr><td></td><td> <input type="submit" class="valider" value="Submit"></td></tr>
            </table>
           
        </form>
        
        
        <br><br><br><br>
        <div style="width:800px">
        <table style="width:100%;margin-left: 180px">
            <tr>
              <th>Firstname</th>
              <th>Lastname</th> 
              <th>Age</th>
              <th>Firstname</th>
              <th>Lastname</th> 
              <th>Age</th>
              <th>Lastname</th> 
              <th>Age</th>
              <th>update</th> 
              <th>delete</th>
            </tr>
            <?php 
                foreach ($os->findAll() as $l) {
            ?>
            <tr>
              <td><?= $l['id'] ?></td>
              <td><?= $l['nom'] ?></td> 
              <td><?= $l['tel'] ?></td>
              <td><?= $l['fax'] ?></td>
              <td><?= $l['mail'] ?></td> 
              <td><?= $l['site'] ?></td>
              <td><?= $l['contact'] ?></td>
              <td><?= $l['adresse'] ?></td> 
              <td><input type="Button" id="update" value="update" ></td>
              <td><input type="Button" id="delete" value="delete" ></td> 
            </tr>
                        
            <?php } ?>
            
      </table>
        </div> 
    </body>
    <script>
       var up = $("#update");
       up.on('click', function(){
           alert('ok');
       });
    </script>
</html>

