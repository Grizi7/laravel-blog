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
                        <h2 class="h5 no-margin-bottom">Users</h2>
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
                                    
                                    @if($do == 'view')
                                        @if($users->count() != 0)
                                            <div class="title">
                                                <strong>Users Table</strong>
                                            </div>
                                            <div class="table-responsive"> 
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Created at</th>
                                                        <th>Control</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $user)
                                                            <tr>
                                                                <th scope="row">{{$user->id}}</th>
                                                                <td><img src="{{ asset('storage/'. $user->image) }}" alt="User Image" style="width: 100px; height: 100px;"></td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->email}}</td>
                                                                <td>{{$user->role}}</td>
                                                                <td>{{$user->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('user.edit', $user['id'])}}"><button type="button" class="btn btn-secondy m-2">Edit</button></a>
                                                                    <button type="button" data-toggle="modal" data-target="#user_delete_{{$user->id}}" class="btn btn-danger m-2">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <div id="user_delete_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                <div role="document" class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Delete User</strong>
                                                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center mt-4">
                                                                                <i class="fa fa-exclamation-triangle text-danger fa-5x"></i>
                                                                            </div>
                                                                            <h3>Are you sure that you want to delete this user?</h3>
                                                                            <p class="text-danger">You won't be able to revert this action!</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                            <button  
                                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{$user['id']}}').submit();"
                                                                                type="submit" class="btn btn-danger m-2">Delete</button>
                                                                            <form id="delete-form-{{$user['id']}}" action="{{route('user.delete', $user->id)}}" method="USER" class="d-none">
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
                                                <p>No Users Found</p>
                                            </div>        
                                        @endif
                                        <a href="{{route('user.add')}}" class="btn btn-primary m-2">Add User</a>
                                    @elseif($do == 'add')
                                        <div class="block">
                                            <div class="title">
                                                <strong class="d-block">Add User</strong>
                                            </div>
                                            <div class="block-body">
                                                <form action="{{route('user.store')}}" method="USER" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-control-label">Title</label>
                                                        <input type="text" name="title" placeholder="User Title" class="form-control" required value="{{old('title')}}">
                                                        @error('title')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">       
                                                        <label class="form-control-label">Content</label>
                                                        <textarea name="content" placeholder="User Content" class="form-control" required>{{old('content')}}</textarea>
                                                        @error('content')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Image</label>
                                                        <input type="file" name="image" placeholder="User Image" class="form-control"  value="{{old('image')}}">
                                                        @error('image')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">       
                                                        <input type="submit" value="Add" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif($do == 'edit')
                                        <div class="block">
                                            <div class="title">
                                                <strong class="d-block">Edit User</strong>
                                            </div>
                                            <div class="block-body">
                                                <form action="{{route('user.update', $user->id)}}" method="USER" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label class="form-control-label">Title</label>
                                                        <input type="text" name="title" placeholder="User Title" class="form-control" required value="{{$user->title}}">
                                                        @error('title')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">       
                                                        <label class="form-control-label">Content</label>
                                                        <textarea name="content" placeholder="User Content" class="form-control" required>{{$user->content}}</textarea>
                                                        @error('content')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Image</label>
                                                        <input type="file" name="image" placeholder="User Image" class="form-control" value="{{$user->image}}">
                                                        @error('image')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">       
                                                        <input type="submit" value="Update" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
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
    </body>
</html>