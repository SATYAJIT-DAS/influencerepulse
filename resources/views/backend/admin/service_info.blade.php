@extends('backend.admin.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Service Manage</li>
    </ol>
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{$services[0]->user->name}}</div>
        </div>
    </section>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">

                <span><i class="fal fa-fw fa-comments"></i> Service Manage</span>

               <!--  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_cate">
                    <i class="fal fa-plus"></i>Add Category </a> -->



            </div>

            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>From</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>
                                            
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($services as $key => $service)
                                    <tr>
                                        <td>{{($services->currentPage()-1) * $services->perPage() + $key + 1}}</td>
                                        <td>{{$msg->user->name}} </td>
                                        <td>{{$msg->opinion}} </td>
                                        <td>{{$msg->receive_time}} </td>
                                        <td>{{$msg->status}} </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{route('service.show',$msg->id)}}">
                                                View Info </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    {{$msgs->links()}}

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Modal add -->
    <div class="modal fade" id="add_cate" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center">

                    <h5 class="modal-title modal-primary">Category Create</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>X</span>
                    </button>

                </div>

                <form role="form" method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="id">Category Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" required
                                    placeholder="Category name:" require>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span>Close Form</span>
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal edit -->
    <div class="modal fade" id="edit_cate" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center">

                    <h5 class="modal-title modal-primary">Category Edit</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>X</span>
                    </button>

                </div>

                <form role="form" method="post" action="{{route('category.update','1')}}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="id">Category name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="editname" name="name" required
                                    placeholder="Category name:" require>

                                <input type="hidden" name="id" id="editid">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span>Close Form</span>
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- Modal End -->

    <script>
    $(function() {
        $(".edit_btn").click(function() {
            $('#editid').val($(this).data('id'));
            $('#editname').val($(this).data('name'));
            $('#edit_cate').modal('show');
        });
    });
    </script>

</main>

@endsection