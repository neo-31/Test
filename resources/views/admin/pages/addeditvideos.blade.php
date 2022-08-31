@extends("admin.admin_app")
@section('title', 'Videos')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ isset($video->video_title) ? 'Edit' : 'Add' }} Videos</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{ URL::to('admin/videos') }}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{ isset($video->video_title) ? 'Edit: '. $video->video_title : 'Add Videos' }}</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/videos/addvideos'),'class'=>'','name'=>'video_form','id'=>'video_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($video->id) ? $video->id : null }}">
                    <div class="form-group">
                        <label>Video Title</label>
                        <input type="text" name="video_title" value="{{ isset($video->video_title) ? $video->video_title : null }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @if(isset($video->category_id))
                                @foreach($category_list as $category)
                                <option value="{{$category->id}}" @if($video->category_id==$category->id) selected @endif>{{$category->category_name}}</option>
                                @endforeach
                            @else
                                @foreach($category_list as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Youtube URL</label>
                        <input type="text" name="video_youtube_url" value="{{ isset($video->youtube_url) ? $video->youtube_url : null }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="video_description" value="{{ isset($video->description) ? $video->description : null }}" class="form-control">{{ isset($video->description) ? $video->description : null }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary theme-bg">{{ isset($video->id) ? 'Update' : 'Create' }}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-styles')
@stop

@section('vendor-script')
<script src="{{ asset('public/admin_assets/vendor/ckeditor/ckeditor.js') }}"></script>
@stop

@section('page-script')
<script>
    $(function() {
        CKEDITOR.replace('video_description');
    });
</script>
@stop
