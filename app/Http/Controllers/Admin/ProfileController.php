<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 追加
use Auth;
// 使用する Model 名を追加
use App\Profile;
// 画像保存
use Storage;

class ProfileController extends Controller
{
  
    public function form() {
      
        // すでにプロフィールを登録しているかどう確認する
        $profile = Profile::where('user_id', Auth::user()->id )->first();
        if (empty($profile)) {
          $profile = new Profile();
        }
        return view('admin.profile.form', ['profile' => $profile]);
    }
    
    public function create(Request $request)
        {
          // Validationを行う $thisは擬似変数と呼ばれ、呼び出し元のオブジェクトへの参照を意味します
          $this->validate($request, Profile::$rules);
        
          // Profile Modelからデータを取得
          $profile = new Profile;
          
          // form に入力された値を取得
          $form = $request->all();
          
          // フォームから画像が送信されてきたら、保存。＄image_path に画像のパスを保存する
          if (isset($form['image'])) {
            
            // 画像保存
            // $path = $request->file('image')->store('public/image');
            // $profile->image_path = basename($path);
            
            // herokuへ画像保存
            $path = Storage::disk('s3')->putfile('/',$request->file('image'),'public');
            $form['image_path'] = Storage::disk('s3')->url($path);
          
          } else {
            $form['image_path'] = null;
          }
          
          // フォームから送信されてきた_tokenを削除する
          unset($form['_token']);
          unset($form['image']);
          
          // データベースに保存
          $profile->fill($form);
          $profile->user_id = Auth::user()->id;
          $profile->save();
    
          // 入力一覧を表示。
          return redirect('admin/profile/form');
          
        }
  
    public function update(Request $request)
        {
          // Varidationをかける
          $this->validate($request, Profile::$rules);
          
          // Profile Modelからデータを取得
          $profile = Profile::find($request->id);
          
          // 送信されてきたフォームデータを格納する
          $profile_form = $request->all();
          
          if (isset($profile_form['image'])) {
            
            // 画像保存
            $path =$request->file('image')->store('public/image');
            $profile->image_path = basename($path);
            
            // Herokuへ画像保存　バケットのフォルダへアップロード
            $path = Storage::disk('s3')->putfile('/',$request->file('image'),'public');

            // アップロードした画像のフルパスを取得
            $profile_form['image_path'] = Storage::disk('s3')->url($path);
            
          } elseif (isset($request->remove)) {
            $profile_form['image_path'] = null;
          }
          
          // 削除
          unset($profile_form['_token']);
          unset($profile_form['image']);
          unset($profile_form['remove']);
          
          // 該当するデータを上書きして保存
          $profile->fill($profile_form)->save();
          
          return redirect('admin/profile/form');
        }

}
