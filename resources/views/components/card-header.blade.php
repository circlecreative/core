<div class="card-inner position-relative card-tools-toggle py-0">
    <div class="card-title-group">
        <div class="card-tools">
            <ul class="nav nav-tabs border-bottom-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($route, ['status' => 'PUBLISHED']) }}">Published</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->get('status') == 'UNPUBLISHED' ? 'active' : null }}" href="{{ route($route, ['status' => 'UNPUBLISHED']) }}">Unpublished</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->get('status') == 'DRAFT' ? 'active' : null }}" href="{{ route($route, ['status' => 'DRAFT']) }}">Drafts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->get('status') == 'ARCHIVE' ? 'active' : null }}" href="{{ route($route, ['status' => 'ARCHIVE']) }}">Archives</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->get('status') == 'DELETED' ? 'active' : null }}" href="{{ route($route, ['status' => 'DELETED']) }}">Trash</a>
                </li>
            </ul>
        </div>
        <div class="card-tools mr-n1">
            <ul class="btn-toolbar gx-1">
                <li>
                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search">
                        <em class="icon ni ni-search"></em>
                    </a>
                </li>
                <li class="btn-toolbar-sep">
                <li>
                    <div class="toggle-wrap">
                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools">
                            <em class="icon ni ni-menu-right"></em>
                        </a>
                        <div class="toggle-content" data-content="cardTools">
                            <ul class="btn-toolbar gx-1">
                                <li class="toggle-close">
                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools">
                                        <em class="icon ni ni-arrow-left"></em>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                            <em class="icon ni ni-setting"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                            <ul class="link-check">
                                                <li><span>Show</span></li>
                                                <li class="active"><a href="{{ route($route, ['limit' => 10]) }}">10</a></li>
                                                <li><a href="{{ route($route, ['limit' => 20]) }}">20</a></li>
                                                <li><a href="{{ route($route, ['limit' => 50]) }}">50</a></li>
                                                <li><a href="{{ route($route, ['limit' => 100]) }}">100</a></li>
                                            </ul>
                                            <ul class="link-check">
                                                <li><span>Order</span></li>
                                                <li class="active"><a href="{{ route($route, ['sort' => 'DESC']) }}">Descending</a></li>
                                                <li><a href="{{ route($route, ['sort' => 'ASC']) }}">Ascending</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-search search-wrap" data-search="search">
        <div class="card-body">
            <div class="search-content">
                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                    <em class="icon ni ni-arrow-left"></em>
                </a>
                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search">
                <button class="search-submit btn btn-icon">
                    <em class="icon ni ni-search"></em>
                </button>
            </div>
        </div>
    </div>
</div>
