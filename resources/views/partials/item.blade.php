<div class="col-lg-3 col-md-4 col-sm-6 ggd baner-top small wow fadeInLeft animated" data-wow-delay=".5s">
    <a href="{{url("/single")}}{{"/".$item->id_blog}}" class="b-link-stripe b-animate-go  swipebox">
        <div class="gal-spin-effect vertical">
            <img src="{{'images/'.$item->image}}" alt=" " />
            <div class="gal-text-box">
                <div class="info-gal-con">
                    <h4>{{$item->title}}</h4>
                    <span class="separator"></span>
                    <p>{{$item->description}}</p>
                    <span class="separator"></span>
                </div>
            </div>
        </div>
    </a>
</div>
