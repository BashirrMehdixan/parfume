@props(['blog'])
<div class="blog_card">
	<div class="blog_image">
		<a href="{{ route('blogs.show', $blog->slug) }}">
			<img src="{{ asset('storage/' . $blog->image[0]) }}" alt="{{ $blog->title }}">
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
				{!! Str::limit($blog->description, 300) !!}
			</div>
			<a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn_main_outline">
				{{ __('read_more') }}
			</a>
		</div>
	</div>
</div>
