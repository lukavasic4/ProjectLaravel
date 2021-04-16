@extends('layouts.template')
@section('title')
    @parent
    Admin page
@endsection
@section('center')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 center">
                        <h2 class="title-1 m-b-25">Users</h2>
                        <div class="table-responsive table--no-card m-b-10 m-l-10">
                            <table class="table table-striped bg-flat-color-5">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allUsers as $au)
                                    @component('admin.components.admin_users',['au' => $au]);
                                    @endcomponent
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8 center">
                        <h2 class="title-1 m-b-25">Allowed blogs</h2>
                        <div class="table-responsive table--no-card m-b-10 m-l-10">
                            <table class="table table-striped bg-flat-color-5">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Creation time</th>
                                    <th>Author</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody id="blogs">
                                @foreach($allowedBlogs as $ab)
                                    @component('admin.components.admin_blogs',['ab' => $ab]);
                                    @endcomponent
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8 center">
                        <h2 class="title-1 m-b-25">Not allowed blogs</h2>
                        <div class="table-responsive table--no-card m-b-10 m-l-10">
                            <table class="table table-striped bg-flat-color-5">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Creation time</th>
                                    <th>Author</th>
                                    <th>Allowed</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody id="nab">
                                @foreach($notAllowed as $na)
                                    @component('admin.components.admin_notAllowed_blogs',['na' => $na]);
                                    @endcomponent
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
