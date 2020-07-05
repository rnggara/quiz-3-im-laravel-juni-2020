@extends('layouts.master')

@section('content_title')
    Form Create Articles
@endsection

@section('content')
    @foreach($data as $key=>$catData)
        @if($catData->id == $id)
        <form method="post" action="/articles/{{$catData->id}}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-form-label col-2 text-right">Title</label>
                <input type="text" class="form-control col-6" name="_title" value="{{$catData->title}}">
            </div>
            <div class="form-group row">
                <label class="col-form-label col-2 text-right">Content</label>
                <textarea class="form-control col-6" name="_content">{{$catData->content}}</textarea>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-2 text-right">Tag</label>
                <input type="text" class="col-6 form-control" name="_tag" data-role="tagsinput" value="{{$catData->tag}}">
            </div>
            <div class="form-group row">
                <label class="col-form-label col-2 text-right"></label>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        @endif
    @endforeach
@endsection


@push('css')
    <link href="{{asset('sbadmin2/vendor/tags-input/tagsInput.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('sbadmin2/vendor/tags-input/tagsInput.js')}}"></script>
@endpush
