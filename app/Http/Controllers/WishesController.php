<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wish;

class WishesController extends Controller
{
    // getでwishes/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            // ウィッシュ一覧を取得
            $wishes = $user->wishes()->paginate(10);

            // ウィッシュ一覧ビューでそれを表示
            return view('wishes.index', [
                'wishes' => $wishes,
            ]);
        }
    }

    // getでwishes/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $wish = new Wish;

        // ウィッシュ作成ビューを表示
        return view('wishes.create', [
            'wish' => $wish,
        ]);
    }

    // postでwishes/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'category' => 'required',
            'item' => 'required',
            'status' => 'required|max:10',
        ]);

        // ウィッシュを作成
        $wish = new Wish;
        $wish->user_id = auth()->id();
        $wish->category = $request->category;
        $wish->item = $request->item;
        $wish->status = $request->status;
        $wish->save();

        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }

    // getでwishes/idにアクセスされた場合の「取得表示処理」
    public function show(string $id)
    {
        // idの値でウィッシュを検索して取得
        $wish = Wish::findOrFail($id);

        if (\Auth::id() !== $wish->user_id) {
            return redirect('/dashboard');
        }
        // ウィッシュ詳細ビューでそれを表示
        return view('wishes.show', [
            'wish' => $wish,
        ]);
    }

    // getでwishes/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit(string $id)
    {
        // idの値でウィッシュを検索して取得
        $wish = Wish::findOrFail($id);

        if (\Auth::id() !== $wish->user_id) {
            return redirect('/dashboard');
        }

        // ウィッシュ編集ビューでそれを表示
        return view('wishes.edit', [
            'wish' => $wish,
        ]);
    }

    // putまたはpatchでwishes/idにアクセスされた場合の「更新処理」
    public function update(Request $request, string $id)
    {
        // バリデーション
        $request->validate([
            'category' => 'required',
            'item' => 'required',
            'status' => 'required|max:10',
        ]);

        // idの値でウィッシュを検索して取得
        $wish = Wish::findOrFail($id);

        if (\Auth::id() !== $wish->user_id) {
            return redirect('/dashboard');
        }

        // ウィッシュを更新
        $wish->category = $request->category;
        $wish->item = $request->item;
        $wish->status = $request->status;
        $wish->save();

        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }

    // deleteでwishes/idにアクセスされた場合の「削除処理」
    public function destroy(string $id)
    {
        // idの値でウィッシュを検索して取得
        $wish = Wish::findOrFail($id);

        if (\Auth::id() !== $wish->user_id) {
            return redirect('/dashboard');
        }

        // ウィッシュを削除
        $wish->delete();

        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }
}