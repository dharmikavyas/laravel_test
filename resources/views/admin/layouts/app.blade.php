<!DOCTYPE html>
<html lang="en">
   @include('admin.layouts.head')
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            <div class="content-wrapper">
                @include('admin.layouts.navbar')
                <section class="content">
                    @section('main-content') @show
                </section>
            </div>
            @include('admin.layouts.footer')
        </div>
    </body>
</html>