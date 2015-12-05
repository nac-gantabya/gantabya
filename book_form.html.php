<section>
    
    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Book a Package</h1>
                <small>Required fields are marked with <span class="red">*</span>.</small>
            </div>
        </div>
    </header>
    
    <!-- page body -->
    <div class="container">
        <form action="<?php echo "$DOMAIN/book.php"; ?>" method="post" role="form">
            
            <!-- name -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Full Name: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="text" name="name" id="name" class="form-control" placeholder="First Last">
                </div>
            </div>
            
            <hr>
            
            <!-- email -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="email">Email: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="email" name="email" id="email" class="form-control" placeholder="Eg: example@domain.com">
                </div>
            </div>
            
            <hr>
            
            <!-- phone number -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="phone">Phone Number: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="text" maxlength="50" name="phone" id="phone" class="form-control" placeholder="Eg: +97714223717">
                </div>
            </div>
            
            <hr>
            
            <!-- passport number -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="passport">Passport number:</label>
                </div>
                <div class="col-md-5">
                    <input type="text" maxlength="20" name="passport" id="passport" class="form-control" placeholder="Enter a valid passport number if you have one">
                </div>
            </div>
            
            <hr>
            
            <!-- submit -->
            <div class="row form-group">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <input type="hidden" name="action" value="submit-book-form">
                    <input type="submit" value="Book" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-default">
                </div>
            </div>
        </form>
    </div><!-- container -->
</section>