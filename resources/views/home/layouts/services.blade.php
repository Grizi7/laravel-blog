<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div><img src="{{ asset('storage/'. $post->image) }}" class="services_img rounded"></div>
                        <p class="services_text text-muted text-justify mt-2 p-2">
                            <x-truncated-text :text="$post->content" limit="100" :link="url('/post/'.$post->id)" />
                        </p>

                        <span class="text-secondary d-block mt-3 p-2">
                            Added by <a href="http://localhost:8000/user/{{$post->user->id}}" class="text-primary">{{$post->user->name}}</a> on {{$post->created_at->diffForHumans()}}
                        </span>
                    <div class="btn_main"><a href="{{url('/post/'.$post->id)}}">Read more</a></div>
                </div>
                @endforeach
                {{-- <div class="col-md-4">
                    <div><img src="images/img-2.png" class="services_img"></div>
                    <div class="btn_main active"><a href="#">Hiking</a></div>
                </div>
                <div class="col-md-4">
                    <div><img src="images/img-3.png" class="services_img"></div>
                    <div class="btn_main"><a href="#">Camping</a></div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
      