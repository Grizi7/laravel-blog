<!DOCTYPE html>
<html>
    @include('admin.layouts.head')
    <body>
        @include('admin.layouts.header')
        <div class="d-flex align-items-stretch">
            <!-- Sidebar Navigation-->
            @include('admin.layouts.sidebar')
            <!-- Sidebar Navigation end-->
            @include('admin.layouts.content')
        </div>
        <!-- JavaScript files-->
        @include('admin.layouts.scripts')
        @stack('read_request_script')
    </body>
</html>