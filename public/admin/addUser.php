<?php
chdir('..');
chdir('..');
include_once 'service/UserService.php';

$us = new UserService();
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
            url : 'api/fetchUser.php',
            type : 'POST',
            dataType : 'json',
            success : function (data) {
            var user =""; 
            console.log(data);
            user +='<tr><th>Nom</th><th>Prenom</th><th>date de naissance</th><th>Firstname</th><th>Lastname</th><th>Age</th><th>Lastname</th><th>update</th><th>delete</th></tr>'    
            for(var i=0;i<data.length;i++) {
            user +='<tr><td>'+data[i].id+'</td><td>'+data[i].nom+'</td><td>'+data[i].prenom+'</td><td>'+data[i].date+'</td><td>'+data[i].email+'</td><td>'+data[i].tel+'</td><td>'+data[i].idprofil+'</td>'
            user +='<td><input type="Button" id="update" onclick="f1('+data[i].id+')" value="update" ></td><td><input type="Button" id="delete" value="delete"></td></tr>'
            }
            table.empty();
            table.html(user);
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
            <tr><td>Prenom:</td><td><input type="text" id="prenom" name="prenom"></td><td>Date:</td><td><input type="text" id="date" name="date"></tr>
            <tr><td>Email:</td><td><input type="text" id="email" name="email"><td>Tel:</td><td><input type="text" id="tel" name="tel"></td></tr>
            <tr><td>Id profil:</td>
            <td><select name="idprofil" >
                                <?php
                                include_once '../../beans/Profil.php';
                    $db=  mysqli_connect('localhost','root','', 'suivi');
                    $query=mysqli_query($db, "select * from profil");
                     while ($row = mysqli_fetch_array($query)) { 
                            
                     
                  ?>
                                <option value="<?php echo $row['idprofil'];?>"><?php echo $row['libelle'];?></option>
                    <?php
                    }
                    ?>
                                
            </select></td><</tr>
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
        var prenom = $("#prenom").val();
        var email = $("#email").val();
        var idprofil = $("#idprofil").val();
        var date = $("#date").val();

        //alert(id);
        $.ajax({
        url : 'api/ajouterUser.php',
        type : 'POST',
        dataType : 'json',
        data : {'id': parseInt(id),'nom' : nom,'prenom' : prenom,'date' : date,'email' : email,'tel' : tel,'idprofil' : idprofil},
      
        success : function (data) {
            var user =""; 
            console.log(data);
            user +='<tr><th>Nom</th><th>Prenom</th><th>date de naissance</th><th>Firstname</th><th>Lastname</th><th>Age</th><th>Lastname</th><th>update</th><th>delete</th></tr>'
            for(var i=0;i<data.length;i++) {
            user +='<tr><td>'+data[i].id+'</td><td>'+data[i].nom+'</td><td>'+data[i].prenom+'</td><td>'+data[i].date+'</td><td>'+data[i].email+'</td><td>'+data[i].tel+'</td><td>'+data[i].idprofil+'</td>'
            user +='<td><input type="Button" id="update" onclick="f1('+data[i].id+')" value="update" ></td><td><input type="Button" id="delete" value="delete"></td></tr>'
             }
            table.empty();
            table.html(user);
        }
        });
        });

        function f1(id){alert(""+id);}

    </script>
</html>

