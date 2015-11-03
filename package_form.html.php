<section>
    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Add a Package</h1>
                <small>Required fields are marked with <span class="red">*</span>.</small>
            </div>
        </div>
    </header>

    <!-- section body -->
    <div class="container">
        <form action="" method="post" role="form">
            <!-- company -->
            <div id="company" class="row form-group">
                <div class="col-md-3">
                    <label for="company_id">Company: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <select name="company_id" id="company_id" class="form-control">
                        <?php foreach ($companies as $company): ?>
                            <option value="<?php echo $company['Id']; ?>"><?php echo $company['Name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <!-- button to add company -->
                    <a href="?add_company" title="If your company is not listed, add your company first." class="btn btn-default">Add Company</a>
                </div>
            </div>

            <hr>

            <!-- package name -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="package_name">Package Name: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="package_name" id="package_name" placeholder="Eg: Wild Safari" class="form-control">
                </div>
            </div>

            <hr>

            <!-- package place -->
            <div class="row">
                <div class="col-md-3">
                    <label for="package_place">Package destination: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="package_place" id="package_place" placeholder="Eg: Chitwan National Park" class="form-control">
                </div>
            </div>

            <hr>

            <!-- package type -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="package_types">Package types: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <?php foreach ($types as $type): ?>
                        <div class="checkbox">
                            <label style="text-decoration: none; font-weight: normal;">
                                <input type="checkbox" name="package_types" value="<?php echo $type['Id']; ?>" class="checkbox-inline">
                                <?php echo $type['Name']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <hr>

            <!-- package duration -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="package_duration">Package duration <small>(in number of days)</small>: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="number" name="package_duration" id="package_duration" min="1" max="25" placeholder="Eg: 5" class="form-control">
                </div>
            </div>

            <hr>

            <!-- package_price -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="package_price">Package price <small>(in NRs.)</small>: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="number" min="0.0" max="1000000.0" name="package_price" id="package_price" placeholder="Eg: 10000">
                </div>
            </div>

            <hr>

            <!-- short description -->
            <div class="row">
                <div class="col-md-3">
                    <label for="package_description">One-line description: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" maxlength="50" name="package_description" id="package_description" placeholder="Maximum 50 characters" class="form-control">
                </div>
            </div>

            <hr>

            <!-- package detail -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="package_detail">Package details: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="package_detail" id="package_detail" placeholder="Include all other details such as schedule, features, etc."></textarea>
                </div>
            </div>

            <hr>

            <!-- package image -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="package_image">Package cover image: </label>
                </div>
                <div class="col-md-5">
                    <input type="file" name="package_image" id="package_image">
                </div>
            </div>

            <hr>

            <!-- submit -->
            <div id="submit" class="row">
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
        </form>
    </div>
</section>