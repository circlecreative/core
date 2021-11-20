@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h3 class="mb-4">@lang('lang.settings')</h3>
                </div>
            </div>
            <form action="{{ route('system.settings.save') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner position-relative card-tools-toggle py-0">
                        <div class="card-title-group">
                            <div class="card-tools">
                                <ul class="nav nav-tabs border-bottom-0">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href=" {{  url('panel/system/settings') }}">
                                            @lang('lang.site')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href=" {{  url('panel/system/settings/email') }}">
                                            @lang('lang.email')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href=" {{  url('panel/system/settings/integrations') }}">
                                            @lang('lang.integrations')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            href=" {{  url('panel/system/settings/messages') }}">
                                            @lang('lang.messages')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href=" {{  url('panel/system/settings/master-data') }}">
                                            @lang('lang.master_data')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-tools mr-n1">
                                <ul class="btn-toolbar gx-1">
                                    <li>
                                        <button id="test-send-message" type="submit" class="btn btn-outline-light bg-white btn-md"
                                                value="email-test">
                                            <em class="icon ni ni-inbox-out"></em>
                                            <span class="d-none d-sm-block">@lang('lang.test')</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <em class="icon ni ni-save"></em>
                                            <span class="d-none d-sm-block">@lang('lang.save')</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search"
                                        data-target="search">
                                        <em class="icon ni ni-arrow-left"></em>
                                    </a>
                                    <input type="text" class="form-control border-transparent form-focus-none"
                                            placeholder="@lang('lang.search')">
                                    <button class="search-submit btn btn-icon">
                                        <em class="icon ni ni-search"></em>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-preview">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">@lang('lang.messages')</h6>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <div class="form-group">
                        <label class="form-label" for="messages-provider">@lang('lang.provider')</label>
                        <div class="form-control-wrap">
                            <select id="messages-provider" class="form-select form-control form-control-lg select2-hidden-accessible" name="messages_provider">
                                <option value="CITCALL" {{$messages_provider  === 'CITCALL' ? 'selected' : ''}}>@lang('lang.citcall')</option>
                                <option value="ZENZIVA" {{$messages_provider  === 'ZENZIVA' ? 'selected' : ''}}>@lang('lang.zenziva_sms')</option>
                                <option value="WOOWA" {{$messages_provider  === 'WOOWA' ? 'selected' : ''}}>@lang('lang.woowa')</option>
                            </select>
                        </div>
                    </div>
                    <div id="citcall-options" class="collapse">
                        <div class="form-group">
                            <label for="citcall-version" class="form-label">@lang('lang.version')</label>
                            <input id="citcall-version" class="form-control" type="text" name="citcall[version]" value="v3" readonly>
                        </div>
                        <div class="form-group">
                            <label for="citcall-appname" class="form-label">@lang('lang.app_name')</label>
                            <input id="citcall-appname" class="form-control" type="text" name="citcall[app_name]" value="{{ $citcall['app_name'] ?? null }}" placeholder="WebStore">
                        </div>
                        <div class="form-group">
                            <label for="citcall-userid" class="form-label">@lang('lang.user_id')</label>
                            <input id="citcall-userid" class="form-control" type="text" name="citcall[user_id]" value="{{ $citcall['user_id'] ?? null }}">
                        </div>
                        <div class="form-group">
                            <label for="citcall-senderid" class="form-label">@lang('lang.sender_id')</label>
                            <input id="citcall-senderid" class="form-control" type="text" name="citcall[sender_id]" value="{{$citcall['sender_id'] ?? null}}">
                        </div>
                        <div class="form-group">
                            <label for="citcall-apikey" class="form-label">@lang('lang.api_key')</label>
                            <input id="citcall-apikey" class="form-control" type="text" name="citcall[api_key]" value="{{$citcall['api_key'] ?? null}}">
                        </div>
                        <div class="form-group">
                            <label for="citcall-retry" class="form-label">@lang('lang.retry')</label>
                            <input id="citcall-retry" class="form-control" type="number" name="citcall[retry]" placeholder="5" value="{{$citcall['retry'] ?? null}}">
                        </div>
                    </div>
                    <div id="zenziva-options" class="collapse">
                        <div class="form-group">
                            <label for="zenziva-userkey" class="form-label">@lang('lang.user_key')</label>
                            <input id="zenziva-userkey" class="form-control" type="text" name="zenziva[user_key]" value="{{$zenziva['user_key'] ?? null}}">
                        </div>
                        <div class="form-group">
                            <label for="zenziva-passkey" class="form-label">@lang('lang.pass_key')</label>
                            <input id="zenziva-passkey" class="form-control" type="text" name="zenziva[pass_key]" value="{{$zenziva['pass_key'] ?? null}}">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        if ($('#messages-provider').val() === 'CITCALL') {
            $('#citcall-options').collapse('show');
        } else if ($('#messages-provider').val() === 'ZENZIVA') {
            $('#zenziva-options').collapse('show');
        }

        $('#messages-provider').change(function () {
            $('#citcall-options').collapse('hide');
            $('#zenziva-options').collapse('hide');

            if ($(this).val() === 'CITCALL') {
                $('#citcall-options').collapse('show');
            } else if ($(this).val() === 'ZENZIVA') {
                $('#zenziva-options').collapse('show');
            }
        });

        $('#test-send-message').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ url('system/settings/message/test') }}",
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                },
                error: function (response) {
                    console.log(response)
                }

            }).done(function() {
                $( this ).addClass( "done" );
            });
        })
    </script>
@endpush
