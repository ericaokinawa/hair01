@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $profile_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10" for="career">スタイリスト歴</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="career" value="{{ $profile_form->career }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10" for="style">得意なスタイル</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="style" rows="20">{{ $profile_form->style }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10" for="counseling">カウンセリング方法</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="counseling" rows="20">{{ $profile_form->counseling }}</textarea>
                        </div>
                    </div>
                   <div class="form-group row">
                        <label class="col-md-10" for="shopname">店舗名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shopname" value="{{ $profile_form->shopname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10" for="url">店舗URL</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="url" value="{{ $profile_form->url }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-10" for="address">店舗住所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="address" value="{{ $profile_form->address }}">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection