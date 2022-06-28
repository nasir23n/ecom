<div class="aside" id="aside">
    <!-- .aside_top is fixed to top of the sidebar -->
    <a href="{{ route('admin.dashboard') }}" class="aside_top"> ADMIN PANEL </a>

    <div class="aside_fixed_part">
        <div class="aside_profile mb-2" style="border-bottom: 1px solid var(--l_gr_active);">
            <div class="profile_image">
                <img src="{{ asset('backend/image/logo.jpg') }}" alt="U" style="width: 40px;height:40px;" />
            </div>
            <div class="info">
                <p class="name">{{ auth()->user()->name }}</p>
                {{-- <p>{{ auth()->user()->email }}</p> --}}
            </div>
        </div>
        <ul class="aside_links">
            <li>
                <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="aside_icon fa fa-tachometer-alt"></i>
                    Deshboard
                </a>
            </li>
            
        </ul>
    </div>
</div>