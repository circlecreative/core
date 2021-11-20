@extends('layouts.app')
@section('content')
    <div class="nk-fmg">
        <div class="nk-fmg-aside toggle-screen-lg" data-content="files-aside" data-toggle-overlay="true"
            data-toggle-body="true" data-toggle-screen="lg" data-simplebar="init">
            {{-- sidebar file container @s --}}
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <div class="nk-fmg-aside-wrap">
                                    <div class="nk-fmg-aside-top" data-simplebar="init">
                                        <div class="simplebar-wrapper" style="margin: 0px;">
                                            <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                            </div>
                                            <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                    <div class="simplebar-content-wrapper"
                                                        style="height: auto; overflow: hidden;">
                                                        {{-- sidebar files menu @s --}}
                                                        <div class="simplebar-content" style="padding: 0px;">
                                                            <ul class="nk-fmg-menu">
                                                                <li class="active">
                                                                    <a class="nk-fmg-menu-item" href="#">
                                                                        <em class="icon ni ni-home-alt"></em>
                                                                        <span class="nk-fmg-menu-text">Home</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="nk-fmg-menu-item" href="#">
                                                                        <em class="icon ni ni-file-docs"></em>
                                                                        <span class="nk-fmg-menu-text">Files</span>
                                                                    </a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" class="nk-fmg-menu-item">
                                                                                <span class="nk-fmg-menu-text">New
                                                                                    Files</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="nk-fmg-menu-item">
                                                                                <span class="nk-fmg-menu-text">This
                                                                                    Months</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="nk-fmg-menu-item">
                                                                                <span class="nk-fmg-menu-text">Older
                                                                                    Files</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a class="nk-fmg-menu-item" href="#">
                                                                        <em class="icon ni ni-star"></em>
                                                                        <span class="nk-fmg-menu-text">Starred</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="nk-fmg-menu-item" href="#">
                                                                        <em class="icon ni ni-share-alt"></em>
                                                                        <span class="nk-fmg-menu-text">Shared</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="nk-fmg-menu-item" href="#">
                                                                        <em class="icon ni ni-trash-alt"></em>
                                                                        <span class="nk-fmg-menu-text">Recovery</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="nk-fmg-menu-item" href="#">
                                                                        <em class="icon ni ni-setting-alt"></em>
                                                                        <span class="nk-fmg-menu-text">Settings</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        {{-- sidebar files menu @e --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="simplebar-placeholder" style="width: auto; height: 374px;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                        </div>
                                    </div>
                                    <div class="nk-fmg-aside-bottom">
                                        {{-- sidebar storage files @s --}}
                                        <div class="nk-fmg-status">
                                            <h6 class="nk-fmg-status-title">
                                                <em class="icon ni ni-hard-drive"></em>
                                                <span>Storage</span>
                                            </h6>
                                            <div class="progress progress-md bg-light">
                                                <div class="progress-bar" data-progress="5" style="width: 5%;"></div>
                                            </div>
                                            <div class="nk-fmg-status-info">12.47 GB of 50 GB used</div>
                                            <div class="nk-fmg-status-action">
                                                <a href="#" class="link link-primary link-sm">Upgrade Storage</a>
                                            </div>
                                        </div>
                                        {{-- sidebar storage files @s --}}
                                        {{-- sidebar plan switch @s --}}
                                        <div class="nk-fmg-switch">
                                            <div class="dropup">
                                                <a href="#" data-toggle="dropdown" data-offset="-10, 12"
                                                    class="dropdown-toggle dropdown-indicator-unfold">
                                                    <div class="lead-text">Personal</div>
                                                    <div class="sub-text">Only you</div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#"><span>Team Plan</span></a>
                                                        </li>
                                                        <li>
                                                            <a class="active" href="#"><span>Personal</span></a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a class="link" href="#"><span>Upgrade Plan</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- sidebar plan switch @e --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 1265px;"></div>
            </div>
            {{-- sidebar file container @e --}}
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
            </div>
        </div>
        <div class="nk-fmg-body">
            {{-- topbar files @s --}}
            <div class="nk-fmg-body-head d-none d-lg-flex">
                <div class="nk-fmg-search">
                    <em class="icon ni ni-search"></em>
                    <input type="text" class="form-control border-transparent form-focus-none"
                        placeholder="Search files, folders">
                </div>
                <div class="nk-fmg-actions">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <div class="dropdown">
                                <a href="#" class="btn btn-light" data-toggle="dropdown">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Create</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a href="#file-upload" data-toggle="modal">
                                                <em class="icon ni ni-upload-cloud"></em>
                                                <span>Upload File</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-file-plus"></em>
                                                <span>Create File</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-folder-plus"></em>
                                                <span>Create Folder</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#file-upload" class="btn btn-primary" data-toggle="modal">
                                <em class="icon ni ni-upload-cloud"></em>
                                <span>Upload</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- topbar files @e --}}
            <div class="nk-fmg-body-content">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between position-relative">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Files</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-1">
                                <li class="d-lg-none">
                                    <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search"
                                        data-target="search">
                                        <em class="icon ni ni-search"></em>
                                    </a>
                                </li>
                                {{-- dropdown create file button @s --}}
                                <li class="d-lg-none">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="dropdown">
                                            <em class="icon ni ni-plus"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="#file-upload" data-toggle="modal">
                                                        <em class="icon ni ni-upload-cloud"></em>
                                                        <span>Upload File</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <em class="icon ni ni-file-plus"></em>
                                                        <span>Create File</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <em class="icon ni ni-folder-plus"></em>
                                                        <span>Create Folder</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                {{-- dropdown create file button @e --}}
                                <li class="d-lg-none mr-n1">
                                    <a href="#" class="btn btn-trigger btn-icon toggle" data-target="files-aside">
                                        <em class="icon ni ni-menu-alt-r"></em>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="search-wrap px-2 d-lg-none" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                    <em class="icon ni ni-arrow-left"></em>
                                </a>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Search by user or message">
                                <button class="search-submit btn btn-icon">
                                    <em class="icon ni ni-search"></em>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- file quic-access @s --}}
                <div class="nk-fmg-quick-list nk-block">
                    <div class="nk-block-head-xs">
                        <div class="nk-block-between g-2">
                            <div class="nk-block-head-content">
                                <h6 class="nk-block-title title">Quick Access</h6>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="#" class="link link-primary toggle-opt active" data-target="quick-access">
                                    <div class="inactive-text">Show</div>
                                    <div class="active-text">Hide</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="toggle-expand-content expanded" data-content="quick-access">
                        <div class="nk-files nk-files-view-grid">
                            <div class="nk-files-list">
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                        <a href="#" class="nk-file-link">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <g>
                                                                <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                    style="fill:#f29611"></rect>
                                                                <path
                                                                    d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                    style="fill:#ffb32c"></path>
                                                                <path
                                                                    d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                    style="fill:#f2a222"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <span class="title">UI Design</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-file-actions hideable">
                                        <a href="#" class="btn btn-sm btn-icon btn-trigger">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                        <a href="#" class="nk-file-link">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <g>
                                                                <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                    style="fill:#f29611"></rect>
                                                                <path
                                                                    d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                    style="fill:#ffb32c"></path>
                                                                <path
                                                                    d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                    style="fill:#f2a222"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <span class="title">DashLite Resource</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-file-actions hideable">
                                        <a href="#" class="btn btn-sm btn-icon btn-trigger">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                        <a href="#" class="nk-file-link">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <g>
                                                                <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                    style="fill:#f29611"></rect>
                                                                <path
                                                                    d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                    style="fill:#ffb32c"></path>
                                                                <path
                                                                    d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                    style="fill:#f2a222"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <span class="title">Projects</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-file-actions hideable">
                                        <a href="#" class="btn btn-sm btn-icon btn-trigger">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                        <a href="#" class="nk-file-link">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <g>
                                                                <rect x="18" y="16" width="36" height="40" rx="5" ry="5"
                                                                    style="fill:#e3edfc"></rect>
                                                                <path
                                                                    d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z"
                                                                    style="fill:#c4dbf2"></path>
                                                                <rect x="32" y="20" width="8" height="2" rx="1" ry="1"
                                                                    style="fill:#7e95c4"></rect>
                                                                <rect x="32" y="25" width="8" height="2" rx="1" ry="1"
                                                                    style="fill:#7e95c4"></rect>
                                                                <rect x="32" y="30" width="8" height="2" rx="1" ry="1"
                                                                    style="fill:#7e95c4"></rect>
                                                                <rect x="32" y="35" width="8" height="2" rx="1" ry="1"
                                                                    style="fill:#7e95c4"></rect>
                                                                <path
                                                                    d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z"
                                                                    style="fill:#7e95c4"></path>
                                                                <path
                                                                    d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z"
                                                                    style="fill:#7e95c4"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <span class="title">All work.zip</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-file-actions hideable">
                                        <a href="#" class="btn btn-sm btn-icon btn-trigger">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                        <a href="#" class="nk-file-link">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <path
                                                                d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z"
                                                                style="fill:#e3edfc"></path>
                                                            <path
                                                                d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z"
                                                                style="fill:#b7d0ea"></path>
                                                            <path
                                                                d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z"
                                                                style="fill:#c4dbf2"></path>
                                                            <path
                                                                d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z"
                                                                style="fill:#36c684"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <span class="title">Sales Reports.xlsx</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-file-actions hideable">
                                        <a href="#" class="btn btn-sm btn-icon btn-trigger">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- file quic-access @e --}}
                {{-- browse file @s --}}
                <div class="nk-fmg-listing nk-block-lg">
                    <div class="nk-block-head-xs">
                        <div class="nk-block-between g-2">
                            <div class="nk-block-head-content">
                                <h6 class="nk-block-title title">Browse Files</h6>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="nk-block-tools g-3 nav">
                                    <li>
                                        <a data-toggle="tab" href="#file-grid-view" class="nk-switch-icon active">
                                            <em class="icon ni ni-view-grid3-wd"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#file-group-view" class="nk-switch-icon">
                                            <em class="icon ni ni-view-group-wd"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#file-list-view" class="nk-switch-icon">
                                            <em class="icon ni ni-view-row-wd"></em>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        {{-- browse file grid-view @s --}}
                        <div class="tab-pane active" id="file-grid-view">
                            <div class="nk-files nk-files-view-grid">
                                <div class="nk-files-head">
                                    <div class="nk-file-item">
                                        <div class="nk-file-info">
                                            <div class="dropdown">
                                                <div class="tb-head dropdown-toggle dropdown-indicator-caret"
                                                    data-toggle="dropdown">Last Opened</div>
                                                <div class="dropdown-menu dropdown-menu-xs">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a class="active" href="#"><span>Last Opened</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>Name</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>Size</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-files-list">
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <a class="nk-file-icon-link" href="#">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                    <path
                                                                        d="M42.2227,40H41.5V37.4443a5.5,5.5,0,0,0-11,0V40h-.7227A2.8013,2.8013,0,0,0,27,42.8184v6.3633A2.8013,2.8013,0,0,0,29.7773,52H42.2227A2.8013,2.8013,0,0,0,45,49.1816V42.8184A2.8013,2.8013,0,0,0,42.2227,40ZM36,48a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,36,48Zm3.5-8h-7V37.4443a3.5,3.5,0,0,1,7,0Z"
                                                                        style="fill:#c67424"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">UI Design</a>
                                                        <div class="asterisk">
                                                            <a href="#">
                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-file-desc">
                                                <li class="date">Today</li>
                                                <li class="size">4.5 MB</li>
                                                <li class="members">3 Members</li>
                                            </ul>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li>
                                                            <a href="#file-details" data-toggle="modal">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-pen"></em>
                                                                <span>Rename</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <a class="nk-file-icon-link" href="#"><span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">Proposal</a>
                                                        <div class="asterisk">
                                                            <a href="#" class="active">
                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-file-desc">
                                                <li class="date">Today</li>
                                                <li class="size">4.5 MB</li>
                                                <li class="members">3 Members</li>
                                            </ul>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li>
                                                            <a href="#file-details" data-toggle="modal">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-pen"></em>
                                                                <span>Rename</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <a class="nk-file-icon-link" href="#">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                    <path
                                                                        d="M29.6309,37.36a3.0236,3.0236,0,0,1-.86-2.39A4.3748,4.3748,0,0,1,32.9961,31h.0078a4.36,4.36,0,0,1,4.22,3.9121,3.0532,3.0532,0,0,1-.8545,2.4482A4.4158,4.4158,0,0,1,33.23,38.53c-.0771,0-.1533-.002-.23-.0049A4.519,4.519,0,0,1,29.6309,37.36ZM43.4668,40.1a1,1,0,1,0-.9336,1.77c.7207.38,1.4658,2.126,1.4668,4.39v1.7256a1,1,0,0,0,2,0V46.26C45.999,43.33,45.0049,40.9119,43.4668,40.1ZM40.165,37.3816c-.1445.084-.29.168-.4316.2549a1,1,0,0,0,.5215,1.8535.9887.9887,0,0,0,.52-.1465c.1289-.0781.2607-.1543.3916-.23a4.2311,4.2311,0,0,0,2.1465-2.124.9839.9839,0,0,0,.0313-.1045A3.8411,3.8411,0,0,0,40.5,32.52a1,1,0,1,0-.4922,1.9395,1.8773,1.8773,0,0,1,1.4,1.9092A2.835,2.835,0,0,1,40.165,37.3816ZM36.5,41h-7c-2.5234,0-4.5,2.7822-4.5,6.333V48.5a.8355.8355,0,0,0,.0588.2914.9731.9731,0,0,0,.3508.4946C26.4646,50.2812,29.4614,51,33,51s6.5353-.7187,7.59-1.7139a.9726.9726,0,0,0,.3509-.4949A.8361.8361,0,0,0,41,48.5V47.333C41,43.7822,39.0234,41,36.5,41Z"
                                                                        style="fill:#c67424"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">Projects</a>
                                                        <div class="asterisk">
                                                            <a href="#">
                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-file-desc">
                                                <li class="date">Yesterday</li>
                                                <li class="size">35 MB</li>
                                                <li class="members">3 Members</li>
                                            </ul>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li>
                                                            <a href="#file-details" data-toggle="modal">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-pen"></em>
                                                                <span>Rename</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon">
                                                    <a class="nk-file-icon-link" href="#">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">2019 Projects</a>
                                                        <div class="asterisk">
                                                            <a href="#">
                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-file-desc">
                                                <li class="date">03 May</li>
                                                <li class="size">1.2 GB</li>
                                                <li class="members">3 Members</li>
                                            </ul>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h">
                                                    </em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li>
                                                            <a href="#file-details" data-toggle="modal">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-pen"></em>
                                                                <span>Rename</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($medias as $media)
                                        <div class="nk-file-item nk-file">
                                            <div class="nk-file-info">
                                                <div class="nk-file-title">
                                                    <div class="nk-file-icon">
                                                        <a class="nk-file-icon-link" href="#">
                                                            <span class="nk-file-icon-type">
                                                                <img src="{{ asset($media->getSVG()) }}" alt="svg_icon">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="nk-file-name">
                                                        <div class="nk-file-name-text">
                                                            <a href="#"
                                                                class="title">{{ $media->name ?? null }}{{'.'.pathinfo($media->file_name, PATHINFO_EXTENSION) ?? null }}</a>
                                                            <div class="asterisk">
                                                                <a href="#">
                                                                    <em class="asterisk-off icon ni ni-star"></em>
                                                                    <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-file-desc">
                                                    <li class="date">{{ $media->updated_at->format('d M') }}
                                                    </li>
                                                    <li class="size">{{ $media->size }} B</li>
                                                    <li class="members">3 Members</li>
                                                </ul>
                                            </div>
                                            <div class="nk-file-actions">
                                                <div class="dropdown">
                                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-plain no-bdr">
                                                            <li>
                                                                <a href="#file-details" data-toggle="modal" class="file-show"
                                                                data-file-id="{{ $media->id ?? null }}">
                                                                    <em class="icon ni ni-eye"></em>
                                                                    <span>Details</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-share" data-toggle="modal">
                                                                    <em class="icon ni ni-share"></em>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-copy" data-toggle="modal">
                                                                    <em class="icon ni ni-copy"></em>
                                                                    <span>Copy</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-move" data-toggle="modal">
                                                                    <em class="icon ni ni-forward-arrow"></em>
                                                                    <span>Move</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="file-dl-toast">
                                                                    <em class="icon ni ni-download"></em>
                                                                    <span>Download</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-rename" data-toggle="modal" class="file-rename"
                                                                data-file-id="{{ $media->id ?? null }}">
                                                                    <em class="icon ni ni-pen"></em>
                                                                    <span>Rename</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;" class="file-del"
                                                                    data-file-id="{{ $media->id ?? null }}">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- browse file grid-view @e --}}
                        {{-- browse file group-view @s --}}
                        <div class="tab-pane" id="file-group-view">
                            <div class="nk-files nk-files-view-group">
                                <div class="nk-files-head">
                                    <div class="nk-file-item">
                                        <div class="nk-file-info">
                                            <div class="dropdown">
                                                <div class="tb-head dropdown-toggle dropdown-indicator-caret"
                                                    data-toggle="dropdown">Last Opened</div>
                                                <div class="dropdown-menu dropdown-menu-xs">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a class="active" href="#">
                                                                <span>Last Opened</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span>Name</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span>Size</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-files-group">
                                    <h6 class="title">Folder</h6>
                                    <div class="nk-files-list">
                                        <div class="nk-file-item nk-file">
                                            <div class="nk-file-info">
                                                <div class="nk-file-title">
                                                    <div class="nk-file-icon">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="nk-file-name">
                                                        <div class="nk-file-name-text">
                                                            <a href="#" class="title">UI Design</a>
                                                            <div class="asterisk">
                                                                <a href="#">
                                                                    <em class="asterisk-off icon ni ni-star"></em>
                                                                    <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-file-desc">
                                                    <li class="date">Today</li>
                                                    <li class="size">4.5 MB</li>
                                                    <li class="members">3 Members</li>
                                                </ul>
                                            </div>
                                            <div class="nk-file-actions">
                                                <div class="dropdown">
                                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-plain no-bdr">
                                                            <li>
                                                                <a href="#file-details" data-toggle="modal">
                                                                    <em class="icon ni ni-eye"></em>
                                                                    <span>Details</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-share" data-toggle="modal">
                                                                    <em class="icon ni ni-share"></em>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-copy" data-toggle="modal">
                                                                    <em class="icon ni ni-copy"></em>
                                                                    <span>Copy</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-move" data-toggle="modal">
                                                                    <em class="icon ni ni-forward-arrow"></em>
                                                                    <span>Move</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="file-dl-toast">
                                                                    <em class="icon ni ni-download"></em>
                                                                    <span>Download</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-pen"></em>
                                                                    <span>Rename</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-item nk-file">
                                            <div class="nk-file-info">
                                                <div class="nk-file-title">
                                                    <div class="nk-file-icon">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="nk-file-name">
                                                        <div class="nk-file-name-text">
                                                            <a href="#" class="title">Proposal</a>
                                                            <div class="asterisk">
                                                                <a href="#" class="active">
                                                                    <em class="asterisk-off icon ni ni-star"></em>
                                                                    <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-file-desc">
                                                    <li class="date">Today</li>
                                                    <li class="size">4.5 MB</li>
                                                    <li class="members">3 Members</li>
                                                </ul>
                                            </div>
                                            <div class="nk-file-actions">
                                                <div class="dropdown">
                                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-plain no-bdr">
                                                            <li>
                                                                <a href="#file-details" data-toggle="modal">
                                                                    <em class="icon ni ni-eye"></em>
                                                                    <span>Details</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-share" data-toggle="modal">
                                                                    <em class="icon ni ni-share"></em>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-copy" data-toggle="modal">
                                                                    <em class="icon ni ni-copy"></em>
                                                                    <span>Copy</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-move" data-toggle="modal">
                                                                    <em class="icon ni ni-forward-arrow"></em>
                                                                    <span>Move</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="file-dl-toast">
                                                                    <em class="icon ni ni-download"></em>
                                                                    <span>Download</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-pen"></em>
                                                                    <span>Rename</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-item nk-file">
                                            <div class="nk-file-info">
                                                <div class="nk-file-title">
                                                    <div class="nk-file-icon">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                    <path
                                                                        d="M29.6309,37.36a3.0236,3.0236,0,0,1-.86-2.39A4.3748,4.3748,0,0,1,32.9961,31h.0078a4.36,4.36,0,0,1,4.22,3.9121,3.0532,3.0532,0,0,1-.8545,2.4482A4.4158,4.4158,0,0,1,33.23,38.53c-.0771,0-.1533-.002-.23-.0049A4.519,4.519,0,0,1,29.6309,37.36ZM43.4668,40.1a1,1,0,1,0-.9336,1.77c.7207.38,1.4658,2.126,1.4668,4.39v1.7256a1,1,0,0,0,2,0V46.26C45.999,43.33,45.0049,40.9119,43.4668,40.1ZM40.165,37.3816c-.1445.084-.29.168-.4316.2549a1,1,0,0,0,.5215,1.8535.9887.9887,0,0,0,.52-.1465c.1289-.0781.2607-.1543.3916-.23a4.2311,4.2311,0,0,0,2.1465-2.124.9839.9839,0,0,0,.0313-.1045A3.8411,3.8411,0,0,0,40.5,32.52a1,1,0,1,0-.4922,1.9395,1.8773,1.8773,0,0,1,1.4,1.9092A2.835,2.835,0,0,1,40.165,37.3816ZM36.5,41h-7c-2.5234,0-4.5,2.7822-4.5,6.333V48.5a.8355.8355,0,0,0,.0588.2914.9731.9731,0,0,0,.3508.4946C26.4646,50.2812,29.4614,51,33,51s6.5353-.7187,7.59-1.7139a.9726.9726,0,0,0,.3509-.4949A.8361.8361,0,0,0,41,48.5V47.333C41,43.7822,39.0234,41,36.5,41Z"
                                                                        style="fill:#c67424"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="nk-file-name">
                                                        <div class="nk-file-name-text">
                                                            <a href="#" class="title">Projects</a>
                                                            <div class="asterisk">
                                                                <a href="#">
                                                                    <em class="asterisk-off icon ni ni-star"></em>
                                                                    <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-file-desc">
                                                    <li class="date">Today</li>
                                                    <li class="size">235 KB</li>
                                                    <li class="members">3 Members</li>
                                                </ul>
                                            </div>
                                            <div class="nk-file-actions">
                                                <div class="dropdown">
                                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-plain no-bdr">
                                                            <li>
                                                                <a href="#file-details" data-toggle="modal">
                                                                    <em class="icon ni ni-eye"></em>
                                                                    <span>Details</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-share" data-toggle="modal">
                                                                    <em class="icon ni ni-share"></em>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-copy" data-toggle="modal">
                                                                    <em class="icon ni ni-copy"></em>
                                                                    <span>Copy</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-move" data-toggle="modal">
                                                                    <em class="icon ni ni-forward-arrow"></em>
                                                                    <span>Move</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="file-dl-toast">
                                                                    <em class="icon ni ni-download"></em>
                                                                    <span>Download</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-pen"></em>
                                                                    <span>Rename</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-item nk-file">
                                            <div class="nk-file-info">
                                                <div class="nk-file-title">
                                                    <div class="nk-file-icon">
                                                        <span class="nk-file-icon-type">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                <g>
                                                                    <rect x="32" y="16" width="28" height="15" rx="2.5"
                                                                        ry="2.5" style="fill:#f29611"></rect>
                                                                    <path
                                                                        d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                        style="fill:#ffb32c"></path>
                                                                    <path
                                                                        d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                        style="fill:#f2a222"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="nk-file-name">
                                                        <div class="nk-file-name-text">
                                                            <a href="#" class="title">2019 Projects</a>
                                                            <div class="asterisk">
                                                                <a href="#">
                                                                    <em class="asterisk-off icon ni ni-star"></em>
                                                                    <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-file-desc">
                                                    <li class="date">03 May</li>
                                                    <li class="size">235 KB</li>
                                                    <li class="members">3 Members</li>
                                                </ul>
                                            </div>
                                            <div class="nk-file-actions">
                                                <div class="dropdown">
                                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-plain no-bdr">
                                                            <li>
                                                                <a href="#file-details" data-toggle="modal">
                                                                    <em class="icon ni ni-eye"></em>
                                                                    <span>Details</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-share" data-toggle="modal">
                                                                    <em class="icon ni ni-share"></em>
                                                                    <span>Share</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-copy" data-toggle="modal">
                                                                    <em class="icon ni ni-copy"></em>
                                                                    <span>Copy</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#file-move" data-toggle="modal">
                                                                    <em class="icon ni ni-forward-arrow"></em>
                                                                    <span>Move</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="file-dl-toast">
                                                                    <em class="icon ni ni-download"></em>
                                                                    <span>Download</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-pen"></em>
                                                                    <span>Rename</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-files-group">
                                    <h6 class="title">Files</h6>
                                    <div class="nk-files-list">
                                        @foreach ($medias as $media)
                                            <div class="nk-file-item nk-file">
                                                <div class="nk-file-info">
                                                    <div class="nk-file-title">
                                                        <div class="nk-file-icon">
                                                            <span class="nk-file-icon-type">
                                                                <img src="{{ asset($media->getSVG()) }}" alt="svg_icon">
                                                            </span>
                                                        </div>
                                                        <div class="nk-file-name">
                                                            <div class="nk-file-name-text">
                                                                <a href="#"
                                                                    class="title">{{ $media->name ?? null }}{{'.'.pathinfo($media->file_name, PATHINFO_EXTENSION) ?? null }}</a>
                                                                <div class="asterisk">
                                                                    <a href="#">
                                                                        <em class="asterisk-off icon ni ni-star"></em>
                                                                        <em class="asterisk-on icon ni ni-star-fill"></em>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nk-file-desc">
                                                        <li class="date">{{ $media->updated_at->format('d M') }}
                                                        </li>
                                                        <li class="size">{{ $media->size }} B</li>
                                                        <li class="members">3 Members</li>
                                                    </ul>
                                                </div>
                                                <div class="nk-file-actions">
                                                    <div class="dropdown">
                                                        <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-plain no-bdr">
                                                                <li>
                                                                    <a href="#file-details" data-toggle="modal" class="file-show"
                                                                    data-file-id="{{ $media->id ?? null }}">
                                                                        <em class="icon ni ni-eye"></em>
                                                                        <span>Details</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#file-share" data-toggle="modal">
                                                                        <em class="icon ni ni-share"></em>
                                                                        <span>Share</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#file-copy" data-toggle="modal">
                                                                        <em class="icon ni ni-copy"></em>
                                                                        <span>Copy</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#file-move" data-toggle="modal">
                                                                        <em class="icon ni ni-forward-arrow"></em>
                                                                        <span>Move</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="file-dl-toast">
                                                                        <em class="icon ni ni-download"></em>
                                                                        <span>Download</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#file-rename" data-toggle="modal" class="file-rename"
                                                                    data-file-id="{{ $media->id ?? null }}">
                                                                        <em class="icon ni ni-pen"></em>
                                                                        <span>Rename</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;" class="file-del"
                                                                        data-file-id="{{ $media->id ?? null }}">
                                                                        <em class="icon ni ni-trash"></em>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- browse file group-view @e --}}
                        {{-- browse file list-view @s --}}
                        <div class="tab-pane" id="file-list-view">
                            <div class="nk-files nk-files-view-list">
                                <div class="nk-files-head">
                                    <div class="nk-file-item">
                                        <div class="nk-file-info">
                                            <div class="tb-head dropdown-toggle dropdown-indicator-caret"
                                                data-toggle="dropdown">Name</div>
                                            <div class="dropdown-menu dropdown-menu-xs">
                                                <ul class="link-list-opt no-bdr">
                                                    <li class="opt-head">
                                                        <span>ORDER BY</span>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span>Descending</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span>Ascending</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tb-head"></div>
                                        </div>
                                        <div class="nk-file-meta">
                                            <div class="dropdown">
                                                <div class="tb-head dropdown-toggle dropdown-indicator-down"
                                                    data-toggle="dropdown">Last Opened</div>
                                                <div class="dropdown-menu dropdown-menu-xs">
                                                    <ul class="link-list-opt ui-colored no-bdr">
                                                        <li class="opt-head">
                                                            <span>ORDER BY</span>
                                                        </li>
                                                        <li>
                                                            <a class="active" href="#"><span>Descending</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>Ascending</span></a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li class="opt-head">
                                                            <span>SHOW</span>
                                                        </li>
                                                        <li>
                                                            <a class="active" href="#"><span>Last Opened</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>Name</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span>Size</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-members">
                                            <div class="tb-head">Members</div>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-files-list">
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="file-check-n1">
                                                    <label class="custom-control-label" for="file-check-n1"></label>
                                                </div>
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <g>
                                                                <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                    style="fill:#f29611"></rect>
                                                                <path
                                                                    d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                    style="fill:#ffb32c"></path>
                                                                <path
                                                                    d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                    style="fill:#f2a222"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">UI/UX Design</a>
                                                        <div class="nk-file-star asterisk">
                                                            <a href="#">
                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-meta">
                                            <div class="tb-lead">Today, 08:29 AM</div>
                                        </div>
                                        <div class="nk-file-members">
                                            <div class="tb-lead">Only Me</div>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li>
                                                            <a href="#file-details" data-toggle="modal">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-pen"></em>
                                                                <span>Rename</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="file-check-n2">
                                                    <label class="custom-control-label" for="file-check-n2"></label>
                                                </div>
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <g>
                                                                <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                    style="fill:#f29611"></rect>
                                                                <path
                                                                    d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                    style="fill:#ffb32c"></path>
                                                                <path
                                                                    d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z"
                                                                    style="fill:#f2a222"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">UI Design</a>
                                                        <div class="nk-file-star asterisk">
                                                            <a href="#" class="active">
                                                                <em class="asterisk-off icon ni ni-star"></em>
                                                                <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-meta">
                                            <div class="tb-lead">Today, 11:19 AM</div>
                                        </div>
                                        <div class="nk-file-members">
                                            <div class="tb-lead">Only Me</div>
                                            <div class="tb-shared">
                                                <em class="ni ni-link" data-toggle="tooltip" data-placement="left"
                                                    title="" data-original-title="People with the link can view"></em>
                                            </div>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown">
                                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li>
                                                            <a href="#file-details" data-toggle="modal">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-share" data-toggle="modal">
                                                                <em class="icon ni ni-share"></em>
                                                                <span>Share</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-copy" data-toggle="modal">
                                                                <em class="icon ni ni-copy"></em>
                                                                <span>Copy</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#file-move" data-toggle="modal">
                                                                <em class="icon ni ni-forward-arrow"></em>
                                                                <span>Move</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="file-dl-toast">
                                                                <em class="icon ni ni-download"></em>
                                                                <span>Download</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-pen"></em>
                                                                <span>Rename</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-file-item nk-file">
                                        <div class="nk-file-info">
                                            <div class="nk-file-title">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="file-check-n3">
                                                    <label class="custom-control-label" for="file-check-n3"></label>
                                                </div>
                                                <div class="nk-file-icon">
                                                    <span class="nk-file-icon-type">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                            <path
                                                                d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z"
                                                                style="fill:#e3edfc"></path>
                                                            <path
                                                                d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z"
                                                                style="fill:#b7d0ea"></path>
                                                            <path
                                                                d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z"
                                                                style="fill:#c4dbf2"></path>
                                                            <path
                                                                d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z"
                                                                style="fill:#36c684"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text">
                                                        <a href="#" class="title">Update Data.xlsx</a>
                                                        <div class="nk-file-star asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em
                                                                    class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-file-meta">
                                            <div class="tb-lead">Today, 10:38 PM</div>
                                            <div class="tb-sub">by Abu Bin Ishityak</div>
                                        </div>
                                        <div class="nk-file-members">
                                            <div class="user-avatar-group">
                                                <div class="user-avatar xs"><img src="/demo1/images/avatar/b-sm.jpg"
                                                        alt=""></div>
                                                <div class="user-avatar xs bg-purple"><span>IH</span></div>
                                                <div class="user-avatar xs bg-pink"><span>AB</span></div>
                                                <div class="user-avatar xs bg-light"><span>+2</span></div>
                                            </div>
                                        </div>
                                        <div class="nk-file-actions">
                                            <div class="dropdown"><a href=""
                                                    class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-plain no-bdr">
                                                        <li><a href="#file-details" data-toggle="modal"><em
                                                                    class="icon ni ni-eye"></em><span>Details</span></a>
                                                        </li>
                                                        <li><a href="#file-share" data-toggle="modal"><em
                                                                    class="icon ni ni-share"></em><span>Share</span></a>
                                                        </li>
                                                        <li><a href="#file-copy" data-toggle="modal"><em
                                                                    class="icon ni ni-copy"></em><span>Copy</span></a>
                                                        </li>
                                                        <li><a href="#file-move" data-toggle="modal"><em
                                                                    class="icon ni ni-forward-arrow"></em><span>Move</span></a>
                                                        </li>
                                                        <li><a href="#" class="file-dl-toast"><em
                                                                    class="icon ni ni-download"></em><span>Download</span></a>
                                                        </li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-pen"></em><span>Rename</span></a>
                                                        </li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-trash"></em><span>Delete</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($medias as $media)
                                        <div class="nk-file-item nk-file">
                                            <div class="nk-file-info">
                                                <div class="nk-file-title">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="file-check-{{ $media->id ?? null }}"><label
                                                            class="custom-control-label"
                                                            for="file-check-{{ $media->id ?? null }}"></label>
                                                    </div>
                                                    <div class="nk-file-icon">
                                                        <span class="nk-file-icon-type">
                                                            <img src="{{ asset($media->getSVG()) }}" alt="svg_icon">
                                                        </span>
                                                    </div>
                                                    <div class="nk-file-name">
                                                        <div class="nk-file-name-text"><a href="#"
                                                                class="title">{{ $media->name ?? null }}{{'.'.pathinfo($media->file_name, PATHINFO_EXTENSION) ?? null }}</a>
                                                            <div class="nk-file-star asterisk"><a href="#"><em
                                                                        class="asterisk-off icon ni ni-star"></em><em
                                                                        class="asterisk-on icon ni ni-star-fill"></em></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-file-meta">
                                                <div class="tb-lead">{{ $media->updated_at->format('d M') }}, 01:21
                                                    AM</div>
                                            </div>
                                            <div class="nk-file-members">
                                                <div class="tb-lead">Only Me</div>
                                                <div class="tb-shared"><em class="ni ni-link"
                                                        data-toggle="tooltip" data-placement="left" title=""
                                                        data-original-title="People with the link can view"></em></div>
                                            </div>
                                            <div class="nk-file-actions">
                                                <div class="dropdown"><a href=""
                                                        class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-plain no-bdr">
                                                            <li><a href="#file-details" data-toggle="modal" class="file-show"
                                                                data-file-id="{{ $media->id ?? null }}"><em
                                                                        class="icon ni ni-eye"></em><span>Details</span></a>
                                                            </li>
                                                            <li><a href="#file-share" data-toggle="modal"><em
                                                                        class="icon ni ni-share"></em><span>Share</span></a>
                                                            </li>
                                                            <li><a href="#file-copy" data-toggle="modal"><em
                                                                        class="icon ni ni-copy"></em><span>Copy</span></a>
                                                            </li>
                                                            <li><a href="#file-move" data-toggle="modal"><em
                                                                        class="icon ni ni-forward-arrow"></em><span>Move</span></a>
                                                            </li>
                                                            <li><a href="#" class="file-dl-toast"><em
                                                                        class="icon ni ni-download"></em><span>Download</span></a>
                                                            </li>
                                                            <li><a href="#file-rename" data-toggle="modal" class="file-rename"
                                                                data-file-id="{{ $media->id ?? null }}"><em
                                                                        class="icon ni ni-pen"></em><span>Rename</span></a>
                                                            </li>
                                                            <li><a href="javascript:;" class="file-del" data-file-id="{{$media->id}}"><em
                                                                        class="icon ni ni-trash"></em><span>Delete</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach   
                                </div>
                            </div>
                        </div>
                        {{-- browse file list-view @e --}}
                    </div>
                </div>
                {{-- browse file @e --}}
            </div>
        </div>
    </div>

    {{-- modal --}}

    {{-- modal file-share @s --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="file-share">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header align-center">
                    <div class="nk-file-title">
                        <div class="nk-file-icon"><span class="nk-file-icon-type"><svg
                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 72 72">
                                    <path fill="#6C87FE"
                                        d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                    </path>
                                    <path fill="#8AA3FF"
                                        d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                    </path>
                                    <path display="none" fill="#8AA3FF"
                                        d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                    </path>
                                    <path fill="#798BFF" d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z"></path>
                                </svg></span></div>
                        <div class="nk-file-name">
                            <div class="nk-file-name-text"><span class="title">UI/UX Design</span></div>
                            <div class="nk-file-name-sub">394.87 MB</div>
                        </div>
                    </div><a href="#" class="close" data-dismiss="modal"><em
                            class="icon ni ni-cross-sm"></em></a>
                </div>
                <div class="modal-body p-0">
                    <div class="nk-file-share-header">
                        <div class="nk-file-share-group">
                            <div class="nk-file-share-input-group">
                                <div class="nk-file-share-input nk-file-share-input-to"><label
                                        class="label">To</label><input type="text" class="input-mail tagify"
                                        placeholder="Email or Name"
                                        data-whitelist="team@softnio.com, help@softnio.com, contact@softnio.com"></div>
                            </div>
                            <ul class="nk-file-share-nav">
                                <li><span class="badge badge-sm badge-outline-gray">Can View</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nk-file-share-editor">
                        <div class="nk-file-share-field"><textarea
                                class="form-control form-control-simple no-resize ex-large"
                                placeholder="Add a Message (optional)"></textarea></div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <ul class="btn-toolbar g-3">
                        <li><a href="#" data-dismiss="modal" class="btn btn-outline-light btn-white">Cancel</a></li>
                        <li><a href="#" class="btn btn-primary">Share</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- modal file-share @e --}}

    {{-- modal file-copy @s --}}

    <div class="modal fade" tabindex="-1" role="dialog" id="file-copy">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header align-center border-bottom-0">
                    <h5 class="modal-title">Copy item to...</h5><a href="#" class="close"
                        data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                </div>
                <div class="modal-body pt-0 mt-n2">
                    <ul class="breadcrumb breadcrumb-alt breadcrumb-xs breadcrumb-arrow mb-1">
                        <li class="breadcrumb-item">Project</li>
                        <li class="breadcrumb-item">Apps</li>
                    </ul>
                    <div class="nk-fmg-listing is-scrollable">
                        <div class="nk-files nk-files-view-list is-compact">
                            <div class="nk-files-list">
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                        y="0px" viewBox="0 0 72 72">
                                                        <path fill="#6C87FE"
                                                            d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                        </path>
                                                        <path fill="#8AA3FF"
                                                            d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                        </path>
                                                        <path display="none" fill="#8AA3FF"
                                                            d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                        </path>
                                                        <path fill="#798BFF"
                                                            d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z">
                                                        </path>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span class="title">UI/UX
                                                            Design</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                                <div class="nk-file-item nk-file selected">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                        y="0px" viewBox="0 0 72 72">
                                                        <path fill="#6C87FE"
                                                            d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                        </path>
                                                        <path fill="#8AA3FF"
                                                            d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                        </path>
                                                        <path display="none" fill="#8AA3FF"
                                                            d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                        </path>
                                                        <path fill="#798BFF"
                                                            d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z">
                                                        </path>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span class="title">UI
                                                            Design</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                style="fill:#6c87fe"></rect>
                                                            <path
                                                                d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                style="fill:#8aa3ff"></path>
                                                            <path
                                                                d="M7.7454,58.9807C9.9352,61.3864,12.4882,61.0163,14,61H59a6.3373,6.3373,0,0,0,5.2562-2.0193Z"
                                                                style="fill:#798bff"></path>
                                                            <path
                                                                d="M29.6309,37.36a3.0236,3.0236,0,0,1-.86-2.39A4.3748,4.3748,0,0,1,32.9961,31h.0078a4.36,4.36,0,0,1,4.22,3.9121,3.0532,3.0532,0,0,1-.8545,2.4482A4.4158,4.4158,0,0,1,33.23,38.53c-.0771,0-.1533-.002-.23-.0049A4.519,4.519,0,0,1,29.6309,37.36Zm13.8359,2.7549a1,1,0,1,0-.9336,1.77c.7207.38,1.4658,2.126,1.4668,4.39V48a1,1,0,0,0,2,0V46.2744C45.999,43.3447,45.0049,40.9268,43.4668,40.1152ZM40.165,37.3965c-.1445.084-.29.168-.4316.2549a1,1,0,0,0,.5215,1.8535.9887.9887,0,0,0,.52-.1465c.1289-.0781.2607-.1543.3916-.23a4.2311,4.2311,0,0,0,2.1465-2.124.9839.9839,0,0,0,.0313-.1045A3.8411,3.8411,0,0,0,40.5,32.5352a1,1,0,0,0-.4922,1.9395,1.8773,1.8773,0,0,1,1.4,1.9092A2.835,2.835,0,0,1,40.165,37.3965ZM36.5,41h-7c-2.5234,0-4.5,2.7822-4.5,6.333V48.5a.8355.8355,0,0,0,.0588.2914.9731.9731,0,0,0,.3508.4946C26.4646,50.2812,29.4614,51,33,51s6.5353-.7187,7.59-1.7139a.9726.9726,0,0,0,.3509-.4949A.8361.8361,0,0,0,41,48.5V47.333C41,43.7822,39.0234,41,36.5,41Z"
                                                                style="fill:#4b66bc"></path>
                                                        </g>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span
                                                            class="title">Projects</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                        y="0px" viewBox="0 0 72 72">
                                                        <path fill="#6C87FE"
                                                            d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                        </path>
                                                        <path fill="#8AA3FF"
                                                            d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                        </path>
                                                        <path display="none" fill="#8AA3FF"
                                                            d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                        </path>
                                                        <path fill="#798BFF"
                                                            d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z">
                                                        </path>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span class="title">2019
                                                            Project</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-stretch  bg-light">
                    <div class="modal-footer-between">
                        <div class="g"><a href="#" class="link link-primary">Create New Folder</a></div>
                        <div class="g">
                            <ul class="btn-toolbar g-3">
                                <li><a href="#" data-dismiss="modal" class="btn btn-outline-light btn-white">Cancel</a>
                                </li>
                                <li><a href="#" class="btn btn-primary">Copy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal file-copy @e --}}

    {{-- modal file-move @s --}}

    <div class="modal fade" tabindex="-1" role="dialog" id="file-move">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header align-center border-bottom-0">
                    <h5 class="modal-title">Move item to...</h5><a href="#" class="close"
                        data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                </div>
                <div class="modal-body pt-0 mt-n2">
                    <ul class="breadcrumb breadcrumb-alt breadcrumb-xs breadcrumb-arrow mb-1">
                        <li class="breadcrumb-item">Project</li>
                        <li class="breadcrumb-item">Apps</li>
                    </ul>
                    <div class="nk-fmg-listing is-scrollable">
                        <div class="nk-files nk-files-view-list is-compact">
                            <div class="nk-files-list">
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                        y="0px" viewBox="0 0 72 72">
                                                        <path fill="#6C87FE"
                                                            d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                        </path>
                                                        <path fill="#8AA3FF"
                                                            d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                        </path>
                                                        <path display="none" fill="#8AA3FF"
                                                            d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                        </path>
                                                        <path fill="#798BFF"
                                                            d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z">
                                                        </path>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span class="title">UI/UX
                                                            Design</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                        y="0px" viewBox="0 0 72 72">
                                                        <path fill="#6C87FE"
                                                            d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                        </path>
                                                        <path fill="#8AA3FF"
                                                            d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                        </path>
                                                        <path display="none" fill="#8AA3FF"
                                                            d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                        </path>
                                                        <path fill="#798BFF"
                                                            d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z">
                                                        </path>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span class="title">2019
                                                            Project</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                                <div class="nk-file-item nk-file selected">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5"
                                                                style="fill:#6c87fe"></rect>
                                                            <path
                                                                d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z"
                                                                style="fill:#8aa3ff"></path>
                                                            <path
                                                                d="M7.7454,58.9807C9.9352,61.3864,12.4882,61.0163,14,61H59a6.3373,6.3373,0,0,0,5.2562-2.0193Z"
                                                                style="fill:#798bff"></path>
                                                            <path
                                                                d="M29.6309,37.36a3.0236,3.0236,0,0,1-.86-2.39A4.3748,4.3748,0,0,1,32.9961,31h.0078a4.36,4.36,0,0,1,4.22,3.9121,3.0532,3.0532,0,0,1-.8545,2.4482A4.4158,4.4158,0,0,1,33.23,38.53c-.0771,0-.1533-.002-.23-.0049A4.519,4.519,0,0,1,29.6309,37.36Zm13.8359,2.7549a1,1,0,1,0-.9336,1.77c.7207.38,1.4658,2.126,1.4668,4.39V48a1,1,0,0,0,2,0V46.2744C45.999,43.3447,45.0049,40.9268,43.4668,40.1152ZM40.165,37.3965c-.1445.084-.29.168-.4316.2549a1,1,0,0,0,.5215,1.8535.9887.9887,0,0,0,.52-.1465c.1289-.0781.2607-.1543.3916-.23a4.2311,4.2311,0,0,0,2.1465-2.124.9839.9839,0,0,0,.0313-.1045A3.8411,3.8411,0,0,0,40.5,32.5352a1,1,0,0,0-.4922,1.9395,1.8773,1.8773,0,0,1,1.4,1.9092A2.835,2.835,0,0,1,40.165,37.3965ZM36.5,41h-7c-2.5234,0-4.5,2.7822-4.5,6.333V48.5a.8355.8355,0,0,0,.0588.2914.9731.9731,0,0,0,.3508.4946C26.4646,50.2812,29.4614,51,33,51s6.5353-.7187,7.59-1.7139a.9726.9726,0,0,0,.3509-.4949A.8361.8361,0,0,0,41,48.5V47.333C41,43.7822,39.0234,41,36.5,41Z"
                                                                style="fill:#4b66bc"></path>
                                                        </g>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span
                                                            class="title">Projects</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info"><a class="nk-file-link" href="#">
                                            <div class="nk-file-title">
                                                <div class="nk-file-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                        y="0px" viewBox="0 0 72 72">
                                                        <path fill="#6C87FE"
                                                            d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                                        </path>
                                                        <path fill="#8AA3FF"
                                                            d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                                        </path>
                                                        <path display="none" fill="#8AA3FF"
                                                            d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                                        </path>
                                                        <path fill="#798BFF"
                                                            d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z">
                                                        </path>
                                                    </svg></div>
                                                <div class="nk-file-name">
                                                    <div class="nk-file-name-text"><span class="title">UI
                                                            Design</span></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-file-actions"><a href="#" class="btn btn-sm btn-icon btn-trigger"><em
                                                class="icon ni ni-chevron-right"></em></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-stretch  bg-light">
                    <div class="modal-footer-between">
                        <div class="g"><a href="#" class="link link-primary">Create New Folder</a></div>
                        <div class="g">
                            <ul class="btn-toolbar g-3">
                                <li><a href="#" data-dismiss="modal" class="btn btn-outline-light btn-white">Cancel</a>
                                </li>
                                <li><a href="#" class="btn btn-primary">Move</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal file-move @e --}}

    {{-- modal file-details @s --}}

    <div class="modal fade" tabindex="-1" role="dialog" id="file-details">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header align-center">
                    <div class="nk-file-title">
                        <div class="nk-file-icon">
                            <span class="nk-file-icon-type" id="show-svg"><svg
                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 72 72">
                                    <path fill="#6C87FE"
                                        d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10	C60,29.9,58.9,31,57.5,31z">
                                    </path>
                                    <path fill="#8AA3FF"
                                        d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z">
                                    </path>
                                    <path display="none" fill="#8AA3FF"
                                        d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z">
                                    </path>
                                    <path fill="#798BFF" d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z"></path>
                                </svg></span>
                            </div>
                        <div class="nk-file-name">
                            <div class="nk-file-name-text"><span class="title" id="show-title">Title</span></div>
                            <div class="nk-file-name-sub" id="show-root">Project</div>
                        </div>
                    </div><a href="#" class="close" data-dismiss="modal"><em
                            class="icon ni ni-cross-sm"></em></a>
                </div>
                <div class="modal-body">
                    <div class="nk-file-details">
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Type</div>
                            <div class="nk-file-details-col" id="show-type">Folder</div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Size</div>
                            <div class="nk-file-details-col" id="show-size">0 B</div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Location</div>
                            <div class="nk-file-details-col">
                                <ul class="breadcrumb breadcrumb-sm breadcrumb-alt breadcrumb-arrow" id="show-location">
                                    <li class="breadcrumb-item">Local</li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Owner</div>
                            <div class="nk-file-details-col" id="show-owner">Me</div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Shared with</div>
                            <div class="nk-file-details-col">
                                <div class="user-avatar-group">
                                    <div class="user-avatar xs"><img src="/demo1/images/avatar/b-sm.jpg" alt=""></div>
                                    <div class="user-avatar xs bg-purple"><span>IH</span></div>
                                    <div class="user-avatar xs bg-pink"><span>AB</span></div>
                                    <div class="user-avatar xs bg-light"><span>+2</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Modified</div>
                            <div class="nk-file-details-col" id="show-updated-at">Feb 19, 2020 by Abu Bit Istiyak</div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Opened</div>
                            <div class="nk-file-details-col" id="show-opened">Apr 23, 2020 by Me</div>
                        </div>
                        <div class="nk-file-details-row">
                            <div class="nk-file-details-col">Created</div>
                            <div class="nk-file-details-col" id="show-created-at">Feb 19, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-stretch bg-light">
                    <div class="modal-footer-between">
                        <div class="g"><a href="#" class="link link-primary">View All Activity</a></div>
                        <div class="g">
                            <ul class="btn-toolbar g-3">
                                <li><a href="#file-share" data-toggle="modal" data-dismiss="modal"
                                        class="btn btn-outline-light btn-white">Share</a></li>
                                <li><a href="#" class="btn btn-primary file-dl-toast" id="show-download">Download</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal file-details @e --}}

    {{-- modal file-rename @s --}}

    <div class="modal fade" tabindex="-1" role="dialog" id="file-rename">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="" method="POST" id="form-rename">
                @csrf
                @method('PUT')
                <div class="modal-header align-center">
                    <div class="nk-file-title">
                        <div class="nk-file-name">
                            <div class="nk-file-name-text">
                                <span class="title">Rename file</span>
                            </div>
                            <div class="nk-file-name-sub" id="rename-name"></div>
                        </div>
                    </div><a href="#" class="close" data-dismiss="modal"><em
                            class="icon ni ni-cross-sm"></em></a>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rename-form" class="form-label">Input New Name</label>
                        <input type="text" class="form-control" id="rename-form" value="" name="name">
                      </div>
                </div>
                <div class="modal-footer modal-footer-stretch bg-light">
                    <div class="modal-footer-between">
                        <div class="g">
                            <ul class="btn-toolbar g-3">
                                <li><button class="btn btn-outline-light btn-white" type="reset">Reset</button></li>
                                <li><button class="btn btn-primary file-dl-toast" type="submit">Rename</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal file-rename @e --}}

    {{-- modal file-uploads @s --}}

    <div class="modal fade" tabindex="-1" role="dialog" id="file-upload">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                        class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <form action="{{ route('system.media.store') }}" enctype="multipart/form-data" method="POST"
                        class="dropzone" id="myDropzone">
                        @csrf
                    </form>
                    <div class="nk-modal-action justify-end">
                        <ul class="btn-toolbar g-4 align-center">
                            <li><a class="link link-primary" data-dismiss="modal">Cancel</a></li>
                            <li><button class="btn btn-primary" type="submit" id="submit-all">Add Files</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal file-uploads @e --}}
@endsection

@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myDropzone = {
            url: '/panel/system/media',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 25,
            maxFiles: 25,
            maxFilesize: 5,
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("submit-all").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });
                dzClosure.on("success", function(file, responseText) {
                    swal.fire({
                        title: "Alert",
                        text: "Media was successfully uploaded",
                        icon: "info",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(location.reload());
                });
            },
            error: function(file, errorMessage) {
                errors = true;
            },
            queuecomplete: function() {
                if (errors) {
                    swal.fire({
                        title: "Alert",
                        text: "Failed to upload Media",
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(location.reload());
                }

            }
        }
    </script>
    <script>
        $('.file-del').click(function() {
            var id = $(this).data('file-id');

            swal.fire({
                title: "Are you sure?",
                text: "Wanna delete this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonColor: "green",
                confirmButtonText: "@lang('lang.delete')",
                cancelButtonText: "@lang('lang.cancel')",
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((result) => {
                if (result.isConfirmed) {

                    var url = "{{ route('system.media.destroy', ':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            location.reload();
                            swal.fire({
                                title: "Info",
                                text: "Data was deleted",
                                icon: "info",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        });

        $('.file-show').click(function() {
            var id = $(this).data('file-id');
            var url = "{{ route('system.media.show', ':id') }}";
                    url = url.replace(':id', id);
                    var token = "{{ csrf_token() }}";

                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'GET'
                        },
                        success: function(response) {
                            $('#show-svg').html(`<img src="{{asset('`+response.data.svg+`')}}" alt="svg icon">`);
                            $('#show-title').html(response.data.media.name);
                            $('#show-size').html(response.data.media.size+' B');
                            $('#show-type').html(response.data.media.mime_type);
                            $('#show-created-at').html(response.data.created_at);
                            $('#show-updated-at').html(response.data.updated_at);
                            $('#show-root').html('My Drive');
                            $('#show-location').html(`<li class="breadcrumb-item">My Drive</li>`);
                            $('#show-owner').html('ME');


                        }
                    });
            
        });

        $('.file-rename').click(function() {
            var id = $(this).data('file-id');
            var url = "{{ route('system.media.show', ':id') }}";
            var url2 = "{{ route('system.media.update', ':id') }}";
                    url = url.replace(':id', id);
                    url2 = url2.replace(':id', id);
                    var token = "{{ csrf_token() }}";

                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'GET'
                        },
                        success: function(response) {
                            $('#rename-name').html(response.data.media.name);
                            $('#rename-form').val(response.data.media.name);
                            $('#form-rename').attr('action',url2);
                        }
                    });
            
        });

    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css">
@endpush
