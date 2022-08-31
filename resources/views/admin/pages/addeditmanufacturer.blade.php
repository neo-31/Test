@extends("admin.admin_app")
@section('title', 'Manufacturers ')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>{{isset($manufacturer->id)?'Edit':'Add'}} Manufacturers</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/manufacturers')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{isset($manufacturer->manufacturers_name)?'Edit: '.$manufacturer->manufacturers_name:'Add'}} Manufacturer</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/manufacturers/addmanufacturers'),
                'class'=>'','name'=>'manufacturer_form','id'=>'manufacturer_form',
                'role'=>'form','enctype' => 'multipart/form-data')) !!}
                  <input type="hidden" name="id" value="{{ isset($manufacturer->id) ? $manufacturer->id : null }}">
                    <div class="form-group">
                        <label>Manufacturer Name</label>
           <input type="text" name="manufacturers_name" value="{{ isset($manufacturer->manufacturers_name) ? $manufacturer->manufacturers_name : null }}" class="form-control" required>
                    </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                        <label>Manufacturer Slug</label>
                        <input type="text" id="manufacturers_slug" name="manufacturers_slug" value="{{ isset($manufacturer->manufacturers_slug) ? $manufacturer->manufacturers_slug : null }}" class="form-control" >
                   </div>
                   <div class="col-md-6">

                        <label>Manufacturers assing to</label>
                        <select id="manufacturer_type_id" name="manufacturers_assign" class="form-control">
                            @if(isset($manufacturer->manufacturers_assign))
                            <option @if($manufacturer->manufacturers_assign == 'Blog') selected @else '' @endif value="Blog">Blog</option>
                            <option @if($manufacturer->manufacturers_assign == 'Video') selected @else '' @endif value="Video">Video</option>
                            <option @if($manufacturer->manufacturers_assign == 'Service') selected @else '' @endif value="Service">Service</option>
                            <option @if($manufacturer->manufacturers_assign == 'Product') selected @else '' @endif value="Product">Product</option>
                            @else
                            <option value="Blog">Blog</option>
                            <option value="Video">Video</option>
                             <option value="Service">Service</option>
                            <option value="Product">Product</option>
                            @endif
                        </select>
                    </div>
                    </div>
                  <div class="text-center">
        <button type="submit"  class="btn btn-primary theme-bg">{{isset($manufacturer->id)?'Update':'Create'}}</button>
    </div>
    {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection
