@extends('layout.layout')

@section('title', 'Admin panel')

@section('content')
<div class="row">
    <h1>Admin Panel</h1>
    <div class="ideas">
        @foreach ($ideas as $idea)
            <p>
                {{$idea->content}}
                @if ($idea->deleted_at)
                    - Удаленная идея
                @endif
            </p>
        @endforeach
    </div>
</div>
@endsection