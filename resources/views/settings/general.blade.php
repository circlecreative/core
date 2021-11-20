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
                                            <a class="nav-link active"
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
                                            <a class="nav-link"
                                               href=" {{  url('panel/system/settings/master-data') }}">
                                                @lang('lang.master_data')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-tools mr-n1">
                                    <ul class="btn-toolbar gx-1">
                                        <li>
                                            <button type="submit" class="btn btn-primary btn-md">
                                                <em class="icon ni ni-save"></em>
                                                <span class="d-none d-sm-block">@lang('lang.save')</span>
                                            </button>
                                        </li>
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
                                        <input type="text"
                                               class="form-control border-transparent form-focus-none"
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

                <div class="card card-preview">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">@lang('lang.app_profile')</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group mb-0">
                                    <label for="logo_square_white"
                                           class="form-label d-flex justify-content-between align-items-center">
                                        @lang('lang.app_icon')
                                        <a target="_blank"
                                           href=" {{ $app_icon }}"
                                           class="btn btn-xs btn-default">
                                            <em class="icon ni ni-download"></em>
                                        </a>
                                    </label>
                                    <div class="form-group">
                                        <input type="file" name="app_icon" class="dropify" data-height="100"
                                               data-default-file=" {{ $app_icon }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="app-name"
                                                   class="form-label">@lang('lang.app_name')</label>
                                            <input id="app-name" class="form-control" type="text"
                                                   name="app_name" value="{{ $app_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="app-short-name"
                                                   class="form-label">@lang('lang.app_short_name')</label>
                                            <input id="app-short-name" class="form-control" type="text"
                                                   name="app_short_name"
                                                   value="{{ $app_short_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="app-theme-color"
                                                   class="form-label">@lang('lang.app_theme_color')</label>
                                            <input id="app-theme-color" class="form-control color-picker"
                                                   type="text" name="app_theme_color"
                                                   value="{{ $app_theme_color }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="app-background-color"
                                                   class="form-label">@lang('lang.app_background_color')</label>
                                            <input id="app-background-color" class="form-control color-picker"
                                                   type="text" name="app_background_color"
                                                   value="{{ $app_background_color }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-preview">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">@lang('lang.site_profile')</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="row gy-4">
                            <div class="col-sm-2">
                                <div class="form-group mb-0">
                                    <label for="logo_square_white"
                                           class="form-label d-flex justify-content-between align-items-center">
                                        @lang('lang.site_icon')
                                        <a target="_blank"
                                           href=" {{ $site_icon }}"
                                           class="btn btn-xs btn-default">
                                            <em class="icon ni ni-download"></em>
                                        </a>
                                    </label>
                                    <div class="form-group">
                                        <input type="file" name="site_icon" class="dropify" data-height="100"
                                               data-default-file=" {{ $site_icon }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="site-title">@lang('lang.site_title')</label>
                                            <div class="form-control-wrap">
                                                <input id="site-title" type="text" class="form-control"
                                                       name="site_title"
                                                       value=" {{ $site_title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="site-title-position">@lang('lang.site_title_position')</label>
                                            <div class="form-control-wrap">
                                                <select id="site-title-position"
                                                        class="form-select form-control form-control-lg select2-hidden-accessible"
                                                        name="site_title_position">
                                                    <option
                                                        value="AFTER" {{ $site_title_position === 'AFTER' ? 'selected' : '' }} >@lang('lang.option_after')</option>
                                                    <option
                                                        value="BEFORE" {{ $site_title_position === 'BEFORE' ? 'selected' : '' }} >@lang('lang.option_before')</option>
                                                    <option
                                                        value="NONE" {{ $site_title_position === 'NONE' ? 'selected' : '' }} >@lang('lang.option_none')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group">
                                            <label for="site-tagline"
                                                   class="form-label">@lang('lang.site_tagline')</label>
                                            <div class="form-control-wrap">
                                                <input id="site-tagline" type="text" class="form-control"
                                                       name="site_tagline"
                                                       value="{{ $site_tagline }}">
                                                <span class="form-note p-1">
                                                            @lang('lang.site_tagline_help')
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group">
                                            <label for="site-copyright"
                                                   class="form-label">@lang('lang.site_copyright')</label>
                                            <div class="form-control-wrap">
                                                <input id="site-copyright" type="text" class="form-control"
                                                       name="site_copyright"
                                                       value="{{ $site_copyright }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="preview-hr">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_language"
                                           class="form-label">@lang('lang.language')</label>
                                    <select id="site_language" name="site_language"
                                            class="form-select form-control form-control-lg select2-hidden-accessible">
                                        @foreach ($languages as $lang)
                                            <option
                                                value=" {{  $lang->code }}" {{ $site_language === $lang->code ? 'selected' : '' }}> {{  $lang->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-note p-1">
                                            @lang('lang.language_help')
                                        </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label for="site_timezone"
                                           class="form-label">@lang('lang.timezone')</label>
                                    <select id="site_timezone" name="site_timezone"
                                            class="form-select form-control form-control-lg select2-hidden-accessible"
                                            data-search="on">
                                        @foreach ($timezones as $time)
                                            <option
                                                value=" {{  $time->utc }}" {{ $site_timezone === $time->utc ? 'selected' : '' }}> {{  $time->text }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-note p-1">
                                            @lang('lang.timezone_help')
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-preview">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">@lang('lang.site_status')</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="form-group">
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" id="site-status-public" name="site_status"
                                       class="custom-control-input"
                                       value="PUBLIC" {{ $site_status === 'PUBLIC' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="site-status-public">@lang('lang.public')</label><br>
                            </div>
                            <span class="form-note p-1">@lang('lang.public_help')</span>
                            <div class="ml-3">
                                <div class="form-group">
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="site-search-engine"
                                               name="site_status_discourage_search"
                                               value="YES" {{ $site_status_discourage_search === 'YES' ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                               for="site-search-engine">@lang('lang.public_discourage_search_help')</label>
                                    </div>
                                    <span class="form-note p-1">@lang('lang.public_discourage_search_help')</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" id="site-status-coming-soon" name="site_status"
                                       class="custom-control-input"
                                       value="COMING_SOON" {{ $site_status === 'COMING_SOON' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="site-status-coming-soon">@lang('lang.coming_soon')</label><br>
                            </div>
                            <span class="form-note p-1">@lang('lang.coming_soon_help')</span>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" id="site-status-maintenance" name="site_status"
                                       class="custom-control-input"
                                       value="MAINTENANCE" {{ $site_status === 'MAINTENANCE' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="site-status-maintenance">@lang('lang.maintenance')</label><br>
                            </div>
                            <span class="form-note p-1">@lang('lang.maintenance_help')</span>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" id="site-status-offline" name="site_status"
                                       class="custom-control-input"
                                       value="OFFLINE" {{ $site_status === 'OFFLINE' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="site-status-offline">@lang('lang.offline')</label><br>
                            </div>
                            <span class="form-note p-1">@lang('lang.offline_help')</span>

                            <div class="ml-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="site-status-message"><small>@lang('lang.offline_message')</small></label>
                                    <div class="form-control-wrap">
                                            <textarea class="form-control no-resize" id="site-status-message"
                                                      name="site_status_message"> {{ $site_status_message }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" id="site-status-private" name="site_status"
                                       class="custom-control-input"
                                       value="PRIVATE" {{ $site_status === 'PRIVATE' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="site-status-private">@lang('lang.private')</label><br>
                            </div>
                            <span class="form-note p-1">@lang('lang.private_help')</span>
                        </div>
                    </div>
                </div>

                <div class="card card-preview">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">@lang('lang.site_logo')</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group w-100">
                                    <label for="logo-rectangle"
                                           class="form-label d-flex justify-content-between align-items-center">
                                        @lang('lang.logo_rectangle')
                                        <a href=" {{  $logo_rectangle }}"
                                           class="btn btn-xs btn-default" target="_blank">
                                            <em class="icon ni ni-download"></em>
                                        </a>
                                    </label>
                                    <div class="form-group h-200px">
                                        <input type="file" name="logo_rectangle" class="dropify"
                                               data-default-file=" {{ $logo_rectangle }}"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group w-100">
                                    <label for="logo-rectangle-dark"
                                           class="form-label d-flex justify-content-between align-items-center">
                                        @lang('lang.logo_rectangle_dark')
                                        <a href=" {{  $logo_rectangle_dark }}"
                                           class="btn btn-xs btn-default" target="_blank">
                                            <em class="icon ni ni-download"></em>
                                        </a>
                                    </label>
                                    <div class="form-group h-200px">
                                        <input type="file" name="logo_rectangle_dark" class="dropify bg-dark"
                                               data-default-file=" {{ $logo_rectangle_dark }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-0">
                                    <label for="logo-square"
                                           class="form-label d-flex justify-content-between align-items-center">
                                        @lang('lang.logo_square')
                                        <a href=" {{  $logo_square }}"
                                           class="btn btn-xs btn-default" target="_blank">
                                            <em class="icon ni ni-download"></em>
                                        </a>
                                    </label>
                                    <div class="form-group">
                                        <input type="file" name="logo_square" class="dropify"
                                               data-default-file=" {{ $logo_square }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="logo-square-dark"
                                           class="form-label d-flex justify-content-between align-items-center">
                                        @lang('lang.logo_square_dark')
                                        <a href=" {{ $logo_square_dark }}"
                                           class="btn btn-xs btn-default" target="_blank">
                                            <em class="icon ni ni-download"></em>
                                        </a>
                                    </label>
                                    <div class="form-group">
                                        <input type="file" name="logo_square_dark" class="dropify"
                                               data-default-file=" {{ $logo_square_dark }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
        $('.color-picker').colorpicker();
    </script>
@endpush
