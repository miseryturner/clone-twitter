
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px; height: 50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageURL() }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}"> {{ $idea->user->name }} </a></h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-row-reverse">
                @can('idea.edit', $idea)
                    <form method="POST" action="{{ route('idea.destroy', $idea->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                @endcan
                <a class="mx-2" href="{{ route('idea.show', $idea->id) }}">View</a>
                @can('idea.delete', $idea)
                    <a href="{{ route('idea.edit', $idea->id) }}">Edit</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark"> update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} 
                </span>
            </div>
        </div>
        @include('ideas.shared.comments_box')
    </div>
</div>