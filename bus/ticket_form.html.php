<section>
    
    <!-- page header -->
    <header>
        <div class="page-header">
            <div class="container">
                <h1>Add a bus ticket</h1>
                <small>Required fields are marked with <span class="red">*</span>.</small>
            </div>
        </div>
    </header>
    
    <!-- page body -->
    <div class="container">
        <form action="." method="post" role="form">
            
            <!-- agency -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="AId">Agency: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <select required name="AId" id="AId" class="form-control">
                        <?php foreach ($agencies as $a): ?>
                        <option value="<?php echo $a['Id']; ?>"><?php htmlout($a['Name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <a href="?add_agency" class="btn btn-default">Add your agency</a>
                </div>
            </div>
            
            <hr>
            
            <!-- place from -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BFrom">Departure place: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" required name="BFrom" id="BFrom" class="form-control" placeholder="Eg: Kathmandu" maxlength="50">
                </div>
            </div>
            
            <hr>
            
            <!-- place to -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BTo">Destination place: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" required name="BTo" id="BTo" class="form-control" placeholder="Eg: Pokhara" maxlength="50">
                </div>
            </div>
            
            <hr>
            
            <!-- departure time -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BDepartureTime">Departure time <small>(in 24-hr format)</small>: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input required type="time" name="BDepartureTime" id="BDepartureTime" class="form-control" pattern="[0-2][0-9]:[0-5][0-9]">
                </div>
            </div>
            
            <hr>
            
            <!-- arrival time -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BArrivalTime">Arrival time <small>(in 24-hr format)</small>:</label>
                </div>
                <div class="col-md-5">
                    <input type="time" name="BArrivalTime" id="BArrivalTime" class="form-control" pattern="[0-2][0-9]:[0-5][0-9]">
                </div>
            </div>
            
            <hr>
            
            <!-- cost -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BCost">Ticket price: <small>(per seat, in NRs.)</small> <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="number" name="BCost" id="BCost" placeholder="Eg: 1000" required class="form-control">
                </div>
            </div>
            
            <hr>
            
            <!-- ticket_image -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BImage">Bus image: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="url" name="BImage" id="BImage" placeholder="Enter a valid image URL" required class="form-control" maxlength="255">
                </div>
            </div>
            
            <hr>
            
            <!-- seat_chart -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BChart">Seat chart: </label>
                </div>
                <div class="col-md-5">
                    <input type="url" name="BChart" id="BChart" placeholder="Enter a valid image URL" class="form-control" maxlength="255">
                </div>
            </div>
            
            <hr>
            
            <!-- available weekdays -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BWeekdays">Available weekdays:</label>
                </div>
                <div class="col-md-5">
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Sunday">Sunday</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Monday">Monday</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Tuesday">Tuesday</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Wednesday">Wednesday</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Thursday">Thursday</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Friday">Friday</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="BWeekdays[]" value="Saturday">Saturday</label></div>
                </div>
            </div>
            
            <hr>
            
            <!-- extra details -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="BDetail">Extra details:</label>
                </div>
                <div class="col-md-5">
                    <textarea name="BDetail" id="BDetail" placeholder="Enter any other details" class="form-control"></textarea>
                </div>
            </div>
            
            <hr>
            
            <!-- agency password -->
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="APassword">Agency password: <span class="red">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="password" name="APassword" id="APassword" placeholder="You set it when adding your company" required class="form-control">
                </div>
            </div>
            
            <hr>
            
            <!-- submit -->
            <div class="row form-group">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input type="hidden" name="action" value="submit_ticket">
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-default">
                </div>
            </div>
        </form>
    </div><!-- container -->
</section>