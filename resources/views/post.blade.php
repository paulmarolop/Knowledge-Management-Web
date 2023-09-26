@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <p>By : <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug}}" class="text-decoration-none"> {{ $post->category->name }}</a></p>
                </h2>
                @if($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" >
                </div>
                
                {{-- <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" > --}}
                @else
                {{-- <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" > --}}
                @endif
                
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            @if($post->fileupload)
                <div style="max-height: 350px; overflow:hidden;">   
                        <a href="{{ asset('storage/' . $post->fileupload) }}" class="btn btn-success">Download</a>
                    {{-- <img src="{{ asset('storage/' . $post->fileupload) }}" alt="{{ $post->category->name }}" > --}}
                </div>
            @endif

            <div class="comment-area mt-4">

                @if(session('message'))
                    <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                @endif

                <div class="card card-body">
                    <h6 class="card-title"> Leave a comment </h6>
                    <form action="{{ url('comments') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                        <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                        <button type="submit" class="btn btn-primary mt-3"> Submit</button>
                    </form>
                </div>

                @forelse ($post->comments as $comment)
                <div class="comment-container card card-body shadow-sm mt-3">
                    <div class="detail-area">
                        <h6 class="user-name mb-1">
                            @if($comment->user)
                            {!! $comment->user->name !!}
                            @endif
                            <small class="ms-3 text-primary"> Commented on: {!! $comment->created_at->format('d-m-Y') !!}</small>
                        </h6>
                        <p class="user-comment mb-1">
                            {!! $comment->comment_body !!}
                        </p>
                    </div>
                    @if(Auth::check() && Auth::id() == $comment->user_id)
                    <div>
                        <button type="button" value="{{ $comment->id }}" class="deleteComment btn btn-danger btn-sm me-2"> Delete </button>
                    </div>
                    @endif
                </div>
                @empty
                <div class="card card-body shadow-sm mt-3"
                    <h6>No comment yet</h6>
                </div>
                @endforelse
            </div>
            
            <a href="/posts" class="d-block mt-3"> Back to Post</a>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            
            $(document).on('click','.deleteComment', function(){
                
                if(confirm('are you sure you want to delete this comment ?'))
                {
                    thisClicked = $(this);
                    var comment_id = thisClicked.val();

                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success: function(response) {
                            if(response.status == 200) {
                                thisClicked.closest('.comment-container').remove();
                                alert(response.message);
                            }else{
                                alert(response.message);
                            }
                        }
                    });
                }

            });
        });
    </script>
@endsection
