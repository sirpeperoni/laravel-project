@props(['color' => 'primary', 'size'=>'', 'id_work' => '',])



<button {{$attributes->class([
    "btn btn-{$color}", ($size ? "btn-{$size}" : ''),
])->merge([
    'type' =>'button',
    'id_work'=> ($attributes->get('id_work') ?: $id_work),
])}} class="btn btn-primary">
    {{$slot}}
</button>
