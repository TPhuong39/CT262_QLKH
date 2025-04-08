<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | Samsung Vietnam</title>
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

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
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
                    <a href="#" class="text-gray-800 hover:text-blue-600" id="login-toggle">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                    <a>
                        <div id="login-dropdown"
                            class=" hidden absolute top-10 right-0 bg-white border border-gray-300 rounded shadow-lg mt-2 p-4">
                            <ul>
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
    <main>
        <!-- Registration Form -->
        <section class="py-12 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-6 text-center">Đăng nhập</h2>
                <div class="flex justify-center">
                    <form action="{{route('customer.loginpost')}}" method="POST"
                        class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                        @csrf
                        <div class="form-group">
                            <label for="KH_Email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email"name="KH_Email" required placeholder="Nhập email khách hàng"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                        </div>
                        <div class="form-group">
                            <label for="KH_MatKhau" class="block text-sm font-medium text-gray-700">Mật Khẩu</label>
                            <input type="password"name="KH_MatKhau" required
                                placeholder="Nhập mật khẩu"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

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
