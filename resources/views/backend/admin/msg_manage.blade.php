@extends('backend.admin.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Message Manage</li>
    </ol>
    @if (session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{ session('status') }}</div>
        </div>
    </section>
    @endisset
    <div class="container-fluid">

        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-fw fa-comments"></i> Message Manage</span>

                <!-- <a href="{{route('seller.upload-start')}}" class="btn btn-primary">
                    <i class="fal fa-plus"></i>Add User </a> -->

            </div>

            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Content</th>
                                        <th>
                                            Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of user account"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($msgs as $key =>$msg)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$msg->date}}</td>
                                        <td> {{$msg->getFrom->name}}</td>
                                        <td> {{($msg->getTo['name'])}} </td>
                                        
                                        <td> {{$msg->message}}</td>
                                        <td> @if($msg->msg_status == 1)
                                            Read
                                            @else
                                            Unread
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-danger" href="{{route('msg_manage.delete', $msg->id)}}">
                                                Delete </a>
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