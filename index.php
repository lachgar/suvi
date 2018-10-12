<!DOCTYPE html>

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
                    <!-- Button trigger modal --><a href="public/user/">
                    <button type="button" id="clickModal" class="btn btn-success" data-toggle="modal" data-target="#myModal">Login</button></a>
                </form>
            </div>
        </nav>

        <!-- bootstrap JavaScript 4.0.0 -->
        <script  src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- My Script-->
        <script  src="js/myScript.js"></script>
    </body>
</html>
