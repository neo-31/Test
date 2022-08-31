@extends("admin.admin_app")
@section('title', 'Countries ')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>{{isset($country->country_name)?'Edit':'Add'}} Country</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/countries')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{isset($country->country_name)?'Edit: '.$country->country_name:'Add'}} Country</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/countries/addcountries'),
                'class'=>'','name'=>'country_form','id'=>'country_form',
                'role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($country->id) ? $country->id : null }}">
                    <div class="form-group">
                        <label>Country Name</label>
                        <input type="text" name="country_name" value="{{ isset($country->country_name) ? $country->country_name : null }}"
                        class="form-control" required>
                    </div>


                    <div class="text-center">
                        <button type="submit"  class="btn btn-primary theme-bg">{{isset($country->id)?'Update':'Create'}}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection
