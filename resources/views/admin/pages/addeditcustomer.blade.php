@extends("admin.admin_app")
@section('title', 'Customer')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ isset($user->id) ? __('Edit Customer') : __('Add Customer') }}</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{ URL::to('admin/customers') }}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> {{ __('Back To List') }}</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('flash_message') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12">
        <div class="card planned_task">
            <div class="header">
                {{-- <h2>Key Information</h2> --}}
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/customers/addcustomer'),'class'=>'','name'=>'cust_form','id'=>'cust_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : null }}">

                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show hov-green" data-toggle="tab" href="#Key-Information"><i class="fa fa-user"></i>  {{ __('Customer Details') }}</a></li>
                        <li class="nav-item"><a class="nav-link hov-green" data-toggle="tab" href="#Address"><i class="fa fa-vcard"></i> {{ __('Address') }}</a></li>
                        <li class="nav-item vendors"><a class="nav-link hov-green" data-toggle="tab" href="#Business"><i class="fa fa-file"></i> {{ __('Business Details') }}</a></li>
                        @if (isset($user->id))
                        <li class="nav-item buyers"><a class="nav-link hov-green" data-toggle="tab" href="#Notes"><i class="fa fa-sticky-note"></i> {{ __('Notes') }}</a></li>
                        <li class="nav-item buyers"><a class="nav-link hov-green" data-toggle="tab" href="#Conversation"><i class="fa fa-commenting"></i> {{ __('Conversation') }}</a></li>
                        @endif
                      	{{-- @if (isset($user->id)) --}}
                        <li class="nav-item vendors"><a class="nav-link hov-green" data-toggle="tab" href="#Notification"><i class="fa fa-bell"></i> {{ __('Notification') }}</a></li>
                        {{-- @endif --}}
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="Key-Information">
                            <h6>{{ __('Customer Details') }}</h6>
                            <div class="form-group">
                                <label>{{ __('Customer Type') }}</label>
                                <select id="customer_type" name="cust_type" class="form-control" required>
                                    <option value="">{{ __('Please Select') }}</option>
                                    @if(isset($user->cust_type))
                                    <option @if($user->cust_type == 'Buyers') selected @else '' @endif value="Buyers">Buyers</option>
                                    <option @if($user->cust_type == 'Vendors') selected @else '' @endif value="Vendors">Vendors</option>
                                    <option @if($user->cust_type == 'Prospects') selected @else '' @endif value="Prospects">Prospects</option>
                                    @else
                                    <option value="Buyers">Buyers</option>
                                    <option value="Vendors">Vendors</option>
                                    <option value="Prospects">Prospects</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('Lead Source') }}</label>
                                <select id="lead_source" name="lead_source" class="form-control">
                                    <option value="">{{ __('Please Select') }}</option>
                                    @if(isset($user->lead_source))
                                    <option @if($user->lead_source == 'AdWords') selected @else '' @endif value="AdWords">AdWords</option>
                                    <option @if($user->lead_source == 'Website') selected @else '' @endif value="Website">Website</option>
                                    <option @if($user->lead_source == 'Telephone') selected @else '' @endif value="Telephone">Telephone</option>
                                    <option @if($user->lead_source == 'Affiliate') selected @else '' @endif value="Affiliate">Affiliate</option>
                                    <option @if($user->lead_source == 'Email') selected @else '' @endif value="Email">Email</option>
                                    <option @if($user->lead_source == 'LinkedIn') selected @else '' @endif value="LinkedIn">LinkedIn</option>
                                    @else
                                    <option value="AdWords">AdWords</option>
                                    <option value="Website">Website</option>
                                    <option value="Telephone">Telephone</option>
                                    <option value="Email">Email</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('Lead Interest') }}</label>
                                <select id="lead_interest" name="lead_interest" class="form-control">
                                    <option value="">{{ __('Please Select') }}</option>
                                    @if(isset($user->lead_interest))
                                    <option @if($user->lead_interest == 'Cold') selected @else '' @endif value="Cold">Cold</option>
                                    <option @if($user->lead_interest == 'Hot') selected @else '' @endif value="Hot">Hot</option>
                                    <option @if($user->lead_interest == 'Warm') selected @else '' @endif value="Warm">Warm</option>
                                    @else
                                    <option value="Cold"> Cold</option>
                                    <option value="Hot"> Hot</option>
                                    <option value="Warm"> Warm</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('First Name') }}</label>
                                <input type="text" id="firstname" name="firstname" value="{{ isset($user->firstname) ? $user->firstname : null }}" class="form-control" required>
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Last Name') }}</label>
                                <input type="text" id="lastname" name="lastname" value="{{ isset($user->lastname) ? $user->lastname : null }}" class="form-control" required>
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Email') }} 1</label>
                                <input type="email" id="email" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Email') }} 2</label>
                                <input type="email" id="email_2" name="email_2" value="{{ isset($user->email_2) ? $user->email_2 : null }}" class="form-control">
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Mobile Telephone') }}</label>
                                <input type="text" id="phone" name="phone" value="{{ isset($user->phone) ? $user->phone : null }}" class="form-control"
                                pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"  oninvalid="this.setCustomValidity('Please enter valid Mobile Telephone eg. 9023458123')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Home Telephone') }}</label>
                                <input type="text" id="phone_2" name="phone_2" value="{{ isset($user->phone_2) ? $user->phone_2 : null }}" class="form-control"
                                pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"  oninvalid="this.setCustomValidity('Please enter valid Home Telephone Telephone eg. 9023458123')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('Notes') }}</label>
                                <textarea id="cust_note" name="cust_note" class="form-control" value="{{ isset($user->cust_note) ? $user->cust_note : null }}" placeholder="Written notes about customer" rows="3" >{{ isset($user->cust_note) ? $user->cust_note : null }}</textarea>
                            </div>
                          	<div class="form-group">
                                <label>Create Date</label>
                                <input id="datepicker" name="created_at" value="{{ isset($user->created_at) ? $user->created_at : null }}" class="form-control" placeholder="Select Date">
                            </div>
                        </div>

                        <div class="tab-pane" id="Address">
                            <h6>{{ __('Address') }}</h6>
                            <div class="form-group buyers">
                                <label>{{ __('Shipping Address') }}</label>
                                <textarea id="shipping_address" name="shipping_address" class="form-control" value="{{ isset($user->shipping_address) ? $user->shipping_address : null }}"  rows="3" >{{ isset($user->shipping_address) ? $user->shipping_address : null }}</textarea>
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Delivery Address') }}</label>
                                <textarea id="delivery_address" name="delivery_address" class="form-control" value="{{ isset($user->delivery_address) ? $user->delivery_address : null }}"  rows="3" >{{ isset($user->delivery_address) ? $user->delivery_address : null }}</textarea>
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Postal Code') }}</label>
                                <input type="text" id="postal_code" name="postal_code" value="{{ isset($user->postal_code) ? $user->postal_code : null }}" class="form-control" >
                            </div>
                            <div class="form-group buyers">
                                <label>{{ __('Country') }}</label>
                                <select id="country" name="country" class="form-control">
                                    <option value="">{{ __('Please Select') }}</option>
                                    @if(isset($user->country))
                                    <option @if($user->country == 'UK') selected @else '' @endif value="UK">UK</option>
                                    <option @if($user->country == 'US') selected @else '' @endif value="US">US</option>
                                    <option @if($user->country == 'SPAIN') selected @else '' @endif value="SPAIN">SPAIN</option>
                                    @else
                                    <option value="UK"> UK</option>
                                    <option value="US"> US</option>
                                    <option value="SPAIN"> SPAIN</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="tab-pane" id="Business">
                            <h6>{{ __('Business Details') }}</h6>
                            <div class="form-group vendors">
                                <label>{{ __('Business Name') }}</label>
                                <input type="text" id="business_name" name="business_name" value="{{ isset($user->business_name) ? $user->business_name : null }}" class="form-control">
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('Website') }}</label>
                                <input type="url" id="website" name="website" value="{{ isset($user->website) ? $user->website : null }}" class="form-control" >
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('Company Linkedin') }}</label>
                                <input type="url" id="company_linkedin" name="company_linkedin" value="{{ isset($user->company_linkedin) ? $user->company_linkedin : null }}" class="form-control" >
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('User Linkedin') }}</label>
                                <input type="url" id="linkedin_profile" name="linkedin_profile" value="{{ isset($user->linkedin_profile) ? $user->linkedin_profile : null }}" class="form-control" >
                            </div>
                            <div class="form-group vendors">
                                <label>{{ __('Facebook Page Link') }}</label>
                                <input type="url" id="facebook_page" name="facebook_page" value="{{ isset($user->facebook_page) ? $user->facebook_page : null }}" class="form-control" >
                            </div>
                        </div>

                        {{-- @if (isset($user->id)) --}}
                        <div class="tab-pane" id="Notification">
                            <h6 class="vendors">{{ __('Notification') }}</h6>
                            <div class="form-group vendors">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if(isset($user->newsletters))
                                        <div class="fancy-checkbox">
                                            <label><input @if($user->newsletters == 'Yes') checked @endif name="newsletters" type="checkbox" class="form-control" value="Yes"><span>{{ __('Newsletters') }}</span></label>
                                        </div>
                                        @else
                                        <div class="fancy-checkbox">
                                            <label><input name="newsletters" type="checkbox" class="form-control" value="Yes"><span>{{ __('Newsletters') }}</span></label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                      
                      	@if (isset($user->id))
                        <div class="tab-pane" id="Notes">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="bg-label">{{ __('Notes') }}</h6>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-primary theme-bg gradient btn-round" data-toggle="modal" data-target="#CreateTask">Create Note</button>
                                </div>
                            </div>
                            <div class="scrum-body">
                                <div class="scrum-board done">
                                    <div class="scrum-board-column">
                                        @foreach($user_notes as $note)
                                        <div class="scrum-task overflow">
                                            @if(Auth::user()->id == '1')
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="st-description">{{$note->user_note}}</div>
                                                <div class="st-assignee pb-5">
                                                    <a href="{{ url('admin/customers/notes/delete/'.$note->id) }}" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                            @else
                                             <div class="st-description">{{$note->user_note}}</div>
                                            @endif
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="st-date">Date {{ date('d/m/yy', strtotime($note->updated_at)) }}</div>
                                                <div class="st-assignee">
                                                    Create By : @if(empty($note->created_by))@else{{ getUserInfo($note->created_by)->name }}@endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Conversation">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="bg-label">{{ __('Conversation') }}</h6>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-primary theme-bg gradient btn-round" data-toggle="modal" data-target="#ConversationTask">Create Conversation</button>
                                </div>
                            </div>
                            <div class="scrum-body">
                                <div class="scrum-board done">
                                    <div class="scrum-board-column">
                                        @foreach($user_conversations as $conversation)
                                        <div class="scrum-task overflow">
                                            @if(Auth::user()->id == '1')
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="st-description">{{$conversation->conversation}}</div>
                                                <div class="st-assignee pb-5">
                                                    <a href="{{ url('admin/customers/conversation/delete/'.$conversation->id) }}" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                            @else
                                             <div class="st-description">{{$conversation->conversation}}</div>
                                            @endif
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="st-date">Date {{ date('d/m/yy', strtotime($conversation->updated_at)) }}</div>
                                                <div class="st-assignee">
                                                    Create By : @if(empty($conversation->created_by))@else{{ getUserInfo($conversation->created_by)->name }}@endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary theme-bg">{{ isset($user->id) ? __('Update') : __('Create') }}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="CreateTask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Create Note</h5>
            </div>
            {!! Form::open(array('url' => array('admin/customers/addcustomernote'),'class'=>'','name'=>'cust_note','id'=>'cust_note','role'=>'form','enctype' => 'multipart/form-data')) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="user_id" value="{{ isset($user->id) ? $user->id : null }}">
                        <div class="form-group c_form_group">
                            <label>Customer Note</label>
                            <div class="form-line">
                                <textarea rows="4" name="user_note" class="form-control no-resize" placeholder="Task Note..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="ConversationTask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Create Conversation</h5>
            </div>
            {!! Form::open(array('url' => array('admin/customers/addconversation'),'class'=>'','name'=>'cust_conversation','id'=>'cust_conversation','role'=>'form','enctype' => 'multipart/form-data')) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="user_id" value="{{ isset($user->id) ? $user->id : null }}">
                        <div class="form-group c_form_group">
                            <label>Customer Conversation</label>
                            <div class="form-line">
                                <textarea rows="4" name="conversation" class="form-control no-resize" placeholder="Conversation..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style type="text/css">
    #cke_1_contents{
        height: 200px !important;
    }
    .d_none{
        display: none;
    }
    .buyers, .vendors{
        display: none;
    }
    .white-bg{
        color: #fff !important;
    }
    .hov-green:hover, .hov-green:focus{ color: #00a850 !important; }
</style>
@stop

@section('vendor-script')
<script src="{{ asset('public/admin_assets/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop

@section('page-script')

<script>
    $(function() {
        CKEDITOR.replace('long_description');
    });

    $(document).ready(function () {
        $('#customer_type').change(function() {
            if (this.value == 'Buyers') {
                $(".buyers").css("display", "block");
                $(".vendors").css("display", "block");
            }
            else if(this.value == 'Vendors') {
                $(".buyers").css("display", "block");
                $(".vendors").css("display", "block");
            }
            else if(this.value == 'Prospects') {
                $(".buyers").css("display", "block");
                $(".vendors").css("display", "block");
            }
            else {
                $(".buyers").css("display", "none");
                $(".vendors").css("display", "none");
            }
        });

        var customer_type = $('#customer_type option:selected').val();
        if (customer_type == 'Buyers') {
            $(".buyers").css("display", "block");
            $(".vendors").css("display", "block");
        }
        else if(customer_type == 'Vendors') {
            $(".buyers").css("display", "block");
            $(".vendors").css("display", "block");
        }
        else if(customer_type == 'Prospects') {
            $(".buyers").css("display", "block");
            $(".vendors").css("display", "block");
        }
        else {
            $(".buyers").css("display", "none");
            $(".vendors").css("display", "none");
        }
    });

</script>
@stop
