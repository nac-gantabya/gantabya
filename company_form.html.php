<section>
    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Add a Company</h1>
                <small>Required fields are marked with <span class="red">*</span>.</small>
            </div>
        </div>
    </header>

    <!-- section body -->
    <div class="container">
        <form action="<?php echo $DOMAIN; ?>" method="post" role="form">
            
            <!-- company name -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="company_name">Company Name: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="text" name="company_name" id="company_name" placeholder="Eg: Himalayan Travels" class="form-control">
                </div>
            </div>

            <hr>

            <!-- company website -->
            <div class="row">
                <div class="col-md-3">
                    <label for="company_website">Company Website: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="url" name="company_website" id="company_website" placeholder="Eg: http://himalayan.com.np" class="form-control">
                </div>
            </div>
            
            <hr>

            <!-- company_password -->
            <div class="row">
                <div class="col-md-3">
                    <label for="company_website">Company password: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="text" name="company_password" id="company_password" placeholder="Eg: http://himalayan.com.np" class="form-control">
                </div>
            </div>
            
            <hr>
            
            <!-- submit -->
            <div id="submit" class="row">
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="action" value="submit_company">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
        </form>
    </div>
</section>