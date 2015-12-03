<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

// include helper
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/helpers.inc.php";

//================= IF USER SUBMITTED THE Company FORM, ADD TO DATABASE

if (isset($_POST['action']) && $_POST['action'] == 'submit_company') {
    try {
        require "$ROOT/include/db.inc.php";

        $q = 'INSERT INTO Companies (Name, RegistrationNumber, Website, Phone, Password) VALUES (:name, :number, :website, :phone, :password)';
        $s = $DB->prepare($q);
        $s->execute(array(
            ':name' => trim($_POST['company_name']),
            ':number' => trim($_POST['company_reg_number']),
            ':website' => trim($_POST['company_website']),
            ':phone' => trim($_POST['company_phone']),
            ':password' => $_POST['company_password']
        ));

        redirect("$DOMAIN/?add_package");
    } catch (PDOException $e) {
        die("Cannot add company to database: " . $e->getMessage());
    }

    exit();
}

//================= IF USER SUBMITTED THE Package FORM, ADD TO DATABASE

if (isset($_POST['action']) && $_POST['action'] == "submit_package") {
    try {
        // get data connection
        require "$ROOT/include/db.inc.php";

        // get form data
        $cid = $_POST['company_id'];
        $pname = trim($_POST['package_name']);
        $pplace = trim($_POST['package_place']);
        $pduration = $_POST['package_duration'];
        $pitinerary = trim($_POST['package_itinerary']);
        $pseason = trim($_POST['package_season']);
        $pcost = $_POST['package_cost'];
        $pcostinclusion = trim($_POST['package_cost_inclusion']);
        $pcostexclusion = trim($_POST['package_cost_exclusion']);
        $poverview = $_POST['package_overview'];
        $pdetail = trim($_POST['package_detail']);
        $pimgurl = trim($_POST['package_image_url']);
        $cpw = $_POST['company_password'];
        $ptypes = $_POST['package_types'];

        // get company key (to compare with)
        $result = $DB->query("SELECT * FROM Companies WHERE Id='$cid'");
        $row = $result->fetch();
        if ($cpw != $row['Password']) {
            die('Incorrect password! You bastard!');
        }

        // check for image validity
        if ($pimgurl == '') {
            die("You must select a valid image for the package! Go back and select an image!");
        }

        // insert into Packages table
        require "$ROOT/include/db.inc.php";
        $query = "INSERT INTO Packages (Name, Place, Duration, Itinerary, Season, Cost, CostInclusion, CostExclusion, Overview, Detail, Image, CompanyId) VALUES "
                . "(:name, :place, :duration, :itinerary, :season, :cost, :inclusion, :exclusion, :overview, :detail, :image, :cid)";
        $s = $DB->prepare($query);
        $s->execute(array(
            ':name' => $pname,
            ':place' => $pplace,
            ':duration' => $pduration,
            ':itinerary' => $pitinerary,
            ':season' => $pseason,
            ':cost' => $pcost,
            ':inclusion' => $pcostinclusion,
            ':exclusion' => $pcostexclusion,
            ':overview' => $poverview,
            ':detail' => $pdetail,
            ':image' => $pimgurl,
            ':cid' => $cid
        ));

        $pid = $DB->lastInsertId();

        // insert into PackageTypes table
        $query = 'INSERT INTO PackageType (PackageId, TypeId) VALUES '
                . ' (:pid, :tid)';
        $s = $DB->prepare($query);
        foreach ($ptypes as $tid) {
            $s->execute(array(
                ':pid' => $pid,
                ':tid' => $tid
            ));
        }

        redirect(".");
    } catch (PDOException $e) {
        die("Cannot add data to database: " . $e->getMessage());
    }

    exit();
}


//================= if user click on 'Add Company' button, show a company form

if (isset($_GET['add_company'])) {
    $pageTitle = "Add a Company";
    $pageId = "add_company";
    include "$ROOT/templates/header.html.php";
    include "$ROOT/company_form.html.php";
    include "$ROOT/templates/footer.html.php";
    exit();
}

//================= IF USER CLICK THE 'Add Package' BUTTON, show package form

if (isset($_GET['add_package'])) {
    // get the list of companies and types
    require_once "$ROOT/include/db.inc.php";
    try {
        $result = $DB->query("SELECT * FROM Companies ORDER BY Name");
        $companies = $result->fetchAll();
        $result = $DB->query("SELECT * FROM Types ORDER BY Name");
        $types = $result->fetchAll();

        $pageTitle = "Add a Package";
        $pageId = "add_package";
        include "$ROOT/templates/header.html.php";
        include "$ROOT/package_form.html.php";
        include "$ROOT/templates/footer.html.php";
    } catch (PDOException $e) {
        die("Cannot extract list of companies: " . $e->getMessage());
    }

    exit();
}

//======================== IF NOTHING SPECIFIED, SHOW THE LIST OF PACKAGES
// connect to database
require_once "$ROOT/include/db.inc.php";

// get data
try {
    $queryString = "SELECT" .
            " Packages.Id AS PId," .
            " Packages.Name AS PName," .
            " Packages.Place AS PPlace," .
            " Packages.Overview AS POverview," .
            " Packages.Detail AS PDetail," .
            " Packages.Duration AS PDuration," .
            " Packages.Itinerary AS PItinerary," .
            " Packages.Season AS PSeason," .
            " Packages.Cost AS PCost," .
            " Packages.CostInclusion AS PCostInclusion," .
            " Packages.CostExclusion AS PCostExclusion," .
            " Packages.Image AS PImage," .
            " Companies.Name AS CName," .
            " Companies.Website AS CWebsite" .
            " FROM Packages" .
            " INNER JOIN Companies" .
            " ON Packages.CompanyId = Companies.Id" .
            " ORDER BY Packages.Name";
    $result = $DB->query($queryString);
    // get the array of packages
    $packages = $result->fetchAll();

    $pageTitle = "Home";
    $pageId = "home";
    include "$ROOT/templates/header.html.php";
    include "$ROOT/homepage.html.php";
    include "$ROOT/templates/footer.html.php";
} catch (PDOException $e) {
    die("Cannot extract data: " . $e->getMessage());
}

exit();
