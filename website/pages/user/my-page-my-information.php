<?php
include('../../templates/header.php');
include('../../templates/menu.php');
include('../../templates/aside-menu.php');
?>

<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
      <div class="page-header">
        <h1>My information</h1>
      </div>
      <div class="row personal-card">
        <div class="col-sm-4 tags-personal-card">
          <div class="content-personal">
            <p class="tag-personal-card">Username:</p>
            <p id="username">ruivop</p>
            <a href="#">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
          </div>
          <div class="content-personal">
            <p class="tag-personal-card">Email:</p>
            <p id="email">lalaland@lalaland.pt</p>
            <a href="#">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
          </div>
          <div class="content-personal">
            <p class="tag-personal-card">Name:</p>
            <p id="nome-utilizador">Rui Paiva</p>
            <a href="#">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
          </div>
          <div class="content-personal">
            <p class="tag-personal-card">Bithday:</p>
            <p id="datanascimento">18/03/1996</p>
            <a href="#">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
          </div>
          <div class="content-personal">
            <p class="tag-personal-card">Password:</p>
            <p id="password">********</p>
            <a href="#">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
          </div>
        </div>

        <div class="col-sm-3 inoformation-personal-card">
        </div>
        <div class="col-sm-4 photo-personal-card">
          <img src="../../resources/images/image.jpeg" class="img-responsive img-thumbnail">
            <div>
              <label for="files" class="btn btn-default">Upload photo</label>
              <input id="files" style="visibility:hidden;" type="file">
                            </div>
          </div>

        <div class="col-sm-1 inoformation-personal-card">
        </div>
      </div>
    </content>
  </div>

<?php include('../../templates/footer.php'); ?>