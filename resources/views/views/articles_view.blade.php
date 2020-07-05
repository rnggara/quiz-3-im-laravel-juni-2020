@extends('layouts.master')

@section('content_title')
    List Articles
@endsection

@section('content')
    <div class="mb-2">
        <a href="/articles/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create Article</a>
    </div>
    <table class="display table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Tag</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $catData)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$catData->title}}</td>
                <td>
                    <?php
                        $tag = explode(",", $catData->tag);
                        foreach ($tag as $keyTag => $catTag){ ?>
                            <span class="badge badge-info">{{$catTag}}</span>
                        <?php }
                    ?>
                </td>
                <td>
                    <a href="/articles/{{$catData->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="/articles/{{$catData->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <form method="post" action="/articles/{{$catData->id}}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete data?');"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('css')
    <link href="{{asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("table.display").DataTable();
            Swal.fire({
                title: 'Berhasil!',
                text: 'Memasangkan script sweet alert',
                icon: 'success',
                confirmButtonText: 'Cool'
            })
        });
    </script>
@endpush
