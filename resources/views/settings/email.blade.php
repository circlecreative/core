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
                                                    <a class="nav-link active"
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
                                                    <a class="nav-link"
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
                                                    <button id="test-send-email" type="submit" class="btn btn-outline-light bg-white btn-md"
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
                                        <h6 class="title">@lang('lang.email')</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="preview-title overline-title">@lang('lang.from_email')</span>
                                        <div class="form-group">
                                            <label for="email-from-name"
                                                   class="form-label">@lang('lang.from_name')</label>
                                            <input id="email-from-name" class="form-control" type="text"
                                                   name="email_from_name" value="{{ $email_from_name ?? null }}"
                                                   placeholder="WebStore">
                                        </div>
                                        <div class="form-group">
                                            <label for="email-from-address"
                                                   class="form-label">@lang('lang.from_address')</label>
                                            <input id="email-from-address" class="form-control" type="text"
                                                   name="email_from_address"
                                                   value="{{ $email_from_address ?? null }}"
                                                   placeholder="noreply@webstore.cirlcecreative.id">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="preview-title overline-title">@lang('lang.reply_email')</span>
                                        <div class="form-group">
                                            <label for="email-reply-name"
                                                   class="form-label">@lang('lang.reply_name')</label>
                                            <input id="email-reply-name" class="form-control" type="text"
                                                   name="email_reply_name" value="{{ $email_reply_name ?? null }}"
                                                   placeholder="WebStore">
                                        </div>
                                        <div class="form-group">
                                            <label for="email-reply-address"
                                                   class="form-label">@lang('lang.reply_address')</label>
                                            <input id="email-reply-address" class="form-control" type="text"
                                                   name="email_reply_address"
                                                   value="{{ $email_reply_address ?? null }}"
                                                   placeholder="hello@webstore.circlecreative.id">
                                        </div>
                                    </div>
                                </div>


                                <hr class="preview-hr">

                                <div class="form-group">
                                    <label class="form-label" for="email-mailer">@lang('lang.mailer')</label>
                                    <div class="form-control-wrap">
                                        <select id="email-mailer"
                                                class="form-select form-control form-control-lg select2-hidden-accessible"
                                                name="email_mailer">
                                            <option value="PHPMAIL" {{ ($email_mailer === 'PHPMAIL' ? 'selected' : '') }}>
                                                @lang('lang.option_phpmail')
                                            </option>
                                            <option value="SENDMAIL" {{ ($email_mailer === 'SENDMAIL' ? 'selected' : '') }}>
                                                @lang('lang.option_sendmail')

                                            </option>
                                            <option value="SMTP" {{ ($email_mailer === 'SMTP' ? 'selected' : '') }}>
                                                @lang('lang.option_smtp')
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div id="sendmail-options" class="collapse">
                                    <div class="form-group">
                                        <label for="sendmail-path"
                                               class="form-label">@lang('lang.sendmail_path')</label>
                                        <input id="sendmail-path" class="form-control" type="text"
                                               name="email_sendmail_path"
                                               value="{{ $email_sendmail_path ?? null }}" placeholder="/usr/sbin/sendmail">
                                    </div>
                                </div>

                                <div id="smtp-options" class="collapse">
                                    <div class="form-group">
                                        <label for="smtp-host"
                                               class="form-label">@lang('lang.smtp_host')</label>
                                        <input id="smtp-host" class="form-control" type="text"
                                               name="email_smtp_host" value="{{ $email_smtp_host ?? null }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="smtp-port"
                                               class="form-label">@lang('lang.smtp_port')</label>
                                        <input id="smtp-port" class="form-control" type="text"
                                               name="email_smtp_port" value="{{ $email_smtp_port ?? null }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="smtp-security"
                                               class="form-label">@lang('lang.smtp_security')</label>
                                        <div class="form-control-wrap">
                                            <select id="smtp-security"
                                                    class="form-select form-control form-control-lg select2-hidden-accessible"
                                                    name="email_smtp_security">
                                                <option value="NONE" >@lang('lang.option_none')</option>
                                                <option value="ssl">@lang('lang.option_ssl')</option>
                                                <option value="tls">@lang('lang.option_tls')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="smtp-options-authentication"
                                                   value="YES"
                                                   name="email_smtp_authentication"
                                                   {{ $email_smtp_authentication === 'YES' ? 'checked' : '' }}
                                                   data-toggle="collapse" data-target="#smtp-options-authentication">
                                            <label class="custom-control-label" style="font-weight: 500"
                                                   for="smtp-options-authentication">@lang('lang.smtp_authentication')</label>
                                        </div>
                                    </div>

                                    <div id="smtp-options-authentication" class="collapse">
                                        <div class="form-group">
                                            <label for="smtp-authentication-username"
                                                   class="form-label">@lang('lang.smtp_authentication_username')</label>
                                            <input id="smtp-authentication-username" class="form-control" type="text"
                                                   name="email_smtp_authentication_username"
                                                   value="{{ $email_smtp_authentication_username ?? null }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="smtp-authentication-password"
                                                   class="form-label">@lang('lang.smtp_authentication_password')</label>
                                            <input id="smtp-authentication-password" class="form-control" type="password"
                                                   name="email_smtp_authentication_password"
                                                   value="{{ $email_smtp_authentication_password ?? null }}">
                                        </div>
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
        if ($('#email-mailer').val() === 'SENDMAIL') {
            $('#sendmail-options').collapse('show');
        } else if ($('#email-mailer').val() === 'SMTP') {
            $('#smtp-options').collapse('show');
        }

        $('#email-mailer').change(function () {
            $('#sendmail-options').collapse('hide');
            $('#smtp-options').collapse('hide');

            if ($(this).val() === 'SENDMAIL') {
                $('#sendmail-options').collapse('show');
            } else if ($(this).val() === 'SMTP') {
                $('#smtp-options').collapse('show');
            }
        });

        $('#test-send-email').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ url('system/settings/email/test') }}",
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
