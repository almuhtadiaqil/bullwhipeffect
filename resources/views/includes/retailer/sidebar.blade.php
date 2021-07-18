<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ Storage::url('public/user/' . Auth::user()->foto) }}" width="48" height="48"
                    alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->role }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        {{-- <li><button data-toggle="modal" data-target="edit_photo" class="btn btn-primary"><i
                                    class="material-icons">person</i>Profile</button></li> --}}
                        {{-- <li role="separator" class="divider"></li> --}}
                        {{-- <li role="separator" class="divider"></li> --}}
                        <li><a href="{{ url('logout') }}"><i class="material-icons">input</i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN MENU</li>
                <li>
                    <a href="{{ url('/') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('product') }}">
                        <i class="material-icons">list</i>
                        <span>Manage Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('order') }}">
                        <i class="material-icons">important_devices</i>
                        <span>Order Product</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        @include('includes.footer')

    </aside>
    <!-- #END# Left Sidebar -->

</section>
