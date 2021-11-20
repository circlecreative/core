@component('layouts.master')
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <x-sidebar/>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <x-header/>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('layout')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <x-footer/>
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
@endcomponent
