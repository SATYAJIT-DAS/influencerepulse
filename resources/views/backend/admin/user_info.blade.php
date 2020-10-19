@extends('backend.admin.layouts.app')
@section('content')
<style type="text/css">
#my_timezone:hover {
    cursor: pointer;
}
</style>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    @if(session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{session('status')}}
            </div>
        </div>
    </section>
    @endif
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                        <i class="fal fa-user-cog"></i> Profile </div>

                    <div class="card-body">
                        <ul class="nav nav-fill nav-tabs flex-column flex-xl-row" role="tablist">
                            <li class="nav-item" data-toggle="tooltip" data-placement="top"
                                title="Campaigns that are active">
                                <a class="nav-link active" data-toggle="tab" id="profile-tab" href="#profile" role="tab"
                                    aria-controls="profile">Profile</a>
                            </li>
                            @if($user->role_id==3)
                            <li class="nav-item" data-toggle="tooltip" data-placement="top"
                                title="Campaigns that are camps / out of funds">
                                <a class="nav-link" data-toggle="tab" id="camps-tab" href="#camps" role="tab"
                                    aria-controls="camps">Campaigns ({{count($camps)}})</a>
                            </li>
                            @endif
                            <li class="nav-item" data-toggle="tooltip" data-placement="top"
                                title="Campaigns that are offline / out of funds">
                                <a class="nav-link" data-toggle="tab" id="orders-tab" href="#orders" role="tab"
                                    aria-controls="orders">Orders ({{count($orders)}})</a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="top"
                                title="Campaigns that are waiting to be activated by your schedule">
                                <a class="nav-link" data-toggle="tab" id="msgs-tab" href="#msgs" role="tab"
                                    aria-controls="msgs">Messages ({{count($msgs)}})</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade  show active" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <form id="profile-form" method="post" action="{{route('users.update',$user->id)}}">
                                    @csrf

                                    <input type="hidden" name="action" value="profile" />

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="name">
                                                    Full name </label>
                                                <div class="controls">
                                                    <input class="form-control" type="text" name="name" id="name"
                                                        maxlength="255" value="{{$user->name}}" />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="public-name">
                                                    Brand name <i class="fal fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="This will help buyers to buy the product from your brand."></i>
                                                </label>
                                                <div class="controls">
                                                    <input class="form-control" type="text" name="brandname"
                                                        id="public-name" maxlength="255" value="{{$user->brandname}}" />
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="address1">Address (line 1)</label>
                                        <div class="controls">
                                            <input class="form-control" id="address1" name="address1"
                                                value="{{$user->address1}}" placeholder="Address (line 1)" />
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-8">

                                            <div class="form-group">
                                                <label class="form-control-label" for="address2">Address (line
                                                    2)</label>
                                                <div class="controls">
                                                    <input class="form-control" id="address2" name="address2"
                                                        value="{{$user->address2}}" placeholder="Address (line 2)" />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="form-group">
                                                <label class="form-control-label" for="zip-code">ZIP code</label>
                                                <div class="controls">
                                                    <input class="form-control" id="zip-code" name="zip_code"
                                                        value="{{$user->zip_code}}" placeholder="ZIP code" />
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="address1">Phone Number</label>
                                                <div class="controls">
                                                    <input type="number" class="form-control" id="phone" name="phone"
                                                        value="{{$user->phone}}" placeholder="Phone Number..." />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-6">


                                            <div class="form-group">
                                                <label class="form-control-label" for="wallet-amount">Wallet
                                                    Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{ dynamicCurrency() }}</span>
                                                    </div>
                                                    <div class="controls">
                                                        <input class="form-control" id="wallet-amount"
                                                            name="wallet_amount" value="{{$wallet_amount}}"
                                                            placeholder="Wallet Amount" />
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="row">

                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="country">Country</label>
                                                <div class="controls">
                                                    <select name="country" id="country" class="form-control"
                                                        data-toggle="select2">
                                                        @foreach($countries as $key=>$country)
                                                        <option value="{{$key}}">{{$country}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="state-id">State</label>
                                                <div class="controls">
                                                    <select name="state_id" id="state-id" class="form-control"
                                                        data-toggle="select2">
                                                        @foreach($states as $key=>$state)
                                                        <option value="{{$key}}">{{$state}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="city">City</label>
                                                <div class="controls">
                                                    <input class="form-control" id="city" name="city"
                                                        value="{{$user->city}}" placeholder="City" />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="timezone">
                                                    Timezone </label>
                                                <div class="controls">
                                                    <select name="timezone" id="timezone" class="form-control"
                                                        data-toggle="select2">
                                                        @foreach($timezones as $key => $timezone)
                                                        <option value="{{$key}}">{{$timezone}}</option>
                                                        @endforeach
                                                        <option value="UTC">UTC</option>
                                                    </select>

                                                    <div class="d-block text-right text-muted timezone-detection">
                                                        Don't know your timezone? <a onclick="get_timezone()"
                                                            style="color:#20a8d8;" class="btn-timezone"
                                                            id="my_timezone">
                                                            Click to autodetect </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="btn-group text-center">
                                        <a class="btn btn-danger" href="/users/suspend/{{$user->id}}">Suspend</a>

                                        <a class="btn btn-danger" href="/users/delete/{{$user->id}}">Delete</a>

                                        @method('PUT')
                                        <button class="btn btn-primary" type="submit">
                                            Update Profile </button>
                                    </div>

                                </form>

                            </div>

                            @if($user->role_id==3)

                            <div class="tab-pane fade" id="camps" role="tabpanel" aria-labelledby="camps-tab">

                                <div class="table-responsive-xl">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Picture</th>
                                                <th>Product</th>
                                                <th>Pricing</th>
                                                <th>Status</th>
                                                <th>
                                                    Start Time <i class="fal fa-question-circle" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Number of claims today / Daily limit"></i>
                                                </th>
                                                <th>Wallet</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($camps as $key => $camp)
                                            <tr>
                                                <td>
                                                    {{$camp->id}}
                                                    <i class="fal fa-shield-check" data-toggle="tooltip" title=""
                                                        data-original-title="Protection against repeat buyers enabled: {{$camp->product_id}}"></i>
                                                    @if($camp->private_status == 1)
                                                    <i class="fal fa-eye-slash" data-toggle="tooltip" title=""
                                                        data-original-title="Private campaign"></i>
                                                    @endif </td>
                                                <td>
                                                    @if(count($camp->pic)>0)
                                                    <img alt="product name"
                                                        src="{{asset('public/images/'.$camp->pic[0]->image_path)}}"
                                                        width="50">
                                                    @else
                                                    <i class="fal fa-image fa-3x"></i>
                                                    @endif
                                                </td>
                                                <td style="max-width: 450px;"><label
                                                        style="width: 100%">{{$camp->product_name}}</label></td>
                                                <td>
                                                    @if($camp->price && $camp->rebate_price)
                                                    <small class="text-danger strikethrough">
                                                        {{ dynamicCurrency() }}{{$camp->price}} </small>
                                                    <span class="text-success">
                                                        {{ dynamicCurrency() }}{{$camp->rebate_price}} </span><br>
                                                    <small>
                                                        {{round((100-$camp->rebate_price/$camp->price*100)*100)/100}}%
                                                        OFF </small>
                                                    @endif

                                                </td>
                                                <td>

                                                    <span class="text-info">{{$camp->permission}}</span> </td>
                                                <td>
                                                    {{$camp->start_date}}<br>
                                                    {{$camp->start_time}} </td>
                                                <td>{{ dynamicCurrency() }}{{ number_format($camp->wallet, 2, '.', ',') }}</td>

                                            </tr>
                                            @endforeach
                                            @if(count($camps) == 0)
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    No campaigns. </td>
                                            </tr>
                                            @endif
                                        </tbody>

                                    </table>

                                </div>


                            </div>
                            @endif

                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">

                                <div class="table-responsive-xl">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Picture</th>
                                                <th>Product</th>
                                                <th>Seller</th>
                                                <th>Buyer</th>
                                                <th>Rebate Key</th>
                                                <th>Payout</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(count($orders) != 0)
                                                @foreach($orders as $order)
                                                <tr>
                                                    @if($user->role_id == 2)
                                                    <td>{{$order->id}}</td>
                                                    <td>
                                                        <img src="{{asset('public/images/'.$order->getCamp->pic[0]->image_path)}}" class="deal-img">
                                                    </td>
                                                    <td style="width: 30%;">{{$order->getCamp->product_name}}</td>
                                                    <td>
                                                        {{$order->getCamp->user->name}}</td>
                                                    <td>
                                                        {{$order->getBuyer->name}}</td>
                                                    <td>
                                                        {{$order->order_id}}</td>
                                                     <td>
                                                        {{ dynamicCurrency() }}{{$order->getCamp->price-$order->getCamp->rebate_price}}
                                                    </td>
                                                    <td>
                                                        <span class="text-danger">{{$order->status}}</span>
                                                    </td>
                                                    @else
                                                    <td>{{$order->id}}</td>
                                                    <td>
                                                        <img src="{{asset('public/images/'.$order->image)}}" class="deal-img">
                                                    </td>

                                                    <td style="width: 30%;">{{$order->product_name}}</td>
                                                    <td>
                                                        {{$user->name}}
                                                    </td>
                                                    <td>
                                                        {{$order->name}}</td>
                                                    <td>
                                                        {{$order->order_id}}</td>
                                                     <td>
                                                        {{ dynamicCurrency() }}{{$order->price-$order->rebate_price}}
                                                    </td>
                                                    <td>
                                                        <span class="text-danger">{{$order->status}}</span>
                                                    </td>


                                                    @endif

                                                </tr>

                                                @endforeach
                                            @else
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    No purchases waiting for approval yet. </td>
                                            </tr>
                                            @endif
                                        </tbody>

                                    </table>

                                </div>


                            </div>

                            <div class="tab-pane fade" id="msgs" role="tabpanel" aria-labelledby="online-tab">

                                <div class="table-responsive-xl">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>
                                                    From </th>
                                                <th>About</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $count=0 ?>
                                            @foreach($msgs as $key => $msg)
                                            <tr>
                                                <?php $count++ ?>
                                                <td>
                                                    {{ date('j F, Y  h:m ', strtotime($msg->date)) }}
                                                </td>
                                                <td>
                                                    @if($msg->type ==0)
                                                    {{$msg->getOrder->getBuyer->name}}
                                                    @else
                                                    <b>Support.team</b>
                                                    @endif
                                                </td>
                                                <td>
                                                    <img src="{{asset('public/images/'.$msg->getOrder->getCamp->pic[0]->image_path)}}"
                                                        alt="{{$msg->getOrder->getCamp->product_name}}"

                                                        style="width: 100px; display: inline-block;">
                                                </td>
                                                <td width="45%">
                                                    {{$msg->message}}
                                                </td>
                                            </tr>

                                            @endforeach
                                            <?php
                                            if ($count == 0) {?>

                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No messages yet. </td>
                                                </tr>
                                            <?php
                                                }
                                            ?>

                                        </tbody>

                                    </table>

                                </div>
                            </div>


                        </div>




                    </div>

                </div>


            </div>
        </div>

    </div>
    <input type="hidden" id="user_country" value="{{$user->country}}">
    <input type="hidden" id="user_state" value="{{$user->state}}">
    <input type="hidden" id="user_timezone" value="{{$user->time_zone}}">

    <script type="text/javascript">
    function get_timezone() {
        console.log("time")
        $.ajax({
            url: "{{route('get-timezone')}}",
            data: {
                _token: "{{csrf_token()}}",
            },
            type: "post",
            dataType: "json",
            success: function(result) {
                console.log('wer', result);
                $("#my_timezone").html(result.timezone);

                console.log("ssss", result.time_key);

                $("#timezone").val(result.time_key);
                $("#timezone").select2({
                    theme: "bootstrap"
                });

            },
            error: function(e) {
                console.log(e);
            }
        })
    }

    function get_state(country_id) {
        $.ajax({
            url: "{{route('get-state')}}",
            data: {
                _token: "{{csrf_token()}}",
                country_id: country_id,
            },
            type: "post",
            dataType: "json",
            success: function(result) {
                html_state = "";
                $.each(result, function(i) {
                    html_state += "<option value='" + i + "'>" + result[i] + "</option>";
                });
                console.log("html", html_state);
                $("#state-id").html(html_state);
            },
            error: function(e) {
                console.log(e);
            }
        })
    }
    </script>


    <script type="text/javascript">
    $(document).ready(function() {

        country_id = $("#user_country").val();
        state_id = $("#user_state").val();
        timezone_id = $("#user_timezone").val();

        $("#country").val(country_id);
        $("#state-id").val(state_id);
        $("#timezone").val(timezone_id);

        $("#country").on('change', function() {
            country_id = $(this).val();

            get_state(country_id);

        })


        $('#profile-form').on('init.field.fv', function(e, data) {
            const $icon = data.element.data('fv.icon'),
                options = data.fv.getOptions(), // Entire options
                validators = data.fv.getOptions(data.field).validators; // The field validators

            if (validators.notEmpty && options.icon && options.icon.required) {
                $icon.addClass(options.icon.required).show();
            }
        }).formValidation({
            framework: 'bootstrap4',
            icon: {
                required: 'fal fa-asterisk',
                valid: 'fal fa-check',
                invalid: 'fal fa-times',
                validating: 'fal fa-refresh'
            },
            addOns: {
                mandatoryIcon: {
                    icon: 'fal fa-asterisk'
                }
            },
            fields: {
                'timezone': {
                    validators: {
                        notEmpty: {
                            message: 'The timezone is required.'
                        }
                    }
                }
            }
        }).find('[data-toggle="select2"]').select2({
            theme: "bootstrap"
        });

    })
    </script>

</main>

@endsection
