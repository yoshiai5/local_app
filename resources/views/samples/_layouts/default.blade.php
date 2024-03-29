<!DOCTYPE html>
<html>
    {{-- （samples）フォルダ --}}
<head>
    @include('samples._components.head')
    @include('samples._components.css')
</head>

{{-- <body class="hold-transition @yield('body_class')"> --}}
<!-- <body class="skin-yellow"> -->
<body class="skin-yellow">
    <div class="wrapper">
        <!-- トップメニュー -->
        <header class="main-header">
            @include('samples._components.header')
        </header>

        <!-- サイドバー -->
        <aside class="main-sidebar">
            @include('samples._components.aside')
        </aside>

        <!-- コンテンツ -->
        <div class="content-wrapper">
            <section class="content-header">
                @yield('content-header')
            </section>
            <section class="content">
                @include('samples._components.message')
                @yield('content-body')
            </section>
        </div>

        <!-- フッター -->
        <footer class="main-footer">
            @include('samples._components.footer')
        </footer>
    </div>
    <!-- js -->
    @include('samples._components.js')
</body>
</html>
