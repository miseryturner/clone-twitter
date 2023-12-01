@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_sidebar')
    </div>
    <div class="col-6">
        @include('shared.succes-message')
        <div class="mt-3">
            @include('shared.idea_card')
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header pb-0 border-0">
                <h5 class="">Search</h5>
            </div>
            <div class="card-body">
                <input placeholder="...
                " class="form-control w-100" type="text"
                    id="search">
                <button class="btn btn-dark mt-2"> Search</button>
            </div>
        </div>
        <div class="card mt-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
</div>
@endsection