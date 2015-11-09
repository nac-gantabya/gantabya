<GantabyaData>
    
    <?php foreach ($packages as $p): ?>
    
    <Package>
        
        <PackageId><?php htmlout($p['PackageId']); ?></PackageId>
        <PackageName><?php htmlout($p['PackageName']); ?></PackageName>
        <PackagePlace><?php htmlout($p['PackagePlace']); ?></PackagePlace>
        <PackageDescription><?php htmlout($p['PackageDescription']); ?></PackageDescription>
        <PackageDuration><?php htmlout($p['PackageDuration']); ?></PackageDuration>
        <PackagePrice><?php htmlout($p['PackagePrice']); ?></PackagePrice>
        <PackageDetail><?php htmlout($p['PackageDetail']); ?></PackageDetail>
        <PackageImage><?php htmlout($p['PackageImage']); ?></PackageImage>
        <CompanyId><?php htmlout($p['CompanyId']); ?></CompanyId>
        <CompanyName><?php htmlout($p['CompanyName']); ?></CompanyName>
        <CompanyWebsite><?php htmlout($p['CompanyWebsite']); ?></CompanyWebsite>
        
        <!-- get list of types associated with this package -->
        <PackageTypes>
        <?php
        $q = 'SELECT PackageType.TypeId AS TypeId, Types.Name AS TypeName'.
                ' FROM Types INNER JOIN PackageType ON Types.Id=PackageType.TypeId'.
                ' WHERE PackageType.PackageId='.$p['PackageId'];
        
        $result = $DB->query($q);
        while ($t = $result->fetch()): ?>
            <Type Id="<?php htmlout($t['TypeId']); ?>" Name="<?php htmlout($t['TypeName']); ?>"/>
        <?php endwhile; ?>
        </PackageTypes>
        
    </Package>
    
    <?php endforeach; ?>
    
</GantabyaData>