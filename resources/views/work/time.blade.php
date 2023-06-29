@extends('layouts.base')



@section('content')
    {{--    <a href="{{route('works')}}" class="btn btn-block btn-primary">Добавить</a>--}}

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Время выполнения</h3>
        </div>


        <x-form action="{{ route('works.startWork', $work)}}" method="PUT">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Часов" name="hours">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Минут" name="minutes">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Секунд" name="seconds">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{__('Отправить')}}</button>
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

