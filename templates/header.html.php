<!-- include helper functions -->
<?php require_once "$ROOT/include/helpers.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $pageTitle; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/custom.css">
    </head>

    <body>
        
        <!-- navigation bar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $DOMAIN; ?>">Gantabya</a>
                </div><!-- navbar-header -->

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li <?php checkForActivePage("download"); ?> ><a href="#">Download</a></li>
                        <li <?php checkForActivePage("about"); ?> ><a href="#">About</a></li>
                        <li <?php checkForActivePage("contact"); ?> ><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div><!-- container -->
        </nav>
