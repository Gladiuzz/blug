@extends('layouts.app')

@section('title', 'Blug | Data Category')

@section('css')
    <link href="{{ asset('registered/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection


@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Data Category Post</h5>
            <div class="ibox-tools">
                <a href="{{ route('post-category.create') }}" class="border border-dark rounded bg-dark p-2">
                    <i class="fa fa-plus"></i>
                    Add Category
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('post-category.edit', ['post_category' => $item->id]) }}"><i
                                            class='fa btn btn-warning fa-edit'></i></a>
                                    <a href="#" data-toggle="modal" data-target="#delete{{ $item->id }}"> <i
                                            class='fa fa-trash btn btn-danger'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            @foreach ($category as $item)
                <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to delete {{ $item->name }} category?
                            </div>
                            <form action="{{ route('post-category.destroy', ['post_category' => $item->id]) }}"
                                method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

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
