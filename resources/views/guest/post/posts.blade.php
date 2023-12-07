@extends('layouts.app_guest')

@section('title', 'Blug | Posts')


@section('content')
    <section class="section">
        <div class="py-4"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    @if ($search)
                        <h1 class="h2 mb-4">Showing items from <mark>{{ $search }}</mark></h1>
                    @elseif ($tag)
                        <h1 class="h2 mb-4">Showing items from category <mark>{{ $tag }}</mark></h1>
                    @else
                        <h1 class="h2 mb-4">Blog</mark></h1>
                    @endif
                    @foreach ($post as $item)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{ asset('storage/post/' . $item->thumbnail) }}" class="card-img-top"
                                    alt="post-thumb" style="object-fit: cover; height: 300px">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title"
                                        href="{{ route('blog-detail', ['title' => $item->title]) }}">{{ $item->title }}</a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route('author-detail', ['name' => $item->author->name]) }}"
                                            class="card-meta-author">
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
                                                        href="{{ route('blog', ['tag' => $item->name]) }}">{{ $items->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <p>{!! Str::limit(strip_tags($item->content), 150, '...') !!}</p>
                                <a href="{{ route('blog-detail', ['title' => $item->title]) }}"
                                    class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    @endforeach

                </div>
                @include('includes.sidebar_guest')
            </div>
            <ul class="pagination justify-content-start">
                @if ($post->onFirstPage())
                    <li class="page-item">
                        <a href="#!" class="page-link">&laquo;</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $post->previousPageUrl() }}" class="page-link">&laquo;</a>
                    </li>
                @endif
                @for ($i = 1; $i <= $post->lastPage(); $i++)
                    <li class="page-item page-item {{ $i == $post->currentPage() ? 'active' : '' }}">
                        <a href="{{ $post->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor
                @if ($post->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $post->nextPageUrl() }}" class="page-link">&raquo;</a>
                    </li>
                @endif
            </ul>
        </div>
    </section>
@endsection
