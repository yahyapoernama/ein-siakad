<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">{{ config('app.name') }}</span>
        </a>

        <ul class="sidebar-nav">
            @php
                $menuGroups = \App\Models\MenuGroup::all();
            @endphp
            @foreach ($menuGroups as $menuGroup)
                <li class="sidebar-header">
                    {!! $menuGroup->name !!}
                </li>

                @foreach ($menuGroup->items as $menuItem)
                    <li class="sidebar-item {{ routeActive($menuItem->route) }}">
                        <a class="sidebar-link" href="{{ route($menuItem->route) }}">
                            <i class="{!! $menuItem->icon !!}"></i> <span class="align-middle">{{ $menuItem->name }}</span>
                        </a>
                    </li>
                @endforeach
            @endforeach
            
            {{-- <li class="sidebar-header">
                Main
            </li>

            <li class="sidebar-item {{ routeActive('admin.dashboard') }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>