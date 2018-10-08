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
        <!-- bootstrap Css 4.0.0 -->
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- bootstrap JavaScript 4.0.0 -->
        <script  src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- My Script-->
        <script  src="js/myScript.js"></script>
        <!-- jquery -->
        <script  src="js/jquery.js"></script>        
        <script>
            $(document).ready(function () {
                $("#loginn").click(function (event) {
                    event.preventDefault();
                    $.post({
                        url : 'AuthentificationUser.php',
                        data : {
                                login: $("#login").val(),
                                password: $("#password").val()
                            },

                        success : function (res) {
                            console.log("affichage : "+res);
                            $('#msgerreursignup').html(res);
                            
                        },
                        error: function(e) {
                              console.log("error : "+e.message);
                        }
                    });
                });
                
            });
        </script>
    </head>
    <body>
        <?php
//        include_once 'service/ProfilService.php';
//        
//        $os = new ProfilService();
//      
//        
//        $o = $os->findById(1);
//      
//         $o[0]['code'] = "AA";
//         $o[0]['libelle'] = "AA2";
//        
//        $os->update($o);
//        echo 'ok';
        ?>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Suivi Projet</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <!-- Button trigger modal -->
                    <button type="button" id="clickModal" class="btn btn-success" data-toggle="modal" data-target="#myModal">Login</button>
                </form>
            </div>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Authentification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="formlogin" action="AuthentificationUser.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="login" name="login" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Entrer email">
                            </div>
                            <div class="form-group">
                                <label for="Password">Mot de passe</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
                            </div>

                            <div id="msgerreursignup"> </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="loginn" id="loginn" class="btn btn-success">Connexion</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <!-- bootstrap JavaScript 4.0.0 -->
        <script  src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- My Script-->
        <script  src="js/myScript.js"></script>
    </body>
</html>
