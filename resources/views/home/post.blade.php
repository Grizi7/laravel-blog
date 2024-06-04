<!DOCTYPE html>
<html lang="en">
   @include('home.layouts.head')

   <body>
        <!-- header section start -->
        @include('home.layouts.header')
        <!-- header section end -->  
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card mb-4 mt-4">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top services_img rounded" alt="Post Image">
                            <div class="card-body">
                                <div class="justify-content-center text-uppercase font-weigt-bold">
                                    <h2 class="card-title">{{ $post->title }}</h2>
                                </div>
                                <p class="card-text text-muted text-justify mt-3">
                                    {{ $post->content }}
                                </p>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between">
                                <span>Added by <a href="{{route('user', $post->user->id)}}" class="text-primary">{{ $post->user->name }}</a> 
                                    @if($post->user->role == 'admin')
                                        <i class="fa fa-check-circle"></i>
                                    @endif
                                    <br> {{ $post->created_at->diffForHumans() }}
                                </span>
                                <div class="getquote_bt"><a href="{{ route('blog.posts') }}">Back to Posts</a></div>
                            </div>
                        </div>
                        <!-- Comments section start -->
                        @if(auth()->user() || $post->comments->count() > 0)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>Comments</h4>
                                </div>
                                <div class="card-body card-body-comments">
                                    @foreach($post->comments as $comment)
                                        <div class="media mb-3">
                                            <img src="{{ asset('storage/' . $comment->user->image) }}" class="mr-3 rounded-circle" alt="{{ $comment->user->name }}" width="50">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                                                <p>{{ $comment->body }}</p>
                                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if(auth()->user())
                                    <div class="card-body p-2 mx-2">
                                        <form id="commentForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="comment">Comment</label>
                                                <textarea name="body" id="comment" class="form-control" required placeholder="What is your comment?"></textarea>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                            <input type="hidden" name="user_token" value="{{ session()->get('user_token') }}">
                                            <button type="submit" class="btn btn-primary float-right" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.5rem; border-radius: 30px; font-weight: bold;">Add Comment</button>
                                            <div id="errorMessages" class="text-danger mt-3"></div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif

                    
                    </div>
                </div>
            </div>
        <!-- client section start -->
        <!-- choose section start -->
        <div class="choose_section layout_padding">
            <div class="container">
                <h1 class="choose_taital">Why Choose Us</h1>
                <p class="choose_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All </p>
                <div class="read_bt_1"><a href="#">Read More</a></div>
                <div class="newsletter_box">
                    <h1 class="let_text">Let Start Talk with Us</h1>
                    <div class="getquote_bt"><a href="#">Get A Quote</a></div>
                </div>
            </div>
        </div>
        <!-- choose section end -->
        <!-- footer section start -->
        @include('home.layouts.footer')
        <!-- footer section end -->
        <!-- Javascript files-->
        @include('home.layouts.scripts')    
        @if(auth()->user())
            @stack('add_comment_script')
        @endif
   </body>
</html>