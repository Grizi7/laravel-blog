<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/js/front.js')}}"></script>
@push('read_request_script')
    <script src="{{asset("admin/js/read_request.js")}}"></script>
@endpush
