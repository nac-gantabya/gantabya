<section id="bus">

    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Bus Tickets <a class="btn btn-default pull-right" href="?add_ticket">Add Ticket</a> </h1>
            </div>
        </div>
    </header>

    <!-- page body -->
    <div class="container">
        <div class="row">
            <?php foreach ($tickets as $t): ?>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="p-img">
                            <img src="<?php echo $t['BImage']; ?>" class="img img-responsive">
                        </div>
                        <div class="p-info">
                            <h4><?php htmlout($t['BFrom']); ?> - <?php htmlout($t['BTo']); ?></h4>
                            <p>Rs. <?php htmlout($t['BCost']); ?></p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php htmlout($t['BId']); ?>">Details</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="Modal-<?php htmlout($t['BId']); ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><small>by <a href="<?php htmlout($t['AWebsite']); ?>"><?php htmlout($t['AName']); ?></a></small></h4>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Extra details:</strong><br><?php echo nl2br($t['BDetail']) ?></p>
                                </div>
                            </div><!-- modal-content -->

                        </div>
                    </div><!-- modal -->
                </div>

            <?php endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->
</section>