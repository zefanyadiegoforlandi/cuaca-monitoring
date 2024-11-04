Petunjuk Penggunaan
Deskripsi
Ini hanya Backend; tidak ada Front-End.

Persyaratan
Instal Docker Desktop:

Anda perlu menginstal Docker Desktop. Anda dapat mengunduhnya di sini.
Pastikan Docker Desktop sudah berjalan di Windows.
Pengaturan Database:

Jika Anda menggunakan XAMPP, pastikan database dalam .env Anda disesuaikan dengan konfigurasi berikut:
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=cuaca_database
DB_USERNAME=root
DB_PASSWORD=
Langkah-langkah Menjalankan Proyek
Jalankan Migrasi Database:

Jalankan perintah berikut untuk melakukan migrasi, karena database berada di luar container:
php artisan migrate
Jalankan Proyek dengan Docker:

Gunakan perintah berikut untuk menjalankan proyek dengan Docker:
docker compose up -d

Cek Aplikasi:
Periksa apakah Laravel berjalan dengan membuka URL berikut di browser:
arduino
Salin kode
http://localhost:8080
Port yang digunakan oleh Docker adalah 8080.
Endpoint yang Tersedia
GET, POST /api/users
URL: http://localhost:8080/api/users
GET, POST /api/sensors
URL: http://localhost:8080/api/sensors
GET, POST /api/sensordata
URL: http://localhost:8080/api/sensordata

Verifikasi
Jika semua langkah di atas berhasil, berarti tahap pengembangan(development) dengan Docker telah berhasil dijalankan.

