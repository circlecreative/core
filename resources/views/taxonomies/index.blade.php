@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            {{-- content header @s --}}
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-4">Taxonomies</h3>
                </div>
                <div class="col-auto ml-auto">
                    <a href="{{ route('system.taxonomies.create')}}" class="btn btn-primary btn-md mb-4">Add New
                        Taxonomy</a>
                </div>
            </div>
            {{-- content header @e  --}}
            {{-- content main @s --}}
            <div class="card card-bordered card-stretch">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h5 class="title">@lang('lang.taxonomies')</h5>
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
                                                        href="{{ route('system.taxonomies.index') }}?show=10">10</a>
                                                </li>
                                                <li><a href="{{ route('system.taxonomies.index') }}?show=20&amp;page=1">20</a>
                                                </li>
                                                <li><a href="{{ route('system.taxonomies.index') }}?show=50&amp;page=1">50</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('system.taxonomies.index') }}?show=100&amp;page=1">100</a>
                                                </li>
                                            </ul>
                                            <ul class="link-check">
                                                <li><span>Order</span></li>
                                                <li class="active"><a
                                                        href="{{ route('system.taxonomies.index') }}?order=ASC">Ascending</a>
                                                </li>
                                                <li><a href="{{ route('system.taxonomies.index') }}?order=DESC">Descending</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-search search-wrap" data-search="search">
                            <form class="search-content" method="get" action="{{ route('system.taxonomies.index') }}">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                    <em class="icon ni ni-arrow-left"></em>
                                </a>
                                <input name="keyword" type="text"
                                       class="form-control form-control-sm border-transparent form-focus-none"
                                       placeholder="search by name, slug or code">
                                <button class="search-submit btn btn-icon">
                                    <em class="icon ni ni-search"></em>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- card main @s --}}
                <table class="table table-orders border-bottom">
                    <thead class="tb-odr-head">
                    <tr>
                        <th class="tb-odr-info">@lang('lang.name')</th>
                        <th class="tb-odr-info">@lang('lang.childs')</th>
                        <th class="tb-odr-info">@lang('lang.relations')</th>
                        <th class="tb-odr-info">@lang('lang.slug')</th>
                        <th class="tb-odr-info">@lang('lang.code')</th>
                        <th class="tb-odr-action">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="tb-odr-body">
                    @foreach ($taxonomies as $taxonomy)
                        <tr>
                            <td>{{$taxonomy->name ?? null}}</td>
                            <td>0</td>
                            <td>0</td>
                            <td class="text-lowercase">/{{$taxonomy->slug ?? null}}</td>
                            <td class="text-uppercase">{{$taxonomy->code ?? null}}</td>
                            <td class="tb-odr-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"
                                       data-offset="-8,0">
                                        <em class="icon ni ni-more-h"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <a href="{{ route('system.taxonomies.edit', ['taxonomy'=>$taxonomy->id]) }}">
                                                    <em class="icon ni ni-edit"></em>
                                                    <span>@lang('lang.edit')</span>
                                                </a>
                                                {{-- <a href="#" class="disabled">
                                                    <em class="icon ni ni-lock-fill"></em>
                                                    <span>Edit</span>
                                                </a> --}}
                                            </li>
                                            <li class="divider">
                                                <a href="javascript:;" data-taxonomy-id="{{$taxonomy->id}}"
                                                   class="row-del">
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
                {{-- card main @e --}}
                {{-- card footer @s --}}
                {!! $taxonomies->links() !!}
                {{-- card footer @e --}}
            </div>
            {{-- content main @e --}}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.row-del').click(function () {
            var id = $(this).data('taxonomy-id');

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

                    var url = "{{ route('system.taxonomies.destroy',':id') }}";
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
