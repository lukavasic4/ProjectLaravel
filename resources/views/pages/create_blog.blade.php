@extends('layouts.template')
@section('title')
    @parent
    Create
@endsection
@section('center')
    <section class="contact py-5">
        <div class="container">
            <h2 class="heading text-capitalize mb-sm-5 mb-4">Create blog</h2>
            <div class="mail_grid_w3l">
                @isset($errors)
                    @foreach($errors->all() as $error)
                        {{ $error }}.<br>
                    @endforeach
                @endisset
                <form action="{{url('/addBlog')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Image</label>
                        <input type="file" name="add_image_blog" class="form-control" >
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Title</label>
                        <input name="title_add" type="text" class="form-control" >
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="cc-number" class="control-label mb-1">Description</label>
                        <input type="text" name="description_add" class="form-control "/>
                    </div>
                    <div>
                        <button id="payment-button" name="btnAddBlog" type="submit"  class="btn btn-lg btn-outline-success btn-block">
                            <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                        </button>
                    </div>
                </form>
            </div>
            <div class="tabela mail_grid_w3l">
                <h2 class="title-1 m-b-25">My blogs</h2>
                <div class="table-responsive table--no-card m-b-10 m-l-10">
                    <table class="table table-striped bg-flat-color-5">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Creation time</th>
                            <th>Name</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody id="myblogs">
                            @foreach($userBlogs as $ub)
                                @component('partials.myblogs',['ub' => $ub])
                                @endcomponent
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mail_grid_w3l" id="updateForm">
                <h2 class="heading text-capitalize mb-sm-5 mb-4">Update form</h2>
                @isset($errors)
                    @foreach($errors->all() as $error)
                        {{ $error }}.<br>
                    @endforeach
                @endisset
                <form action="{{url('/update/blog')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Image</label>
                        <input type="file" name="update_image_blog" id="update_image_blog" class="form-control" >
                    </div>
                    <input type="hidden" id="idUpdate" name="idUpdate">
                    <div class="form-group">
                        <label for="cc-name" class="control-label mb-1">Title</label>
                        <input name="titleUpdate" id="titleUpdate" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="cc-number" class="control-label mb-1">Description</label>
                        <input type="text" name="descriptionUpdate" id="descriptionUpdate" class="form-control"/>
                    </div>
                    <div>
                        <button id="payment-button" name="btnUpdateBlog" type="submit"  class="btn btn-lg btn-outline-success btn-block">
                            <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
