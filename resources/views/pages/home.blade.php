@extends('layouts.template')
@section('title')
    @parent
    Home
@endsection
@section('center')
    <div class="gallery py-5">
        <div class="container py-sm-3">
             <div class="row gallery-grids" id="galerija">
                @foreach($blogs as $b)
                    @component('partials.item',[
                    "item" => $b
                    ]);
                    @endcomponent
                @endforeach
             </div>
        </div>
    </div>
@endsection
