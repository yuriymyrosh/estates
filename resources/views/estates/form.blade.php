@extends('layouts.app')

@section('content')

    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">{{ $title }}</h1>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['route' => 'estates.store', 'files' => true, 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', 'Назва', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::text('name', $estate->name, [
                    'id' => 'name',
                    'class' => 'form-control',
                    'placeholder' => 'Назва'
                    ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Адрес', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::text('address', $estate->address, [
                    'id' => 'address',
                    'class' => 'form-control',
                    'placeholder' => 'Адрес'
                    ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('region_id', 'Район', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::select('region_id', $regions, $estate->region_id, [
                    'id' => 'region_id',
                    'class' => 'form-control',
                    ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('room_option_id', 'Кількість кімнат', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::select('room_option_id', $roomOptions, $estate->room_option_id, [
                    'id' => 'room_option_id',
                    'class' => 'form-control',
                    ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Опис', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::textarea('description', $estate->description, [
                     'id' => 'description',
                     'class' => 'form-control',
                     'placeholder' => 'Опис'
                     ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Телефон власника', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::text('phone', $estate->phone, [
                    'id' => 'phone',
                    'class' => 'form-control',
                    'placeholder' => '+38(032)322-22-22'
                    ]) !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Додати</button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
    <!-- /.box -->

@endsection