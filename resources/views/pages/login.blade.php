@extends('layouts.template')
@section('title')
    @parent
    Log in
@endsection
@section('center')
    <section class="contact py-5">
        <div class="container">
            <h2 class="heading text-capitalize mb-sm-5 mb-4">Log in</h2>
            <div class="mail_grid_w3l">
                @isset($errors)
                    @foreach($errors->all() as $error)
                        {{ $error }}.<br>
                    @endforeach
                @endisset
                @if(session()->has('message'))
                    {{ session('message') }}
                @endif
                <form action="{{url('/login')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 contact_left_grid" data-aos="fade-right">
                            <div class="contact-fields-w3ls">
                                <input type="email" name="logEmail" id="logEmail" placeholder="Email" required=""/>
                            </div>
                            <div class="contact-fields-w3ls">
                                <input type="password" name="logPassword" id="logPassword" placeholder="Passwd" required=""/>
                            </div>
                            <div class="contact-fields-w3ls">
                                <input type="submit" value="Submit" name="btnLogin" id="btnLogin">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
