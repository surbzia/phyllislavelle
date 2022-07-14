    <div class="header shadow">
        <div class="header-left">
            <span class="menu-icon icon-copy ti-menu ml-3"></span>
        </div>
        <div class="header-right pr-20">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle mt-xl-1" href="#" role="button" data-toggle="dropdown"
                        style="padding-top: 15px;">
                        <span class="font-10"> {{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list shadow-lg">
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dw dw-logout"></i> Log
                            Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
