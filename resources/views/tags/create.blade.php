@extends('layouts.app')
@section('content')
<form id="form-post" class="nk-content-inner" action="{{ route('system.tags.store') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="nk-block-head nk-block-head-sm">{{-- content header @s--}}
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">@lang('lang.tags')</h3>
                                </div>
        <div class="nk-block-head-content">
            <a class="btn btn-outline-light bg-white d-sm-inline-flex" href="{{ route('system.tags.index') }}">
                <em class="icon ni ni-arrow-left"></em>
                <span class="d-none d-sm-block">@lang('lang.cancel')</span>
            </a>
            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="reset">
                <em class="icon ni ni-reload"></em>
                <span class="d-none d-sm-block">@lang('lang.reset')</span>
            </button>
            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="submit">
                <em class="icon ni ni-save"></em>
                <span class="d-none d-sm-block">@lang('lang.save')</span>
            </button>
            <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside">
                <em class="icon ni ni-setting"></em>
            </a>
        </div>
    </div>
</div>{{-- content header @e--}}
<div class="nk-block">{{-- content main @s--}}
    <div class="card card-bordered">
        <div class="card-inner">{{-- form input @s --}}
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
                {{-- form input @e --}}
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div>{{-- content main @e--}}
</form>
@endsection