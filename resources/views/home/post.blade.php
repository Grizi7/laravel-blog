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
                            <div class="getquote_bt"><a href="{{ url('/posts') }}">Back to Posts</a></div>
                        </div>
                    </div>
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
   </body>
</html>