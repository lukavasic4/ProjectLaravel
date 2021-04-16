<article class="blog-x row">
    <div class="blog_info">
        <div class="blog-img">
            <a>
                <img src="{{url("/images")}}/{{$blog->image}}" alt="" class="img-fluid" />
            </a>
        </div>
        <h5>
            <a href="#">{{$blog->title}}</a>
        </h5>
        <p>{{$blog->description}}</p>
        <p>Author: {{$blog->first_name}} {{$blog->last_name}}</p>

    </div>
    <div class="clearfix"></div>
</article>
