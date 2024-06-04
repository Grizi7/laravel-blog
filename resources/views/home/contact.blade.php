<!DOCTYPE html>
<html lang="en">
   
   @include('home.layouts.head')

   <body>
      <!-- header section start -->
      @include('home.layouts.header')
      <!-- header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <h1 class="contact_taital">Request A Call Back</h1>
            <div class="email_text">
               <form action="{{route('contact.sent')}}" method="POST">
                  @csrf
                  <div class="form-group">
                     <input type="text" class="email-bt" required name="name" value="{{old('name')}}" placeholder="Name" >
                     @error('name')
                        <p class="text-danger mt-1 mb-0">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" required name="phone"  value="{{old('phone')}}" placeholder="Phone Numbar" >
                     @error('phone')
                        <p class="text-danger mt-1 mb-0">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="form-group">
                     <input type="email" class="email-bt" required name="email" value="{{old('email')}}" placeholder="Email" >
                     @error('email')
                        <p class="text-danger mt-1 mb-0">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="form-group">
                     <textarea class="massage-bt" required  placeholder="Message" rows="5" id="comment" name="message">{{old('message')}}</textarea>
                     @error('message')
                        <p class="text-danger mt-1 mb-0">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="send_btn"><button type="submit" class="black-button">SEND</button></div>
               </form>
            </div>
         </div>
      </div>
      <!-- contact section end -->
      
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