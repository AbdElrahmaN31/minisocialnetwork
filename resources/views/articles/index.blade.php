@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($articles as $article)
                    <div class="col-md-8">
                        <div class="card" style="margin-bottom: 12px">
                            <div class="card-header">
                                <span>Article Author</span>
                                <span class="float-right">
                                {{ $article->created_at->diffForhumans() }}
                            </span>
                            </div>
                            <div class="card-body">
                                {{ $article->getShortContentAttribute() . '...' }}
                                <a href="/articles/{{ $article->id }}">Read more</a>
                            </div>
                            <div class="card-footer clearfix"
                            style="background-color: white">
                                @if($article->user_id == \Illuminate\Support\Facades\Auth::id())
                                    <form action="/articles/{{ $article->id }}" method="Post"
                                          class="float-right" style="margin-left: 25px">
                                        {{csrf_field()}}
                                        {{ method_field('Delete') }}
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endif
                                <i class="fa fa-heart float-right"></i>
                            </div>
                        </div>
                </div>
            @empty
                No Articles
            @endforelse


        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
