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
                    <h1 class="mb-4 banner_taital" style="color: #2b2278">Your Posts</h1>
                    @if($posts->isEmpty())
                        <div class="alert custom-alert mt-2" role="alert" style="background-color: #e9f7fd;border: 1px solid #b6e0fe;color: #31708f;border-radius: 5px;padding: 15px;font-family: 'Arial', sans-serif;display: flex;align-items: center;">
                            <div class="custom-alert-icon" style="margin-right: 10px;font-size: 1.5rem;color: #31708f;">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="custom-alert-message" style="font-size: 1rem;font-weight: 500;line-height: 1.5;">
                                You have no posts yet.
                            </div>
                        </div>
                    @else
                        <div class="table-responsive border rounded">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td><img src="{{ asset('storage/'. $post->image) }}" alt="Post Image" style="width: 100px; height: 100px;"></td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#post_content_{{$post->id}}" class="btn btn-primary" style="font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Content</button>
                                            </td>
                                            <td>
                                                @if($post->is_published)
                                                    <span class="badge badge-success" style="padding: 5px 10px;font-size: 0.85rem;">Published</span>
                                                    <br>
                                                    <a href="{{route('post', $post->id)}}"class="btn btn-primary btn-sm " style="font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.4rem; border-radius: 10px; font-weight: bold;">See Post</a>
                                                @else
                                                    <span class="badge badge-warning" style="padding: 5px 10px;font-size: 0.85rem;">Not Published</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <a href="{{ route('edit.post', $post->id) }}" class="btn btn-warning" style="font-size: 16px; color: #ffffff; background-color: #ffc107; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Edit</a>
                                                <a href="{{ route('delete.post', $post->id) }}" class="btn btn-danger" style="font-size: 16px; color: #ffffff; background-color: #dc3545; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Delete</a>
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <a href="{{route('add.post')}}" class="btn btn-primary btn-lg m-2" style="width: 20%; font-size: 16px; color: #ffffff; background-color: #2b2278; text-align: center; padding: 0.9rem; border-radius: 30px; font-weight: bold;">Add Post</a>
                </div>
            </div>
        </div>
      <!-- footer section start -->
      @include('home.layouts.footer')
      <!-- footer section end -->
      <!-- Javascript files-->
      @include('home.layouts.scripts')    
   </body>
</html>
