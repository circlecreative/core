@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-4">@lang('lang.settings')</h3>
                </div>
            </div>
            <form action="{{ route('system.settings.save') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                            <a class="nav-link active"
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
                                            <a class="nav-link"
                                               href=" {{  url('panel/system/settings/master-data') }}">
                                                @lang('lang.master_data')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-tools mr-n1">
                                    <ul class="btn-toolbar gx-1">
                                    </ul>
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
        </div>
    </div>

    <div class="nk-block mt-3">
        <div class="row g-gs">
            <div class="col-xxl-6">
                <div class="card nk-download border pl-2 py-2">
                    <div class="data">
                        <div class="thumb">
                            <img src="{{  asset('default/integrations/logo-midtrans.png') }}"
                                 alt="@lang('lang.midtrans_integration')">
                        </div>
                        <div class="info">
                            <h6 class="title">
                                <span class="name">@lang('lang.midtrans_integration')</span>
                            </h6>
                            <div class="meta">
                                        <span class="version">
                                            <span class="text-soft"><em
                                                    class="icon ni ni-git"></em></span> <span>v1.0.0</span>
                                        </span>
                                <span class="author">
                                            <span class="text-soft"><em class="icon ni ni-user-circle"></em></span>
                                            <span>Circle Creative</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="actions d-flex align-self-start">
                        <div class="custom-control custom-switch" style="top: 6px;">
                            <input type="checkbox" class="custom-control-input" id="integration-midtrans" {{$midtrans_enable  === 'YES' ? 'checked' : ''}}>
                            <label class="custom-control-label" style="font-weight: 500"
                                   for="integration-midtrans"></label>
                        </div>
                        <a class="btn btn-icon btn-trigger nk-nav-toggle" data-toggle="modal"
                           data-target="#settings">
                            <em class="icon ni ni-setting"></em>
                        </a>
                    </div>

                    <div class="modal fade show" tabindex="-1" id="settings" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-dismiss="modal">
                                    <em class="icon ni ni-cross-sm"></em>
                                </a>
                                <div class="modal-body modal-body-lg"><h4
                                        class="mb-4">@lang('lang.midtrans_integration')</h4>
                                    <form method="post" action="{{ route('system.settings.setting') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="merchant-id" class="form-label">
                                                @lang('lang.midtrans_merchant_id')
                                            </label>
                                            <input id="merchant-id" class="form-control" type="text"
                                                   name="midtrans[merchant_id]" value="{{$midtrans['merchant_id'] ?? null}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="client-key"
                                                   class="form-label">@lang('lang.midtrans_client_key')</label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#"
                                                   class="form-icon form-icon-right passcode-switch"
                                                   data-target="client-key">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input id="client-key" class="form-control" type="password"
                                                       name="midtrans[client_key]" value="{{$midtrans['client_key'] ?? null}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="server-key"
                                                   class="form-label">@lang('lang.midtrans_server_key')</label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#"
                                                   class="form-icon form-icon-right passcode-switch"
                                                   data-target="server-key">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input id="server-key" class="form-control" type="password"
                                                       name="midtrans[server_key]" value="{{$midtrans['server_key'] ?? null}}">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="production"
                                                               value="YES" name="midtrans[production]" {{$midtrans['production'] ?? null === 'YES' ? 'checked' : ''}}>
                                                        <label class="custom-control-label"
                                                               style="font-weight: 500"
                                                               for="production">@lang('lang.midtrans_production')</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="sanitized"
                                                               value="YES" name="midtrans[sanitized]" {{$midtrans['sanitized'] ?? null === 'YES' ? 'checked' : ''}}>
                                                        <label class="custom-control-label"
                                                               style="font-weight: 500"
                                                               for="sanitized">@lang('lang.midtrans_sanitized')</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="enable_3ds"
                                                               value="YES" name="midtrans[enable_3ds]" {{$midtrans['enable_3ds'] ?? null === 'YES' ? 'checked' : ''}}>
                                                        <label class="custom-control-label"
                                                               style="font-weight: 500"
                                                               for="enable_3ds">@lang('lang.midtrans_3ds')</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit"
                                                    class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6">
                <div class="card nk-download border pl-2 py-2">
                    <div class="data">
                        <div class="thumb">
                            <img src="{{ asset('default/integrations/logo-ipaymu.png') }}"
                                 alt="@lang('lang.ipaymu_integration')">
                        </div>
                        <div class="info">
                            <h6 class="title">
                                <span class="name">@lang('lang.ipaymu_integration')</span>
                            </h6>
                            <div class="meta">
                                        <span class="version">
                                            <span class="text-soft"><em
                                                    class="icon ni ni-git"></em></span> <span>v1.0.0</span>
                                        </span>
                                <span class="author">
                                            <span class="text-soft"><em class="icon ni ni-user-circle"></em></span>
                                            <span>Circle Creative</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="actions d-flex align-self-start">
                        <div class="custom-control custom-switch" style="top: 6px;">
                            <input type="checkbox" class="custom-control-input" id="integration-ipaymu" {{$ipaymu_enable === 'YES' ? 'checked' : ''}}>
                            <label class="custom-control-label" style="font-weight: 500"
                                   for="integration-ipaymu"></label>
                        </div>
                        <a class="btn btn-icon btn-trigger nk-nav-toggle" data-toggle="modal"
                           data-target="#integration-ipaymu-settings">
                            <em class="icon ni ni-setting"></em>
                        </a>
                    </div>

                    <div class="modal fade show" tabindex="-1" id="integration-ipaymu-settings"
                         aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                        class="icon ni ni-cross-sm"></em></a>
                                <div class="modal-body modal-body-lg"><h4
                                        class="mb-4">@lang('lang.ipaymu_integration')</h4>
                                    <form method="post" action="{{ route('system.settings.save') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="integration-ipaymu-api-key"
                                                   class="form-label">@lang('lang.ipaymu_api_key')</label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#"
                                                   class="form-icon form-icon-right passcode-switch"
                                                   data-target="integration-ipaymu-api-key">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input id="integration-ipaymu-api-key" class="form-control"
                                                       type="password" name="ipaymu[api_key]"
                                                       value="{{$ipaymu['api_key'] ?? null}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="integration-ipaymu-va-number"
                                                   class="form-label">@lang('lang.ipaymu_va_number')</label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#"
                                                   class="form-icon form-icon-right passcode-switch"
                                                   data-target="integration-ipaymu-va-number">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input id="integration-ipaymu-va-number" class="form-control"
                                                       type="password" name="ipaymu[va_number]"
                                                       value="{{$ipaymu['va_number'] ?? null}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="integration-ipaymu-production"
                                                       value="YES" name="ipaymu[production]" {{$ipaymu['va_number'] ?? null === 'YES' ? 'checked' : ''}}>
                                                <label class="custom-control-label" style="font-weight: 500"
                                                       for="integration-ipaymu-production">@lang('lang.ipaymu_production')</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit"
                                                    class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6">
                <div class="card nk-download border pl-2 py-2">
                    <div class="data">
                        <div class="thumb">
                            <img src="{{ asset('default/integrations/logo-google.png') }}"
                                 alt="@lang('lang.google_integration')">
                        </div>
                        <div class="info">
                            <h6 class="title">
                                <span class="name">@lang('lang.google_integration')</span>
                            </h6>
                            <div class="meta">
                                        <span class="version">
                                            <span class="text-soft"><em
                                                    class="icon ni ni-git"></em></span> <span>v1.0.0</span>
                                        </span>
                                <span class="author">
                                            <span class="text-soft"><em class="icon ni ni-user-circle"></em></span>
                                            <span>Circle Creative</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="actions d-flex align-self-start">
                        <div class="custom-control custom-switch" style="top: 6px;">
                            <input type="checkbox" class="custom-control-input" id="integration-google" {{$google_enable === 'YES' ? 'checked' : ''}}>
                            <label class="custom-control-label" style="font-weight: 500"
                                   for="integration-google"></label>
                        </div>
                        <a class="btn btn-icon btn-trigger nk-nav-toggle" data-toggle="modal"
                           data-target="#integration-google-settings">
                            <em class="icon ni ni-setting"></em>
                        </a>
                    </div>

                    <div class="modal fade show" tabindex="-1" id="integration-google-settings"
                         aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                        class="icon ni ni-cross-sm"></em></a>
                                <div class="modal-body modal-body-lg"><h4
                                        class="title">@lang('lang.google_integration')</h4>
                                    <ul class="nk-nav nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab"
                                               href="#integration-google-tools" role="tab"
                                               aria-selected="true">@lang('lang.google_tools')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#integration-google-api"
                                               role="tab"
                                               aria-selected="false">@lang('lang.google_api')</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="integration-google-tools">
                                            <form method="post" action="{{ route('system.settings.save') }}">
                                                @csrf
                                                <div class="row g-3 pb-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label for="integration-google-analytics-id"
                                                                   class="form-label">@lang('lang.google_analytics_id')</label>
                                                            <span
                                                                class="form-note">@lang('lang.google_analytics_help')</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input id="integration-google-analytics-id"
                                                                       class="form-control" type="text"
                                                                       name="google[analytics_id]"
                                                                       value="{{$google['analytics_id'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 pb-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label for="integration-google-webmaster-id"
                                                                   class="form-label">@lang('lang.google_webmaster_id')</label>
                                                            <span
                                                                class="form-note">@lang('lang.google_webmaster_help')</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input id="integration-google-webmaster-id"
                                                                       class="form-control" type="text"
                                                                       name="google[webmaster_id]"
                                                                       value="{{$google['webmaster_id'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 pb-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label for="integration-google-tag-manager-id"
                                                                   class="form-label">@lang('lang.google_tag_manager_id')</label>
                                                            <span
                                                                class="form-note">@lang('lang.google_tag_manager_help')</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input id="integration-google-tag-manager-id"
                                                                       class="form-control" type="text"
                                                                       name="google[tag_manager_id]"
                                                                       value="{{$google['tag_manager_id'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label for="integration-google-adwords-id"
                                                                   class="form-label">@lang('lang.google_adwords_id')</label>
                                                            <span
                                                                class="form-note">@lang('lang.google_adwords_help')</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input id="integration-google-adwords-id"
                                                                       class="form-control" type="text"
                                                                       name="google[adwords_id]"
                                                                       value="{{$google['adwords_id'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 form-group">
                                                    <button type="submit"
                                                            class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                                </div>
                                        </div>
                                        <div class="tab-pane" id="integration-google-api">
                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="integration-google-api-application-name"
                                                                   class="form-label">@lang('lang.google_api_application_name')</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control"
                                                                       id="integration-google-api-application-name"
                                                                       name="google[api_application_name]"
                                                                       value="{{$google['api_application_name'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="integration-google-api-application-key"
                                                                   class="form-label">@lang('lang.google_api_application_key')</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control"
                                                                       id="integration-google-api-application-key"
                                                                       name="google[api_application_key]"
                                                                       value="{{$google['api_application_key'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 form-group">
                                                    <button type="submit"
                                                            class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6">
                <div class="card nk-download border pl-2 py-2">
                    <div class="data">
                        <div class="thumb">
                            <img src="{{ asset('default/integrations/logo-facebook.png') }}"
                                 alt="@lang('lang.facebook_integration')">
                        </div>
                        <div class="info">
                            <h6 class="title">
                                <span class="name">@lang('lang.facebook_integration')</span>
                            </h6>
                            <div class="meta">
                                        <span class="version">
                                            <span class="text-soft"><em
                                                    class="icon ni ni-git"></em></span> <span>v1.0.0</span>
                                        </span>
                                <span class="author">
                                            <span class="text-soft"><em class="icon ni ni-user-circle"></em></span>
                                            <span>Circle Creative</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="actions d-flex align-self-start">
                        <div class="custom-control custom-switch" style="top: 6px;">
                            <input type="checkbox" class="custom-control-input" id="integration-facebook" {{$facebook_enable === 'YES' ? 'checked' : ''}}>
                            <label class="custom-control-label" style="font-weight: 500"
                                   for="integration-facebook"></label>
                        </div>
                        <a class="btn btn-icon btn-trigger nk-nav-toggle" data-toggle="modal"
                           data-target="#integration-facebook-settings">
                            <em class="icon ni ni-setting"></em>
                        </a>
                    </div>

                    <div class="modal fade show" tabindex="-1" id="integration-facebook-settings"
                         aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                        class="icon ni ni-cross-sm"></em></a>
                                <div class="modal-body modal-body-lg"><h4
                                        class="title">@lang('lang.facebook_integration')</h4>
                                    <ul class="nk-nav nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab"
                                               href="#integration-facebook-tools" role="tab"
                                               aria-selected="true">@lang('lang.facebook_tools')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="#integration-facebook-api" role="tab"
                                               aria-selected="false">@lang('lang.facebook_api')</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="integration-facebook-tools">
                                            <form method="post" action="{{ route('system.settings.save') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="integration-facebook-pixel-id"
                                                           class="form-label">@lang('lang.facebook_pixel_id')</label>
                                                    <span class="form-note">@lang('lang.facebook_pixel_help')</span>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                               id="integration-facebook-pixel-id"
                                                               name="facebook[pixel_id]"
                                                               value="{{$facebook['pixel_id'] ?? null}}">
                                                    </div>
                                                </div>
                                                <div class="mt-4 form-group">
                                                    <button type="submit"
                                                            class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                                </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="integration-facebook-api">
                                                <div class="row g-4">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="integration-facebook-api-app-id"
                                                                   class="form-label">@lang('lang.facebook_api_app_id')</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control"
                                                                       id="integration-facebook-api-app-id"
                                                                       name="facebook[api_app_id]"
                                                                       value="{{$facebook['api_app_id'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="integration-facebook-api-app-secret"
                                                                   class="form-label">@lang('lang.facebook_api_app_secret')</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control"
                                                                       id="integration-facebook-api-app-secret"
                                                                       name="facebook[api_app_secret]"
                                                                       value="{{$facebook['api_app_secret'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="integration-facebook-api-graph-version"
                                                                   class="form-label">@lang('lang.facebook_api_graph_version')</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control"
                                                                       id="integration-facebook-api-graph-version"
                                                                       name="facebook[api_graph_version]"
                                                                       value="{{$facebook['api_graph_version'] ?? null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 form-group">
                                                    <button type="submit"
                                                            class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div class="card nk-download border pl-2 py-2">
                    <div class="data">
                        <div class="thumb">
                            <img src="{{ asset('default/integrations/logo-rajaongkir.png') }}"
                                 alt="@lang('lang.rajaongkir_integration')">
                        </div>
                        <div class="info">
                            <h6 class="title">
                                <span class="name">@lang('lang.rajaongkir_integration')</span>
                            </h6>
                            <div class="meta">
                                        <span class="version">
                                            <span class="text-soft"><em
                                                    class="icon ni ni-git"></em></span> <span>v1.0.0</span>
                                        </span>
                                <span class="author">
                                            <span class="text-soft"><em class="icon ni ni-user-circle"></em></span>
                                            <span>Circle Creative</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="actions d-flex align-self-start">
                        <div class="custom-control custom-switch" style="top: 6px;">
                            <input type="checkbox" class="custom-control-input" id="integration-rajaongkir" {{$rajaongkir_enable === 'YES' ? 'checked' : ''}}>
                            <label class="custom-control-label" style="font-weight: 500"
                                   for="integration-rajaongkir"></label>
                        </div>
                        <a class="btn btn-icon btn-trigger nk-nav-toggle" data-toggle="modal"
                           data-target="#integration-rajaongkir-settings">
                            <em class="icon ni ni-setting"></em>
                        </a>
                    </div>

                    <div class="modal fade show" tabindex="-1" id="integration-rajaongkir-settings"
                         aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                        class="icon ni ni-cross-sm"></em></a>
                                <div class="modal-body modal-body-lg"><h4
                                        class="mb-4">@lang('lang.rajaongkir_integration')</h4>
                                    <form method="post" action="{{ route('system.settings.save') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="rajaongkir-key"
                                                   class="form-label">@lang('lang.rajaongkir_key')</label>
                                            <div class="form-control-wrap">
                                                <input id="rajaongkir-key" type="text" class="form-control" value="{{$rajaongkir['rajaongkir_key'] ?? null}}"
                                                       name="rajaongkir[rajaongkir_key]">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="rajaongkir-type"
                                                   class="form-label">@lang('lang.rajaongkir_type')</label>
                                            <div class="form-control-wrap">
                                                <input id="rajaongkir-type" type="text" class="form-control"
                                                       value="{{$rajaongkir['rajaongkir_type'] ?? null}}"
                                                       name="rajaongkir[rajaongkir_type]">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                    class="btn btn-lg btn-primary">@lang('lang.save')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>




    <div class="has-modal modal fade" id="showDetaildModal">
        <div class="modal-dialog modal-xl modal-dialog-centered" id="modalSize">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="showDetaildModalTile">productt title</h4>
                    <button type="button" class="close icons" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="showDetaildModalBody">

                </div>

                <!-- Modal footer -->

            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function () {
            $('body').on("click", ".modalLink", function (e) {

                e.preventDefault();
                $('.modal-backdrop').show();
                $("#showDetaildModal").show();
                $("div.modal-dialog").removeClass('modal-md');
                $("div.modal-dialog").removeClass('modal-lg');
                $("div.modal-dialog").removeClass('modal-bg');
                var modal_size = $(this).attr('data-modal-size');
                if (modal_size !== '' && typeof modal_size !== typeof undefined && modal_size !== false) {
                    $("#modalSize").addClass(modal_size);
                } else {
                    $("#modalSize").addClass('modal-md');
                }
                var title = $(this).attr('title');
                $("#showDetaildModalTile").text(title);
                var data_title = $(this).attr('data-original-title');
                $("#showDetaildModalTile").text(data_title);
                $("#showDetaildModal").modal('show');
                $('div.ajaxLoader').show();
                $.ajax({
                    type: "GET",
                    url: $(this).attr('href'),
                    success: function (data) {
                        $("#showDetaildModalBody").html(data);
                        $("#showDetaildModal").modal('show');
                    }
                });
            });

            // midtrans manage switch button
            $('#integration-midtrans').click(function(){
                if($(this).prop("checked") == true){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna enable midtrans integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.enable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'YES', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'midtrans_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration midtrans succesfully enabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
                else if($(this).prop("checked") == false){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna disable midtrans integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.disable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {

                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'NO', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'midtrans_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration midtrans succesfully disabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
            });
            // ipaymu manage switch button
            $('#integration-ipaymu').click(function(){
                if($(this).prop("checked") == true){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna enable ipaymu integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.enable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'YES', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'ipaymu_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration ipaymu succesfully enabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
                else if($(this).prop("checked") == false){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna disable ipaymu integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.disable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {

                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'NO', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'ipaymu_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration ipaymu succesfully disabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
            });
            
            // google manage switch button
            $('#integration-google').click(function(){
                if($(this).prop("checked") == true){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna enable google integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.enable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'YES', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'google_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration google succesfully enabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
                else if($(this).prop("checked") == false){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna disable google integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.disable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {

                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'NO', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'google_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration google succesfully disabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
            });
            
            // facebook manage switch button
            $('#integration-facebook').click(function(){
                if($(this).prop("checked") == true){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna enable facebook integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.enable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'YES', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'facebook_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration facebook succesfully enabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
                else if($(this).prop("checked") == false){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna disable facebook integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.disable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {

                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'NO', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'facebook_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration facebook succesfully disabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
            }); 
            
            // rajaongkir manage switch button
            $('#integration-rajaongkir').click(function(){
                if($(this).prop("checked") == true){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna enable rajaongkir integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.enable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'YES', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'rajaongkir_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration rajaongkir succesfully enabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
                else if($(this).prop("checked") == false){
                    swal.fire({
                    title: "Are you sure?",
                    text: "Wanna disable rajaongkir integration?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('lang.disable')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: true,
                    closeOnCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {

                            var url = "{{ route('system.settings.save') }}";
                            var token = "{{ csrf_token() }}";
                            var arr = { "enable": 'NO', }; 
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {'_token': token, 'rajaongkir_enable' : arr},
                                success: function (response) {
                                    location.reload();
                                    swal.fire({
                                        title: "Info",
                                        text: "Integration rajaongkir succesfully disabled",
                                        icon: "info",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>

@endpush
