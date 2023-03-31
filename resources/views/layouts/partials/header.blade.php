<style>
    .dashboard-notification::-webkit-scrollbar { width: 0 !important }
</style>

<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{url("admin")}}">
        <img class="navbar-brand-full" src="{{ config('app.coure_ui_asset_url').'/frontend/img/logo/logo.png' }}" style="width: 100%;" alt="instatask Logo">
        <img class="navbar-brand-minimized" src="{{ config('app.coure_ui_asset_url').'/frontend/img/logo/logo.png' }}" style="width: 30%;" alt="instatask Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown d-md-down-none"><a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bell"></i><span class="badge badge-pill badge-danger js-dashboard-notification-count"></span></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <ul class="js-dashboard-notification dashboard-notification" style="max-height: 50vh;overflow-y: scroll;">

                </ul>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ config('app.coure_ui_asset_url').'images/avatars/7.jpg' }}" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('profile-admin') }}">
                    <i class="fa fa-lock"></i> Profile</a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    
    {{--<button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">--}}
    {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
    {{--<button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">--}}
    {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
</header>

{{--delete nodal 1--}}
<div class="modal fade show" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Once delete! no longer will recover back.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-danger del-btn-confirm" data-id="#" data-model="#" type="button">Delete</a>
            </div>
        </div>

    </div>
</div>

{{--delete nodal 2--}}
<div class="modal fade show" id="deleteConfirmModalCarsetting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Delete! item will not be recovered again.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a  class="btn btn-danger car-btn-confirm-carsetting-admin" data-id="#" data-model="#" type="button">Delete</a>
            </div>
        </div>

    </div>
</div>





