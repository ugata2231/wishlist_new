@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2 class="text-lg">MY WISH LIST</h2>
    </div>

    @if (isset($wishes))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>category</th>
                    <th>item</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishes as $wish)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('wishes.show', $wish->id) }}">{{ $wish->id }}</a></td>
                    <td>{{ $wish->category }}</td>
                    <td>{{ $wish->item }}</td>
                    <td>{{ $wish->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- ウィッシュ作成ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('wishes.create') }}">Add to Wishlist</a>

@endsection