@extends('backend.admin.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">User Manage</li>

    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-user"></i> User Manage</span>

                <a href="{{route('users.export')}}" class="btn btn-warning">
                    User Data Export</a>

            </div>

            <div class="card-body">

                <form method="post" action="user-search">
                    @csrf
                    <div class="input-group mb-5">
                        @isset($username)
                        <input type="text" class="form-control" name="search"
                            placeholder="Search per username" value="{{$username}}" />
                        @endif
                        @empty($username)
                        <input type="text" class="form-control" name="search" 
                            placeholder="Search per username" value="" />
                        @endempty
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form>

                <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">
                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link active" data-toggle="tab" href="#seller" data-id='seller' id='seller-tab'>Sellers
                            ({{count($sellers)}})</a>
                    </li> 


                    <li class="nav-item" data-toggle="tooltip" data-placement="top"
                        title="List of rebates that are unclaimed">
                        <a class="nav-link " data-toggle="tab" href="#buyer" data-id='buyer' id='buyer-tab'>Buyers
                            ({{count($buyers)}})</a>
                    </li>      

                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="seller" role="tabpanel" aria-labelledby="seller-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>
                                            Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of user account"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($sellers as $key => $user)
                                    <tr>
                                        <td>{{$key+1}} </td>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->email}}  </td>
                                        <td>{{$user->role->name}}  </td>
                                        
                                        <td>
                                            @if($user->mail_verify == 1)
                                            <p class="text-primary">Mail verify</p> 
                                            @else
                                            <p class="text-danger">No mail verify</p> 
                                            @endif

                                            @if($user->phone_verify == 1)
                                            <p class="text-primary">Phone verify</p> 
                                            @else
                                            <p class="text-danger">No phone verify</p> 
                                            @endif
                                             </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{route('users.show', $user->id)}}">
                                                View Info </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="buyer" role="tabpanel" aria-labelledby="buyer-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>
                                            Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of user account"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($buyers as $key => $user)
                                    <tr>
                                        <td>{{$key+1}} </td>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->email}}  </td>
                                        <td>{{$user->role->name}}  </td>
                                        
                                        <td>
                                            @if($user->mail_verify == 1)
                                            <p class="text-primary">Mail verify</p> 
                                            @else
                                            <p class="text-danger">No mail verify</p> 
                                            @endif

                                            @if($user->phone_verify == 1)
                                            <p class="text-primary">Phone verify</p> 
                                            @else
                                            <p class="text-danger">No phone verify</p> 
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            

                                            <a class="btn btn-primary btn-block " href="{{route('users.show', $user->id)}}">
                                                View Info </a>

                                         <!--    <a class="btn btn-dark btn-block " href="{{route('order.show', $user->id)}}">
                                                View Order </a> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection