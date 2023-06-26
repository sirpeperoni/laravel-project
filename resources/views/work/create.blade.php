@extends('layouts.base')



@section('content')
{{--    <a href="{{route('works')}}" class="btn btn-block btn-primary">Добавить</a>--}}

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Добавление </h3>
        </div>


        <x-form action="{{ route('api.works.store') }}" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="work_id">{{__('WORK_ID')}}</label>
                    <input type="text" class="form-control" name="id" placeholder="Enter id">
                </div>
                <div class="form-group">
                    <label for="work_name">{{__('WORK_NAME')}}</label>
                    <input type="text" class="form-control" name="work_name" placeholder="Enter name">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{__('Добавить')}}</button>
            </div>
        </x-form>
        <x-form>
            <div class="card-body">
                @if(empty($data))

                @else
                    {{"Request_id = "}}
                {{$data}}
                @endif
            </div>
        </x-form>
    </div>
@endsection

