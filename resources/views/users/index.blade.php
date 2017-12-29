@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h1 class="box-title">Користувачі</h1>

                    <div class="box-tools">
                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Додати</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Ім'я</th>
                                        <th>Емейл</th>
                                        <th>Адміністратор</th>
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                                            <th width="100px"></th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @unless($users->count())
                                        <tr>
                                            <td colspan="{{ \Illuminate\Support\Facades\Auth::user()->is_admin ? 4 : 3 }}">
                                                Користувачів не знайдено
                                            </td>
                                        </tr>
                                    @endunless
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td><span class="label {{ $user->is_admin ? 'bg-green' : 'bg-red' }}">{{ $user->is_admin ? 'так' : 'ні' }}</span></td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                       class="btn btn-primary"><i class="icon ion-edit"></i></a>
                                                    {!! Form::open([ 'route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'class' => 'inline']) !!}
                                                    <button type="submit" class="btn btn-danger delete"><i
                                                                class="icon ion-trash-a"></i></button>
                                                    {!! Form::close() !!}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal delete-->
    <div id="model-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    Ви дійсно бажаєте видалити користувача?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Відмінити</button>
                    <button type="button" class="btn btn-primary">Видалити</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.delete').click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                var form = $(this).closest('form');

                $('#model-delete').modal();
                $('#model-delete .btn-primary').click(function (e) {
                    $(form).submit();
                });
            });
        });
    </script>
@endsection
