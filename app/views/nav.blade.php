<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CorecHub</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check()))
          <li><a href="{{action('UsersController@logout')}}">Log Out</a></li>
        @else
        <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
              </div>
              <div class="modal-body">
              <div id="error" class="alert hide"></div>
              {{Form::open(array('action' => 'UsersController@doLogin', 'id' => 'login'))}}
                <div class="form-group">
                  {{Form::email("email", null, array("placeholder" => "user@purdue.edu", "class" => "form-control input-lg"))}}
                </div>
                <div class="form-group">
                  {{Form::password("password", array("placeholder" => "Password", "class" => "form-control input-lg"))}}
                </div>
                <div class="form-group">
                  {{--Form::captcha()--}}
                </div>
                {{Form::submit('Sign in', array("class" => "btn btn-newgold btn-lg btn-block"))}}
              {{Form::close()}}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Login</button>
              </div>
            </div>
          </div>
        </div>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>