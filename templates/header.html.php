<!-- include helper functions -->
<?php require_once "$ROOT/include/helpers.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $pageTitle; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $DOMAIN;?>/css/bootstrap.css">
        <script src="<?php echo $DOMAIN;?>/js/jquery.js"></script>
        <script src="<?php echo $DOMAIN;?>/js/bootstrap.js"></script>
        <link rel="stylesheet" href="<?php echo $DOMAIN;?>/css/custom.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    </head>

    <body>
        
        <!-- navigation bar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
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
                        <li <?php if ($pageId=="download") echo "class='active'"; ?>><a href="<?php echo "$DOMAIN/";?>download">Download</a></li>
                        <li <?php if ($pageId=="about") echo "class='active'"; ?>><a href="<?php echo "$DOMAIN/";?>about">About</a></li>
                        <li <?php if ($pageId=="contact") echo "class='active'"; ?>><a href="<?php echo "$DOMAIN/";?>contact">Contact</a></li>
                    </ul>
                </div>
            </div><!-- container -->
        </nav>
