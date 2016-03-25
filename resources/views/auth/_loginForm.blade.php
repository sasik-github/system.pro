<form class="center" role="form" method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}

    <fieldset class="registration-form">
        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
            {{--<label class="col-md-4 control-label">Телефон</label>--}}

            {{--<div class="col-md-6">--}}
                <input type="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="Телефон">

                @if ($errors->has('telephone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                    </span>
                @endif
            {{--</div>--}}
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{--<label class="col-md-4 control-label">Пароль</label>--}}

            {{--<div class="col-md-6">--}}
                <input type="password" class="form-control" name="password" placeholder="Пароль">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            {{--</div>--}}
        </div>

        <div class="form-group">
            {{--<div class="col-md-6 col-md-offset-4">--}}
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Запомнить меня
                    </label>
                </div>
            {{--</div>--}}
        </div>

        <div class="form-group">
            {{--<div class="col-md-6 col-md-offset-4">--}}
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa fa-btn fa-sign-in"></i>Войти
                </button>


            {{--</div>--}}
        </div>
        <div class="form-group">
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
        </div>
    </fieldset>
</form>