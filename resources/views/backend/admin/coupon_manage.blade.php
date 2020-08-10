@extends('backend.admin.layouts.app')
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Coupons</li>
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

                <span><i class="fal fa-upload"></i> Coupons Manage</span>

                <!-- <a href="{{route('seller.upload-start')}}" class="btn btn-primary">
                    <i class="fal fa-plus"></i> Start Bulk Upload </a> -->
                <select>
                    
                </select>

            </div>

            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                        <div class="table-responsive-xl">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Product</th>
                                        <th>
                                            Pricing <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The full and discounted price"></i>
                                        </th>
                                        <th>Status <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="The status of your coupon"></i></th>
                                        <th>
                                            Schedule <i class="fal fa-question-circle" data-toggle="tooltip"
                                                data-placement="top" title="When will your coupon start or end"></i>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $key=> $coupon)

                                    <tr>
                                        <td>
                                            {{$coupon->id}} </td>
                                        <td>
                                            @if(count($coupon->coupon_image)>0)
                                            <img src="{{asset('public/images/'.$coupon->coupon_image[0]->image_path)}}"
                                                width="50" alt="test shopify namertewhrrte">
                                            @else
                                            <i class="fal fa-image fa-3x"></i>
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            {{$coupon->product_name}} </td>
                                        <td>
                                            <small class="text-danger strikethrough">
                                                ₹{{ number_format($coupon->price, 2, '.', ',') }} </small>
                                            <span class="text-success">
                                                ₹{{ number_format($coupon->price*(100-$coupon->off_per)/100, 2, '.', ',') }}
                                            </span><br />
                                            <small>
                                                {{$coupon->off_per}}% OFF </small>
                                        </td>
                                        <td><span class="text-danger">{{$coupon->permission}}
                                            </span></td>
                                        <td>
                                            Starts on {{$coupon->start_date}}<br /></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button data-e2e="btn-actions"
                                                    class="btn btn-primary btn-block dropdown-toggle" type="button"
                                                    id="actions-menu" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="actions-menu">
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon.state_change',
                                                            array('id' =>  $coupon->id, 'state' => 'online' ))}}">
                                                        Approve
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{route('coupon.state_change',
                                                            array('id' =>  $coupon->id, 'state' => 'incomplete' ))}}">
                                                        Cancel
                                                    </a>
                                                    <!--  <a class="dropdown-item"
                                                        href="{{route('coupon.state_change',
                                                            array('id' =>  $coupon->id, 'state' => 'ready' ))}}">
                                                        Ready
                                                    </a>
                                                   <a class="dropdown-item"
                                                        href="{{route('coupon.state_change',
                                                            array('id' =>  $coupon->id, 'state' => 'pending' ))}}">
                                                        Pending
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon.state_change',
                                                            array('id' =>  $coupon->id, 'state' => 'incomplete' ))}}">
                                                        Incomplete
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{route('coupon.state_change',
                                                            array('id' =>  $coupon->id, 'state' => 'completed' ))}}">
                                                        Completed
                                                    </a> -->
                                                    

                                                    <a class="dropdown-item" style="background: #f86c6b; color:white;" 
                                                        href="{{route('coupon_delete', $coupon->id)}}">
                                                        Delete
                                                    </a>
                                                </div>
                                                       
                                            </div>

                                                
                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{route('coupon_manage.show',$coupon->id)}}">
                                                View Info
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>



                    </div>
                    {{$coupons->links()}}

                </div>

            </div>

        </div>

    </div>

</main>

@endsection