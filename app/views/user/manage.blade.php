@extends('layout')

@section('append_js')
<script>
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
          $('#error').removeClass('hide').addClass('alert-danger').fadeIn("slow").html(errors);
        }
        console.log(response['text']);
      }
    });
  });
</script>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <br/>
      <div class="well">
        <h1 class="text-left">Manage Profile</h1>
        <hr/>
        <div id="error" class="alert no-display"></div>
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