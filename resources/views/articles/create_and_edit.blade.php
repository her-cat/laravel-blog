@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 offset-md-1">
            <div class="card ">

                <div class="card-body">
                    <h2 class="">
                        <i class="far fa-edit"></i>
                        @if($article->id)
                            编辑文章
                        @else
                            发布文章
                        @endif
                    </h2>

                    <hr>

                    @if($article->id)
                        <form action="{{ route('articles.update', $article->id) }}" method="post" accept-charset="UTF-8">
                            {{ method_field('put') }}
                    @else
                        <form action="{{ route('articles.store') }}" method="POST" accept-charset="UTF-8">
                    @endif
                            {{ csrf_field() }}

                            @include('shared._error')

                            <div class="form-group">
                                <input class="form-control" type="text" name="title" value="{{ old('title', $article->title ) }}" placeholder="请填写标题" required />
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="category_id" required>
                                    <option value="" hidden disabled selected>请选择分类</option>
                                    @foreach ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <textarea name="content" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('content', $article->content ) }}</textarea>
                            </div>

                            <div class="well well-sm">
                                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
