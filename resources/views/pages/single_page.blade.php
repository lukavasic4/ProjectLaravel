@extends('layouts.template')
@section('title')
    @parent
    Single Page
@endsection
@section('center')
    <section class="banner-bottom-w3ls-agileinfo py-5">
        <!--/blog-->
        <div class="container py-md-3">
            <h2 class="heading text-capitalize mb-sm-5 mb-3"> Single Page </h2>
            <div class="row inner-sec-wthree-agileits">
                <div class="col-lg-8 blog-sp">
                    @foreach($singleBlog as $b)
                        @component("partials.single",[
                        "blog" => $b
                        ]);
                    @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
