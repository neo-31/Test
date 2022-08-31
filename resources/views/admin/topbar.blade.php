<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-left">
            <div class="navbar-btn">
                <a href="javascript:void(0);"><img src="{{ asset('public/admin_assets/images/logo.png') }}" alt="Mercers" class="img-fluid logo" style="width: 100%;"></a>
                <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
            </div>
        </div>
        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i class="fa fa-arrows-alt"></i></a></li>
                    <li><a href="{{ URL::to('admin/logout') }}" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
