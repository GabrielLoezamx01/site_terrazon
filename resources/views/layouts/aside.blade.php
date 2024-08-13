   <aside class="navbar navbar-vertical navbar-expand-lg">
       <div class="container-fluid">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
               aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <h1 class="navbar-brand navbar-brand-autodark">
               <a href="home">
                   <img src="{{ asset('images/logo-terrazon.png') }}" width="110" height="32" alt="Tabler"
                       class="navbar-brand-image">
               </a>
           </h1>
           <div class="navbar-nav flex-row d-lg-none">
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                       <span class="avatar avatar-sm"
                           style="background-image: url('{{ asset('storage/img/' . Auth::user()->img) }}')"></span>
                       <div class="d-none d-xl-block ps-2">
                           <div> {{ Auth::user()->name }}</div>
                           <div class="mt-1 small text-muted">Admin</div>
                       </div>
                   </a>
                   <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                       <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                           data-bs-toggle="tooltip" data-bs-placement="bottom">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                               <path
                                   d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                           </svg>
                       </a>
                       <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                           data-bs-toggle="tooltip" data-bs-placement="bottom">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                               <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                               <path
                                   d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                           </svg>
                       </a>
                       <a href="Profile" class="dropdown-item">Perfil</a>
                       <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   </div>
               </div>
           </div>
           <div class="collapse navbar-collapse" id="sidebar-menu">
               <ul class="navbar-nav pt-lg-3">
                   @foreach ($sidebarItems as $item)
                       @if ($item->link == 'dropdown')
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                                   data-bs-auto-close="false" role="button" aria-expanded="false">
                                   <span class="nav-link-icon d-md-none d-lg-inline-block">
                                       <img src="{{ asset('svg/' . $item->svg) }}" alt="">
                                   </span>
                                   <span class="nav-link-title">
                                       {{ $item->name }}
                                   </span>
                               </a>
                               @if ($item->children->isNotEmpty())
                                   <div class="dropdown-menu">
                                       @foreach ($item->children as $child)
                                           <div class="dropdown-menu-columns">
                                               <div class="dropdown-menu-column">
                                                   <a class="dropdown-item" href="{{ url('/' . $child->link) }}">
                                                       {{ $child->name }}
                                                   </a>
                                               </div>
                                           </div>
                                       @endforeach
                               @endif
                       @endif
                       @if (is_null($item->parent_id) && $item->link != 'dropdown')
                           <li class="nav-item">
                               @if ($item->link == 'dropdown')
                                   <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                                       data-bs-auto-close="false" role="button" aria-expanded="false">

                                       <a href="{{ url('/' . $item->link) }}" class="nav-link">
                                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                                               <img src="{{ asset('svg/' . $item->svg) }}" alt="">
                                           </span>
                                           <span class="nav-link-title">
                                               {{ $item->name }}
                                           </span>
                                       </a>
                                   @else
                                       <a href="{{ url('/' . $item->link) }}" class="nav-link">
                                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                                               <img src="{{ asset('svg/' . $item->svg) }}" alt="">
                                           </span>
                                           <span class="nav-link-title">
                                               {{ $item->name }}
                                           </span>
                                       </a>
                               @endif
                           </li>
                       @endif
                   @endforeach

               </ul>

           </div>
       </div>
   </aside>
   <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
       <div class="container-xl">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
               aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="navbar-nav flex-row order-md-last">
               <div class="d-none d-md-flex">
                   <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip"
                       data-bs-placement="bottom" aria-label="Enable dark mode"
                       data-bs-original-title="Enable dark mode">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                           stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                           </path>
                       </svg>
                   </a>
                   <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip"
                       data-bs-placement="bottom" aria-label="Enable light mode"
                       data-bs-original-title="Enable light mode">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                           stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                           <path
                               d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7">
                           </path>
                       </svg>
                   </a>
               </div>
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                       <span class="avatar avatar-sm"
                           style="background-image: url('{{ asset('storage/img/' . Auth::user()->img) }}')"></span>
                       <div class="d-none d-xl-block ps-2">
                           <div> {{ Auth::user()->name }}</div>
                           <div class="mt-1 small text-muted">Admin</div>
                       </div>
                   </a>
                   <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                       <a href="Profile" class="dropdown-item">Perfil</a>
                       <div class="dropdown-divider"></div>
                       <a href="{{ route('logout') }}" class="dropdown-item">
                           <a class="dropdown-item"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
                       </a>
                   </div>
               </div>
           </div>
           <div class="collapse navbar-collapse" id="navbar-menu">
           </div>
       </div>
   </header>
