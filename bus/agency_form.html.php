<section>
    
    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Add a bus agency</h1>
                <small>Required fields are marked with <span class="red">*</span>.</small>
            </div>
        </div>
    </header>
    
    <!-- page body -->
    <div class="container">
        <form action="." method="post" role="form">
            
            <!-- agency_name -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="AName">Agency name: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" required name="AName" id="AName" class="form-control" placeholder="Eg: Prithvi Travels" maxlength="50">
                </div>
            </div>
            
            <hr>
            
            <!-- agency_phone -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="APhone">Agency phone: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" required name="APhone" id="APhone" class="form-control" placeholder="Eg: +97714234234" maxlength="50">
                </div>
            </div>
            
            <hr>
            
            <!-- agency_website -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="AWebsite">Agency website: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="url" required name="AWebsite" id="AWebsite" class="form-control" placeholder="Eg: http://prithvi.com" maxlength="50">
                </div>
            </div>
            
            <hr>
            
            <!-- agency password -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="APassword">Agency password: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="password" name="APassword" id="APassword" placeholder="Make it strong and secure" required class="form-control" maxlength="50">
                </div>
            </div>
            
            <hr>
            
            <!-- submit -->
            <div class="row form-group">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input type="hidden" name="action" value="submit_agency">
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-default">
                </div>
            </div>
        </form>
    </div><!-- container -->
</section>