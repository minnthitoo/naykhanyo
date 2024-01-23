@extends('backend.layouts.app')

@section('title', 'Poem Create')

@section('page-icon', 'pe-7s-news-paper')

@section('page-title', 'Create New')

@section('page-description', 'Admin > Poem')

@section('content')
    <div class="row mb-3">
        <div class="col-md-6 col-sm-12 offset-md-3">
            <div class="card p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Tltle ( <span class="text-danger">*</span> )</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="content" class="form-label">Content ( <span class="text-danger">*</span> )</label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="category" class="form-label">Category ( <span class="text-danger">*</span> )</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category" style="width: 100%">
                            <option value="">--Select One--</option>
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="image" class="form-label">Image ( <span class="text-danger">*</span> )</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success px-5" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('backend.poem.conponents.scripts')
