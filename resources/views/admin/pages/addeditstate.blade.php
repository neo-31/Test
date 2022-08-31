@extends("admin.admin_app")
@section('title', 'States ')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>{{isset($state->state_name)?'Edit':'Add'}} State</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/states')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{isset($state->state_name)?'Edit: '.$state->state_name:'Add'}} State</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/states/addstates'),
                'class'=>'','name'=>'state_form','id'=>'state_form',
                'role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($state->id) ? $state->id : null }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>State Name</label>
                            <input type="text" name="state_name" value="{{ isset($state->state_name) ? $state->state_name : null }}"
                            class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Country</label>

                            <select id="country_id" name="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach ($allcountries as $country)

                                    <option value="{{$country->id}}" @if(isset($state->state_name) && $state->country_id == $country->id) selected @else '' @endif >{{$country->country_name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit"  class="btn btn-primary theme-bg">{{isset($state->id)?'Update':'Create'}}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection
