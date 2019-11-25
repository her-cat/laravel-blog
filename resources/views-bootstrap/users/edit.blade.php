@extends('layouts.app')

@section('title', '编辑个人资料')

@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('users.update', $user->id) }}" method="post"  accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        @include('shared._error')

                        <div class="form-group">
                            <lable for="name-field">用户名</lable>
                            <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <lable for="email-field">邮箱</lable>
                            <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <lable for="introduction-field">个人简介</lable>
                            <textarea class="form-control" type="text" name="introduction" id="introduction-field" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                        </div>
                        <div class="form-group">
                            <lable for="avatar-field">头像</lable>
                            <input class="form-control-file" type="file" name="avatar">
                            <br/>
                            <img class="img-thumbnail img-responsive" src="{{ $user->avatar }}" width="200">
                        </div>

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
