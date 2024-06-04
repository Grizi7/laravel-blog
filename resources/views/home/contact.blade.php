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
               <form action="" method="POST">
                  <div class="form-group">
                     <input type="text" class="email-bt" required name="name" placeholder="Name" >
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" required name="phone"  placeholder="Phone Numbar" >
                  </div>
                  <div class="form-group">
                     <input type="email" class="email-bt" required name="email" placeholder="Email" >
                  </div>
                  <div class="form-group">
                     <textarea class="massage-bt" required placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
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