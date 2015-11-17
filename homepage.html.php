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
                                    <p><?php print_r($package); ?></p>
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