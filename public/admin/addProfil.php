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
            url : 'fetchProfile.php',
            type : 'POST',
            dataType : 'json',
            success : function (data) {
            var profil =""; 
            console.log(data);
            profil +='<tr><th>ID</th><th>CODE</th><th>LIBELLE</th><th>update</th><th>delete</th></tr>'    
            for(var i=0;i<data.length;i++) {
            profil +='<tr><td>'+data[i].id+'</td><td>'+data[i].code+'</td><td>'+data[i].libelle+'</td>'
            profil +='<td><input type="Button" id="update" onclick="update_user('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="delete_user('+data[i].id+')" id="delete" value="delete"></td></tr>'
            }
            table.empty();
            table.html(profil);
            },
            error : function(error){
            console.log(error);
            } 
            });
            function delete_user(id){

            window.location = 'deleteProfile.php?id='+id;

            }



        </script>
    </head>
    <body>
        <table>
            <tr><td>Id:</td><td><input type="text" id="id" name="id"></tr>
            <tr><td>Code:</td><td><input type="text" id="code" name="code"></td></tr>
            <tr><td>Libelle:</td><td><input type="text" id="libelle" name="libelle"></td></tr>
            <tr><td> <input type="submit" id="valider" class="valider" value="Submit"></td></tr>
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
        var code = $("#code").val();
        var libelle = $("#libelle").val();


        //alert(id);
        $.ajax({
        url : 'ajouterProfil.php',
        type : 'POST',
        dataType : 'json',
        data : {'id': parseInt(id),'code' : code,'libelle' : libelle},
        //                processData: false,
        //                contentType: false,
        //                cache : false,
        success : function (data) {
        var profil =""; 
        console.log(data);
        profil +='<tr><th>ID/th><th>CODE</th><th>LIBELLE</th><th>update</th><th>delete</th></tr>'    
        for(var i=0;i<data.length;i++) {
        profil +='<tr><td>'+data[i].id+'</td><td>'+data[i].code+'</td><td>'+data[i].libelle+'</td>'
        profil +='<td><input type="Button" id="update" onclick="update_user('+data[i].id+')" value="update" ></td><td><input type="Button" onclick="delete_user('+data[i].id+')" id="delete" value="delete"></td></tr>'
        }
        table.empty();
        table.html(profil);
        }
        });
        });



    </script>
</html>
