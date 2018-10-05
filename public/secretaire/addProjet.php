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
            .valider{background-color: aquamarine;width: 100px;}
        </style>
        <script type="application/javascript" src="../../js/jquery.js"></script>
    </head>
    <body>
            <table>
                <tr><td>Id:</td><td><input type="text" id="id" name="id"><td>Intitule:</td><td><input type="text" id="intitule" name="intitule"></td></tr>
                <tr><td>Description:</td><td><input type="text" id="desc" name="desc"></td><td>Date Debut:</td><td><input type="date" id="dated" name="dated"></tr>
                <tr><td>Date Fin:</td><td><input type="date" id="datef" name="datef"><td>Etat:</td><td><select  id="etat" name="etat"><option value="1">En Cours</option><option value="0">Fermer</option></select></td></tr>
                <tr><td>Montant:</td><td><input type="text" id="montant" name="montant"></td><td>Organisme:</td><td><select id="organisme" name="organisme">
                            <?php foreach ($org as $or) { ?>
                                <option value="<?= $or['id'] ?>"><?= $or['nom'] ?></option>
                           <?php } ?>
                        </select></td></tr>
                <tr><td>Chef:</td><td><select id="chef" name="chef">
                            <option value="4">Abderahman</option>
                            <option value="3">Mustafa</option>
                        </select></td></tr>
                <tr><td></td><td> <input type="submit" id="valider" class="valider" value="Submit"></td></tr>
            </table>
        
        <br><br><br><br>
        <div style="width:1000px">
            
            <table id="tableData" style="width:100%;margin-left: 140px">
                <tr>
                    <th>Id</th><th>Intitule</th><th>Description</th><th>Date Debut</th><th>Date Fin</th><th>Etat</th><th>Montant</th><th>Organisme</th><th>Chef</th><th>Modifier</th><th>Supprimer</th>
                </tr>
                <?php foreach ($pro as $pr){ ?>
                <tr>
                    <td><?= $pr['id']?></td>
                    <td><?= $pr['intitule']?></td>
                    <td><?= $pr['description']?></td>
                    <td><?= $pr['datedebut']?></td>
                    <td><?= $pr['datefin']?></td>
                    <td><?= $pr['etat']?></td>
                    <td><?= $pr['montant']?></td>
                    <td><?= $pr['nomo']?></td>
                    <td><?= $pr['nomu'].' '.$pr['prenomu']?></td>
                    <td><input type="Button" id="update" onclick="update(<?= $pr['id']?>)" value="update" ></td>
                    <td><input type="Button" id="delete" onclick="deletee(<?= $pr['id']?>)" value="delete"></td>
                </tr>
                <?php } ?>
            </table>
        </div> 
    </body>
    <script type="application/javascript">
        var valider = $("#valider");  
        valider.on('click', function(){
            var id = $('#id').val();
            var intitule = $('#intitule').val();
            var desc = $('#desc').val();
            var dated = $('#dated').val();
            var datef = $('#datef').val();
            var etat = $('#etat').val();
            var montant = $('#montant').val();
            var org = $('#organisme').val();
            var chef = $('#chef').val();
            var table = $('#tableData');
            $.ajax({
                url : 'api/ajouterProjet.php',
                type : 'POST',
                dataType : 'json',
                data : {'intitule' : intitule,'description' : desc,'datedebut' : dated,'datefin' : datef,'montant' : montant,'etat' : etat,'chef' : chef,'idorganisme' : org},
                success : function (data) {
                    var projet =""; 
                    console.log(data);
                    projet +='<tr><th>Id</th><th>Intitule</th><th>Description</th><th>Date Debut</th><th>Date Fin</th><th>Etat</th><th>Montant</th><th>Organisme</th><th>Chef</th><th>Modifier</th><th>Supprimer</th></tr>'    
                    for(var i=0;i<data.length;i++) {
                    projet +='<tr><td>'+data[i].id+'</td><td>'+data[i].intitule+'</td><td>'+data[i].description+'</td><td>'+data[i].datedebut+'</td><td>'+data[i].datefin+'</td><td>'+data[i].etat+'</td><td>'+data[i].montant+'</td><td>'+data[i].nomo+'</td><td>'+data[i].nomu+' '+data.prenomu+'</td>'
                    projet +='<td><input type="Button" id="update" onclick="f1('+data[i].id+')" value="update" ></td><td><input type="Button" id="delete" value="delete"></td></tr>'
                    }
                    table.empty();
                    table.html(projet);
                }
            });
        });
        
        function update(idd){}
        function deletee(id){alert(""+id);}
    </script>
</html>

