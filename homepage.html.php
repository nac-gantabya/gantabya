<section id="packages">
<br>
    
    
    <div class="container">

    	

    	<div class="row">


    		<div class="col-md-3">
    		<!--Plce for add -->
    		</div>

    		<div class="col-md-6">
    			<!--Carousel-->
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
              <img class="img img-responsive" src="http://www.nepalgatewaytrekking.com/pagegallery/bigthumb/himchuli-peak-climbing22.jpg" height="400">
            </div>

            <div class="item">
              <img class="img-responsive" src="http://2.bp.blogspot.com/-eXf8y85d3kc/VU2_cEBwOQI/AAAAAAAAHfE/cYJ0czNqoQI/s400/4de11a7acd5d1b36cba9fa2c3dddbb4c-maya-devi-temple.jpg" height="400">
            </div>

            <div class="item">
              <img class="img-responsive" src="http://www.greatwallnepal.com/images/activities_rafting.jpg" height="400">
            </div>

            <div class="item">
              <img class="img-responsive" src="http://www.silverrobin.co.uk/wp-content/uploads/2015/09/1200cropped40-400x150.jpg" height="400">
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

    	<div class="col-md-3">
    		<!--Plce for add -->
    	</div>



    	</div>
        
    </div>

    
    
    <header>
        <div class="page-header">
            <div class="container">
             <hr>
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
    

    <div class="container">
        <div class="row">
            <?php foreach ($packages as $p): ?>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="p-img">
                            <img src="<?php htmlout($p['PImage']); ?>" class="img img-responsive">
                        </div>
                        <div class="p-info">
                            <h3><?php htmlout($p['PName']); ?> <span class="pull-right small">NRs. <?php htmlout($p['PCost']); ?></span></h3>
                            <p><?php htmlout($p['PDescription']); ?></p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php htmlout($p['PId']); ?>">Details</button>
                        </div>
                    </div>

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
                                    
                                    <p><strong>Main destination:</strong> <?php htmlout($p['PPlace']); ?></p>
                                        
                                    <p><strong>Duration:</strong> <?php htmlout($p['PDuration']); ?> day(s)</p>
                                        
                                    <p>
                                        <strong>Itinerary:</strong><br>
                                        <?php echo nl2br($p['PItinerary']) ?>
                                    </p>
                                    
                                    <p><strong>Best seasons:</strong> <?php htmlout($p['PSeason']); ?></p>
                                    
                                    <p>
                                        <strong>Cost:</strong> NRs. <?php htmlout($p['PCost']); ?> <br>
                                        <strong>Cost includes:</strong> <?php htmlout($p['PCostInclusion']); ?> <br>
                                        <strong>Cost excludes:</strong> <?php htmlout($p['PCostExclusion']); ?>
                                    </p>
                                    
                                    <p><strong>Extra details:</strong><br><?php echo nl2br($p['PDetail']) ?></p>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>