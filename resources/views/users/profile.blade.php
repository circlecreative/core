@extends('layouts.app')

@section('content')
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-lg pb-1">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Profile</h4>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none">
                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside">
                                        <em class="icon ni ni-menu-alt-r"></em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="nk-data data-list mt-0">
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Full Name</span>
                                    <span class="data-value">{{$user->username ?? null}}</span>
                                </div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Account</h6>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Username</span>
                                    <span class="data-value">{{'@'.$user->username ?? null}}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Email</span>
                                    <span class="data-value">{{$user->email ?? null}}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Mobile Phone</span>
                                    <span class="data-value text-soft">{{$user->phone ?? null}}</span>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Role</span>
                                    <span class="data-value text-soft">Human</span>
                                </div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg"
                    data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="card-inner-group" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <div class="card-inner">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary">
                                                        <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="Avatar">
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Human</span>
                                                        <span class="sub-text">{{$user->username ?? null}}</span>
                                                    </div>
                                                    <div class="user-action">
                                                        <div class="dropdown">
                                                            <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown"
                                                                href="#"><em class="icon ni ni-more-v"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        {{-- <div class="upload-photo">
                                                                            <label for="upload-photo">
                                                                                <em class="icon ni ni-camera-fill"></em>
                                                                                <span>Change Photo</span>
                                                                            </label>
                                                                            <input class="form-control-file" type="file"
                                                                                id="upload-photo" name="avatar"
                                                                                accept="image/*">
                                                                        </div> --}}
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('system.people.profile.edit') }}">
                                                                            <em class="icon ni ni-edit-fill"></em>
                                                                            <span>
                                                                                Update Profile </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .user-card -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="user-account-info py-0">
                                                    <h6 class="overline-title-alt">Wallet</h6>
                                                    <div class="user-balance">75000 <small
                                                            class="currency">IDR</small>
                                                    </div>
                                                    <div class="user-balance-sub text-muted">Locked
                                                        <span>0 <small class="currency">IDR</small></span>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <ul class="link-list-menu">
                                                    <li>
                                                        <a class="active" href="">
                                                                    <em class="  icon ni ni-user-fill-c"></em>
                                                            <span>Profile</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <ul class="link-list-menu">
                                                    <li>
                                                        <a class="" href=""><em
                                                                class="icon ni ni-tranx-fill"></em><span>Transactions</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="" href=""><em
                                                                class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="" href=""><em
                                                                class="icon ni ni-activity-round-fill"></em>
                                                            <span>Activities</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="" href=""><em
                                                                class="icon ni ni-lock-alt-fill"></em><span>Security</span></a>
                                                    </li>
                                                    <li>
                                                        <a class="" href=""><em
                                                                class="icon ni ni-grid-add-fill-c"></em><span>Integrations</span></a>
                                                    </li>
                                                </ul>
                                            </div><!-- .card-inner -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 581px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </div><!-- .card-inner-group -->
                </div><!-- card-aside -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div>

@endsection
@push('scripts')
    {{-- <script type="text/javascript">
        $(function() {
            var photoCrop = $('#upload-photo-preview').croppie({
                enableExif: true,
                viewport: {
                    width: 300,
                    height: 300,
                    type: 'circle' //circle
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            $('#upload-photo').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    photoCrop.croppie('bind', {
                        url: event.target.result
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#upload-photo-modal').modal('show');
            });

            $('#upload').click(function(event) {
                console.log(event);
                photoCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    console.log(response)
                    $.ajax({
                        url: "https://webstore.circlecreative.dev/panel/system/people/upload-avatar",
                        type: "POST",
                        data: {
                            "avatar": response,
                            "userId": "1",
                            "fullname": "Developer",
                            "gender": "MALE"
                        },
                        success: function(requestData) {
                            console.log(requestData);
                            location.reload();
                        },
                        error: function(request, status, error) {
                            alert(request);
                        }
                    });
                })
            });
        });
    </script> --}}
@endpush
