<!DOCTYPE html>
<html lang="en">
   
   @include('home.layouts.head')
   <style>
      .profile {
         text-align: center;
         margin: 50px auto;
         width: 50%;
      }
      .avatar {
         border-radius: 50%;
         width: 150px;
         height: 150px;
      }
      .posts {
         margin-top: 20px;
         text-align: left;
      }
      .post {
         border-bottom: 1px solid #ddd;
         padding: 10px 0;
      }
      .post:last-child {
         border-bottom: none;
      }
   </style>
   <body>
      <!-- header section start -->
      @include('home.layouts.header')
      <!-- header section end -->

      <div class="profile mt-2">
         <img src="{{  asset('storage/'.$user->image) }}" alt="{{ $user->name }}" class="avatar mt-2">
          <h1 class="mt-3 font-wieght-bolder">
            {{ $user->name }}
            @if($user->role == 'admin')
               <i class="fa fa-check-circle text-primary"></i>
            @endif
         </h1>
         <div class="posts">
            <h2 class="mb-4 banner_taital" style="color: #2b2278">Posts</h2>
            @forelse ($user->posts as $post)
               <div class="col-md-4">
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
            @empty
               <p>No posts yet.</p>
            @endforelse
         </div>
      </div>

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