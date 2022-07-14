 <div class="left-side-bar">
     <div class="brand-logo" style="width: 100%;background-color: white; border-right: 1px solid #e5e4e4;">
         <a href="index.html">
             {{-- <img src="{{ asset('templete/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
             <img src="{{ asset('templete/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo"> --}}
             <img src="{{ asset('image/logo.png') }}" alt="" class="light-logo"
                 style="width: 100px;margin-left: 16px;">
         </a>
         <div class="close-sidebar" data-toggle="left-sidebar-close">
             <i class="ion-close-round"></i>
         </div>
     </div>
     <div class="menu-block customscroll">
         <div class="sidebar-menu">
             <ul id="accordion-menu">

                 <li>
                     <a href="{{ route('dashboard') }}"
                         class="dropdown-toggle no-arrow {{ activeNav('dashboard') }}">
                         <span class="micon dw dw-analytics-3"></span><span class="mtext">Dashboard</span>
                     </a>
                 </li>

                 <li>
                     <a href="{{ route('category.index') }}" class="dropdown-toggle no-arrow">
                         <span class="micon dw dw-calendar-11"></span>
                         <span class="mtext">Category</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('service.index') }}" class="dropdown-toggle no-arrow">
                         <span class="micon dw dw-calendar-11"></span>
                         <span class="mtext">Services</span>
                     </a>
                 </li>
























                 {{-- <li class="dropdown">
                     <a href="javascript:;" class="dropdown-toggle">
                         <span class="micon dw dw-user-2"></span>
                         <span class="mtext">User Management</span>
                     </a>
                     <ul class="submenu">
                         <li><a href="{{ route('permission.index') }}"
                                 class="{{ activeNav('permission.index') }}">Permission</a></li>
                         <li><a href="{{ route('role.index') }}" class="{{ activeNav('role.index') }}">Role</a></li>
                         <li><a href="{{ route('user.index') }}" class="{{ activeNav('user.index') }}">User</a></li>
                     </ul>
                 </li> --}}
             </ul>
         </div>
     </div>
 </div>
