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
                    <form method="POST" action="../../actions/event/edit_event.php">
                    <input type="hidden" value="{$event_id}" name="id"/>
                        <div class="col-sm-4 tags-personal-card">
                            <div class="content-new-event">
                                <p class="tag-new-event-card">Event Name:</p>
                                <input type="text" class="form-control input-new-event-card" value="{$event.name}" placeholder="Event Name" aria-describedby="basic-addon1" name="name">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Date:</p>
                                <input type="date" value="{$date}" class="form-control input-new-event-card" placeholder="Date" aria-describedby="basic-addon1" name="data">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Local:</p>
                                <input type="text" value="ISG" class="form-control input-new-event-card" placeholder="Local" aria-describedby="basic-addon1" name="local">
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Description:</p>
                                <textarea rows="4" cols="50" placeholder="" name="description">{$event.description}</textarea>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Cost:</p>
                                
                                    <input type="radio" name="cost" {if $event.free} checked="checked" {/if} value="free">Free<br>
                                    <input type="radio" name="cost" {if !$event.free} checked="checked" {/if} value="paid">Paid<br>

                                    
                                    <input type="number" class="input-new-event-card" placeholder="Cost" value="{$price}" name="price">
                                
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Send new invites</p>
                                <input type="text" class="form-control input-new-event-card" placeholder="Username" aria-describedby="basic-addon1"> <a href="#" class="btn btn-md btn-success">Add</a>
                            </div><div class="content-new-event">
                                <p class="tag-new-event-card">Invites</p><br>
                            <select multiple="multiple">
                            <!-- TODO! -->
                                <!--<option>User 1</option>
                                <option>User 2</option>
                                <option>User 3</option>-->
                            </select><br/>
                            <a href="#" class="btn btn-md btn-danger">Remove</a>
                            </div>
                            <input type="submit" value="Update" class="btn btn-default btn-lg"/>
                            
                        </div>
                        <div class="col-sm-3 inoformation-personal-card">
                        </div>
                        <div class="col-sm-4 photo-personal-card">
                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                            <button type="button" class="btn btn-default btn-lg">
                                Upload an event photo
                            </button>
                        </div>
                        </form>
                    </div>
                </div>

            </content>
        </div>
    </div>

{include file='common/footer.tpl'}
