@extends('layouts.app')

@section('title', 'Blug | Data Post')

@section('css')
@endsection

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Post {{ $post->title }}</h5>
        </div>
        <div class="ibox-content">
            <div class="float-right">
                @foreach ($post->categories as $item)
                    <button class="btn btn-white btn-xs" type="button">{{ $item->name }}</button>
                @endforeach
            </div>
            <div class="text-center article-title">
                <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $post->getTanggal() }}</span>
                <h1>
                    {{ $post->title }}
                </h1>
                <img alt="image" class="img-fluid" src="{{ asset('storage/post/' . $post->thumbnail) }}">
            </div>
            {{-- content post --}}
            {!! str_replace('<img class="center"', '<img class="mx-auto d-block"', $post->content) !!}
            <center>
            </center>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    {{--  --}}
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                        <i class="fa fa-eye"> </i> 144 views
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <h2>Comments:</h2>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html" class="float-left">
                                <img alt="image" src="./INSPINIA _ Article_files/a1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html#">
                                    Andrew Williams
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                default model text.
                            </p>
                        </div>
                    </div>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html" class="float-left">
                                <img alt="image" src="./INSPINIA _ Article_files/a2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html#">
                                    Michael Novek
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                        </div>
                    </div>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html" class="float-left">
                                <img alt="image" src="./INSPINIA _ Article_files/a3.jpg">
                            </a>
                            <div class="media-body">
                                <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html#">
                                    Alice Mediater
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                        </div>
                    </div>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html" class="float-left">
                                <img alt="image" src="./INSPINIA _ Article_files/a5.jpg">
                            </a>
                            <div class="media-body">
                                <a href="https://webapplayers.com/inspinia_admin-v2.9.4/article.html#">
                                    Monica Flex
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('registered/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('registered/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    // {
                    //     extend: 'csv'
                    // },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });
    </script>
@endsection
