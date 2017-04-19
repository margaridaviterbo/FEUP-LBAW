<?php
include('../../templates/common/header.php');
include('../../config/init.php');
include('../../templates/common/menu.php');

if (isset($_SESSION['authenticated'])) {
    if ($_SESSION['authenticated'] == true) {
        include('../../templates/common/aside-menu.php');
    }
}
?>

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Create new event</h1>
            </div>

            <form action="../../actions/event/new_event.php" method="post" enctype="multipart/>form-data">

                <label>Event Name *</label>
                <input type="text" name="event-name" class="form-control" placeholder="Event Name"
                       aria-describedby="basic-addon1" required>

                <label>Date *</label>
                <input type="date" id="datepicker" name="beginning-event-date" class="form-control" placeholder="Date"
                       aria-describedby="basic-addon1" required>

                <label>Time *</label>
                <input type="time" name="beginning-event-time" class="form-control" placeholder="Time"
                       aria-describedby="basic-addon1" required>

                <br>
                <div for="event-photo" class="btn btn-default">Add finish date</div>
                <br>
                <br>
                <div for="event-photo" class="btn btn-default">Add finish time</div>
                <br>
                <label>Recurrence *</label>
                <select class="form-control" name="recurrence">
                    <option value="once">
                        Only Once
                    </option>
                    <option value="daily">
                        Daily
                    </option>
                    <option value="weekly">
                        Weekly
                    </option>
                    <option value="monthly">
                        Monthly
                    </option>
                    <option value="semester">
                        Semester
                    </option>
                    <option value="annually">
                        Annually
                    </option>
                </select>

                <label>Local *</label>
                <input id="local-searchbox" name="local-searchbox" class="form-control" type="text" placeholder="Search Location" aria-describedby="basic-addon1" required>

                <div id="map" style="width: 100%; height: 300px;"></div>

                <input type="text" name="lat" id="lat" readonly="yes"><br>
                <input type="text" name="lng" id="lng" readonly="yes">

                <label>Category</label>
                <select class="form-control" name="category">
                    <option value="1">---</option>
                    <option value="2">Arts</option>
                    <option value="3">Business</option>
                    <option value="4">Charity</option>
                    <option value="5">Food & Drink</option>
                    <option value="6">Music</option>
                </select>

                <p>
                    <label>Description *</label>
                </p>
                <textarea rows="4" cols="50" name="description" placeholder="Describe the event here" class="form-control"
                          required=""></textarea>

                <div>
                    <input type="radio" name="free" value="free">
                    Free<br>
                    <input type="radio" name="paid" value="paid">
                    Paid

                </div>

                <?php //TODO: Adicionar hosts ?>

                <div>
                    <label for="event-photo" class="btn btn-default">Upload photo</label>
                    <input id="event-photo" style="visibility:hidden;" name="event-photo" type="file">
                </div>

                <br></br>
                <button type="submit" class="btn btn-default btn-lg">Create event!</button>
                <br></br>

            </form>
        </content>
    </div>
</div>

<script type="text/javascript" src="../../scripts/map.js"></script>

<?php include('../../templates/common/footer.php'); ?>
