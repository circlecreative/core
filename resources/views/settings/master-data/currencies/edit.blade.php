@extends('layouts.app')

@section('content')
<form id="form-post" class="nk-content-inner" action="{{ route('system.settings.master-data.tm-currencies.update',['tm_currency'=>$currency->id]) }}" method="post">
@csrf
@method('PUT')
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
                        <a href="{{ route('system.settings.master-data.tm-currencies.index') }}">@lang('lang.currencies')</a>
                    </li>
                    <li class="breadcrumb-item active">@lang('lang.edit')</li>
                </ul>
            </nav>
            <div class="nk-block-des text-soft text-sm">
                <ul class="list-inline">
                    <li class="text-muted">
                        <small>ID: <span class="font-weight-bold">{{$currency->id}}</span></small>
                        <input type="hidden" name="id" value="40">
                    </li>
                    <li class="text-muted">
                        <small>Last Update: <span class="font-weight-bold">{{$currency->updated_at}}</span></small>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a class="btn btn-outline-light bg-white d-sm-inline-flex" href="{{ route('system.settings.master-data.tm-currencies.index') }}"><em class="icon ni ni-arrow-left"></em><span class="d-none d-sm-block">@lang('lang.cancel')</span></a>
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
                        <label class="form-label" for="input-name">@lang('lang.name')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="input-name" value="{{$currency->name}}" name="name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-iso-code">@lang('lang.iso_code')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="input-iso-code" value="{{$currency->iso_code}}" name="iso_code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-symbol">@lang('lang.symbol')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control w-50" id="input-symbol" value="{{$currency->symbol}}" name="symbol">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-code">@lang('lang.code')</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <ul class="custom-control-group g-3 align-center flex-wrap">
                            <li>
                                <div class="custom-control custom-control-sm custom-radio">
                                    <input type="radio" class="custom-control-input" name="symbol_first" id="symbol-left" value="1" {{$currency->symbol_first === 1 ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="symbol-left">@lang('lang.left')</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-control-sm custom-radio">
                                    <input type="radio" class="custom-control-input" name="symbol_first" id="symbol-right" value="0" {{$currency->symbol_first === 0 ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="symbol-right">@lang('lang.right')</label>
                                </div>
                            </li>
                        </ul>
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
