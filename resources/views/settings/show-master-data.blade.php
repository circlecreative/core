@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="row align-items-center pb-3">
            <div class="col-auto">
                <h3 class="mb-0">Master Data</h3>
                <nav>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('system.settings.setting') }}">Settings</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('system.settings.master-data') }}">Master Data</a>
                        </li>
                        <li class="breadcrumb-item active">Banks</li>
                    </ul>
                </nav>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{ route('system.settings.master-data.create', ['data'=>'banks']) }}" class="btn btn-primary btn-md mb-4">Add New</a>
            </div>
        </div>
        <div class="card card-bordered card-stretch">
            <div class="card-inner border-bottom">
                <div class="card-title-group">
                    <div class="card-title">
                        <h5 class="title">Banks</h5>
                    </div>
                    <div class="card-tools mr-n1">
                        <ul class="btn-toolbar">
                            <li>
                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search">
                                    <em class="icon ni ni-search"></em>
                                </a>
                            </li>
                            <li class="btn-toolbar-sep">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                        <em class="icon ni ni-setting"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-check">
                                            <li><span>Show</span></li>
                                            <li class="active"><a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?show=10">10</a></li>
                                            <li><a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?show=20&amp;page=1">20</a></li>
                                            <li><a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?show=50&amp;page=1">50</a></li>
                                            <li><a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?show=100&amp;page=1">100</a></li>
                                        </ul>
                                        <ul class="link-check">
                                            <li><span>Order</span></li>
                                            <li class="active"><a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?order=ASC">Ascending</a></li>
                                            <li><a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?order=DESC">Descending</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-search search-wrap" data-search="search">
                        <form class="search-content" method="get" action="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}">
                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                            <input name="keyword" type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="search by bank name, company, alias or code">
                            <button class="search-submit btn btn-icon">
                                <em class="icon ni ni-search"></em>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-orders border-bottom">
                <thead class="tb-odr-head">
                <tr>
                    <th class="tb-odr-info">NAME</th>
                    <th class="tb-odr-info">ALIAS</th>
                    <th class="tb-odr-info">CODE</th>
                    <th class="tb-odr-action">&nbsp;</th>
                </tr>
                </thead>
                <tbody class="tb-odr-body">
                    <tr>
                        <td>Bank BCA</td>
                        <td>BCA</td>
                        <td>014</td>
                        <td class="tb-odr-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}/edit/78">
                                                <em class="icon ni ni-edit"></em>
                                                <span>Edit</span>
                                            </a>
                                        </li>
                                        <li class="divider">
                                        <li>
                                            <a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}/delete/78">
                                                <em class="icon ni ni-trash"></em>
                                                <span>Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card-inner p-3">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        <ul class="pagination justify-content-center justify-content-md-start">
                            <li class="page-item">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}?page=1">Next</a>
                            </li>
                        </ul>
                    </div>
                    <div class="g">
                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                            <div>Page</div>
                                <div class="form-control-select">
                                    <select class="form-control" name="page">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            <div>of 8</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
