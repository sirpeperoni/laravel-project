@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table id="example2_wrapper" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                        <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">WORK_ID</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">WORK_NAME</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">CREATED_AT</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">STATUS</th><th class="sorting col-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Настройки</th></tr>
                        </thead>
                        <tbody>
                            @if(empty($works))
                                <tr>
                                    <td>{{__('Нет ни одной работы')}}</td>
                                </tr>
                            @else
                                @foreach($works as $work)
                                    <tr>
                                        <td>{{$work->id}}</td>
                                        <td>{{$work->work_name}}</td>
                                        <td>{{$work->created_at}}</td>
                                        @if($work->status == "Wait")
                                            <td><span class="tag tag-success">{{__('Wait')}}</span></td>
                                        @elseif($work->status == "Process")
                                            <td><span class="tag tag-success">{{__('Process')}}</span></td>
                                        @else
                                            <td><span class="tag tag-success">{{__('Done')}}</span></td>
                                        @endif
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                    <x-form action="{{ route('works.destroy', $work->id)}}" method="POST">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <x-button type="submit" color="primary" id_work="{{$work?->id}}">Удалить</x-button>
                                                    </x-form>
                                                    @if($work->status == "Wait")
                                                        <x-form action="{{ route('works.startWork', $work->id)}}">
                                                            <x-button type="submit" color="primary" id_work="{{$work?->id}}">Запуск</x-button>
                                                        </x-form>
                                                    @elseif($work->status == "Process")
                                                        <x-form action="{{ route('works.startWork', $work->id)}}">
                                                            <x-button type="button" color="secondary" id_work="{{$work?->id}} ">Процесс</x-button>
                                                        </x-form>
                                                    @else
                                                        <x-form action="{{ route('works.startWork', $work->id)}}">
                                                            <x-button type="button" color="success" id_work="{{$work?->id}} ">Done</x-button>
                                                        </x-form>
                                                    @endif
                                                </div>
                                        </td>
                                    </tr>
                              @endforeach
                           @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
