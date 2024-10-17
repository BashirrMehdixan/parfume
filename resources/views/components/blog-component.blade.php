@props(['blog'])
<div class="blog_card">
    <div class="blog_image">
        <a href="{{ route('blogs.show',$blog->slug) }}">
            <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}">
        </a>
    </div>
    <div class="blog_body">
        <h4 class="blog_title">
            <a href="{{ route('blogs.show', $blog->slug) }}">
                {{ $blog->title }}
            </a>
        </h4>
        <div class="blog_content">
            <div class="inner_text">
                {!! $blog->description !!}
            </div>
            <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn_main_outline">
                {{ __('read_more') }}
            </a>
        </div>
    </div>
</div>
