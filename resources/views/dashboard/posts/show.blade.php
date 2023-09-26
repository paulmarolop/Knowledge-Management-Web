@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-start my-3">
        <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure ?')"><span data-feather="delete"></span> Delete</button>
                </form>
                </h2>

                @if($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" >
                </div>
                {{-- <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" > --}}
                {{-- @else
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3" > --}}
                @endif
                

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            @if($post->fileupload)
                <div style="max-height: 350px; overflow:hidden;">
                    
                        <a href="{{ asset('storage/' . $post->fileupload) }}" class="btn btn-info">Download</a>
            

                    {{-- <img src="{{ asset('storage/' . $post->fileupload) }}" alt="{{ $post->category->name }}" > --}}
                </div>
                @endif

        </div>
    </div>
</div>
@endsection