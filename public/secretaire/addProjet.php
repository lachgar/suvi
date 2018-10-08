<?php
chdir('..');chdir('..');
include_once 'service/ProjetService.php';
include_once 'service/OrganismeService.php';

$ps = new ProjetService();
$os = new OrganismeService();
$org = $os->findAll();
$pro = $ps->findProOrgChef();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table {font-family: arial, sans-serif;border-collapse: collapse;width: 100%;}
            td, th {border: 1px solid #dddddd;text-align: left;padding: 8px;}
            tr:nth-child(even) {background-color: #dddddd;}
            .valider{background-color: aquamarine;width: 140px;height: 40px;text-height: 24px;}
        </style>
        <script type="application/javascript" src="../../js/jquery.js"></script>
    </head>
    <body>
        <br>
        <div style="width:800px;margin: auto">
        <table >
                <tr><td>Intitule:</td><td><input type="text" id="intitule" name="intitule"></td><td>Etat:</td><td><select  id="etat" name="etat"><option value="1">En Cours</option><option value="0">Fermer</option></select></td></tr>
                <tr><td>Date Debut:</td><td><input type="date" id="dated" name="dated"></td><td>Date Fin:</td><td><input type="date" id="datef" name="datef"></td></tr>
                <tr><td>Description:</td><td><textarea type="text" id="desc" name="desc"></textarea></td><td>Organisme:</td><td><select id="organisme" name="organisme">
                            <?php foreach ($org as $or) { ?>
                                <option value="<?= $or['id'] ?>"><?= $or['nom'] ?></option>
                           <?php } ?>
                        </select></td></tr>
                <tr><td></td><td><input type="submit" id="valider" class="valider" value="Submit"></td></tr>
            </table>
        </div>
        <br><hr><br>
        <div style="width:1000px;margin: auto">
            <table id="table" style="width:100%">
                <tr>
                    <th>Intitule</th><th>Description</th><th>Date Debut</th><th>Date Fin</th><th>Etat</th><th>Montant</th><th>Organisme</th><th>Chef</th><th>Modifier</th><th>Supprimer</th>
                </tr>
                <?php 
                $etatt = "";
                foreach ($pro as $pr){ ?>
                <tr>
                    <td><?= $pr['intitule']?></td>
                    <td><?= $pr['description']?></td>
                    <td><?= $pr['datedebut']?></td>
                    <td><?= $pr['datefin']?></td>
                    <?php if($pr['etat'] == 0){ $etatt="En Cours";}else{ $etatt="Fermer";} ?>
                    <td><?= $etatt ?></td>
                    <td><?= $pr['montant']?></td>
                    <td><?= $pr['nomo']?></td>
                    <td><?= $pr['nomu'].' '.$pr['prenomu']?></td>
                    <td><input type="Button" id="update" onclick="updatePro(<?= $pr['id']?>)" value="update" ></td>
                    <td><input type="Button" id="delete" onclick="deletePro(<?= $pr['id']?>)" value="delete"></td>
                </tr>
                <?php } ?>
            </table>
        </div> 
        <br>
    </body>
    <script type="application/javascript">
        var table = $('#table');
        var valider = $("#valider");  
        var update = $("#update");
        //$('#update').attr("disabled",true);
        valider.on('click', function(){
            var intitule = $('#intitule').val();var desc = $('#desc').val();var dated = $('#dated').val();
            var datef = $('#datef').val();var etat = $('#etat').val();var org = $('#organisme').val();
            $.ajax({
                url : 'api/ajouterProjet.php',
                type : 'POST',
                dataType : 'json',
                data : {'intitule' : intitule,'description' : desc,'datedebut' : dated,'datefin' : datef,'etat' : etat,'idorganisme' : org},
                success : function (data) {
                    var projet =""; 
                    console.log(data);
                    projet +='<tr><th>Intitule</th><th>Description</th><th>Date Debut</th><th>Date Fin</th><th>Etat</th><th>Montant</th><th>Organisme</th><th>Chef</th><th>Modifier</th><th>Supprimer</th></tr>'    
                    for(var i=0;i<data.length;i++) {
                    var etatt = "";
                    if(data[i].etat == 0){etatt = "En Cours"}else{etatt = "Fermer"}
                    projet +='<tr><td>'+data[i].intitule+'</td><td>'+data[i].description+'</td><td>'+data[i].datedebut+'</td><td>'+data[i].datefin+'</td><td>'+etatt+'</td><td>'+data[i].montant+'</td><td>'+data[i].nomo+'</td><td>'+data[i].nomu+' '+data[i].prenomu+'</td>'
                    projet +='<td><input type="Button" id="update" onclick="updatePro('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="deletePro('+data[i].id+')" id="delete" value="delete"></td></tr>'
                    }
                    table.empty();
                    table.html(projet);
                }
            });
        });
        
        function updatePro(idu){}
        function deletePro(idd){
            $.ajax({
                url : 'api/deleteProjet.php',
                type : 'POST',
                dataType : 'json',
                data : {'id': parseInt(idd)},
                success : function (data) {
                    var projet =""; 
                    console.log(data);
                    projet +='<tr><th>Intitule</th><th>Description</th><th>Date Debut</th><th>Date Fin</th><th>Etat</th><th>Montant</th><th>Organisme</th><th>Chef</th><th>Modifier</th><th>Supprimer</th></tr>'    
                    for(var i=0;i<data.length;i++) {
                    var etatt = "";
                    if(data[i].etat == 0){etatt = "En Cours"}else{etatt = "Fermer"}
                    projet +='<tr><td>'+data[i].intitule+'</td><td>'+data[i].description+'</td><td>'+data[i].datedebut+'</td><td>'+data[i].datefin+'</td><td>'+etatt+'</td><td>'+data[i].montant+'</td><td>'+data[i].nomo+'</td><td>'+data[i].nomu+' '+data.prenomu+'</td>'
                    projet +='<td><input type="Button" id="update" onclick="updatePro('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="deletePro('+data[i].id+')" id="delete" value="delete"></td></tr>'
                    }
                    table.empty();
                    table.html(projet);
                }
            });
        }
    </script>
</html>

