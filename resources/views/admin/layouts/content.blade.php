<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                <div class="icon"><i class="icon-user-1"></i></div><strong>Clients</strong>
                </div>
                <div class="number dashtext-1">{{$usersCount}}</div>
            </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                <div class="icon"><i class="icon-contract"></i></div><strong>Posts</strong>
                </div>
                <div class="number dashtext-2">{{$postsCount}}</div>
            </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Comments</strong>
                </div>
                <div class="number dashtext-3">{{$commentsCount}}</div>
            </div>
            </div>
        </div>

    </div>
    </section>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                @if($topUsers->count() > 0)
                    @foreach($topUsers as $key => $user)
                        @if(in_array($key, [0, 1, 2]))
                            
                            <div class="col-lg-4">
                                <div class="user-block block text-center">
                                    <div class="avatar"><img src="admin/img/avatar-1.jpg" alt="..." class="img-fluid">
                                        <div class="order dashbg-2">{{$key+1}}</div>
                                    </div>
                                    <a href="{{route('user', $user->id)}}" class="user-title">
                                        <h3 class="h5">{{$user->name}}</h3><span>{{$user->email}}</span>
                                    </a>
                                    <div class="contributions">{{$user->posts->count()+$user->comments->count()}} Contributions</div>
                                    <div class="details d-flex">
                                        <div class="item"><i class="icon-info"></i><strong>{{$user->vists}}</strong> Vists</div>
                                        <div class="item"><i class="fa fa-gg"></i><strong>{{$user->posts->count()}}</strong> Posts</div>
                                        <div class="item"><i class="icon-flow-branch"></i><strong>{{$user->comments->count()}}</strong> Comments</div>
                                    </div>
                                </div>
                            </div>

                        @else
                            @if($key == 3)
                                </div>
                            @endif
                            <div class="public-user-block block">
                                <div class="row d-flex align-items-center">                   
                                    <div class="col-lg-4 d-flex align-items-center">
                                        <div class="order">{{$key+1}}</div>
                                        <div class="avatar"> <img src="admin/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                        <a href="{{route('user', $user->id)}}" class="name"><strong class="d-block">{{$user->name}}</strong><span class="d-block">{{$user->email}}</span></a>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <div class="contributions">{{$user->posts->count()+$user->comments->count()}} Contributions</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="details d-flex">
                                            <div class="item"><i class="icon-info"></i><strong>{{$user->visits}}</strong> Visits</div>
                                            <div class="item"><i class="fa fa-gg"></i><strong>{{$user->posts->count()}}</strong> Posts</div>
                                            <div class="item"><i class="icon-flow-branch"></i><strong>{{$user->comments->count()}}</strong> Comments</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endif

                    @endforeach                    
                @endif
        </div>
    </section>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-6">
                <div class="checklist-block block">
                    <div class="title"><strong>To Do List</strong></div>
                    <div class="checklist">
                        <div class="item d-flex align-items-center">
                        <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                        <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                        <input type="checkbox" id="input-2" name="input-2" checked class="checkbox-template">
                        <label for="input-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                        <input type="checkbox" id="input-3" name="input-3" class="checkbox-template">
                        <label for="input-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                        <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                        <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                        <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                        <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                        <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                        <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">                                           
                <div class="messages-block block">
                    <div class="title"><strong>New Messages</strong></div>
                    <div class="messages">
                        @if($requests->count() != 0)
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