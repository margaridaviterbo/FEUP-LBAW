<?php include('../templates/header.php'); ?>
<?php include('../templates/menu-user.php'); ?>
<?php include('../templates/aside-menu.php'); ?>

    <div class="container-fluid text-left">
        <div class="page-title">
            <h1>Fill the inputs to create a new event: (ainda não fiz)</h1>
        </div>
        <div class="row">
            <content class="col-sm-9">

                <div class="container-fluid">
                    <div class="row new-event-card">
                        <div class="col-sm-4 tags-personal-card">
                            <div class="content-new-event">
                                <p class="tag-new-event-card">Event Name:</p>
                                <input type="text" class="form-control input-new-event-card" placeholder="Event Name" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Date:</p>
                                <input type="date" class="form-control input-new-event-card" placeholder="Date" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Local:</p>
                                <input type="text" class="form-control input-new-event-card" placeholder="Local" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Description:</p>
                                <textarea rows="4" cols="50" placeholder="Describe the event here"></textarea>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Cost:</p>
                                <form action="">
                                    <input type="radio" name="cost" value="free">Free<br>
                                    <input type="radio" name="cost" value="paid">Paid<br>
                                    <input type="number" class="input-new-event-card" placeholder="Cost">
                                </form>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Adicionar Novos Utilizadores</p>
                                <input type="text" class="form-control input-new-event-card" placeholder="Username" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Utilizaodres adiconados</p>
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
                            </div>
                            <button type="button" class="btn btn-default btn-lg">
                               Create!
                            </button>
                        </div>
                        <div class="col-sm-3 inoformation-personal-card">
                        </div>
                        <div class="col-sm-4 photo-personal-card">
                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                            <button type="button" class="btn btn-default btn-lg">
                                Upload an event photo
                            </button>
                        </div>
                    </div>
                </div>

            </content>
        </div>
    </div>


<?php include('../templates/footer.php'); ?>
