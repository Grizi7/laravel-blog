<!DOCTYPE html>
<html lang="en">
   
   @include('home.layouts.head')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .error-template {
            padding: 40px 15px;
            text-align: center;
        }
        .error-actions {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .error-actions .btn {
            margin-right: 10px;
        }
    </style>
   <body>
      <!-- header section start -->
      @include('home.layouts.header')
      <!-- header section end -->

        <!-- 404 section start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="error-template font-weight-bold" style="padding: 40px 15px; text-align: center;">
                        <h1 style="font-size: 4rem;">
                            Oops!
                        </h1>
                        <h2 style="font-size: 2.5rem;">
                            404 Not Found
                        </h2>
                        <div class="error-details">
                            Sorry, an error has occurred, the requested page was not found!
                        </div>
                        <div class="error-actions " style="margin-top: 15px; margin-bottom: 15px; display: flex; justify-content: center;">
                            <a href="/" class="btn-lg" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;"><span class="glyphicon glyphicon-home"></span> Take Me Home </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 section end -->
      <!-- choose section end -->
      <!-- footer section start -->
      @include('home.layouts.footer')
      <!-- footer section end -->
      <!-- Javascript files-->
      @include('home.layouts.scripts')    
   </body>
</html>