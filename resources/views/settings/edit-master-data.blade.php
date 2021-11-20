@extends('layouts.app')
@section('content')
<form id="form-post" class="nk-content-inner" action="" method="post">
<div class="nk-block-head nk-block-head-sm">{{-- content header @s--}}
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="mb-0">Master Data</h3>
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('system.settings.setting') }}">Settings</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('system.settings.master-data') }}">Master Data</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}">Banks</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ul>
            </nav>
        </div>
        <div class="nk-block-head-content">
            <a class="btn btn-outline-light bg-white d-sm-inline-flex" href="{{ route('system.settings.master-data.show', ['data'=>'banks']) }}"><em class="icon ni ni-arrow-left"></em><span class="d-none d-sm-block">Cancel</span></a>
            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="reset"><em class="icon ni ni-reload"></em><span class="d-none d-sm-block">Reset</span></button>
            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="submit"><em class="icon ni ni-save"></em><span class="d-none d-sm-block">Save</span></button>
        </div>
    </div>
</div>{{-- content header @e--}}
<div class="nk-block">{{-- content main @s--}}
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-name">NAME</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="input-name" value="" name="name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-company">COMPANY</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="input-company" value="" name="company">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-alias">ALIAS</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control w-50" id="input-alias" value="" name="alias">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-code">CODE</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control w-25" id="input-code" value="" name="code">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="preview-hr">
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="input-status">Status</label>
                    </div>
                </div>
                <div class="col-lg-7">
                    <ul class="custom-control-group g-3 align-center flex-wrap">
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-publish" value="PUBLISH">
                                <label class="custom-control-label" for="reg-publish">Publish</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-unpublish" value="UNPUBLISH">
                                <label class="custom-control-label" for="reg-unpublish">Unpublish</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-archive" value="ARCHIVE">
                                <label class="custom-control-label" for="reg-archive">Archive</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-radio">
                                <input type="radio" class="custom-control-input" name="record_status" id="reg-deleted" value="DELETED" disabled>
                                <label class="custom-control-label" for="reg-deleted">Deleted</label>
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