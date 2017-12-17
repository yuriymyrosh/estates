@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-info">
                <div class="box-header">
                    <h1 class="box-title">{{ $user->name }}</h1>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Емейл:</b> {{ $user->email }}
                        </li>
                        <li class="list-group-item">
                            <b>Адміністратор:</b> {{ $user->is_admin ? 'Так' : 'Ні' }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection