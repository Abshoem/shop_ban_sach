
# Laravel BookStore

## Api Document [tại đây](https://github.com/Abshoem/shop_ban_sach/wiki)
## Tài liệu dự án chi tiết [tại đây]([https://absheom-my.sharepoint.com/:w:/g/personal/zkeen_absheom_onmicrosoft_com/EcjXWJHXys5FjtnBgQT30fUB65Yq-5hYFEdCPbJNQmmKdA?e=a6qpjL](https://absheom-my.sharepoint.com/:b:/g/personal/zkeen_absheom_onmicrosoft_com/Ef6y89ypnChGjYPgDsHm8WgBKag17n7JZYbaSkCqaGXaQg?e=ds0eIQ))
## Mục Lục
- [Giới thiệu dự án](#giới-thiệu-dự-án)
- [Tính năng chính](#tính-năng-chính)
- [Công nghệ sử dụng](#công-nghệ-sử-dụng)
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Hướng dẫn cài đặt](#hướng-dẫn-cài-đặt)
- [Cấu hình dự án](#cấu-hình-dự-án)
- [Cấu trúc thư mục](#cấu-trúc-thư-mục)
- [Hướng dẫn sử dụng](#hướng-dẫn-sử-dụng)
- [Đóng góp](#đóng-góp)
- [Lời kết](#lời-kết)

## Giới thiệu dự án

**Laravel BookStore** là một ứng dụng website bán sách được xây dựng trên nền tảng Laravel nhằm cung cấp trải nghiệm mua sắm trực tuyến tiện lợi và an toàn. Mục tiêu của dự án là tạo ra một nền tảng thương mại điện tử chuyên nghiệp, cho phép người dùng duyệt, tìm kiếm và mua sách một cách dễ dàng. Các quản trị viên có thể dễ dàng quản lý sản phẩm, đơn hàng, người dùng và các thông tin liên quan qua giao diện quản trị thân thiện.

**Các mục đích chính của dự án:**
- **Tối ưu trải nghiệm người dùng:** Giao diện trực quan, responsive trên mọi thiết bị.
- **Bảo mật và tin cậy:** Ứng dụng được xây dựng với các tiêu chuẩn bảo mật cao.
- **Quản lý sản phẩm hiệu quả:** Cho phép quản lý danh mục sách, cập nhật thông tin chi tiết, hình ảnh, giá cả và khuyến mãi.
- **Quản lý đơn hàng và thanh toán:** Hỗ trợ quá trình thanh toán trực tuyến và quản lý đơn hàng từ lúc đặt hàng đến giao hàng.


## Tính năng chính

- **Đăng ký/Đăng nhập người dùng:** Cho phép người dùng đăng ký tài khoản và đăng nhập an toàn.
- **Quản lý danh mục sản phẩm:** Sắp xếp sách theo danh mục, tác giả, thể loại.
- **Tìm kiếm và lọc sản phẩm:** Tích hợp chức năng tìm kiếm .
- **Giỏ hàng và thanh toán:** Hỗ trợ thêm sản phẩm vào giỏ hàng, cập nhật số lượng và xử lý thanh toán .
- **Giao diện quản trị:** Quản trị viên có thể quản lý người dùng, đơn hàng, sản phẩm và xem báo cáo thống kê.

## Công nghệ sử dụng

Laravel Framework: Sử dụng phiên bản Laravel 8/9/10 (tùy theo cấu hình dự án).

PHP: Yêu cầu PHP 7.4 trở lên.

MySQL: Là hệ quản trị cơ sở dữ liệu chính.

Bootstrap: Xây dựng giao diện người dùng responsive, hiện đại.

Composer: Quản lý các gói thư viện PHP.

Node.js & NPM: Quản lý các gói frontend và biên dịch tài sản (assets).

Git: Quản lý phiên bản mã nguồn.

## Yêu cầu hệ thống

- **PHP:** 8.0 trở lên
- **Composer:** Phiên bản mới nhất
- **MySQL:** 5.7 trở lên (hoặc MariaDB)
- **Node.js & NPM:** Để quản lý các package cho frontend
- **Web Server:** Apache hoặc Nginx
  

## Hướng dẫn cài đặt

### 1. Clone dự án từ GitHub

*bash*
*git clone https://github.com/Abshoem/shop_ban_sach.git*

*cd Shopbansach*

### 2. Cài đặt Composer và các package PHP

*bash*

`composer install` 

### 3. Cài đặt các package NPM và build tài sản frontend

*bash*

`npm install
npm run dev` 

### 4. Cấu hình môi trường

Tạo file `.env` từ file mẫu `.env.example`:

bash


`cp .env.example .env` 

Cập nhật các thông tin cấu hình trong file `.env` như:

-   **APP_NAME:** Tên ứng dụng (ví dụ: Laravel BookStore)
-   **APP_URL:** URL của ứng dụng (ví dụ: http://localhost)
-   **DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD:** Thông tin kết nối cơ sở dữ liệu
-   **MAIL_***: Cấu hình mail nếu cần thiết
-   **CACHE_DRIVER, QUEUE_CONNECTION, SESSION_DRIVER:** Cấu hình hệ thống cache, hàng đợi và phiên làm việc

Tạo key ứng dụng:

bash


`php artisan key:generate` 

### 5. Thiết lập cơ sở dữ liệu

-   Tạo cơ sở dữ liệu mới theo tên bạn đã cấu hình trong file `.env`.
-   Chạy các migration:

bash

`php artisan migrate` 

_(Tuỳ chọn) Seed dữ liệu mẫu:_

bash

`php artisan db:seed` 

## Cấu hình dự án


bash

`php artisan storage:link` 

-   **Queues:** Nếu dự án sử dụng tính năng xử lý hàng đợi, hãy đảm bảo cấu hình driver cho queue (ví dụ: database, redis).

### Tùy chỉnh cấu hình nâng cao

-   **Tối ưu hóa hiệu năng:** Sử dụng cache, cấu hình opcache cho PHP.
-   **Bảo mật:** Cấu hình HTTPS, cài đặt các header bảo mật và các biện pháp bảo vệ chống lại các tấn công CSRF, XSS.
-   **API:** Nếu dự án cung cấp API, hãy tham khảo tài liệu của Laravel Sanctum hoặc Passport để triển khai xác thực API.

## Cấu trúc thư mục

Dự án Laravel có cấu trúc thư mục tiêu chuẩn như sau:

```plaintext
Shopbansach/
├── app/                 # Thư mục chứa mã nguồn chính của ứng dụng (Models, Controllers, Services)
├── bootstrap/           # Tập tin bootstrap cho ứng dụng
├── config/              # Các file cấu hình của ứng dụng
├── database/            # Migration, seeders và factories
├── public/              # Thư mục công khai (assets, index.php)
├── resources/           # View, assets chưa biên dịch (CSS, JS, images)
├── routes/              # Định nghĩa các routes cho web và API
├── storage/             # Lưu trữ file được tải lên, cache, logs
├── tests/               # Các file kiểm thử (unit tests, feature tests)
└── vendor/              # Các package được cài đặt thông qua Composer
```


Mỗi thư mục có vai trò cụ thể giúp tách biệt logic và tăng tính mở rộng của ứng dụng.

## Hướng dẫn sử dụng

### Đối với người dùng (Frontend)

-   **Trang chủ:** Hiển thị các sách danh mục sách.
-   **Tìm kiếm:** Sử dụng thanh tìm kiếm để tìm sách theo tên thể loại.
-   **Giỏ hàng:** Thêm sách vào giỏ hàng, cập nhật số lượng và xóa sản phẩm không cần thiết.
-   **Thanh toán:** Xử lý đơn hàng và thanh toán trực tuyến một cách an toàn.


### Đối với quản trị viên (Backend)

-   **Đăng nhập quản trị:** Đăng nhập vào trang quản trị để quản lý hệ thống.
-   **Quản lý sách:** Thêm, sửa, xoá sách, cập nhật thông tin và hình ảnh sản phẩm.
-   **Quản lý đơn hàng:** Xem, xử lý và theo dõi tình trạng đơn hàng.




## Đóng góp

Chúng tôi luôn hoan nghênh sự đóng góp từ cộng đồng nhằm cải thiện và mở rộng dự án. Nếu bạn muốn đóng góp, hãy tuân theo các bước sau:

1.  **Fork repository**
    
2.  **Tạo branch tính năng mới:**
    
    bash
    
    
    `git checkout -b feature/ten-tinh-nang` 
    
3.  **Commit thay đổi của bạn với mô tả rõ ràng:**
    
    bash

    
    `git commit -m "Thêm tính năng XYZ"` 
    
4.  **Push branch lên repository của bạn:**
    
    bash
    
    `git push origin feature/ten-tinh-nang` 
    
5.  **Mở Pull Request:**
    
    -   Mô tả chi tiết thay đổi của bạn và liên kết tới các vấn đề (issues) liên quan (nếu có).
    -   Chúng tôi sẽ xem xét và phản hồi trong thời gian sớm nhất.

## Tài liệu tham khảo & Liên hệ

-   **Tài liệu Laravel:** [Laravel Documentation](https://laravel.com/docs)
-   **Hướng dẫn cài đặt Composer:** [Composer Official](https://getcomposer.org)
-   **Bootstrap:** [Bootstrap Documentation](https://getbootstrap.com)
-   **Các bài viết liên quan:**
    -   Hướng dẫn sử dụng Laravel cho người mới bắt đầu
    -   Các best practices về bảo mật trong Laravel

Nếu có bất kỳ thắc mắc hay ý kiến đóng góp, vui lòng liên hệ qua email: [thangpka24@gmail.com] hoặc tạo issue trên repository GitHub.



## Lời kết

**Laravel BookStore** được xây dựng với mong muốn tạo ra một nền tảng mua sắm sách trực tuyến tiện ích, hiện đại và bảo mật cao. Chúng tôi hi vọng rằng dự án sẽ giúp ích cho những ai đang tìm kiếm giải pháp thương mại điện tử chất lượng. Cảm ơn bạn đã sử dụng và đóng góp cho dự án!

_Chúc bạn thành công với dự án Laravel Website bán sách của mình!_

