<?php
    require("geral_header_main.php");

    if(!isset($_SESSION["usuario_logado"])){
        header("Location: ../public/login.php");
        die();
    }
?>
            <ul class="nav system-status Roboto-LightItalic justify-content-center mb-5">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Página Principal /</a>
                </li>
            </ul>
<?php
    if(isset($_GET["flag"])){
        if ($_GET["flag"] == 0) {
            echo'
                <div class="text-success mt-2 mb-3 Roboto-Medium text-center">Alteração realizada com sucesso!</div>            
            ';
        }
    }
    
    require("../template/footer.html");
?>