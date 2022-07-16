<?php
    require("../template/header.html");
?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Login</h3>
                    <div class="text-center mb-5 text-dark HindGuntur">Entre para começar</div>
                    <div class="card my-5">

                        <form class="card-body p-lg-5" action="../src/geral_valida_login.php" method="post">

                            <div class="text-center">
                                <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                                width="200px" alt="profile">
                            </div>

                            <div class="text-center mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perfil" id="Coletor" value="0" checked>
                                    <label class="form-check-label Cabin" for="Coletor">Coletor</label>
                                </div>
        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perfil" id="Descartador" value="1">
                                    <label class="form-check-label Cabin" for="Descartador">Descartador</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                                placeholder="E-mail" name="email">
                            </div>

                            <div class="mb-5">
                                <input type="password" class="form-control" id="password" placeholder="Senha" name="senha">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-5 mb-5 w-100">Entrar</button>
                            </div>

                            <div id="emailHelp" class="form-text text-center mb-5 text-dark">

                                Não está cadastrado?

                                <a href="" class="text-dark fw-bold">
                                    <u>Crie uma conta</u>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    require("../template/footer.html");
?>