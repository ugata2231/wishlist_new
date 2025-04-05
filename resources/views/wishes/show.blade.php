@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2>id = {{ $wish->id }} Details</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $wish->id }}</td>
        </tr>

        <tr>
            <th>category</th>
            <td>{{ $wish->category }}</td>
        </tr>

        <tr>
            <th>items</th>
            <td>{{ $wish->item }}</td>
        </tr>

        <tr>
            <th>status</th>
            <td>{{ $wish->status }}</td>
        </tr>
    </table>

    {{-- ウィッシュ編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('wishes.edit', $wish->id) }}">Edit</a>

    {{-- ウィッシュ削除フォーム --}}
    <form method="POST" action="{{ route('wishes.destroy', $wish->id) }}" class="my-2">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-error btn-outline"
            onclick="return confirm('id = {{ $wish->id }} を削除します。よろしいですか？')">Delete</button>
    </form>

@endsection