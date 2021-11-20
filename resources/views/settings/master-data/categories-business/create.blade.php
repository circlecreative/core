@extends('layouts.app')

@section('content')
<form id="form-post" class="nk-content-inner" action="{{ route('system.settings.master-data.tm-categories-business.store') }}" method="post">
@csrf
<div class="nk-block-head nk-block-head-sm">{{-- content header @s--}}
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="mb-0">@lang('lang.master_data')</h3>
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('system.settings.setting') }}">@lang('lang.settings')</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('system.settings.master-data.index') }}">@lang('lang.master_data')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('system.settings.master-data.tm-categories-business.index') }}">@lang('lang.categories_business')</a>
                    </li>
                    <li class="breadcrumb-item active">@lang('lang.add')</li>
                </ul>
            </nav>
        </div>
        <div class="nk-block-head-content">
            <a class="btn btn-outline-light bg-white d-sm-inline-flex" href="{{ route('system.settings.master-data.tm-categories-business.index') }}"><em class="icon ni ni-arrow-left"></em><span class="d-none d-sm-block">@lang('lang.cancel')</span></a>
            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="reset"><em class="icon ni ni-reload"></em><span class="d-none d-sm-block">@lang('lang.reset')</span></button>
            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="submit"><em class="icon ni ni-save"></em><span class="d-none d-sm-block">@lang('lang.save')</span></button>
        </div>
    </div>
</div>{{-- content header @e--}}
<div class="nk-block">{{-- content main @s--}}
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-parent">@lang('lang.parent')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select class="form-select" name="parent_id">
                                <option value="">No Parent / Root</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-title">@lang('lang.title')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="input-title" value="" name="title">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="preview-hr">
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-status">@lang('lang.status')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <ul class="custom-control-group g-3 align-center flex-wrap">
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-publish" value="PUBLISH">
                                <label class="custom-control-label" for="reg-publish">@lang('lang.publish')</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-unpublish" value="UNPUBLISH">
                                <label class="custom-control-label" for="reg-unpublish">@lang('lang.unpublish')</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-archive" value="ARCHIVE">
                                <label class="custom-control-label" for="reg-archive">@lang('lang.archive')</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-deleted" value="DELETED" disabled>
                                <label class="custom-control-label" for="reg-deleted">@lang('lang.deleted')</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- card -->
</div>{{-- content main @e--}}
</form>
@endsection

@push('scripts')
<script>

var url = "{{ route('system.settings.master-data.tm-categories-business.index') }}";
$('[name="parent_id"]').select2({
    minimumInputLength: 3,
    allowClear: true,
    placeholder: 'CHOOSE_PARENT',
    ajax: {
        dataType: 'json',
        url: url,
        delay: 800,
        data: function(params) {
            return {
                search: params.term
            }
        },
        processResults: function (data, page) {
            return {
                results: data
            };
        },
    }
}).on('[name="parent_id"]:select', function (evt) {
    var data = $('[name="parent_id"] option:selected').text();
});
</script>
@endpush