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
                    <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm mt-2">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-control-label">Title</label>
                            <input type="text" id="title" name="title" placeholder="Post Title" class="form-control" required value="{{old('title')}}">
                            @error('title')
                                <p class="text-danger mt-1 mb-0">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">       
                            <label for="content" class="form-control-label">Content</label>
                            <textarea id="content" name="content" placeholder="Post Content" class="form-control" rows="5" required>{{old('content')}}</textarea>
                            @error('content')
                                <p class="text-danger mt-1 mb-0">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input type="file" id="image" name="image" placeholder="Post Image" class="form-control-file">
                            @error('image')
                                <p class="text-danger mt-1 mb-0">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group text-center">       
                            <button type="submit" class="btn btn-primary" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Add</button>
                        </div>
                    </form>

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