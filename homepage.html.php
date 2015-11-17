<section id="packages">
    <header>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h1>Packages</h1>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-default pull-right" href="?add_package">Add Package</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--Carousel-->
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="http://placehold.it/400x200" alt="Chania">
            </div>

            <div class="item">
              <img src="http://placehold.it/400x200" alt="Chania">
            </div>

            <div class="item">
              <img src="http://placehold.it/400x200" alt="Flower">
            </div>

            <div class="item">
              <img src="http://placehold.it/400x200" alt="Flower">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

    <br>
    <br>



    <div class="container">
        <div class="row">
            <?php foreach ($packages as $package): ?>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="package-img">
                            <img src="<?php htmlout($package['Image']); ?>" class="img img-responsive">
                        </div>
                        <div class="package-info">
                            <h3><?php htmlout($package['PackageName']); ?></h3>
                            <p>Company: <?php htmlout($package['CompanyName']); ?></p>
                            <p><?php echo $package['Description']; ?></p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php htmlout($package['PackageId']); ?>">Details</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="Modal-<?php htmlout($package['PackageId']); ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php htmlout($package['PackageName']); ?></h4>
                                </div>
                                <div class="modal-body">
                                    <p><?php htmlout($package['Detail']); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>