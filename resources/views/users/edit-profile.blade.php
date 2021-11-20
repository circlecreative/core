@extends('layouts.app')

@section('content')
<form action="{{ route('system.people.profile.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">People</h3>
                            <nav>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item text-muted">
                                        People </li>
                                    <li class="breadcrumb-item active">
                                        FORM </li>
                                </ul>
                            </nav>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>
                                        <small>ID:
                                            <span class="text-base">{{$user->id ?? null}}</span>
                                        </small>
                                    </li>
                                    <li>
                                        <small>Last Update:
                                            <span class="text-base">
                                                {{$user->updated_at->format('M d, Y ') ?? null}} </span>
                                        </small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a class="btn btn-outline-light bg-white d-sm-inline-flex"
                                href="https://webstore.circlecreative.dev/panel/system/people">
                                <em class="icon ni ni-arrow-left"></em>
                                <span class="d-none d-sm-block">Cancel</span>
                            </a>
                            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="reset">
                                <em class="icon ni ni-reload"></em>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <button class="btn btn-outline-light bg-white d-sm-inline-flex" type="submit">
                                <em class="icon ni ni-save"></em>
                                <span class="d-none d-sm-block">Save</span>
                            </button>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="input-fullname">Category</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-select-sm" name="category">
                                            <option value="2" selected="">Users</option>
                                            <option value="4">Employees</option>
                                            <option value="5">Colleagues</option>
                                            <option value="7">Partners</option>
                                            <option value="8">Clients</option>
                                            <option value="9">Customers</option>
                                            <option value="10">Members</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="input-fullname">Full Name</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="input-fullname" name="fullname"
                                            value="{{$user->username ?? null}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="input-status">Gender</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" checked="" value="MALE"
                                                name="gender" id="reg-male">
                                            <label class="custom-control-label" for="reg-male">Male</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="gender" value="FEMALE"
                                                id="reg-female">
                                            <label class="custom-control-label" for="reg-female">Female</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="gender" value="UNDEFINED"
                                                id="reg-undefined">
                                            <label class="custom-control-label" for="reg-undefined">Undefined</label>
                                        </div>
                                    </li>
                                </ul>
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
                                            <input type="radio" class="custom-control-input" name="record_status"
                                                id="reg-publish" value="PUBLISH" checked="">
                                            <label class="custom-control-label" for="reg-publish">Publish</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="record_status"
                                                id="reg-unpublish" value="UNPUBLISH">
                                            <label class="custom-control-label" for="reg-unpublish">Unpublish</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="record_status"
                                                id="reg-archive" value="ARCHIVE">
                                            <label class="custom-control-label" for="reg-archive">Archive</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="record_status"
                                                id="reg-deleted" value="DELETED" disabled="">
                                            <label class="custom-control-label" for="reg-deleted">Deleted</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- card -->
                <div class="card card-bordered">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">ACCOUNT</h6>
                            </div>
                            <div class="card-tools">
                                <div class="custom-control custom-control-md custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch-account"
                                        data-toggle="collapse" data-target="#card-account" aria-expanded="true" checked="">
                                    <label class="custom-control-label" for="switch-account"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="card-account" class="collapse card-inner show">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="input-username">Username</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-at"></em>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="input-username" value="{{$user->username ?? null}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="input-email">Email</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-mail"></em>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="input-email"
                                            value="{{$user->email ?? null}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="input-phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-mobile"></em>
                                        </div>
                                        <input type="tel" class="form-control" name="phone" id="input-phone" value="{{$user->phone ?? null}}">
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
                                            <input type="radio" class="custom-control-input" name="account[record_status]"
                                                id="reg-publish" value="PUBLISH">
                                            <label class="custom-control-label" for="reg-publish">Active</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="account[record_status]"
                                                id="reg-unpublish" value="UNPUBLISH">
                                            <label class="custom-control-label" for="reg-unpublish">Suspend</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="account[record_status]"
                                                id="reg-draft" value="DRAFT">
                                            <label class="custom-control-label" for="reg-draft">Pending</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="account[record_status]"
                                                id="reg-archive" value="ARCHIVE">
                                            <label class="custom-control-label" for="reg-archive">Archive</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio">
                                            <input type="radio" class="custom-control-input" name="account[record_status]"
                                                id="reg-deleted" value="DELETED" disabled="">
                                            <label class="custom-control-label" for="reg-deleted">Deleted</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</form>
@endsection
