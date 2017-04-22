{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}

    <div class="container-fluid text-left">
        <div class="page-title">
            <h1>Edit the fields below: </h1>
        </div>
        <div class="row">
            <content class="col-sm-9">

                <div class="container-fluid">
                    <div class="row new-event-card">
                        <div class="col-sm-4 tags-personal-card">
                            <div class="content-new-event">
                                <p class="tag-new-event-card">Event Name:</p>
                                <input type="text" class="form-control input-new-event-card" value="Sessão de Demonstração para o Desenvolvimento em Comunicação" placeholder="Event Name" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Date:</p>
                                <input type="date" value="Quinta, 9 de Março às 19:45" class="form-control input-new-event-card" placeholder="Date" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Local:</p>
                                <input type="text" value="ISG" class="form-control input-new-event-card" placeholder="Local" aria-describedby="basic-addon1">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Description:</p>
                                <textarea rows="4" cols="50" placeholder="Describe the event here"></textarea>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Cost:</p>
                                <form action="">
                                    <input type="radio" name="cost" checked="checked" value="free">Free<br>
                                    <input type="radio" name="cost" value="paid">Paid<br>
                                    <input type="number" class="input-new-event-card" placeholder="Cost">
                                </form>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Send new invites</p>
                                <input type="text" class="form-control input-new-event-card" placeholder="Username" aria-describedby="basic-addon1"> <a href="#" class="btn btn-md btn-success">Add</a>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Invites</p><br>
                            <select multiple="multiple">
                                <option>User 1</option>
                                <option>User 2</option>
                                <option>User 3</option>
                            </select><br/>
                            <a href="#" class="btn btn-md btn-danger">Remove</a>
                            </div>
                            <button type="button" class="btn btn-default btn-lg">
                               Update
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

{include file='common/footer.tpl'}
