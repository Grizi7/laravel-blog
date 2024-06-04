<!DOCTYPE html>
<html>
    @include('admin.layouts.head')
    <body>
        @include('admin.layouts.header')
        <div class="d-flex align-items-stretch">
            <!-- Sidebar Navigation-->
            @include('admin.layouts.sidebar')
            <!-- Sidebar Navigation end-->
            <div class="page-content">
                <div class="page-header">
                    <div class="container-fluid">
                        <h2 class="h5 no-margin-bottom">Call Requests</h2>
                    </div>
                </div>
                <section class="no-padding-top mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="block margin-bottom-sm">
                                    @if (session()->has('success') || session()->has('error'))
                                        @if(session()->has('success'))
                                            <div id="success-alert" class="alert alert-success">
                                                <p>
                                                    {{ session()->get('success') }}
                                                </p>
                                            </div>
                                        
                                        @else
                                            <div id="danger-alert" class="alert alert-danger">
                                                <p>
                                                    {{ session()->get('error') }}
                                                </p>
                                            </div>
                                        @endif

                                        <script>
                                            setTimeout(function(){
                                                document.getElementById('success-alert').style.display = 'none';
                                                document.getElementById('danger-alert').style.display = 'none';
                                            }, 4000);
                                        </script>
                                    @endif
                                    
                                    
                                    @if($requests->count() != 0)
                                        <div class="title">
                                            <strong>Requests Table</strong>
                                        </div>
                                        <div class="table-responsive"> 
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Message</th>
                                                    <th>Created at</th>
                                                    <th>Control</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($requests as $request)
                                                        <tr>
                                                            <th scope="row">{{$request->id}}</th>
                                                            <td>{{$request->name}}</td>
                                                            <td>{{$request->email}}</td>
                                                            <td>{{$request->phone}}</td>
                                                            <td>
                                                                <button type="button" data-id="{{$request->id}}" data-token="{{session()->get('user_token')}}" data-toggle="modal" data-target="#request_{{$request->id}}" class="btn btn-secondary m-2 readRequest">Message</button>
                                                            </td>
                                                            <td class="requestStatus">
                                                                @if($request->is_read)
                                                                    <span class="badge badge-success text-xl">Read</span>
                                                                @else
                                                                    <span class="badge badge-danger text-xl">Unread</span>
                                                                @endif
                                                            </td>
                                                            <td>{{$request->created_at}}</td>
                                                            <td>
                                                                <button type="button" data-toggle="modal" data-target="#request_delete_{{$request->id}}" class="btn btn-danger m-2">Delete</button>
                                                            </td>
                                                        </tr>
                                                        <div id="request_{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                            <div role="document" class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Message</strong>
                                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{$request->message}}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="request_delete_{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                            <div role="document" class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Delete Request</strong>
                                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-center mt-4">
                                                                            <i class="fa fa-exclamation-triangle text-danger fa-5x"></i>
                                                                        </div>
                                                                        <h3>Are you sure that you want to delete this request?</h3>
                                                                        <p class="text-danger">You won't be able to revert this action!</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                        <button  
                                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{$request['id']}}').submit();"
                                                                            type="submit" class="btn btn-danger m-2">Delete</button>
                                                                        <form id="delete-form-{{$request['id']}}" action="{{route('request.delete', $request->id)}}" method="POST" class="d-none">
                                                                            @method('delete')
                                                                            @csrf
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="alert alert-danger">
                                            <p>No Requests Found</p>
                                        </div>        
                                    @endif
                                        

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @include('admin.layouts.footer')
            </div>
        </div>
        <!-- JavaScript files-->
        @include('admin.layouts.scripts')
        @stack('read_request_script')
    </body>
</html>