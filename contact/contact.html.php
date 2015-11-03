<section>
    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Contact Us</h1>
                <small>Required fields are marked with <span class="red">*</span>.</small>
            </div>
        </div>
    </header>

    <!-- page body -->
    <div class="container">
        <form action="<?php echo "$DOMAIN/contact/"; ?>" method="post" role="form">
            
            <!--Name-->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="name">Full Name: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="name" id="name" required class="form-control">
                </div>
            </div>

            <hr>

            <!-- Email -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="email">Email: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="email" name="email" id="email" required class="form-control">
                </div>
            </div>

            <hr>

            <!-- message -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="message">Your Message: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <textarea name="message" id="message" required class="form-control"></textarea>
                </div>
            </div>

            <hr>

            <!-- submit -->
            <div id="submit" class="row">
                <div class="col-md-3">
                </div>

                <div class="col-md-5">
                    <input type="hidden" name="action" value="submit_feedback">
                    <input type="submit" class="btn btn-primary" value='Submit'>
                    <input type="reset" class="btn btn-default">
                </div>

            </div>
        </form>
    </div>



</section>