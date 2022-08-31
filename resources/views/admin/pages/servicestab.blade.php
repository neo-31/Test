@extends("admin.admin_app")
@section('title', 'Tab')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Service</h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           <a href="{{URL::to('admin/service/addservicetab')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> Add Tab</a>
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
                <h2>Service</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tab Title</th>
                                <th>Tab Description</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                              <th>Tab Title</th>
                                <th>Tab Description</th>
                               
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($servicetabs as $tab)

                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$tab->id}}</td>
                              
                                <td>{{$tab->tab_title}}</td>
                                <td class="discriptionn" style="white-space: 'none !important';width: 40%">{{$tab->tab_description}}</td>
                                <td><input type="button" class="btn btn-outline-success btn-sm" onclick="service_deactive(12);" value="Active"></td>
                                <td>
                                <a href="{{ url('admin/service/addservicetab/'.$tab->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit" title="Edit"></i> Edit</a>&nbsp;
                                <a href="{{ url('admin/servicetab/delete/'.$tab->id) }}" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i> Delete</a>&nbsp;</td></tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
