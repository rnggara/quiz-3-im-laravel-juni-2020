@extends('layouts.master')

@section('content_title')
    Detail Articles
@endsection

@section('content')
    @foreach($data as $key=>$catData)
        @if($catData->id == $id)
            <div class="form-group">
                <h3>{{strtoupper($catData->title)}}</h3>
                <span class="text-muted text-xs">Slug: {{$catData->slug}}</span>
            </div>
            <hr class="sidebar-divider">
            <p>{{$catData->content}}</p>
            <hr class="sidebar-divider">
            <span>Tag: <?php
                $tag = explode(",", $catData->tag);
                foreach ($tag as $keyTag => $catTag){ ?>
                            <span class="badge badge-info">{{$catTag}}</span>
                        <?php }
                ?></span>
        @endif
    @endforeach
@endsection
