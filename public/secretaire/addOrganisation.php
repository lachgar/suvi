<?php
chdir('..');
chdir('..');
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
            tr:nth-child(2n+1) {background-color: #dddddd;}
            .valider{background-color: aquamarine;width: 100px;}
        </style>
        <script type="application/javascript" src="../../js/jquery.js"></script>
        <script type="application/javascript">
            $.ajax({
            url : 'api/fetchOrganisation.php',
            type : 'POST',
            dataType : 'json',
            success : function (data) {
            var organisme =""; 
            console.log(data);
            organisme +='<tr><th>Firstname</th><th>Lastname</th><th>Age</th><th>Firstname</th><th>Lastname</th><th>Age</th><th>Lastname</th><th>Age</th><th>update</th><th>delete</th></tr>'    
            for(var i=0;i<data.length;i++) {
            organisme +='<tr><td>'+data[i].id+'</td><td>'+data[i].nom+'</td><td>'+data[i].tel+'</td><td>'+data[i].fax+'</td><td>'+data[i].mail+'</td><td>'+data[i].site+'</td><td>'+data[i].contact+'</td><td>'+data[i].adresse+'</td>'
            organisme +='<td><input type="Button" id="update" onclick="f1('+data[i].id+')" value="update" ></td><td><input type="Button" id="delete" value="delete"></td></tr>'
            }
            table.empty();
            table.html(organisme);
            },
            error : function(error){
            console.log(error);
            } 
            });
        </script>
    </head>
    <body>
        <table>
            <tr><td>Id:</td><td><input type="text" id="id" name="id"><td>Nom:</td><td><input type="text" id="nom" name="nom"></td></tr>
            <tr><td>Tel:</td><td><input type="text" id="tel" name="tel"></td><td>Fax:</td><td><input type="text" id="fax" name="faax"></tr>
            <tr><td>Mail:</td><td><input type="text" id="mail" name="mail"><td>Site:</td><td><input type="text" id="site" name="site"></td></tr>
            <tr><td>Contact:</td><td><input type="text" id="contact" name="contact"></td><td>Adresse:</td><td><input type="text" id="adresse" name="adresse"></tr>
            <tr><td></td><td> <input type="submit" id="valider" class="valider" value="Submit"></td></tr>
        </table>

        <br><br><br><br>
        <div style="width:800px">

            <table id="table" style="width:100%;margin-left: 180px">

            </table>
        </div> 
    </body>
    <script type="application/javascript">

        var up = $("#update");
        var valider = $("#valider");
        var table = $("#table");

        valider.on('click', function(){
        var nom = $("#nom").val();
        var tel = $("#tel").val();
        var id = $("#id").val();
        var fax = $("#fax").val();
        var mail = $("#mail").val();
        var site = $("#site").val();
        var contact = $("#contact").val();
        var adresse = $("#adresse").val();

        //alert(id);
        $.ajax({
        url : 'api/ajouterOrg.php',
        type : 'POST',
        dataType : 'json',
        data : {'id': parseInt(id),'nom' : nom,'tel' : tel,'fax' : fax,'mail' : mail,'site' : site,'contact' : contact,'adresse' : adresse},
        //                processData: false,
        //                contentType: false,
        //                cache : false,
        success : function (data) {
            var organisme =""; 
            console.log(data);
            organisme +='<tr><th>Firstname</th><th>Lastname</th><th>Age</th><th>Firstname</th><th>Lastname</th><th>Age</th><th>Lastname</th><th>Age</th><th>update</th><th>delete</th></tr>'    
            for(var i=0;i<data.length;i++) {
            organisme +='<tr><td>'+data[i].id+'</td><td>'+data[i].nom+'</td><td>'+data[i].tel+'</td><td>'+data[i].fax+'</td><td>'+data[i].mail+'</td><td>'+data[i].site+'</td><td>'+data[i].contact+'</td><td>'+data[i].adresse+'</td>'
            organisme +='<td><input type="Button" id="update" onclick="f1('+data[i].id+')" value="update" ></td><td><input type="Button" id="delete" value="delete"></td></tr>'
            }
            table.empty();
            table.html(organisme);
        }
        });
        });

        function f1(id){alert(""+id);}

    </script>
</html>

