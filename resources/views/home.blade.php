<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | Samsung Vietnam</title>
    <link rel="icon" href="/img/Icon.png" type="image/png">
    <!-- Font Samsung -->
    <link href="https://fonts.samsung.com/css2?family=SamsungOne:400,700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <style>
        body {
            font-family: 'SamsungOne', sans-serif;
        }

        .search-box:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900">
    <!-- Header -->
    <header class="bg-white text-black sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto">
            <!-- Main navigation bar -->
            <div class="flex items-center justify-between py-4 px-4">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/512px-Samsung_Logo.svg.png"
                            alt="Samsung" class="h-6">
                    </a>
                </div>

                <!-- Main navigation - Desktop -->
                <nav class="hidden lg:flex space-x-6">
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">Ưu Đãi</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">Di động</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">TV & AV</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">Gia Dụng</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">IT</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">Phụ kiện</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">SmartThings</a>
                    <a href="#" class="px-2 py-1 text-sm font-medium hover:text-blue-600">AI</a>
                </nav>

                <!-- Right side: Search, Cart, User -->
                <div class="flex items-center space-x-6">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <form class="flex items-center bg-gray-100 rounded-full px-4 py-2">
                            <input type="text" placeholder="Tìm kiếm"
                                class="bg-transparent border-none text-sm w-64 focus:outline-none search-box">
                            <button type="submit" class="ml-2">
                                <i class="fas fa-search text-gray-500"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Cart -->
                    <a href="#" class="text-gray-800 hover:text-blue-600">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </a>

                    <!-- User -->
                    <a href="#" class="text-gray-800 hover:text-blue-600 " id="login-toggle">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                    @if (Auth::guard('customer')->check())
                        {{ Auth::guard('customer')->user()->KH_HoTen }}
                    @endif
                    <a>
                        <div id="login-dropdown"
                            class=" hidden absolute top-10 right-0 bg-white border border-gray-300 rounded shadow-lg mt-2 p-4">
                            <ul>
                                @if (Auth::guard('customer')->check())
                                <li>
                                    <a href="{{ route('customer.home') }}"
                                        class="block text-gray-800 hover:text-blue-600 py-1">Trang của tôi</a>
                                </li>
                            @endif
                                <li>
                                    <a href="{{ route('customer.login') }}"
                                        class="block text-gray-800 hover:text-blue-600 py-1">Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.signup') }}"
                                        class="block text-gray-800 hover:text-blue-600 py-1">Đăng ký</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.logout') }}"
                                        class="block text-gray-800 hover:text-blue-600 py-1">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                    <script>
                        document.getElementById('login-toggle').addEventListener('click', function(event) {
                            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
                            const dropdown = document.getElementById('login-dropdown');
                            dropdown.classList.toggle('hidden'); // Chuyển đổi lớp 'hidden' để hiển thị hoặc ẩn dropdown
                        });

                        // Đóng dropdown khi nhấp ra ngoài
                        window.addEventListener('click', function(event) {
                            const dropdown = document.getElementById('login-dropdown');
                            if (!event.target.closest('#login-toggle') && !event.target.closest('#login-dropdown')) {
                                dropdown.classList.add('hidden');
                            }
                        });
                    </script>
                    <!-- Mobile menu button -->
                    <button class="text-gray-800 lg:hidden" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div class="lg:hidden hidden bg-white py-2 px-4 border-t border-gray-200" id="mobile-menu">
                <div class="flex flex-col space-y-3">
                    <a href="#" class="py-2 hover:text-blue-600">Ưu Đãi</a>
                    <a href="#" class="py-2 hover:text-blue-600">Di động</a>
                    <a href="#" class="py-2 hover:text-blue-600">TV & AV</a>
                    <a href="#" class="py-2 hover:text-blue-600">Gia Dụng</a>
                    <a href="#" class="py-2 hover:text-blue-600">IT</a>
                    <a href="#" class="py-2 hover:text-blue-600">Phụ kiện</a>
                    <a href="#" class="py-2 hover:text-blue-600">SmartThings</a>
                    <a href="#" class="py-2 hover:text-blue-600">AI</a>
                    <a href="#" class="py-2 hover:text-blue-600">Hỗ Trợ</a>
                    <a href="#" class="py-2 hover:text-blue-600">For Business</a>
                </div>
                <!-- Mobile search -->
                <div class="mt-4">
                    <form class="flex items-center bg-gray-100 rounded-full px-4 py-2">
                        <input type="text" placeholder="Tìm kiếm"
                            class="bg-transparent border-none text-sm w-full focus:outline-none search-box">
                        <button type="submit" class="ml-2">
                            <i class="fas fa-search text-gray-500"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </header>

    <!-- Add the JavaScript for mobile menu toggle -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <!-- Main Content -->
    <main>
        <!-- Hero Banner - Gaming Odyssey -->
        <section class="relative bg-cover bg-center text-white py-32" style="background-image: url('img/Banner1.jpg');">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-3xl md:text-5xl font-bold mb-4">Galaxy S25 Ultra</h1>
                <p class="text-xl mb-6">Galaxy AI</p>
                <p class="text-lg mb-8">Thu cũ đổi mới hỗ trợ thêm 2 triệu</p>
                <div class="border-t border-gray-300 w-24 mx-auto my-6"></div>
                <button class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-full font-medium transition">
                    Mua Ngay
                </button>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-6 text-center">Sản Phẩm Nổi Bật</h2>

                <!-- Tabs -->
                <div class="flex justify-center space-x-6 border-b border-gray-300 pb-2 mb-6">
                    <a href="#" class="font-medium text-black border-b-2 border-black pb-1">Ưu đãi</a>
                    <a href="#" class="text-gray-500 hover:text-black">Điện Thoại</a>
                    <a href="#" class="text-gray-500 hover:text-black">TV&AV</a>
                    <a href="#" class="text-gray-500 hover:text-black">Gia Dụng</a>
                    <a href="#" class="text-gray-500 hover:text-black">Màn hình-Bộ nhớ</a>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Large Promo Card -->
                    <div class="col-span-1 md:col-span-2 bg-gray-100 p-6 rounded-lg flex flex-col justify-between">
                        <img src="img/Vourcher.jpg" alt="Voucher" class="rounded-lg w-full mb-4">
                        <div class="text-center">
                            <p class="text-lg font-bold">Săn E-Voucher 3TRIỆU chỉ với 500K.</p>
                            <p class="text-sm text-gray-600 mb-4">Áp dụng cho sản phẩm GIA DỤNG AI MỚI 2025</p>
                            <button class="bg-black text-white px-6 py-2 rounded-full">Mua ngay</button>
                        </div>
                    </div>

                    <!-- Product List -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center text-center space-y-4">
                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full self-start">Sale</span>
                            <img src="img/TabS10.png" alt="Galaxy Tab" class="w-40 h-40 rounded-lg">
                            <div>
                                <p class="font-semibold">Galaxy Tab S10 Ultra</p>
                                <p class="text-red-600">Ưu đãi 4TR</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center text-center space-y-4">
                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full self-start">Mới</span>
                            <img src="img/S25.png" alt="Galaxy S25" class="w-40 h-40 rounded-lg">
                            <div>
                                <p class="font-semibold">Galaxy S25 | S25+</p>
                                <p class="text-red-600">Ưu đãi 1 triệu</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center text-center space-y-4">
                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full self-start">Mới</span>
                            <img src="img/TLanh.png" alt="Tủ lạnh" class="w-40 h-40 rounded-lg">
                            <div>
                                <p class="font-semibold">Ưu đãi mở bán giá chỉ từ 41.5TR*</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col items-center text-center space-y-4">
                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full self-start">Mới</span>
                            <img src="img/Qled.png" alt="QLED TV" class="w-40 h-40 rounded-lg">
                            <div>
                                <p class="font-semibold">Mua kèm Galaxy Buds3 giảm 10% trên combo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Suggested Products Section -->
                <div class="mt-12">
                    <h2 class="text-3xl font-bold text-center mb-8">Gợi ý dành cho bạn</h2>
                    <div class="flex justify-center">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
                            <!-- Product 1 - Galaxy A16 -->
                            <div
                                class="bg-white p-4 rounded-lg border border-gray-200 shadow-md flex flex-col items-center">
                                <img src="img/A55.png" alt="Galaxy A16" class="w-32 h-32 object-contain mb-3">
                                <h3 class="font-bold text-lg mb-1">Galaxy A55 5G</h3>
                                <p class="text-sm text-gray-500 mb-2">Màu sắc: Đen Bóng</p>
                                <div class="flex justify-center space-x-6 mb-3 w-full">
                                    <div class="text-center border-r border-gray-200 pr-6">
                                        <p class="font-medium">128 GB</p>
                                        <p class="text-xs text-gray-500">8 GB</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-medium">256 GB</p>
                                        <p class="text-xs text-gray-500">8 GB</p>
                                    </div>
                                </div>
                                <div class="text-center w-full mb-3">
                                    <p class="text-xs text-gray-500 line-through">9.990.000₫</p>
                                    <p class="text-xs text-blue-600">Chiết khấu 1.500.000₫</p>
                                    <p class="text-lg font-bold text-red-600">8.490.000₫</p>
                                </div>
                                <button class="bg-black text-white w-full py-2 rounded-full mt-auto">Mua ngay</button>
                            </div>

                            <!-- Product 2 - Galaxy Fit3 -->
                            <div
                                class="bg-white p-4 rounded-lg border border-gray-200 shadow-md flex flex-col items-center">
                                <img src="img/Watch7.png" alt="Galaxy Fit3" class="w-32 h-32 object-contain mb-3">
                                <h3 class="font-bold text-lg mb-1">Galaxy Watch 7</h3>
                                <p class="text-sm text-gray-500 mb-2">Màu sắc: Xanh</p>
                                <div class="text-center w-full mb-3">
                                    <p class="text-xs text-gray-500 line-through">7.990.000₫</p>
                                    <p class="text-xs text-blue-600">Chiết khấu 2.000.000₫</p>
                                    <p class="text-lg font-bold text-red-600">5.990.000₫</p>
                                </div>

                                <button class="bg-black text-white w-full py-2 rounded-full">Mua ngay</button>
                            </div>

                            <!-- Product 3 - Crystal UHD TV -->
                            <div
                                class="bg-white p-4 rounded-lg border border-gray-200 shadow-md flex flex-col items-center">
                                <img src="img/TV.png" alt="Crystal UHD TV" class="w-32 h-32 object-contain mb-3">
                                <h3 class="font-bold text-lg mb-1">43 Inch Crystal UHD DU7000</h3>
                                <p class="text-xs text-gray-500 mb-2">4K Smart TV (2024)</p>

                                <div class="flex flex-col items-center mb-3 w-full">
                                    <p class="text-xs text-gray-500 mb-1">Kích thước:</p>
                                    <div class="flex space-x-2">
                                        <button
                                            class="w-8 h-8 rounded-full border border-gray-300 text-xs flex items-center justify-center">43</button>
                                        <button
                                            class="w-8 h-8 rounded-full border border-gray-300 text-xs flex items-center justify-center">50</button>
                                        <button
                                            class="w-8 h-8 rounded-full border border-gray-300 text-xs flex items-center justify-center">55</button>
                                        <button
                                            class="w-8 h-8 rounded-full border border-gray-300 text-xs flex items-center justify-center">65</button>
                                    </div>
                                </div>

                                <div class="text-center w-full mb-3">
                                    <p class="text-xs text-gray-500 line-through">9.900.00₫</p>
                                    <p class="text-xs text-blue-600">Chiết khấu 3.410.00₫</p>
                                    <p class="text-lg font-bold text-red-600">6.490.000₫</p>
                                </div>

                                <button class="bg-black text-white w-full py-2 rounded-full">Mua ngay</button>
                            </div>

                            <!-- Product 4 - Galaxy Tab A9 -->
                            <div
                                class="bg-white p-4 rounded-lg border border-gray-200 shadow-md flex flex-col items-center">
                                <img src="img/TabFe.png" alt="Galaxy Tab A9" class="w-32 h-32 object-contain mb-3">
                                <h3 class="font-bold text-lg mb-1">Galaxy Tab S9 FE 5G</h3>
                                <p class="text-sm text-gray-500 mb-2">Màu sắc: Xám</p>
                                <div class="flex justify-center space-x-6 mb-3 w-full">
                                    <div class="text-center border-r border-gray-200 pr-6">
                                        <p class="font-medium">64 GB</p>
                                        <p class="text-xs text-gray-500">8 GB</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-medium">128 GB</p>
                                        <p class="text-xs text-gray-500">8 GB</p>
                                    </div>
                                </div>

                                <div class="text-center w-full mb-3">
                                    <p class="text-xs text-gray-500 line-through">12.990.000₫</p>
                                    <p class="text-xs text-blue-600">Chiết khấu 4.000.000₫</p>
                                    <p class="text-lg font-bold text-red-600">8.990.000₫</p>
                                </div>

                                <button class="bg-black text-white w-full py-2 rounded-full">Mua ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 mb-8">
                <!-- Column 1 -->
                <div>
                    <h3 class="font-bold text-lg mb-4">Sản phẩm</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Điện thoại</a></li>
                        <li><a href="#" class="hover:text-blue-400">TV & AV</a></li>
                        <li><a href="#" class="hover:text-blue-400">Thiết bị gia dụng</a></li>
                        <li><a href="#" class="hover:text-blue-400">Máy tính</a></li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div>
                    <h3 class="font-bold text-lg mb-4">Mua sắm</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Khuyến mãi</a></li>
                        <li><a href="#" class="hover:text-blue-400">Sản phẩm mới</a></li>
                        <li><a href="#" class="hover:text-blue-400">Bán chạy</a></li>
                    </ul>
                </div>

                <!-- Column 3 -->
                <div>
                    <h3 class="font-bold text-lg mb-4">Hỗ trợ</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Trung tâm bảo hành</a></li>
                        <li><a href="#" class="hover:text-blue-400">Hướng dẫn mua hàng</a></li>
                        <li><a href="#" class="hover:text-blue-400">Liên hệ</a></li>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div>
                    <h3 class="font-bold text-lg mb-4">Doanh nghiệp</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Giới thiệu</a></li>
                        <li><a href="#" class="hover:text-blue-400">Tin tức</a></li>
                        <li><a href="#" class="hover:text-blue-400">Tuyển dụng</a></li>
                    </ul>
                </div>

                <!-- Column 5 - Contact -->
                <div>
                    <h3 class ="font-bold text-lg mb-4">Liên hệ</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Email: support@samsung.com</a></li>
                        <li><a href="#" class="hover:text-blue-400">Hotline: 1234-567-890</a></li>
                        <li><a href="#" class="hover:text-blue-400">Địa chỉ: Cần Thơ, Việt Nam</a></li>
                    </ul>
                </div>
            </div>

            <!-- Social Media & Copyright -->
            <div class="border-t border-gray-700 pt-6 text-center">
                <div class="flex justify-center space-x-4 mb-4">
                    <a href="#" class="text-xl hover:text-blue-400"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-xl hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-xl hover:text-blue-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-xl hover:text-blue-400"><i class="fab fa-youtube"></i></a>
                </div>
                <p class="text-gray-500 text-sm">&copy; 2025 Samsung Vietnam. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper
        var swiper = new Swiper('.main-slider', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        var featuredSwiper = new Swiper('.featured-products', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
            },
        });

        // Mobile Menu Toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
