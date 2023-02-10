<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @if (request()->url() == url('/')) 'active' @endif" aria-current="page" href="{{url('/')}}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  @if ((request()->url() == route('mangers.list'))) 'active' @endif" href="{{ route('mangers.list')}}">
              <span data-feather="users" class="align-text-bottom"></span>
              Mangers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (request()->url() == route('departments.list')) 'active' @endif" href="{{ route('departments.list')}}">
              <span data-feather="file" class="align-text-bottom"></span>
              Department
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Tasks
            </a>
          </li>

        </ul>
      </div>
    </nav>
