@extends('layouts.base')



@section('content')
    {{--    <a href="{{route('works')}}" class="btn btn-block btn-primary">Добавить</a>--}}

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Добавление </h3>
        </div>


        <x-form action="{{ route('api.works.checkId') }}" method="POST">
            <div class="card-body">
                <div class="form-group">
                        <label for="request_id">{{__('REQUEST_ID')}}</label>
                    <input type="text" class="form-control" name="request_id" placeholder="Enter id">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{__('Проверить')}}</button>
            </div>
        </x-form>
        <x-form>
            <div class="card-body">
                @if(empty($work))

                @else
                    {{"Request_id = "}}
                    {{$work->request_id}}
                @endif
            </div>
        </x-form>
    </div>
@endsection

