@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-info">
                <div class="box-header">
                    <h1 class="box-title">{{ $estate->address }}</h1>
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
                            <b>Ціна:</b> {{ $estate->price }}
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
                        @if($estate->photos->count())
                        <li class="list-group-item">
                            @foreach($estate->photos as $photo)
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-default-{{ $photo->id }}">
                                    <img src="{{ $photo->publicPath }}" alt="" width="100px">
                                </a>
                                <div class="modal fade" id="modal-default-{{ $photo->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $photo->publicPath }}" alt="" width="100%">
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            @endforeach
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection