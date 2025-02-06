@extends('layouts.app')

@section('scripts')
<script>
    setTimeout(function() {
        let successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = "opacity 0.5s ease";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 500);
        }
    }, 3000);
</script>
@endsection

@section('content')
<div class="container">

@if(session('success'))
<div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin-book.store') }}">
                        @csrf


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Book Name ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row mb-3">
                            <label for="auther_id" class="col-md-4 col-form-label text-md-end">{{ __('Author ') }}</label>

                            <div class="col-md-6">

                                <select id="auther_id" class="form-control @error('auther_id') is-invalid @enderror " name="auther_id">

                                    <option value="" selected>Select</option>
                                    @foreach ($authers as $auther )

                                    <option value="{{$auther->id}}"> {{$auther->name}}</option>

                                    @endforeach



                                </select>

                                @error('auther_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="publisher_id" class="col-md-4 col-form-label text-md-end">{{ __('Publisher ') }}</label>

                            <div class="col-md-6">

                                <select id="publisher_id" class="form-control @error('publisher_id') is-invalid @enderror " name="publisher_id">

                                    <option value="" selected>Select</option>

                                    @foreach ($publishers as $publisher )

                                    <option value="{{$publisher->id}}"> {{$publisher->name}}</option>

                                    @endforeach

                                </select>

                                @error('publisher_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('category ') }}</label>

                            <div class="col-md-6">

                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror " name="category_id">

                                    <option value="" selected>Select</option>

                                    @foreach ($categories as $category )

                                    <option value="{{$category->id}}"> {{$category->name}}</option>

                                    @endforeach

                                </select>

                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection