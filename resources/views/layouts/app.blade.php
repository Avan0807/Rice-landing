<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Bột Gạo Lứt Tùng Beo - Gian Hàng Chính Hãng')</title>
    <meta name="description" content="@yield('description', 'Bột Gạo Lứt Tùng Beo - Sản phẩm dinh dưỡng tự nhiên, không chất bảo quản. Hỗ trợ đẹp da, tiêu hóa và sức khỏe toàn diện.')">
    <meta name="keywords" content="bột gạo lứt, tùng beo, dinh dưỡng, sức khỏe, tự nhiên, không chất bảo quản">
    <meta name="author" content="Tùng Beo">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Bột Gạo Lứt Tùng Beo - Gian Hàng Chính Hãng')">
    <meta property="og:description" content="@yield('og_description', 'Sản phẩm dinh dưỡng tự nhiên từ gạo lứt và các nguyên liệu hữu cơ')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Bột Gạo Lứt Tùng Beo">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Bột Gạo Lứt Tùng Beo')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Sản phẩm dinh dưỡng tự nhiên')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/og-image.jpg'))">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- Google Analytics (thêm sau) -->
    @if(config('app.env') === 'production')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>
    @endif
</head>
<body class="@yield('body-class')">
    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Floating Zalo Button -->
    @include('layouts.partials.floating-zalo')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div id="success-message" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('success-message')?.remove();
        }, 5000);
    </script>
    @endif

    @if(session('error'))
    <div id="error-message" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('error-message')?.remove();
        }, 5000);
    </script>
    @endif

    <!-- Loading Animation -->
    <div id="loading" class="fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="flex items-center space-x-2">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-600"></div>
            <span class="text-yellow-600 font-medium">Đang tải...</span>
        </div>
    </div>

    <script>
        // Hide loading when page is fully loaded
        window.addEventListener('load', function() {
            document.getElementById('loading').style.display = 'none';
        });
    </script>
</body>
</html>
