@extends('layouts.profile')
@section('title', 'プロフィール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <form method="POST"action="{{ action('Admin\ProfileController@add') }}"></form>
                 @foreach($posts as $profile)
                    {{ $profile->id }}</br>
                   
                    <dl class="form-rtop row">
                        <dt class="col-sm-2" for="image">画像</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->image_path }}</dd>
                        
                        <dt class="col-sm-2" for="name">名前</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->name }}</dd>
                        
                        <dt class="col-sm-2" for="career">スタイリスト歴</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->career }}</dd>
                        
                        <dt class="col-sm-2" for="style">得意なスタイル</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->style }}</dd>
                        
                        <dt class="col-sm-2" for="counseling">カウンセリング方法</dt>
                        <dd class="col-sm-10 meta-name"> {{ $profile->counseling }}</dd>
                        
                        <dt class="col-sm-2" for="shopname">店舗名</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->shopname }}</dd>
                        
                        <dt class="col-sm-2" for="url">店舗URL</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->url }}</dd>
                        
                        <dt class="col-sm-2" for="address">店舗住所</dt>
                        <dd class="col-sm-10 meta-name">{{ $profile->address }}</dd>
                  </dl>
             @endforeach
                <div>
                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">
                        <input type="submit" class="btn btn-primary" value="編集画面">
                    </a>
                    <a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">
                       <input type="submit" class="btn btn-primary" value="削除">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection