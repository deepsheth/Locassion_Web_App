<div class="row">
    <div class="col s12">
        <div class="card blue-grey darken-3">
            <div class="card-content white-text">
                <span class="card-title">Form Successfully Submitted.</span>
                <h5><?php echo $_POST["event_title"]; ?></h5>
                <p>
                <strong>Private:</strong> <?php echo $_POST["is_private"]; ?>
                <strong>All Day:</strong> <?php echo $_POST["is_all_day"]; ?><br>
                <strong>Start Date:</strong> <?php echo $_POST["start_date"]; ?><br>
                <strong>End Date:</strong> <?php echo $_POST["end_date"]; ?><br>
                <strong>Start Time:</strong> <?php echo $_POST["start_time"]; ?><br>
                <strong>End Time:</strong> <?php echo $_POST["end_time"]; ?><br>
                <strong>Longitude:</strong> <?php echo $_POST["longitude"]; ?><br>
                <strong>Latitude:</strong> <?php echo $_POST["latitude"]; ?><br>
                <strong>Location Details:</strong> <?php echo $_POST["location_details"]; ?><br>
                <strong>Event Details:</strong> <?php echo $_POST["event_details"]; ?><br>
                <strong>Groups Inivted:</strong> <?php echo $_POST["group_invites"]; ?><br>
                <strong>Individuals Invited:</strong> <?php echo $_POST["single_invites"]; ?><br>
                    <br>
                </p>
            </div>
        </div>
    </div>
</div>




<?php $_POST["event_title"]; ?>
    <?php  $_POST["start_date"]; ?>
        <?php $_POST["end_date"]; ?>
           