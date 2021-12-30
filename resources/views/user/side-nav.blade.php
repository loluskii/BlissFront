<div class="col-md-3 side-nav">
    <div class="border-0">
        <div class="card-body pt-0">
            <div class="row pb-2 ">
                <div class="col px-0 {{ request()->is('user/account*') ? 'active' : '' }}">
                    <a href="{{ route('user.home') }}" style="text-decoration: none;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-0">Account Overview</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row py-2 ">
                <div class="col {{ request()->is('user/details') ? 'active' : '' }} px-0">
                    <a href="{{ route('user.details') }}" style="text-decoration: none;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-0">My Details</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row py-2 ">
                <div class="col {{ request()->is('user/my-orders') ? 'active' : '' }} px-0">
                    <a href="{{ route('user.my_orders') }}" style="text-decoration: none;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-0">My Subscriptions</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row py-2 ">
                <div class="col {{ request()->is('user/address-book') ? 'active' : '' }} px-0">
                    <a href="{{ route('user.address_book') }}" style="text-decoration: none;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-0">Address Book</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row py-2 ">
                <div class="col {{ request()->is('user/change-password') ? 'active' : '' }} px-0">
                   <a href="{{ route('user.change-password') }}" style="text-decoration: none;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-0">Change Password</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row py-2">
                <div class="col px-0">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-0">Sign Out</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
