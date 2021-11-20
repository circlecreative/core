@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row align-items-center pb-3">
                <div class="col-auto">
                    <h3 class="mb-0">@lang('lang.master_data')</h3>
                    <nav>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('system.settings.setting') }}">@lang('lang.settings')</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('system.settings.master-data.index') }}">@lang('lang.master_data')</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('lang.banks')</li>
                        </ul>
                    </nav>
                </div>
                <div class="col-auto ml-auto">
                    <a href="{{ route('system.settings.master-data.tm-banks.create') }}"
                       class="btn btn-primary btn-md mb-4">@lang('lang.add_new')</a>
                </div>
            </div>
            <div class="card card-bordered card-stretch">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h5 class="title">@lang('lang.banks')</h5>
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
                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                           data-toggle="dropdown">
                                            <em class="icon ni ni-setting"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                            <ul class="link-check">
                                                <li><span>Show</span></li>
                                                <li class="active"><a
                                                        href="{{ route('system.settings.master-data.tm-banks.index') }}?show=10">10</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('system.settings.master-data.tm-banks.index') }}?show=20&amp;page=1">20</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('system.settings.master-data.tm-banks.index') }}?show=50&amp;page=1">50</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('system.settings.master-data.tm-banks.index') }}?show=100&amp;page=1">100</a>
                                                </li>
                                            </ul>
                                            <ul class="link-check">
                                                <li><span>Order</span></li>
                                                <li class="active"><a
                                                        href="{{ route('system.settings.master-data.tm-banks.index') }}?order=ASC">Ascending</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('system.settings.master-data.tm-banks.index') }}?order=DESC">Descending</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-search search-wrap" data-search="search">
                            <form class="search-content" method="get"
                                  action="{{ route('system.settings.master-data.tm-banks.index') }}">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                    <em class="icon ni ni-arrow-left"></em>
                                </a>
                                <input name="keyword" type="text"
                                       class="form-control form-control-sm border-transparent form-focus-none"
                                       placeholder="search by bank name, company, alias or code">
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
                        <th class="tb-odr-info">@lang('lang.name')</th>
                        <th class="tb-odr-info">@lang('lang.alias')</th>
                        <th class="tb-odr-info">@lang('lang.code')</th>
                        <th class="tb-odr-action">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="tb-odr-body">
                    @foreach ($banks as $bank)
                        <tr>
                            <td>{{$bank->name}}</td>
                            <td>{{$bank->alias}}</td>
                            <td>{{$bank->code}}</td>
                            <td class="tb-odr-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"
                                       data-offset="-8,0">
                                        <em class="icon ni ni-more-h"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <a href="{{ route('system.settings.master-data.tm-banks.edit',['tm_bank'=>$bank->id]) }}">
                                                    <em class="icon ni ni-edit"></em>
                                                    <span>@lang('lang.edit')</span>
                                                </a>
                                            </li>
                                            <li class="divider">
                                            <li>
                                                <a href="javascript:;" data-bank-id="{{$bank->id}}" class="row-del">
                                                    <em class="icon ni ni-trash"></em>
                                                    <span>@lang('lang.delete')</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $banks->links() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.row-del').click(function () {
            var id = $(this).data('bank-id');

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

                    var url = "{{ route('system.settings.master-data.tm-banks.destroy',':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
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

    </script>
@endpush
