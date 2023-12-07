@extends('layouts.app_guest')

@section('title', 'Blug | ' . $post->title)
@section('content')
    <div class="py-4"></div>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{ asset('storage/post/' . $post->thumbnail) }}" class="card-img" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $post->title }}</h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('author-detail', ['name' => $post->author->name]) }}" class="card-meta-author">
                                    <img src="{{ asset('storage/user/' . $post->author->avatar) }}">
                                    <span>{{ $post->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $post->getShortDate() }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($post->categories as $items)
                                        <li class="list-inline-item"><a href="tags.html">{{ $items->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div class="content">
                            {!! str_replace('<img class="center"', '<img class="mx-auto d-block"', $post->content) !!}
                        </div>
                    </article>

                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="mb-5 border-top mt-4 pt-5">
                        <h3 class="mb-4">Comments</h3>
                        @foreach ($post->comment as $comment)
                            <div class="media d-block d-sm-flex mb-4 pb-4">
                                <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                                    <img src="{{ asset('storage/user/' . $comment->user->avatar) }}"
                                        class="mr-3 rounded-circle avatar-img img-fluid" alt=""
                                        style="    width: 80px;
                                    height: 80px;
                                    overflow: hidden;
                                    display: flex;
                                    justify-content: center;
                                    object-fit: cover;
                                    align-items: center;">
                                </a>
                                <div class="media-body">
                                    <a href="#!" class="h4 d-inline-block mb-3">{{ $comment->user->name }}</a>

                                    <p>
                                        {{ $comment->comment }}
                                    </p>

                                    <span class="text-black-800 mr-3 font-weight-600">{{ $comment->getDate() }}</span>
                                    {{-- <a class="text-primary font-weight-600" href="#!">Reply</a> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div>
                        <h3 class="mb-4">Leave a Reply</h3>
                        <form method="POST" action="{{ route('comment.store') }}" enctype="multipart/form-data"
                            role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control shadow-none" name="name" type="text" placeholder="Name"
                                        value="{{ @Auth::user()->name }}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control shadow-none" name="email" type="email"
                                        placeholder="Email" value="{{ @Auth::user()->email }}" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Comment Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
