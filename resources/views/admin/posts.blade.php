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
                        <h2 class="h5 no-margin-bottom">Posts</h2>
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
                                        @if($posts->count() != 0)
                                            <div class="title">
                                                <strong>Posts Table</strong>
                                            </div>
                                            <div class="table-responsive"> 
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Publish</th>
                                                        <th>Added By</th>
                                                        <th>Created at</th>
                                                        <th>Control</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($posts as $post)
                                                            <tr>
                                                                <th scope="row">{{$post->id}}</th>
                                                                <td><img src="{{ asset('storage/'. $post->image) }}" alt="Post Image" style="width: 100px; height: 100px;"></td>
                                                                <td>{{$post->title}}</td>
                                                                <td>
                                                                    <button type="button" data-toggle="modal" data-target="#post_content_{{$post->id}}" class="btn btn-primary">Content</button>
                                                                </td>
                                                                <td>
                                                                    @if($post->is_published)
                                                                        <span class="badge badge-success text-xl">Published</span>
                                                                    @else
                                                                        <span class="badge badge-danger text-xl">Unpublished</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{$post->user->name}} | {{$post->user->role}}</td>
                                                                <td>{{$post->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('post.edit', $post['id'])}}"><button type="button" class="btn btn-secondy m-2">Edit</button></a>
                                                                    <button type="button" data-toggle="modal" data-target="#post_delete_{{$post->id}}" class="btn btn-danger m-2">Delete</button>
                                                                    <br>
                                                                    @php
                                                                        if($post->is_published){
                                                                            $publish_controller ='Unpublish';
                                                                        }    
                                                                        else{
                                                                            $publish_controller ='Publish';
                                                                        }

                                                                    @endphp

                                                                    <button  
                                                                        onclick="event.preventDefault(); document.getElementById('{{$publish_controller}}-form-{{$post->id}}').submit();"
                                                                        type="submit" class="btn btn-warning m-2">{{$publish_controller}}</button>
                                                                    <form id="{{$publish_controller}}-form-{{$post->id}}" action="{{route('post.publishControl', $post->id)}}" method="POST" class="d-none">
                                                                        @method('PATCH')
                                                                        @csrf
                                                                        <input name="id" hidden type="text" value="{{$post->id}}">
                                                                        <input name="do" hidden type="text" value="{{$publish_controller}}">
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            <div id="post_content_{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                <div role="document" class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Post Content</strong>
                                                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>{{$post->content}}</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="post_delete_{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                <div role="document" class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Delete Post</strong>
                                                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center mt-4">
                                                                                <i class="fa fa-exclamation-triangle text-danger fa-5x"></i>
                                                                            </div>
                                                                            <h3>Are you sure that you want to delete this post?</h3>
                                                                            <p class="text-danger">You won't be able to revert this action!</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                            <button  
                                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{$post['id']}}').submit();"
                                                                                type="submit" class="btn btn-danger m-2">Delete</button>
                                                                            <form id="delete-form-{{$post['id']}}" action="{{route('post.delete', $post->id)}}" method="POST" class="d-none">
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
                                                <p>No Posts Found</p>
                                            </div>        
                                        @endif
                                        <a href="{{route('post.add')}}" class="btn btn-primary m-2">Add Post</a>
                                    @elseif($do == 'add')
                                        <div class="block">
                                            <div class="title">
                                                <strong class="d-block">Add Post</strong>
                                            </div>
                                            <div class="block-body">
                                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-control-label">Title</label>
                                                        <input type="text" name="title" placeholder="Post Title" class="form-control" required value="{{old('title')}}">
                                                        @error('title')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">       
                                                        <label class="form-control-label">Content</label>
                                                        <textarea name="content" placeholder="Post Content" class="form-control" required>{{old('content')}}</textarea>
                                                        @error('content')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Image</label>
                                                        <input type="file" name="image" placeholder="Post Image" class="form-control"  value="{{old('image')}}">
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
                                                <strong class="d-block">Edit Post</strong>
                                            </div>
                                            <div class="block-body">
                                                <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label class="form-control-label">Title</label>
                                                        <input type="text" name="title" placeholder="Post Title" class="form-control" required value="{{$post->title}}">
                                                        @error('title')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">       
                                                        <label class="form-control-label">Content</label>
                                                        <textarea name="content" placeholder="Post Content" class="form-control" required>{{$post->content}}</textarea>
                                                        @error('content')
                                                            <p class="text-danger mt-1 mb-0">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Image</label>
                                                        <input type="file" name="image" placeholder="Post Image" class="form-control" value="{{$post->image}}">
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