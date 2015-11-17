<?php

// include helper
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/helpers.inc.php";

//================= IF USER SUBMITTED THE Company FORM, ADD TO DATABASE

if (isset($_POST['action']) && $_POST['action'] == 'submit_company') {
    try {
        require "$ROOT/include/db.inc.php";

        $q = 'INSERT INTO Companies (Name, Website) VALUES (:name, :website)';
        $s = $DB->prepare($q);
        $s->execute(array(
            ':name' => trim($_POST['company_name']),
            ':website' => trim($_POST['company_website'])
        ));

        redirect("$DOMAIN/?add_package");
    } catch (PDOException $e) {
        echo "Cannot add company to database: " . $e->getMessage();
    }

    exit();
}

//================= IF USER SUBMITTED THE Package FORM, ADD TO DATABASE

if (isset($_POST['action']) && $_POST['action'] == "submit_package") {
    try {
        // get data connection
        require "$ROOT/include/db.inc.php";

        // get form data
        $cid = trim($_POST['company_id']);
        $pname = trim($_POST['package_name']);
        $pplace = trim($_POST['package_place']);
        $pduration = trim($_POST['package_duration']);
        $pprice = trim($_POST['package_price']);
        $pdesc = trim($_POST['package_description']);
        $pdetail = trim($_POST['package_detail']);
        $ptypes = trim($_POST['package_types']);

        // insert into Packages table
        $query = "INSERT INTO Packages (Name, Place, Duration, Price, Description, Detail, Image, CompanyId) VALUES "
                . "(:name, :place, :duration, :price, :desc, :detail, :image, :cid)";
        $s = $DB->prepare($query);
        $s->execute(array(
            ':name' => $pname,
            ':place' => $pplace,
            ':duration' => $pduration,
            ':price' => $pprice,
            ':desc' => $pdesc,
            ':detail' => $pdetail,
            ':image' => "http://placehold.it/300x150",
            ':cid' => $cid
        ));

        $pid = $DB->lastInsertId();

        // insert into PackageTypes table
        $query = 'INSERT INTO PackageType (PackageId, TypeId) VALUES '
                . ' (:pid, :tid)';
        $s = $DB->prepare($query);
        foreach ($_POST['package_types'] as $tid) {
            $s->execute(array(
                ':pid' => $pid,
                ':tid' => $tid
            ));
        }

        // upload image
        $file = $_FILES['package_image'];
        if ($file['size'] > 0) {
            $imgname = 'package_' . $pid . '_' . str_replace(' ', '_', basename($file['name']));
            $imgfile = "$ROOT/img/$imgname";
            $tmpfile = $file['tmp_name'];
            $imgurl = "$DOMAIN/img/$imgname";

            if ($file['size'] > $_POST['MAX_FILE_SIZE']) {
                die('Selected file is too large. Go back and select another file!');
            }

            if (move_uploaded_file($tmpfile, $imgfile)) {
                // update image field
                require_once "$ROOT/include/db.inc.php";
                $q = 'UPDATE Packages SET Image = :image WHERE Id = :id';
                $s = $DB->prepare($q);
                $s->execute(array(
                    ':image' => $imgurl,
                    ':id' => $pid
                ));
            } else {
                die("Unable to upload image");
            }
        }

        redirect($DOMAIN);
    } catch (PDOException $e) {
        $error = "Cannot add data to database: " . $e->getMessage();
        include "$ROOT/templates/error.html.php";
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
        $error = "Cannot extract list of companies: " . $e->getMessage();
        include "$ROOT/templates/error.html.php";
    }

    exit();
}

//======================== IF NOTHING SPECIFIED, SHOW THE LIST OF PACKAGES
// connect to database
require_once "$ROOT/include/db.inc.php";

// get data
try {
    $queryString = "SELECT" .
            " Packages.Id AS PackageId," .
            " Packages.Name AS PackageName," .
            " Description, Detail, Image," .
            " Companies.Name AS CompanyName" .
            " FROM Packages" .
            " INNER JOIN Companies" .
            " ON Packages.CompanyId = Companies.Id" .
            " ORDER BY Packages.Name";
    $result = $DB->query($queryString);
    // get the array of packages
    $packages = $result->fetchAll();

    $pageTitle = "Packages | Gantabya";
    $pageId = "home";
    include "$ROOT/templates/header.html.php";
    include "$ROOT/homepage.html.php";
    include "$ROOT/templates/footer.html.php";
} catch (PDOException $e) {
    $error = "Cannot extract data: " . $e->getMessage();
    include "$ROOT/templates/error.html.php";
}

exit();
