<div>
    {{ \Illuminate\Support\Str::limit($text, $limit, '...') }}
    @if(strlen($text) > $limit)
        <a href="{{ $link }}">Read more</a>
    @endif
</div>
