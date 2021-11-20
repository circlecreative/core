@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-4">@lang('lang.settings')</h3>
                </div>
            </div>
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner position-relative card-tools-toggle py-0">
                        <div class="card-title-group">
                            <div class="card-tools">
                                <ul class="nav nav-tabs border-bottom-0">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href=" {{  url('panel/system/settings') }}">
                                            @lang('lang.site')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href=" {{  url('panel/system/settings/email') }}">
                                            @lang('lang.email')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href=" {{  url('panel/system/settings/integrations') }}">
                                            @lang('lang.integrations')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href=" {{  url('panel/system/settings/messages') }}">
                                            @lang('lang.messages')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                           href=" {{  url('panel/system/settings/master-data') }}">
                                            @lang('lang.master_data')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-tools mr-n1">
                            </div>
                        </div>

                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search"
                                       data-target="search">
                                        <em class="icon ni ni-arrow-left"></em>
                                    </a>
                                    <input type="text" class="form-control border-transparent form-focus-none"
                                           placeholder="@lang('lang.search')">
                                    <button class="search-submit btn btn-icon">
                                        <em class="icon ni ni-search"></em>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-bordered card-stretch">
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                            @foreach($master as $table)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                            <span class="tb-lead">
                                                <a href="{{ url('panel/system/settings/master-data/'.str_replace('_', '-', $table)) }}">
                                                    <h3>{{ $table }}</h3>
                                                </a>
                                                <span class="dot dot-success d-md-none ml-1"></span>
                                            </span>
                                    <small>Oct 26, 2021 16:58 pm</small>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <h3 class="text-muted">
                                        {{ app('db')->table($table)->count() }}
                                        <sup class="sub-text-sm text-muted text-lowercase">&nbsp;
                                            @lang('lang.data')
                                        </sup>
                                    </h3>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                   data-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="{{ url('panel/system/settings/master-data/'.str_replace('_', '-', $table)) }}">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>@lang('lang.view')</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('panel/system/settings/master-data/'.str_replace('_', '-', $table).'/create') }}">
                                                                <em class="icon ni ni-file"></em>
                                                                <span>@lang('lang.add_new_data')</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
