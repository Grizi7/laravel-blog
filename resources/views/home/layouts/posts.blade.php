<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mt-2">
                        <div><img style="margin-bottom:20px; height:200px; width:350px;" src="{{ asset('storage/'. $post->image) }}" class="services_img rounded"></div>
                        <p class="services_text text-muted text-justify mt-2 p-2">
                            <x-truncated-text :text="$post->content" limit="100" :link="route('post', $post->id)" />
                        </p>

                        <span class="text-secondary d-block mt-3 p-2">
                            Added by <a href="{{route('user', $post->user->id)}}" class="text-primary">{{$post->user->name}}</a> 
                            @if($post->user->role == 'admin')
                                <i class="fa fa-check-circle"></i>
                            @endif
                            <br> {{$post->created_at->diffForHumans()}}
                        </span>
                        <div class="btn_main"><a href="{{route('post', $post->id)}}">Read more</a></div>
                    </div>
                @endforeach
            </div>
            
            @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator || $posts instanceof \Illuminate\Pagination\Paginator)
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links('vendor.pagination.bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
      