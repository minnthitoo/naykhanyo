@extends('backend.layouts.app')

@section('title', 'Poem List')

@section('page-icon', 'pe-7s-news-paper')

@section('page-title', 'Poems')

@section('page-description', 'Admin > Poem')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card p-3">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@include('backend.poem.conponents.scripts')
