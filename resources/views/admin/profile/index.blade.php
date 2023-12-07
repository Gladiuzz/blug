@extends('layouts.app')

@section('title', 'Blug | Profile')

@section('css')

@endsection


@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Profile Detail</h5>
                    <div class="ibox-tools">
                        <a class="" href="{{ route('profile.edit', ['profile' => $user->id]) }}">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <center>
                            <img src="{{ asset('storage/user/' . Auth::user()->avatar) }}" class="avatar-img img-fluid"
                                alt="Avatar">
                        </center>
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{ $user->name }}</strong></h4>
                        <p><i class="fa fa-book"></i> {{ $user->userDetail->job }}</p>
                        <h5>
                            About me
                        </h5>
                        <p>
                            @if ($user->userDetail->description == 'null')
                                No Description
                            @else
                                {{ $user->userDetail->description }}
                            @endif
                        </p>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity"
                                    height="16" width="32">
                                    <rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3"
                                        height="8.88888888888889"></rect>
                                    <rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3"
                                        height="5.333333333333333"></rect>
                                    <rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect>
                                    <rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3"
                                        height="10.666666666666666"></rect>
                                    <rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3"
                                        height="8.88888888888889"></rect>
                                    <rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect>
                                    <rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3"
                                        height="12.444444444444443"></rect>
                                    <rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3"
                                        height="5.333333333333333"></rect>
                                    <rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3"
                                        height="8.88888888888889"></rect>
                                    <rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3"
                                        height="3.5555555555555554"></rect>
                                </svg>
                                <h5><strong>{{ $user->post->count() }}</strong> Posts</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Activites</h5>
                </div>
                <div class="ibox-content">
                    <div>
                        @foreach ($user->post as $item)
                            <div class="feed-activity-list mt-3">
                                <div class="feed-element">
                                    <a href="https://webapplayers.com/inspinia_admin-v2.9.4/profile.html#"
                                        class="float-left">
                                        <img alt="image" class="avatar-container rounded-circle avatar-img"
                                            src="{{ asset('storage/user/' . $user->avatar) }}">
                                    </a>
                                    <div class="media-body ">
                                        <small
                                            class="float-right">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                                        <strong>{{ $user->name }}</strong> posted a new blog <a
                                            href="{{ route('post.show', ['post' => $item->id]) }}" target="_blank"
                                            rel="noopener noreferrer">{{ $item->title }}</a> <br>
                                        <small
                                            class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('hh:mm a') }}
                                            - {{ $item->getTanggal() }}</small>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button> --}}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')

@endsection
