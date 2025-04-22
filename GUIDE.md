# cách chạy project

- Clone project lưu vào file htdocs trong Xampp
- tạo Databae (phpmyadmin) hung-test - utf8mb4_general_ci
- cấu hinh DB trong app/config/Database.php (user name, password) 
- chạy "php spark migrate" de tao table
- chạy "php spark db:seed DatabaseSeeder" de tao seeder
- chạy trên client url: http://localhost/hung-test/ để start project
note: có thể vào app/config/App.php chỉnh lại baseurl khác theo theo mong muốn
  "public string $baseURL = 'http://localhost/hung-test/';"