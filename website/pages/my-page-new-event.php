<?php include('../templates/header.php'); ?>
<?php include('../templates/menu-user.php'); ?>
<?php include('../templates/aside-menu.php'); ?>

    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Fill the inputs to create a new event</h1>
                </div>

                    <form action="#" method="post" enctype="multipart/>form-data">

                        <label>Event Name</label>
                        <input type="text" class="form-control" placeholder="Event Name" aria-describedby="basic-addon1" required>

                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Date" aria-describedby="basic-addon1" required>

                        <label>Time</label>
                        <input type="time" class="form-control" placeholder="Time" aria-describedby="basic-addon1" required>

                          <br>
                          <div for="event-photo" class="btn btn-default">Add finish date</div>
                          <br>
                            <br>
                          <div for="event-photo" class="btn btn-default">Add finish time</div>
                          <br>

                          <label>Recurrence</label>
                          <select class="form-control">
                            <option value="charity">
                              Only Once
                            </option>
                            <option value="">
                              Daily
                            </option>
                            <option value="">
                              Weekly
                            </option>
                            <option value="arts">
                              Monthly
                            </option>
                            <option value="business">
                              Annually
                            </option>
                          </select>

                          <label>Local</label>
                          <input type="text" class="form-control" placeholder="Local" aria-describedby="basic-addon1" required="">

                            <label>Category</label>
                            <select class="form-control">
                              <option value="">---</option>
                              <option value="arts">Arts</option>
                              <option value="business">Business</option>
                              <option value="charity">Charity</option>
                              <option value="food">Food & Drink</option>
                              <option value="music">Music</option>
                            </select>

                            <p>
                              <label>Description</label>
                            </p>
                            <textarea rows="4" cols="50" placeholder="Describe the event here" class="form-control" required=""></textarea>

                            <div>
                              <input type="radio" name="cost" value="free">
                                Free<br>
                                  <input type="radio" name="cost" value="paid">
                                    Paid:
                                      <input type="number" class="input-new-event-card" placeholder="Cost">
                        </div>

                            <label class="tag-new-event-card">Adicionar Novos Utilizadores</label>
                            <input type="text" class="form-control input-new-event-card" placeholder="Username" aria-describedby="basic-addon1">

                              <label class="tag-new-event-card">Utilizadores adiconados</label>
                              <ul>
                                  <li>
                                    <a>user1</a>
                                  </li>
                                <li>
                                  <a>user2</a>
                                </li>
                                <li>
                                    <a>user3</a>
                                  </li>
                              </ul>

                              <label>Event photo</label>
                              <div>
                                <label for="event-photo" class="btn btn-default">Upload photo</label>
                                <input id="event-photo" style="visibility:hidden;" type="file">
                        </div>

                              <br></br>
                              <button type="submit" class="btn btn-default btn-lg">Create event!</button>
                              <br></br>


                            </form>
            </content>
        </div>
    </div>

<?php include('../templates/footer.php'); ?>
