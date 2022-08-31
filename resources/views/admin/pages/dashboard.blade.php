@extends("admin.admin_app")
@section('title', 'Dashboard')
@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Dashboard</h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-shopping-bag"></i></div>
                    <a href="{{ URL::to('admin/shop') }}">
                        <div class="ml-4">
                            <h6>Products</h6>
                            <h4 class="mb-0 font-weight-medium">{{ $product }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-cog"></i></div>
                    <a href="{{ URL::to('admin/services') }}">
                        <div class="ml-4">
                            <h6>Services</h6>
                            <h4 class="mb-0 font-weight-medium">{{ $service }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-pink text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                    <a href="{{ URL::to('admin/blog') }}">
                        <div class="ml-4">
                            <h6>News</h6>
                            <h4 class="mb-0 font-weight-medium">{{ $blog }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-video-camera"></i></div>
                    <a href="{{ URL::to('admin/videos') }}">
                        <div class="ml-4">
                            <span>Videos</span>
                            <h4 class="mb-0 font-weight-medium">{{ $video }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Timeline</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="timeline">
                    @foreach($activities_list as $i => $activity)
                    <div class="timeline-item">
                        @if(getUserInfo($activity->user_id)->image_icon != "default.png")
                        <img class="rounded-circle w30" src="{{ url(getUserInfo($activity->user_id)->image_icon) }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        @else
                        <img class="rounded-circle w30" src="{{ asset('public/admin_assets/images/user.png') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        @endif
                        <h6><span> {{ ucwords(getUserInfo($activity->user_id)->name) }}</span>, {{ $activity->subject_type }}  <small class="float-right text-muted font-12">{{ date('F j, Y', strtotime($activity->updated_at)) }}</small></h6>
                        <div class="msg">
                            <article class="media mb-0">
                                <div class="media-body">
                                    <div class="content">
                                        {{-- <p class="h5">{{ $activity->subject_type }}  <small class="float-right text-muted font-12">{{ date('g:i a', strtotime($activity->updated_at)) }}</small></p> --}}
                                        @if ($activity->subject_type == 'Blog' && ($activity->activity_type == 'Updated' || $activity->activity_type == 'Created'))
                                        <p>just {{ $activity->activity_type }} <b><a href="{{ url('admin/blog/addblog/'.$activity->subject_id) }}">{{ $activity->subject_type }} Form</b></a> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>

                                        @elseif ($activity->subject_type == 'Category' && ($activity->activity_type == 'Updated' || $activity->activity_type == 'Created'))
                                        <p>just {{ $activity->activity_type }} <b><a href="{{ url('admin/categories/addcategories/'.$activity->subject_id) }}">{{ $activity->subject_type }} Form</b></a> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>

                                        @elseif ($activity->subject_type == 'Manufacturer' && ($activity->activity_type == 'Updated' || $activity->activity_type == 'Created'))
                                        <p>just {{ $activity->activity_type }} <b><a href="{{ url('admin/manufacturers/addmanufacturers/'.$activity->subject_id) }}">{{ $activity->subject_type }} Form</b></a> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>

                                        @elseif ($activity->subject_type == 'Service' && ($activity->activity_type == 'Updated' || $activity->activity_type == 'Created'))
                                        <p>just {{ $activity->activity_type }} <b><a href="{{ url('admin/service/addservice/'.$activity->subject_id) }}">{{ $activity->subject_type }} Form</b></a> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>

                                        @elseif ($activity->subject_type == 'Product' && ($activity->activity_type == 'Updated' || $activity->activity_type == 'Created'))
                                        <p>just {{ $activity->activity_type }} <b><a href="{{ url('admin/product/addproduct/'.$activity->subject_id) }}">{{ $activity->subject_type }} Form</b></a> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>

                                        @elseif ($activity->subject_type == 'Video' && ($activity->activity_type == 'Updated' || $activity->activity_type == 'Created'))
                                        <p>just {{ $activity->activity_type }} <b><a href="{{ url('admin/videos/addvideos/'.$activity->subject_id) }}">{{ $activity->subject_type }} Form</b></a> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>

                                        @else
                                        <p>just {{ $activity->activity_type }} <b>{{ $activity->subject_type }} Form</b> &nbsp;&nbsp; {{ date('g:i a', strtotime($activity->updated_at)) }}</p>
                                        @endif
                                        <p>IP Address : <b>{{ $activity->ip_address }}</b></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
