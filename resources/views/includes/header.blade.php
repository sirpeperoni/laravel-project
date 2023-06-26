<h3 class="card-title text-center"><a href="{{route("works")}}">{{__('Список')}}</a></h3>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <x-button type="submit" color="outline-success" size="lg">
        <a href="{{route('works.create')}}">{{__('Create')}}</a>
    </x-button>
    <x-button type="submit" color="outline-success" size="lg">
        <a href="{{route('works.check')}}">{{__('Check')}}</a>
    </x-button>
</div>
