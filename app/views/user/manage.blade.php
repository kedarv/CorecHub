@extends('layout')

@section('append_js')
<script>
  @if(Session::has('message'))
  $(window).load(function(){
    $('#myModal').modal('show');
  });
  @endif
  $('#manage').submit(function(e){
    e.preventDefault();
    var $form = $( this ),
    dataFrom = $form.serialize(),
    url = $form.attr( "action"),
    method = $form.attr( "method" );
    $('#error').fadeOut("fast");
    $.ajax({
      url: "{{action('UsersController@doManage')}}",
      data: dataFrom,
      type: method,
      beforeSend: function(request) {
        return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
      },
      success: function (response) {
        var errors = "";
        if (response['status'] == 'success') {
          $('#error').removeClass('hide alert-danger').addClass('alert-success').fadeIn("slow").html("Saved Settings");
        }
        else {
          $.each( response['text'], function( index, value ){
            jQuery("#" + index).parent('div').addClass('has-error');
            errors += (value  + "<br/>");
          })
          $('#error').removeClass('hide alert-success alert-danger').addClass('alert-danger').fadeIn("slow").html(errors);
        }
        console.log(response['text']);
      }
    });
  });
</script>
@stop

@section('content')
@if(Session::has('message'))
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Authentication Error</h4>
      </div>
      <div class="modal-body">
        We could not authenticate your information with Purdue. Please make sure that your PUID and <b>@purdue</b> email address are correct.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-newgold" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <br/>
      <div class="well">
        <h1 class="text-left">Manage Profile</h1>
        <hr/>
        <div id="error" class="alert no-display"></div>
        {{Form::open(array('action' => 'UsersController@manage', 'id' => 'manage'))}}
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
                <div class="form-group">
                  {{Form::label('puid', 'Purdue ID (PUID)*')}}
                  {{Form::text("puid", Crypt::decrypt(Auth::user()->puid), array("placeholder" => "PUID", "class" => "form-control"))}}
                </div>
                <div class="form-group">
                  {{Form::label('email', 'Purdue Email Address*')}}
                  {{Form::text("email", Auth::user()->email, array("placeholder" => "user@purdue.edu", "class" => "form-control"))}}
                </div>
                <div class="text-right">
                </div>
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      {{Form::label('firstname', 'First Name')}}
                      {{Form::text("firstname", Auth::user()->firstname, array("placeholder" => "First Name", "class" => "form-control"))}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      {{Form::label('lastname', 'Last Name')}}
                      {{Form::text("lastname", Auth::user()->last, array("placeholder" => "Last Name", "class" => "form-control"))}}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      {{Form::label('gender', 'Gender')}}
                      {{Form::select('gender', array(0 => 'Male', 1 => 'Female', 2 => 'Other'), null, array("class" => "form-control"))}}
                    </div>
                  </div>
				   <div class="col-md-12">
                    <div class="form-group">
                      {{Form::label('height', 'Height (in inches)')}}
                      {{Form::text("height", Auth::user()->height, array("placeholder" => "Height (ft)", "class" => "form-control"))}}
                    </div>
                  </div>  
				   <div class="col-md-12">
                    <div class="form-group">
                      {{Form::label('weight', 'Weight (in pounds)')}}
                      {{Form::text("weight", Auth::user()->weight, array("placeholder" => "Weight (lbs)", "class" => "form-control"))}}
                    </div>
                  </div>      
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                  Security Settings
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                Nothing to see here yet!
              </div>
            </div>
          </div>
          <hr/>
          {{Form::submit('Submit Changes', array("class" => "btn btn-newgold pull-right"))}}
          <br/>
        </div>
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>
@stop