<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a href="index.html">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">Poem Related</li>
            <li class="{{ (request()->segment(2) == 'category') ? 'mm-active' : '' }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-network"></i>
                    Category
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.category.manage') }}" class="{{ (request()->segment(2) == 'category') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon"></i>
                            Manage
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->segment(2) == 'poem') ? 'mm-active' : '' }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-news-paper"></i>
                    Poems
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.category.manage') }}" class="{{ (request()->segment(2) == 'poem') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon"></i>
                            Create
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="{{ route('admin.category.manage') }}" class="{{ (request()->segment(2) == 'poem') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon"></i>
                            Lists
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
