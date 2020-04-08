@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>
                            Article By Renato
                            <small>
                                <a href="/articles/{{ $article->id }}/Edit">edit</a>
                            </small>
                        </span>
                        <span class="float-right">
                            {{$article->created_at->diffForHumans()}}
                        </span>
                    </div>
                    <div class="card-body">
                        {{ $article->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
