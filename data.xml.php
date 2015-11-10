<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<GantabyaData>

    <?php foreach ($packages as $p): ?>

        <!-- beginning of a package -->
        <Package
            Id="<?php htmlout($p['PackageId']); ?>"
            Name="<?php htmlout($p['PackageName']); ?>"
            Place="<?php htmlout($p['PackagePlace']); ?>"
            Description="<?php htmlout($p['PackageDescription']); ?>"
            Duration="<?php htmlout($p['PackageDuration']); ?>"
            Price="<?php htmlout($p['PackagePrice']); ?>"
            Detail="<?php htmlout($p['PackageDetail']); ?>"
            Image="<?php htmlout($p['PackageImage']); ?>">

            <!-- company -->
            <Company
                Id="<?php htmlout($p['CompanyId']); ?>"
                Name="<?php htmlout($p['CompanyName']); ?>"
                Website="<?php htmlout($p['CompanyWebsite']); ?>"/>

            <!-- associated package types -->
            <PackageTypes>
                <?php
                $q = 'SELECT PackageType.TypeId AS TypeId, Types.Name AS TypeName' .
                        ' FROM Types INNER JOIN PackageType ON Types.Id=PackageType.TypeId' .
                        ' WHERE PackageType.PackageId=' . $p['PackageId'];

                $result = $DB->query($q);
                while ($t = $result->fetch()): ?>
                    <Type Id="<?php htmlout($t['TypeId']); ?>" Name="<?php htmlout($t['TypeName']); ?>"/>
                <?php endwhile; ?>
            </PackageTypes>

        </Package>

    <?php endforeach; ?>

</GantabyaData>