<div class="nav-grid">
    <div class="nav-left">
        <h1>Purchase Request {{ $title }}</h1>
        <i id="nav-menu" class='bx bx-menu'></i>
        <x-flash-message />
    </div>
    <div class="nav-right" id="show-nav-details">
        <img src="{{ asset('wms/img/img/default.png')}}" alt="">
        <div id="nav-text">
            <p id="UserNameFullName">{{ auth()->user()->name }}</p>
            <hr>
            <span>asdadasdd</span>
        </div>
        <i class='bx bx-chevron-down'></i>
    </div>
    <ul class="nav-settings">
        <li><a href="#" onclick="return false" data-bs-toggle="modal" data-bs-target="#WMS_ChangePassword"><i class='bx bx-lock-open-alt' ></i> Change Password</a></li>
        <hr>
        <li>
            <a class="dropdown-item" href="/logout"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"> <i class='bx bx-door-open' ></i>
             {{ __('Logout') }}
     
         <form id="logout-form" action="/logout" method="POST" style="display: none;">
             @csrf
         </form>
            </a>
        </li>
    </ul>
</div>