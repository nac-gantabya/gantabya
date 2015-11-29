<GantabyaData>

    <?php foreach ($packages as $p): ?>

        <!-- beginning of a package -->
        <Package
            Id="<?php echo $p['PId'] ; ?>"
            Name="<?php echo $p['PName']; ?>"
            Place="<?php echo($p['PPlace']); ?>"
            Duration="<?php echo $p['PDuration']; ?>"
            Season="<?php echo $p['PSeason']; ?>"
            Cost="<?php echo $p['PCost']; ?>"
            Image="<?php echo $p['PImage']; ?>">
            
            <Itinerary><?php echo $p['PItinerary']; ?></Itinerary>
            
            <CostInclusion><?php echo $p['PCostInclusion']; ?></CostInclusion>
            
            <CostExclusion><?php echo $p['PCostExclusion']; ?></CostExclusion>
            
            <Overview><?php echo $p['POverview']; ?></Overview>

            <Detail><?php echo $p['PDetail']; ?></Detail>
            
            <!-- company -->
            <Company
                Id="<?php htmlout($p['CId']); ?>"
                Name="<?php htmlout($p['CName']); ?>"
                Website="<?php htmlout($p['CWebsite']); ?>"
                Phone="<?php htmlout($p['CPhone']); ?>"/>

            <!-- associated package types -->
            <PackageTypes>
                <?php
                $q = 'SELECT PackageType.TypeId AS TId, Types.Name AS TName' .
                        ' FROM Types INNER JOIN PackageType ON Types.Id=PackageType.TypeId' .
                        ' WHERE PackageType.PackageId=' . $p['PId'];

                $result = $DB->query($q);
                while ($t = $result->fetch()): ?>
                    <Type Id="<?php htmlout($t['TId']); ?>" Name="<?php htmlout($t['TName']); ?>"/>
                <?php endwhile; ?>
            </PackageTypes>

        </Package>

    <?php endforeach; ?>

</GantabyaData>