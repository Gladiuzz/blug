<aside class="col-lg-4 @@sidebar">
    <!-- authors -->
    <div class="widget widget-author">
        <h4 class="widget-title">Authors</h4>
        @foreach ($user as $item)
            <div class="media align-items-center">
                <div class="mr-3">
                    <img class="widget-author-image" src="{{ asset('storage/user/' . $item->avatar) }}">
                </div>
                <div class="media-body">
                    <h5 class="mb-1"><a class="post-title"
                            href="author-single.html">{{ $item->name }}</a>
                    </h5>
                    {{-- <span>Author &amp; developer of Bexer, Biztrox theme</span> --}}
                </div>
            </div>
        @endforeach
    </div>

    <!-- tags -->
    <div class="widget">
        <h4 class="widget-title"><span>Tags</span></h4>
        <ul class="list-inline widget-list-inline widget-card">
            @foreach ($category as $item)
                <li class="list-inline-item"><a href="{{ route('blog', ['tag' => $item->name]) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <!-- Social -->
    <div class="widget">
        <h4 class="widget-title"><span>Social Links</span></h4>
        <ul class="list-inline widget-social">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
        </ul>
    </div>
</aside>
