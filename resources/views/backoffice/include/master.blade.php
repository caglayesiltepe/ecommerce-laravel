<!DOCTYPE html>
<html lang="en" class="@yield('htmlClass', 'light-style layout-navbar-fixed layout-menu-fixed layout-compact')" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" data-style="light">

<head>
    @include('backoffice.include.header')
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @if (!empty($showMenu) && $showMenu)
            @include('backoffice.include.menu')
        @endif

        <div class="layout-page">
            @if (!empty($showMenu) && $showMenu)
                @include('backoffice.include.navbar')
            @endif
            @yield('content')
        </div>
    </div>
</div>
<footer>
    @include('backoffice.include.footer')
</footer>
</body>
</html>
