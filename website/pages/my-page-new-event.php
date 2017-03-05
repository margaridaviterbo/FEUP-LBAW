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

                        <label>Local</label>
                        <input type="text" class="form-control" placeholder="Local" aria-describedby="basic-addon1" required>

                        <p><label>Description</label></p>
                        <textarea rows="4" cols="50" placeholder="Describe the event here" class="form-control" required></textarea>

                        <div>
                            <input type="radio" name="cost" value="free">Free<br>
                            <input type="radio" name="cost" value="paid">Paid<br>
                            <input type="number" class="input-new-event-card" placeholder="Cost">
                        </div>

                        <label class="tag-new-event-card">Adicionar Novos Utilizadores</label>
                        <input type="text" class="form-control input-new-event-card" placeholder="Username" aria-describedby="basic-addon1">

                        <label class="tag-new-event-card">Utilizadores adiconados</label>
                        <table>
                            <tr>
                                <td>
                                    <a>user1</a>
                                </td>
                                <td>
                                    <a>user2</a>
                                </td>
                                <td>
                                    <a>user3</a>
                                </td>
                            </tr>
                        </table>

                        <label>Event photo</label>
                        <input type="file" name="User image" id="User image">

                        <br></br>
                        <button type="submit" class="btn btn-default btn-lg">Create event!</button>
                        <br></br>

                    </form>
            </content>
        </div>
    </div>


<?php include('../templates/footer.php'); ?>
