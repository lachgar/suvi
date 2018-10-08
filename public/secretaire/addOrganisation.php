<?php
chdir('..');chdir('..');
include_once 'service/OrganismeService.php';

$os = new OrganismeService();
$org = $os->findAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table {font-family: arial, sans-serif;border-collapse: collapse;width: 100%;}
            td, th {border: 1px solid #dddddd;text-align: left;padding: 8px;}
            tr:nth-child(2n+1) {background-color: #dddddd;}
            .valider{background-color: aquamarine;width: 140px;height: 40px;text-height: 24px;}
        </style>
        <script type="application/javascript" src="../../js/jquery.js"></script>
    </head>
    <body>
        <br>
        <div style="width:800px;margin: auto">
        <table>
            <tr><td>Nom:</td><td><input type="text" id="nom" name="nom"></td><td>Tel:</td><td><input type="text" id="tel" name="tel"></td></tr>
            <tr><td>Fax:</td><td><input type="text" id="fax" name="faax"></td><td>Mail:</td><td><input type="text" id="mail" name="mail"></td></tr>
            <tr><td>Site:</td><td><input type="text" id="site" name="site"></td><td>Contact:</td><td><input type="text" id="contact" name="contact"></td></tr>
            <tr><td>Adresse:</td><td><input type="text" id="adresse" name="adresse"></tr>
            <tr><td></td><td> <input type="submit" id="valider" class="valider" value="Submit"></td></tr>
        </table>
        </div>
        <br><hr><br>
        <div style="width:1000px;margin: auto">

            <table id="table" style="width:100%;">
                <tr><th>Nom</th><th>Tel</th><th>Fax</th><th>Mail</th><th>Site</th><th>Contact</th><th>Adresse</th><th>Modifier</th><th>Supprimer</th></tr>
                <?php foreach ($org as $or){ ?>
                <tr>
                    <td><?= $or['nom'] ?></td>
                    <td><?= $or['tel'] ?></td>
                    <td><?= $or['fax'] ?></td>
                    <td><?= $or['mail'] ?></td>
                    <td><?= $or['site'] ?></td>
                    <td><?= $or['contact'] ?></td>
                    <td><?= $or['adresse'] ?></td>
                    <td><input type="Button" id="update" onclick="updateOrg(<?= $or['id'] ?>)" value="update" ></td>
                    <td><input type="Button" onclick="deleteOrg(<?= $or['id'] ?>)" id="deletee" value="delete"></td>
                </tr>
                <?php } ?>
            </table>
        </div> 
        <br>
    </body>
    <script type="application/javascript">
        var table = $("#table");
        var valider = $("#valider");
        valider.on('click', function(){
            var nom = $("#nom").val();var tel = $("#tel").val();var fax = $("#fax").val();
            var mail = $("#mail").val();var site = $("#site").val();var contact = $("#contact").val();var adresse = $("#adresse").val();
            $.ajax({
                url : 'api/ajouterOrg.php',
                type : 'POST',
                dataType : 'json',
                data : {'nom' : nom,'tel' : tel,'fax' : fax,'mail' : mail,'site' : site,'contact' : contact,'adresse' : adresse},
                success : function (data) {
                    var organisme =""; 
                    console.log(data);
                    organisme +='<tr><th>Nom</th><th>Tel</th><th>Fax</th><th>Mail</th><th>Site</th><th>Contact</th><th>Adresse</th><th>Modifier</th><th>Supprimer</th></tr>'    
                    for(var i=0;i<data.length;i++) {
                    organisme +='<tr><td>'+data[i].nom+'</td><td>'+data[i].tel+'</td><td>'+data[i].fax+'</td><td>'+data[i].mail+'</td><td>'+data[i].site+'</td><td>'+data[i].contact+'</td><td>'+data[i].adresse+'</td>'
                    organisme +='<td><input type="Button" id="update" onclick="updateOrg('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="deleteOrg('+data[i].id+')" id="deletee" value="delete"></td></tr>'
                    }
                    table.empty();
                    table.html(organisme);
                }
            });
        });
        
        function updateOrg(idu){
            var nom = $("#nom").val();var tel = $("#tel").val();var fax = $("#fax").val();var mail = $("#mail").val();
            var site = $("#site").val();var contact = $("#contact").val();var adresse = $("#adresse").val();
            $.ajax({
                url : 'api/updateOrganisme.php',
                type : 'POST',
                dataType : 'json',
                data : {'id': parseInt(idu),'nom' : nom,'tel' : tel,'fax' : fax,'mail' : mail,'site' : site,'contact' : contact,'adresse' : adresse},
                success : function (data) {
                    var organisme =""; 
                    console.log(data);
                    organisme +='<tr><th>Nom</th><th>Tel</th><th>Fax</th><th>Mail</th><th>Site</th><th>Contact</th><th>Adresse</th><th>Modifier</th><th>Supprimer</th></tr>'    
                    for(var i=0;i<data.length;i++) {
                    organisme +='<tr><td>'+data[i].nom+'</td><td>'+data[i].tel+'</td><td>'+data[i].fax+'</td><td>'+data[i].mail+'</td><td>'+data[i].site+'</td><td>'+data[i].contact+'</td><td>'+data[i].adresse+'</td>'
                    organisme +='<td><input type="Button" id="update" onclick="updateOrg('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="deleteOrg('+data[i].id+')" id="deletee" value="delete"></td></tr>'
                    }
                    table.empty();
                    table.html(organisme);
                }
            });
           
        }
        function deleteOrg(idd){
            $.ajax({
                url : 'api/deleteOrganisme.php',
                type : 'POST',
                dataType : 'json',
                data : {'id': parseInt(idd)},
                success : function (data) {
                    var organisme =""; 
                    console.log(data);
                    organisme +='<tr><th>Nom</th><th>Tel</th><th>Fax</th><th>Mail</th><th>Site</th><th>Contact</th><th>Adresse</th><th>Modifier</th><th>Supprimer</th></tr>'    
                    for(var i=0;i<data.length;i++) {
                    organisme +='<tr><td>'+data[i].nom+'</td><td>'+data[i].tel+'</td><td>'+data[i].fax+'</td><td>'+data[i].mail+'</td><td>'+data[i].site+'</td><td>'+data[i].contact+'</td><td>'+data[i].adresse+'</td>'
                    organisme +='<td><input type="Button" id="update" onclick="updateOrg('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="deleteOrg('+data[i].id+')" id="deletee" value="delete"></td></tr>'
                    }
                    table.empty();
                    table.html(organisme);
                }
            });
        }
        
    </script>
</html>

