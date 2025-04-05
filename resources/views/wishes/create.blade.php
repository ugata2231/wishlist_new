@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">Add to Wishlist</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('wishes.store') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                    <label for="category" class="label">
                        <span class="label-text">category:</span>
                    </label>
                    <input type="text" name="category" class="input input-bordered w-full">
                </div>

            <div class="form-control my-4">
                    <label for="item" class="label">
                        <span class="label-text">items:</span>
                    </label>
                    <input type="text" name="item" class="input input-bordered w-full">
                </div>

                <div class="form-control my-4">
                    <label for="title" class="label">
                        <span class="label-text">status:</span>
                    </label>
                    <input type="text" name="status" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">Add to Wishlist</button>
        </form>
    </div>

@endsection