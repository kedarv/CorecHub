@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <br/>
      <div class="well">
        <h1 class="text-left">Manage Profile</h1>
        <hr/>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Authentication Settings
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                {{Form::open(array('action' => 'UsersController@manage', 'id' => 'manage'))}}
                <div class="form-group">
                  {{Form::label('puid', 'Purdue ID (PUID)')}}
                  {{Form::text("puid", Crypt::decrypt(Auth::user()->puid), array("placeholder" => "PUID", "class" => "form-control"))}}
                </div>
                <div class="form-group">
                  {{Form::label('email', '@purdue Email Address')}}
                  {{Form::text("email", Auth::user()->email, array("placeholder" => "user@purdue.edu", "class" => "form-control"))}}
                </div>
                <div class="text-right">
                  {{Form::submit('Submit Changes', array("class" => "btn btn-newgold"))}}
                </div>
                {{Form::close()}}
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Profile Settings
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                Nothing to see here.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@stop