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
                                    @if (session()->has('success'))
                                        <div id="success-alert" class="alert alert-success">
                                            <p>
                                                {{ session()->get('success') }}
                                            </p>
                                        </div>

                                        <script>
                                            setTimeout(function(){
                                                document.getElementById('success-alert').style.display = 'none';
                                            }, 4000);
                                        </script>
                                    @endif
                                    @if($do == 'view')
                                        <div class="title">
                                            <strong>Posts Table</strong>
                                        </div>
                                        <div class="table-responsive"> 
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
                                                        <input type="text" name="title" placeholder="Post Title" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">       
                                                        <label class="form-control-label">Content</label>
                                                        <textarea name="content" placeholder="Post Content" class="form-control" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Image</label>
                                                        <input type="file" name="image" placeholder="Post Image" class="form-control" >
                                                    </div>
                                                    <div class="form-group">       
                                                        <input type="submit" value="Add" class="btn btn-primary">
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