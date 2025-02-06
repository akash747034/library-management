@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Home Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<section class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <h3>Easy Book Search</h3>
                <p>Find books quickly with our powerful search feature.</p>
            </div>
            <div class="col-md-4">
                <h3>User-Friendly</h3>
                <p>Manage book borrowing and returns with ease.</p>
            </div>
            <div class="col-md-4">
                <h3>Digital Library</h3>
                <p>Access e-books and audiobooks from anywhere.</p>
            </div>
        </div>
    </section>
@endsection
