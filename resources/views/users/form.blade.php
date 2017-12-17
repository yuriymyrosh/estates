@extends('layouts.app')

@section('content')

    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">{{ $title }}</h1>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['route' => $route, 'method' => $method, 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Ім\'я', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::text('name', $user->name, [
                    'id' => 'name',
                    'class' => 'form-control',
                    'placeholder' => 'Ім\'я'
                    ]) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Емейл', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::email('email', $user->email, [
                    'id' => 'email',
                    'class' => 'form-control',
                    'placeholder' => 'admin@gmail.com'
                    ]) !!}
                    @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('is_admin') ? 'has-error' : ''}}">
                {!! Form::label('is_admin', 'Адміністратор', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::checkbox('is_admin', 1, $user->is_admin, [
                    'id' => 'is_admin',
                    'class' => '',
                    ]) !!}
                    @if($errors->has('is_admin'))
                        <span class="help-block">{{$errors->first('is_admin')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">Пароль</label>

                <div class="col-md-10">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-sm-2 control-label">Підтвердити пароль</label>

                <div class="col-md-10">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Зберегти</button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
    <!-- /.box -->

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('[data-mask]').inputmask();
        })
    </script>
@endsection