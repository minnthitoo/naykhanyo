@extends('backend.layouts.app')

@section('title', 'Category Manage')

@section('page-icon', 'pe-7s-car')

@section('page-title', 'Category Manage')

@section('page-description', 'Admin > Category')

@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card p-3">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Name ( <span class="text-danger">*</span> )</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Create" class="btn btn-success px-5">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card p-3">
                <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.category.conponents.scripts')
@endsection


