<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            profil +='<tr><th>CODE</th><th>LIBELLE</th><th>update</th><th>delete</th></tr>'    
            for(var i=0;i<data.length;i++) {
            profil +='<tr id="tab'+data[i].id+'"><td data-target="code">'+data[i].code+'</td><td data-target="libelle">'+data[i].libelle+'</td>'
            profil +='<td><input type="Button" id="update" onclick="f_update('+data[i].id+')" data-toggle="modal" data-target="#myModal" value="update" ></td><td><input type="Button" onclick="delete_user('+data[i].id+')" id="delete" value="delete"></td></tr>'
            }
            table.empty();
            table.html(profil);
            },
            error : function(error){
            console.log(error);
            } 
            });




        </script>
    </head>
    <body>
        <table>
            <tr><td>Code:</td><td><input type="text" id="code" name="code"></td></tr>
            <tr><td>Libelle:</td><td><input type="text" id="libelle" name="libelle"></td></tr>
            <tr><td> <input type="submit" id="valider" class="valider" value="Submit"></td></tr>
        </table>

        <br><br><br><br>
        <div style="width:800px">

            <table id="table" style="width:100%;margin-left: 180px">

            </table>
        </div> 

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align:center">Update profil</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>CODE</label>
                            <input type="text" id="inp_code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LIBELLE</label>
                            <input type="text" id="inp_libelle" class="form-control">
                        </div>
                        <input type="hidden" id="inp_id" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
                        <button type="button" id="cancel" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </body>
    <script type="application/javascript">


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
        data : {'id': 0,'code' : code,'libelle' : libelle},
        success : function (data) {
        var profil =""; 
        console.log(data);
        profil +='<tr><th>CODE</th><th>LIBELLE</th><th>update</th><th>delete</th></tr>'    
        for(var i=0;i<data.length;i++) {
        profil +='<tr id="tab'+data[i].id+'"><td data-target="code">'+data[i].code+'</td><td data-target="libelle">'+data[i].libelle+'</td>'
        profil +='<td><input type="Button" id="update" onclick="f_update('+data[i].id+')" data-toggle="modal" data-target="#myModal" value="update" ></td><td><input type="Button" onclick="delete_user('+data[i].id+')" id="delete" value="delete"></td></tr>'
        }
        table.empty();
        table.html(profil);
        }
        });
        });


        //delete function

        function delete_user(id){
        var con = confirm("Voulez-vous vraiment le supprimer ?");
        var table = $("#table");

        if(con){
        $.ajax({
        url      : 'deleteProfile.php',
        method   : 'POST', 
        data     : {id: id},
        success  : function(data){
        var profil =""; 
        console.log(data);
        profil +='<tr><th>CODE</th><th>LIBELLE</th><th>update</th><th>delete</th></tr>'    
        for(var i=0;i<data.length;i++) {
        profil +='<tr id="tab'+data[i].id+'"><td data-target="code">'+data[i].code+'</td><td data-target="libelle">'+data[i].libelle+'</td>'
        profil +='<td><input type="Button" id="update" onclick="f_update('+data[i].id+')" data-toggle="modal" data-target="#myModal" value="update" ></td><td><input type="Button" onclick="delete_user('+data[i].id+')" id="delete" value="delete"></td></tr>'
        }
        table.empty();
        table.html(profil);

        }
        });        
        }
        }


        //update (move fields to modal inputs)

        function f_update(f_id){
        var id  = f_id;
        var code  = $('#tab'+id).children('td[data-target=code]').text();
        var libelle  = $('#tab'+id).children('td[data-target=libelle]').text();

        $('#inp_code').val(code);
        $('#inp_libelle').val(libelle);
        $('#inp_id').val(id);

        // console.log(id + "et "+code);
        }

        //update ajax inside the modal 

        $('#save').click(function(){
        var id  = $('#inp_id').val(); 
        var code =  $('#inp_code').val();
        var libelle =  $('#inp_libelle').val();


        $.ajax({
        url      : 'updateProfil.php',
        method   : 'post', 
        data     : {code : code , libelle: libelle , id: id},
        success  : function(response){

        $('#tab'+id).children('td[data-target=code]').text(code);
        $('#tab'+id).children('td[data-target=libelle]').text(libelle);
        $('#cancel').click();

        }
        });
        });


    </script>
</html>
