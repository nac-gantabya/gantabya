<GantabyaData>

    <?php foreach ($tickets as $t): ?>

        <!-- beginning of a ticket -->
        <BusTicket
            Id="<?php echo $t['BId']; ?>"
            PlaceFrom="<?php echo $t['BFrom']; ?>"
            PlaceTo="<?php echo $t['BTo']; ?>"
            DepartureTime="<?php echo $t['BDepartureTime']; ?>"
            ArrivalTime="<?php echo $t['BArrivalTime']; ?>"
            Cost="<?php echo $t['BCost']; ?>"
            Image="<?php echo $t['BImage']; ?>"
            SeatChart="<?php echo $t['BChart']; ?>">

            <Detail><?php echo $t['BDetail']; ?></Detail>

            <!-- agency -->
            <Agency
                Id="<?php htmlout($t['AId']); ?>"
                Name="<?php htmlout($t['AName']); ?>"
                RegistrationNumber="<?php htmlout($t['ANumber']); ?>"
                Website="<?php htmlout($t['AWebsite']); ?>"
                Phone="<?php htmlout($t['APhone']); ?>"/>

            <!-- associated weekdays -->
            <Weekdays>
                <?php
                $q = 'SELECT * FROM BusTicketWeekdays WHERE TicketId=' . $t['BId'];
                $result = $DB->query($q);
                while ($d = $result->fetch()):
                    ?>
                    <Weekday><?php echo $d['Weekday']; ?></Weekday>
                <?php endwhile; ?>
            </Weekdays>

        </BusTicket>

    <?php endforeach; ?>

</GantabyaData>