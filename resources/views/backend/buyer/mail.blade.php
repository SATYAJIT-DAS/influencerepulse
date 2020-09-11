@extends('backend.buyer.layouts.app')
@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fal fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('buyer.profile')}}">Account</a></li>
        <li class="breadcrumb-item active">Mailing Address</li>
    </ol>
    @if(session('status'))
    <section class="section section-flash aos-init aos-animate" data-aos="flip-up">
        <div class="container-fluid"> 
            @if(session('status') == "No file was uploaded")
            <div class="alert alert-danger" role="alert">
                <i class="fal fa-exclamation-triangle"></i> {{session('status')}}
            </div>
            @else
            <div class="alert alert-success" role="alert">
                <i class="fal fa-check"></i> {{session('status')}}
            </div>
            @endif
        </div>
    </section>
    @endif
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <i class="fal fa-address-card"></i> Mailing Address </div>

            <div class="card-body">

                <div class="alert alert-info">
                    <i class="fal fa-exclamation-circle"></i>
                    Please make sure you provide the correct <b>mailing address</b> and <b>full name</b>, since
                    this information will appear on your payouts.
                </div>

                <form id="mailing-address-form" method="post" action="{{route('buyer-mail-store')}}">
                    @csrf
                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group">
                                <label class="form-control-label" for="name">
                                    Full name <i class="fal fa-question-circle" data-toggle="tooltip"
                                        data-placement="top"
                                        title="Your name will be shared with the sellers for the Deals approval."></i>
                                </label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="name" id="name"
                                        maxlength="255" placeholder="Name as displayed on your check"
                                        value="{{$user->name}}" />
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5">

                            <p class="text-muted">
                                <small><i>Exactly as it appears on your official ID.</i></small>
                            </p>

                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group">
                                <label class="form-control-label" for="address1">Address (line 1)</label>
                                <div class="controls">
                                    <input class="form-control" id="address1" name="address1" value="{{$user->address1}}"
                                        placeholder="Address (line 1)">
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5">

                            <p class="text-muted">
                                <small>
                                    <i>
                                        Type House Number/Flat Number and Street, make sure you add a space or "," between House number/Flat Number and Street name.
                                    </i>
                                </small>
                            </p>

                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="row">

                                <div class="col-sm-8">

                                    <div class="form-group">
                                        <label class="form-control-label" for="address2">
                                            Address (line 2) </label>
                                        <div class="controls">
                                            <input class="form-control" id="address2" name="address2" value="{{$user->address2}}"
                                                placeholder="Address (line 2)">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="zip-code">ZIP code</label>
                                        <div class="controls">
                                            <input class="form-control" id="zip-code" name="zip_code" value="{{$user->zip_code}}"
                                                placeholder="ZIP code">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-5">

                            <p class="text-muted">
                                <small>
                                    <i>
                                        Type your complete address and Land mark
                                    </i>
                                </small>
                            </p>

                        </div>

                    </div>

                    <div class="row align-items-center">

                        <div class="col-xl-7">

                            <div class="form-group">
                                <label class="form-control-label" for="address1">Phone Number</label>
                                <div class="controls">
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                                        placeholder="Phone Number">
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5">

                            <p class="text-muted">
                               
                            </p>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-7">

                            <div class="row">

                                <div class="col-lg-4">

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

                                <div class="col-lg-4">

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

                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label class="form-control-label" for="city">City</label>
                                        <div class="controls">
                                            <input class="form-control" id="city" name="city" value="{{$user->city}}"
                                                placeholder="City">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-5">

                        </div>

                    </div>

                    <button class="btn btn-primary btn-block" type="submit">
                        Save Mailing Address </button>

                </form>

            </div>

        </div>
        <input type="hidden" id="user_country" value="{{$user->country}}">
        <input type="hidden" id="user_state" value="{{$user->state}}">

    </div>
    <script type="text/javascript">
         function get_state(country_id){
            $.ajax({
                url: "{{route('get-state')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    country_id: country_id,
                },
                type: "post",
                dataType: "json",
                success: function(result) {
                    html_state="";
                    $.each(result, function(i) {
                        html_state+="<option value='"+i+"'>"+result[i]+"</option>";
                    });
                    console.log("html",html_state);
                    $("#state-id").html(html_state);
                },
                error:function(e){
                    console.log(e);
                }
            })
        }
    </script>

    <script>
        $(function () {
            country_id=$("#user_country").val();
            state_id=$("#user_state").val();
            $("#country").val(country_id);
            $("#state-id").val(state_id);

            $("#country").on('change',function(){
                country_id=$(this).val();
                get_state(country_id);           
            })

            $('#mailing-address-form').on('init.field.fv', function (e, data) {
                const $icon = data.element.data('fv.icon'),
                    options = data.fv.getOptions(),                      // Entire options
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
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'The name is required.'
                            },
                            stringLength: {
                                min: 5,
                                message: 'The full name is too short.'
                            }
                        }
                    },
                    'address1': {
                        validators: {
                            notEmpty: {
                                message: 'The address is required.'
                            }
                        }
                    },
                    'zip_code': {
                        validators: {
                            notEmpty: {
                                message: 'The ZIP code is required.'
                            },
                            regexp: {
                                regexp: /^[0-9]{5}(?:-[0-9]{4})?$/i,
                                message: 'The ZIP code is invalid (only digits and dash allowed).'
                            }
                        }
                    },
                    'country': {
                        validators: {
                            notEmpty: {
                                message: 'The country is required.'
                            }
                        }
                    },
                    'phone': {
                        validators: {
                            notEmpty: {
                                message: 'The phone number is required.'
                            },
                            regexp: {
                                regexp: /^[0-9]/,
                                message: 'The phone number is invalid (only digits).'
                            }
                        }
                    },
                    'city': {
                        validators: {
                            notEmpty: {
                                message: 'The city is required.'
                            }
                        }
                    }
                }
            }).find('[data-toggle="select2"]').select2({
                theme: "bootstrap"
            });

        });
    </script>

</main>

@endsection