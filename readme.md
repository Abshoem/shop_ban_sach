Website Bán Sách - Laravel Project

Giới thiệu

Dự án này là một website bán sách trực tuyến được xây dựng bằng Laravel. Website cho phép người dùng tìm sách, thêm vào giỏ hàng, thanh toán. Admin có thể quản lý loại sách, sản phẩm sách và đơn hàng của người dùng.

Tính năng chính

Người dùng (User)

Đăng ký, đăng nhập, đăng xuất (Laravel Breeze authentication)

Xem danh sách sách theo danh mục

Tìm kiếm sách theo từ khóa

Xem chi tiết sách

Thêm sách vào giỏ hàng

Đặt hàng và thanh toán

Theo dõi trạng thái đơn hàng

Cập nhật thông tin tài khoản

Quản trị viên (Admin)

Quản lý danh mục sách (Thêm/Sửa/Xóa)

Quản lý sách (Thêm/Sửa/Xóa)

Quản lý đơn hàng (Cập nhật trạng thái đơn hàng)



Công nghệ sử dụng

Laravel: Framework PHP mạnh mẽ để xây dựng backend

MySQL: Hệ quản trị cơ sở dữ liệu

Railway.app: Hosting database MySQL

Bootstrap/Tailwind CSS: Giao diện frontend

Blade Templates: Template engine của Laravel

Laravel Breeze: Xác thực người dùng

Middleware & Policies: Phân quyền người dùng

Cấu trúc thư mục

laravel-bookstore/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Chứa các Controller của ứng dụng
│   │   ├── Middleware/       # Middleware để xử lý request
│   ├── Models/               # Các Model tương ứng với bảng trong DB
│   ├── Policies/             # Phân quyền người dùng
├── bootstrap/                # Khởi tạo ứng dụng
├── config/                   # Các file cấu hình của Laravel
├── database/                 # Migrations, Seeders và Factories
├── resources/
│   ├── views/                # Các file Blade templates
│   ├── css/                  # File CSS (nếu có)
├── routes/
│   ├── web.php               # Routes cho giao diện web
│   ├── api.php               # Routes API
├── storage/                  # Thư mục chứa logs và uploaded files
├── public/                   # Chứa assets (CSS, JS, hình ảnh)
├── .env                      # File cấu hình môi trường
├── composer.json             # Danh sách package PHP
├── package.json              # Danh sách package frontend
├── artisan                   # CLI command của Laravel

Cài đặt và chạy dự án

Yêu cầu hệ thống

PHP >= 8.0

Composer

Node.js & npm

MySQL

Laravel

Các bước cài đặt

Clone repo:

git clone https://github.com/Abshoem/shop_ban_sach.git
cd Shopbanhang

Cài đặt các package PHP:

composer install

Cài đặt các package frontend:

npm install && npm run dev

Sao chép file .env.example thành .env:

cp .env.example .env

Tạo khóa ứng dụng Laravel:

php artisan key:generate

Cấu hình cơ sở dữ liệu trong .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=

Chạy migration và seed dữ liệu:

php artisan migrate --seed

Khởi động server:

php artisan serve

Truy cập http://127.0.0.1:8000 để xem trang web.

API Endpoints

Authentication

Method

Endpoint

Description

POST

/api/register

Đăng ký tài khoản

POST

/api/login

Đăng nhập

POST

/api/logout

Đăng xuất

Sách

Method

Endpoint

Description

GET

/api/books

Lấy danh sách sách

GET

/api/books/{id}

Lấy thông tin sách

Giỏ hàng & Đặt hàng

Method

Endpoint

Description

POST

/api/cart

Thêm sách vào giỏ hàng

GET

/api/cart

Xem giỏ hàng

POST

/api/checkout

Đặt hàng

Tài khoản mẫu

Admin:

Email: admin@example.com

Mật khẩu: admin123

User:

Email: user@example.com

Mật khẩu: user123

Phân quyền

Người dùng chỉ có thể xem và mua sách.

Admin có thể thêm, sửa, xóa sách và quản lý đơn hàng.

Đóng góp

Nếu bạn muốn đóng góp cho dự án, vui lòng fork repository, tạo một branch mới, commit thay đổi và gửi pull request.

Giấy phép

Dự án này được phát hành dưới giấy phép MIT.

