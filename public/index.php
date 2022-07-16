<?php
    require("../template/header.html");
?>
        <div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide w-100" src="../assets/images/carousel-items/first.jpg" alt="First slide" height="500">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1 class="Cabin_SemiBold">Título</h1>
                                <p class="HindGuntur">Parágrafo curto</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="second-slide w-100" src="../assets/images/carousel-items/second.jpg" alt="Second slide" height="500">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1 class="Cabin_SemiBold">Título</h1>
                                <p class="HindGuntur">Parágrafo curto</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="third-slide w-100" src="../assets/images/carousel-items/third.jpg" alt="Third slide" height="500">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1 class="Cabin_SemiBold">Título</h1>
                                <p class="HindGuntur">Parágrafo curto</p>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ml-5" aria-hidden="true"></span>
                    <span class="sr-only">Voltar</span>
                </a>

                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon mr-5" aria-hidden="true"></span>
                    <span class="sr-only">Avançar</span>
                </a>
            </div>

            <div class="container marketing mt-5 text-center">

                <div class="row">
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="../assets/images/features/unique.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2 class="Cabin">Título</h2>
                        <p class="HindGuntur">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    </div>
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="../assets/images/features/unique.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2 class="Cabin">Título</h2>
                        <p class="HindGuntur">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                    </div>
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="../assets/images/features/unique.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2 class="Cabin">Título</h2>
                        <p class="HindGuntur">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    </div>
                </div>
        
                <hr class="featurette-divider">
        
                <div class="row featurette">
                    <div class="col-md-7 mt-5">
                        <h2 class="featurette-heading Cabin">Título. <span class="text-success">Título. </span></h2>
                        <p class="lead HindGuntur">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="../assets/images/features/unique.jpg" alt="Generic placeholder image">
                    </div>
                </div>
        
                <hr class="featurette-divider">
        
                <div class="row featurette">
                    <div class="col-md-7 order-md-2 mt-5">
                        <h2 class="featurette-heading Cabin">Título. <span class="text-success">Título. </span></h2>
                        <p class="lead HindGuntur">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="featurette-image img-fluid mx-auto" src="../assets/images/features/unique.jpg" alt="Generic placeholder image">
                    </div>
                </div>
        
                <hr class="featurette-divider">
        
                <div class="row featurette">
                    <div class="col-md-7 mt-5">
                        <h2 class="featurette-heading Cabin">Título. <span class="text-success">Título. </span></h2>
                        <p class="lead HindGuntur">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="../assets/images/features/unique.jpg" alt="Generic placeholder image">
                    </div>
                </div>
        
                <hr class="featurette-divider">
            </div>
        </div>
<?php
    require("../template/footer.html");
?>