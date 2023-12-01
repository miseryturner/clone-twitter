@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_sidebar')
    </div>
    <div class="col-6">
        @include('shared.succes-message')
        @include('shared.submit_idea')
        <hr>

        @forelse ($ideas as $idea)
            <div class="mt-3">
                @include('shared.idea_card')
            </div>
        @empty
            <p class="text-center mt-3">Нет идей!</p>
        @endforelse

        <div class="mt-3">
            {{$ideas->withQueryString()->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search_bar')
        @include('shared.follow_box')
    </div>
</div>
@endsection