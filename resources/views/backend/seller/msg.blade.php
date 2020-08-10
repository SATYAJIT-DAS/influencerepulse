@extends('backend.seller.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
    </ol>
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-comments"></i> Messages </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-2">

                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-unread-tab" role="tab" aria-controls="v-pills-unread"
                                aria-selected="true" data-toggle="tab" href="#unread">
                                Unread </a>
                            <a data-e2e="inbox-messages" class="nav-link" id="v-pills-inbox-tab" role="tab"
                                aria-controls="v-pills-inbox" aria-selected="true" data-toggle="tab" href="#inbox">
                                Inbox </a>
                            <a class="nav-link" id="v-pills-sent-tab" role="tab" aria-controls="v-pills-sent"
                                aria-selected="false" data-toggle="tab"
                                href="#sent">
                                Sent </a>
                        </div>

                    </div>

                    <div class="col-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="unread" role="tabpanel"
                                aria-labelledby="online-tab">

                                <div class="table-responsive-xl">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>
                                                    From </th>
                                                <th>About</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>

<tbody>
<?php $count=0 ?>
@foreach($msgs as $key => $msg)
@if($msg->to_user == Auth()->user()->id && ($msg->type ==0 || $msg->type ==3) && $msg->msg_status == 0)
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
                                                <td>
                                                    @if($msg->type ==0)
                                                    <a class="btn btn-primary btn-block msg-btn" data-toggle="modal"
                                                        data-target="#msg-modal" data-id="{{$msg->getOrder->id}}" style="color: white;" 
                                                        data-to="{{$msg->getOrder->getBuyer->name}}">
                                                        Message Buyer </a>
                                                    <a class="btn btn-dark btn-block"
                                                        href="{{route('seller.discussion',$msg->getOrder->id)}}">
                                                        View Discussion </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
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

                            <div class="tab-pane fade" id="inbox" role="tabpanel" aria-labelledby="online-tab">
                                <div class="table-responsive-xl">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>
                                                    From </th>
                                                <th>About</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $count=0 ?>
                                            @foreach($msgs as $key => $msg)
                                             @if($msg->getOrder->getCamp->user_id == Auth()->user()->id && ($msg->type ==0 || $msg->type ==3)&& $msg->msg_status == 1)
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
                                                <td>
                                                    {{$msg->message}}
                                                </td>
                                                <td>
                                                    @if($msg->type ==0)
                                                    <a class="btn btn-primary btn-block msg-btn" data-toggle="modal"
                                                        data-target="#msg-modal" data-id="{{$msg->getOrder->id}}" style="color: white;" 
                                                        data-to="{{$msg->getOrder->getBuyer->name}}">
                                                        Message Buyer </a>
                                                    <a class="btn btn-dark btn-block"
                                                        href="{{route('seller.discussion',$msg->getOrder->id)}}">
                                                        View Discussion </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
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

                            <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="online-tab">
                                <div class="table-responsive-xl">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>
                                                    To </th>
                                                <th>About</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $count=0 ?>
                                            @foreach($msgs as $key => $msg)
                                             @if($msg->getOrder->getCamp->user_id == Auth()->user()->id && $msg->type ==1)
                                            <tr>
                                                <?php $count++ ?>
                                                <td>
                                                    {{ date('j F, Y  h:m ', strtotime($msg->date)) }}
                                                </td>
                                                <td>
                                                    {{$msg->getOrder->getBuyer->name}}
                                                </td>
                                                <td>
                                                    <img src="{{asset('public/images/'.$msg->getOrder->getCamp->pic[0]->image_path)}}"
                                                        alt="{{$msg->getOrder->getCamp->product_name}}"

                                                        style="width: 100px; display: inline-block;">
                                                </td>
                                                <td>
                                                    {{$msg->message}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-block msg-btn" data-toggle="modal"
                                                        data-target="#msg-modal" data-id="{{$msg->getOrder->id}}" style="color: white;" 
                                                        data-to="{{$msg->getOrder->getBuyer->name}}">
                                                        Message Buyer </a>
                                                    <a class="btn btn-dark btn-block"
                                                        href="{{route('seller.discussion',$msg->getOrder->id)}}">
                                                        View Discussion </a>
                                                </td>
                                            </tr>
                                            @endif
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

    <div class="modal fade" id="msg-modal" tabindex="-1" role="dialog"
            style="padding-right: 17px; display: none;" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header align-items-center">

                        <h5 class="modal-title">Write a message to <b id="modal_title"></b></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times" aria-hidden="true"></i>
                        </button>

                    </div>

                    <div class="modal-body">

                        <form id="write-message-form" method="post" action="{{route('seller.msg_store')}}"
                            enctype="multipart/form-data" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                            @csrf
                            <button
                                type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

                            <input type="hidden" name="order_id" id="order_id" value="">
                            <input type="hidden" name="action" id="action" value="write">

                            <div class="form-group fv-has-feedback">
                                <label for="message" class="form-control-label">Message</label>
                                <div class="controls">
                                    <textarea data-e2e="message" name="message" id="message" class="form-control md-textarea"
                                        autofocus="" data-fv-field="message">
                                            
                                        </textarea>
                                        <i style=""
                                        class="fv-control-feedback fal fa-asterisk" data-fv-icon-for="message"></i>
                                </div>
                                <small style="display: none;" class="form-control-feedback" data-fv-validator="notEmpty"
                                    data-fv-for="message" data-fv-result="NOT_VALIDATED">The message is required.</small>
                            </div>

                            <div class="row align-items-center mb-4">

                                <div class="col-6">
                                    You can attach a file to your message. Images and PDF files are allowed. Maximum size 20MB.
                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label class="sr-only" for="attachment">Attach a file</label>
                                        <input type="file" class="form-control-file w-100" id="attachment" name="attachment">
                                    </div>

                                </div>

                            </div>

                            <button data-e2e="send-message" class="btn btn-primary btn-block btn-lg" type="submit">
                                Send Message </button>

                        </form>

                    </div>

                    <script>
                    $(function() {

                        $.ajax({
                            url:"{{route('seller-msgread')}}",
                            dataType:"json",
                            method:"post",
                            data:{
                                "_token":"{{csrf_token()}}",
                            },
                            success:function(result){
                                console.log(result);
                            },
                            error: function(e){
                                console.log(e);
                            }
                        })


                        $(".msg-btn").click(function(){
                            order_id=$(this).data('id');
                            to=$(this).data('to');
                            console.log("sadf",order_id,to)
                            $("#modal_title").html(to);
                            $("#order_id").val(order_id);


                        })





                        $('#write-message-form').on('init.field.fv', function(e, data) {
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
                                'message': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The message is required.'
                                        }
                                    }
                                }
                            }
                        });

                    });
                    </script>
                </div>
            </div>
        </div>

</main>
@endsection