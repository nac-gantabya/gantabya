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
                    <a href="#" data-toggle="modal" data-target="#Modal-<?php htmlout($t['BId']); ?>">
                        <div class="thumbnail">
                            <div class="p-img">
                                <img src="<?php echo $t['BImage']; ?>" class="img img-responsive">
                            </div>
                            <div class="p-info">
                                <h4><a href="#" data-toggle="modal" data-target="#Modal-<?php htmlout($t['BId']); ?>"><?php htmlout($t['BFrom']); ?> - <?php htmlout($t['BTo']); ?></a></h4>
                                <p>Rs. <?php htmlout($t['BCost']); ?></p>
                            </div>
                        </div>
                    </a>

                    <!-- Modal -->
                    <div id="Modal-<?php htmlout($t['BId']); ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        <small>by 
                                            <a href="<?php if ($t['AWebsite'] != '') echo $t['AWebsite']; else echo '#'; ?>">
                                                <?php htmlout($t['AName']); ?>
                                            </a>
                                        </small>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <p><strong>From</strong> <?php htmlout($t['BFrom']); ?> <strong>To</strong> <?php htmlout($t['BTo']); ?></p>
                                    <p><strong>Departs at</strong> <?php echo $t['BDepartureTime']; ?> 
                                        <?php if ($t['BArrivalTime'] != ''): ?>
                                            <strong>and reaches destination at</strong> <?php echo $t['BArrivalTime']; ?>
                                        <?php endif; ?>
                                    </p>
                                    <p><strong>Ticket for each seat costs</strong> NRs. <?php echo $t['BCost']; ?></p>
                                    
                                    <!-- display seat chart if it exists -->
                                    <?php if ($t['BChart'] != ''): ?>
                                        <p><strong>Seat chart:</strong><br><img src="<?php echo $t['BChart']; ?>" class="img img-responsive"></p>
                                    <?php endif; ?>
                                    
                                    <!-- display extra details if it exists -->
                                    <?php if ($t['BDetail'] != ''): ?>
                                        <p><strong>Extra details:</strong><br><?php echo nl2br($t['BDetail']) ?></p>
                                    <?php endif; ?>
                                        
                                    <!-- weekdays -->
                                    <p>
                                        <strong>Available weekdays:</strong><br>
                                        <?php
                                         require "$ROOT/include/db.inc.php";
                                         $result = $DB->query('SELECT * FROM BusTicketWeekdays WHERE TicketId='.$t['BId']);
                                         while ($row = $result->fetch()) {
                                             echo $row['Weekday'].'<br>';
                                         }
                                        ?>
                                    </p>
                                </div>
                            </div><!-- modal-content -->

                        </div>
                    </div><!-- modal -->
                </div>

            <?php endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->
</section>