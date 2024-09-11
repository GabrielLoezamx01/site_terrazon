@if (isset($sidebarItems) && count($sidebarItems) > 0)
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
@endif