@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-4">@lang('lang.modules')</h3>
                </div>
                <div class="col-auto ml-auto">
                    <a href="#module-install" data-toggle="modal" class="btn btn-primary btn-md mb-4">
                        @lang('lang.install_module')
                    </a>
                </div>
            </div>

            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            @foreach ($modules as $module)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">
                                        <div class="tb-lead">
                                            <a href="#">
                                                <h3 class="{{ $module->isEnabled() ? 'text-primary' : 'text-muted' }}">{{ $module->get('alias') }}</h3>
                                            </a>
                                            <span class="dot dot-success d-md-none ml-1"></span>
                                        </div>
                                        <div>
                                            <em class="icon ni ni-user-circle"></em>
                                            {{ $module->get('author') }}
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <div>
                                            <em class="icon ni ni-clock"></em> &middot;
                                            <em class="icon ni ni-git"></em> v{{ $module->get('version') }}
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <img class="img-rounded" src="" alt=""/>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                       class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            @if ($module->isEnabled())
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href="{{ route('system.modules.update', $module->get('name')) }}"
                                                                       data-action="deactivate">
                                                                        <em class="icon ni ni-na"></em>
                                                                        @lang('lang.deactivate')
                                                                    </a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href=""
                                                                       data-action="uninstall">
                                                                        <em class="icon ni ni-trash-fill"></em>
                                                                        @lang('lang.uninstall')
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href="{{ route('system.modules.update', $module->getLowerName()) }}"
                                                                       data-action="activate">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                        @lang('lang.activate')
                                                                    </a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href="{{ route('system.modules.delete', $module->getLowerName()) }}"
                                                                       data-action="remove">
                                                                        <em class="icon ni ni-trash-fill"></em>
                                                                        @lang('lang.remove')
                                                                    </a>
                                                                </li>
                                                            @endif
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
    </div>



    <div class="modal fade show" tabindex="-1" id="module-install" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h4 class="title">@lang('lang.install_module')</h4>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#install-computer" role="tab"
                               aria-selected="true">@lang('lang.from_computer')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#install-url" role="tab"
                               aria-selected="false">@lang('lang.from_url')</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="install-computer">
                            <form method="post" action="{{ route('system.modules.install') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="custom-file" name="file">
                                    <label class="custom-file-label"
                                           for="custom-file">@lang('lang.choose_file')</label>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="install-url">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input class="form-control" placeholder="https://" type="url" name="fileUrl">
                                    <div class="input-group-append">
                                        <button type="submit"
                                                class="btn btn-primary">@lang('lang.check_install')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('#custom-file').change(function () {
            $(this).closest('form').submit();
        });
    </script>
@endpush
