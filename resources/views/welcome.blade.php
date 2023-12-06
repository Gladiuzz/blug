@extends('layouts.app_guest')

@section('title', 'Blog Website')

@section('content')
    <!-- start of banner -->
    @include('includes.banner')
    <!-- end of banner -->
    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Recent Post</h2>
                    <div class="row">
                        {{-- post card --}}
                        @foreach ($post as $item)
                            <div class="col-lg-6 col-sm-6">
                                <article class="card mb-4">
                                    <div class="post-slider slider-sm">
                                        <img src="{{ asset('storage/post/' . $item->thumbnail) }}" class="card-img-top"
                                            style="object-fit: cover; height: 200px" alt="post-thumb">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="h4 mb-3"><a class="post-title"
                                                href="post-details.html">{{ $item->title }}</a></h3>
                                        <ul class="card-meta list-inline">
                                            <li class="list-inline-item">
                                                <a href="author-single.html" class="card-meta-author">
                                                    <img src="{{ asset('storage/user/' . $item->author->avatar) }}">
                                                    <span>{{ $item->author->name }}</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <i
                                                    class="ti-timer"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti-calendar"></i>{{ $item->getShortDate() }}
                                            </li>
                                            <li class="list-inline-item">
                                                <ul class="card-meta-tag list-inline">
                                                    @foreach ($item->categories as $items)
                                                        <li class="list-inline-item"><a
                                                                href="tags.html">{{ $items->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                        <p>
                                        </p>
                                        <a href="{{ route('post-detail', ['title' => $item->title]) }}"
                                            class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        {{-- end post card --}}
                    </div>
                </div>
                <aside class="col-lg-4 @@sidebar">
                    <!-- authors -->
                    @foreach ($user as $item)
                        <div class="widget widget-author">
                            <h4 class="widget-title">Authors</h4>
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
                        </div>
                    @endforeach

                    <!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            @foreach ($category as $item)
                                <li class="list-inline-item"><a href="tags.html">{{ $item->name }}</a></li>
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
            </div>
        </div>
    </section>
@endsection
