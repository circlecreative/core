@extends('layouts.app')
@section('content')
<form id="form-post" class="container-fluid" action="{{ route('system.taxonomies.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="nk-block nk-block-lg">
                        {{-- content header @s --}}
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                    <h3 class="mb-0">@lang('lang.taxonomies')</h3>
                                                                    </div>
                                <div class="nk-block-head-content">
                                    <a class="btn btn-outline-light bg-white d-sm-inline-flex" href="{{ route('system.taxonomies.index') }}"><em class="icon ni ni-arrow-left"></em><span class="d-none d-sm-block">Cancel</span></a>
                                    <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="reset"><em class="icon ni ni-reload"></em><span class="d-none d-sm-block">Reset</span></button>
                                    <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="submit"><em class="icon ni ni-save"></em><span class="d-none d-sm-block">Save</span></button>
                                </div>
                            </div>
                        </div> 
                        {{-- content header @e --}}
                        {{-- content main @e --}}
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row g-3 align-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="input-type">@lang('lang.parent')</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" name="parent_id">
                                                    <option value="0">No Parent / Root</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label class="form-label" for="input-name">@lang('lang.name')</label>
                                                <input type="text" class="form-control" id="input-name" value="" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="input-slug">@lang('lang.slug')</label>
                                            <div class="form-control-wrap">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="input-slug-addon">/</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="input-slug" value="" name="slug">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="input-code">@lang('lang.code')</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="input-code" value="" name="code">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="input-description">@lang('lang.description')</label>
                                            <div class="form-control-wrap">
                                                <textarea name="description" class="form-control" id="input-description" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="preview-hr">
                                <div class="row g-3 align-center">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" for="input-status">@lang('lang.status')</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
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
                        </div>
                        {{-- content main @e --}}
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('scripts')
<script>

var url = "{{ route('system.taxonomies.index') }}";
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