@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                    </form>

                    <script>

                        BootstrapDialog.show({
                            message:
//                            '<form id="data-form"> ' +
//                            '<div class="row"> ' +
//
//                            '<div class="col-sm-4"><label>Name </label></div>' +
//                            '<div class="col-sm-8"><input type="text" class="form-control"></div>'+
//
//                            '</div>'+
//                            '' +
//                            '</form>',
                            '',
                            buttons: [{
                                icon: 'glyphicon glyphicon-send',
                                label: 'Send ajax request',
                                cssClass: 'btn-primary',
                                autospin: true,
                                action: function(dialogRef){
                                    dialogRef.enableButtons(false);
                                    dialogRef.setClosable(false);
                                    dialogRef.getModalBody().html('Dialog closes in 5 seconds.');

                                    $.post('/send',$('#data-form').serialize(),function(){
                                        alert('hello');
                                    })
                                    setTimeout(function(){
//                                        dialogRef.close();

                                    }, 5000);
                                }
                            }, {
                                label: 'Close',
                                action: function(dialogRef){
                                    dialogRef.close();
                                }
                            }]
                        });


                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
