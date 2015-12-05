<section id="packages">

    <!-- carousel and ads -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- place for ad -->
            </div>

            <!-- carousel -->
            <div class="col-md-6">
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
                            <img class="img img-responsive" src="<?php echo "$DOMAIN/img/img_carsouel/himchuli.jpg"; ?>">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="<?php echo "$DOMAIN/img/img_carsouel/mountain.jpg"; ?>">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="<?php echo "$DOMAIN/img/img_carsouel/river.jpg"; ?>">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="<?php echo "$DOMAIN/img/img_carsouel/terai.jpg"; ?>">
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
            </div><!-- carousel -->
            
            <div class="col-md-3">
                <!-- place for ad -->
            </div>
        </div><!-- row -->
    </div><!-- container -->

    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Packages <a class="btn btn-default pull-right" href="?add_package">Add Package</a> </h1>
            </div>
        </div>
    </header>

    <!-- page body -->
    <div class="container">
        <div class="row">
            <?php foreach ($packages as $p): ?>

                <div class="col-md-4">
                    <a href="#" data-toggle="modal" data-target="#Modal-<?php htmlout($p['PId']); ?>">
                    <div class="thumbnail">
                        <div class="p-img">
                            <img src="<?php htmlout($p['PImage']); ?>" class="img img-responsive">
                        </div>
                        <div class="p-info">
                            <h3><a href="#" data-toggle="modal" data-target="#Modal-<?php htmlout($p['PId']); ?>"><?php htmlout($p['PName']); ?></a></h3>
                            <p>NRs. <?php htmlout($p['PCost']); ?> <a href="book.php?pid=<?php htmlout($p['PId']); ?>" class="btn btn-primary btn-sm pull-right">BOOK NOW!</a></p>
                        </div>
                    </div>
                    </a>

                    <!-- Modal -->
                    <div id="Modal-<?php htmlout($p['PId']); ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php htmlout($p['PName']); ?> <small>by <a href="<?php htmlout($p['CWebsite']); ?>"><?php htmlout($p['CName']); ?></a></small></h4>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Overview:</strong><br> <?php echo nl2br($p['POverview']); ?></p>
                                    <p><strong>Main destination:</strong> <?php htmlout($p['PPlace']); ?></p>
                                    <p><strong>Duration:</strong> <?php htmlout($p['PDuration']); ?> day(s)</p>
                                    <p><strong>Itinerary:</strong><br> <?php echo nl2br($p['PItinerary']) ?></p>
                                    <p><strong>Best seasons:</strong> <?php htmlout($p['PSeason']); ?></p>
                                    <p><strong>Cost:</strong> NRs. <?php htmlout($p['PCost']); ?></p>
                                    <p><strong>Cost includes:</strong><br> <?php echo nl2br($p['PCostInclusion']); ?></p>
                                    <p><strong>Cost excludes:</strong><br> <?php echo nl2br($p['PCostExclusion']); ?></p>
                                    <p><strong>Extra details:</strong><br><?php echo nl2br($p['PDetail']) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="book.php?pid=<?php htmlout($p['PId']); ?>" class="btn btn-primary btn-sm pull-right">BOOK NOW!</a>
                                </div>
                            </div><!-- modal-content -->

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->
</section>