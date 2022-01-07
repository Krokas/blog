<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
          @foreach (config('admin.sidebar.menu') as $menuItem)
          <li class="nav-item">
            <a class="nav-link @if(Route::current()->getName() === $menuItem['link']) active @endif" aria-current="page" href="@if($menuItem['link'] !== '#') {{route($menuItem['link'])}} @else {{ $menuItem['link']}} @endif">
              <i data-feather="{{ $menuItem['icon'] }}"></i>
              @lang($menuItem['title'])
            </a>
          </li>
          @endforeach
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>@lang('admin.sidebar.personal')</span>
      </h6>
      <ul class="nav flex-column mb-2">
        @foreach (config('admin.sidebar.personal') as $menuItem)
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="@if($menuItem['link'] !== '#') {{route($menuItem['link'])}} @else {{ $menuItem['link']}} @endif">
              <i data-feather="{{ $menuItem['icon'] }}"></i>
              @lang($menuItem['title'])
            </a>
          </li>
          @endforeach
      </ul>
    </div>
  </nav>
