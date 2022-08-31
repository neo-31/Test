@extends("admin.admin_app")
@section('title', 'Service Tab ')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>{{isset($category->category_name)?'Edit':'Add'}} Service tab</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/categories')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{isset($servicetab->tab_title)?'Edit: '.$servicetab->tab_title:'Add'}} Service Tab</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/service/addservicetab'),
                'class'=>'','name'=>'servicetab_form','id'=>'servicetab_form',
                'role'=>'form','enctype' => 'multipart/form-data')) !!}
                  <input type="hidden" name="id" value="{{ isset($servicetab->id) ? $servicetab->id : null }}">
                   <div class="form-group row">
                            <div class="col-md-6">
                         <label>Tab Name</label>
                         <input type="text" name="tab_title" value="{{ isset($servicetab->tab_title) ? $servicetab->tab_title : null }}" class="form-control" required>
                        
                  
                    </div></div>
                    <div class="form-group">
        <label>Tab Description</label>
        <textarea class="form-control" id="tab_description" name="tab_description" rows="5" cols="30" required="">{{isset($servicetab->tab_description)?$servicetab->tab_description:''}}</textarea>
    </div>
                    
                        
                  <div class="text-center">
        <button type="submit"  class="btn btn-primary theme-bg">{{isset($servicetab->id)?'Update':'Create'}}</button>
    </div>
    {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection
