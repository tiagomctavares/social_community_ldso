@extends('layouts.auth')

@section('panelTitle')
    Register
@endsection

@section('form')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('id_card') ? ' has-error' : '' }}">
            <label for="id_card" class="col-md-4 control-label">Id card number:</label>

            <div class="col-md-6">
                <input id="id_card" type="text" class="form-control" name="id_card" value="{{ old('id_card') }}" required>

                @if ($errors->has('id_card'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_card') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
            <label for="id_card" class="col-md-4 control-label">Birth Date (YYYYMMDD):</label>

            <div class="col-md-6">
                <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>

                @if ($errors->has('birth_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birth_date') }}</strong>
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

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <input type = "submit" value="Register"/>
            </div>
        </div>
    </form>
@endsection
