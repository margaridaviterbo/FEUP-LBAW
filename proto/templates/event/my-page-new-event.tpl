{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}


<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Create new event</h1>
            </div>

            <form action="../../actions/event/new_event.php" method="post" enctype="multipart/>form-data">

                <div class="row">
                    <content class="col-md-8 col-xs-8">
                        <label class="special-label">Event Name *</label>
                        <input type="text" name="event-name" class="form-control" placeholder="Event Name"
                               aria-describedby="basic-addon1" required>
                    </content>
                    <content class="col-md-offset-1 col-md-1 col-xs-2">
                        <label>Public</label>
                        <input type="checkbox" class="checkbox-form" name="public">
                    </content>
                    <content class="col-md-offset-1 col-md-1 col-xs-2">
                        <label>Free</label>
                        <input type="checkbox" class="checkbox-form" name="free">
                    </content>
                </div>

                <div class="row">
                    <content class="col-xs-6">
                        <label>Date *</label>
                        <input type="date" id="datepicker" name="beginning-event-date" class="form-control"
                               placeholder="Date"
                               aria-describedby="basic-addon1" required>

                    </content>
                    <content class="col-xs-6">
                        <label>Time *</label>
                        <input type="time" name="beginning-event-time" class="form-control" placeholder="Time"
                               aria-describedby="basic-addon1" required>
                    </content>
                </div>

                <div class="row">
                    <content class="col-xs-6">
                        <label>Ending Date</label>
                        <input type="date" id="datepicker" name="ending-event-date" class="form-control"
                               placeholder="Date"
                               aria-describedby="basic-addon1" required>

                    </content>
                    <content class="col-xs-6">
                        <label>Ending Time</label>
                        <input type="time" name="ending-event-time" class="form-control" placeholder="Time"
                               aria-describedby="basic-addon1" required>
                    </content>
                </div>

                <div class="row">
                    <content class="col-xs-6">
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
                    </content>

                    <content class="col-xs-6">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <option value="1">---</option>
                            <option value="2">Arts</option>
                            <option value="3">Business</option>
                            <option value="4">Charity</option>
                            <option value="5">Food & Drink</option>
                            <option value="6">Music</option>
                        </select>
                    </content>
                </div>

                <label>Description *</label>
                <textarea rows="4" cols="50" name="description" placeholder="Describe the event here"
                          class="form-control"
                          required=""></textarea>

                <div>
                    <label for="event-photo" class="btn btn-default">Upload photo</label>
                    <input id="event-photo" style="visibility:hidden;" name="event-photo" type="file">
                </div>

                <label>Local *</label>
                <input id="local-searchbox" name="local-searchbox" class="form-control" type="text"
                       placeholder="Search Location" aria-describedby="basic-addon1">

                <div id="map" style="width: 100%; height: 300px;"></div>

                <input type="text" name="lat" id="lat" hidden="true" required>
                <input type="text" name="lng" id="lng" hidden="true" required>
                <input type="text" name="city" id="city" hidden="true" required>
                <input type="text" name="country" id="country" hidden="true" required>

                <br></br>
                <button type="submit" class="btn btn-default btn-lg">Create event!</button>
                <br></br>

            </form>
        </content>
    </div>
</div>

<script type="text/javascript" src="../../scripts/map.js"></script>

{include file='common/footer.tpl'}
