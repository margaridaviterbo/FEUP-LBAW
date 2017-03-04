        <footer class="container-fluid text-center navbar-fixed-bottom" id="footer">
            <h5>LBAW 2016/17</h5>
        </footer>

        <script src="../scripts/classie.js"></script>
        <script src="../scripts/cbpAnimatedHeader.js"></script>
        <script src="../scripts/jquery-1.9.1.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>

    </body>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <p>
          
          <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  <span class="psw">Forgot <a href="#">password?</a></span>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </form>
          
          </p>
          <span>Don't have an account?<a href="../pages/register.php"> Register</a> here.</span>
      </div>


      <div class="modal-footer">
          <button type="submit" class="btn btn-success">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



</html>