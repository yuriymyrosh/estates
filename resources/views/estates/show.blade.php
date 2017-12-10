@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title">{{ $estate->name }}</h1>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Адреса:</b> {{ $estate->address }}
                        </li>
                        <li class="list-group-item">
                            <b>Телефон:</b> {{ $estate->phone }}
                        </li>
                        <li class="list-group-item">
                            <b>Кількість кімнат:</b> {{ $estate->roomOption->name }}
                        </li>
                        <li class="list-group-item">
                            <b>Район:</b> {{ $estate->region->name }}
                        </li>
                        <li class="list-group-item">
                            <b>Опис:</b> {{ $estate->description }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection