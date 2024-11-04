Ini hanya Backend tidak ada Front-End
Jika ingin menjalankan docker perlu install docker desktop, bisa download di
https://www.docker.com/products/docker-desktop/

pastikan sudah menjalankan aplikasi docker di windows

pastinkan set seperti ini gunakan XAMPP, database bisa disesuaikan
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=cuaca_database
DB_USERNAME=root
DB_PASSWORD=

jalankan php artisan migrate (karena database berada di luar container maka perlu menjalankan migrate)
jalankan projek dengan docker menggunakan perintah docker compose up -d

cek apakah laravel berjalan di http://localhost:8080  (port yang digunakan docker http gunakan adalah 8080)
endpoint yang tersedia :
GET,POST
/api/users (http://localhost:8080/api/users)
GET,POST
/api/sensors (http://localhost:8080/api/sensors)
GET,POST
/api/sensordata (http://localhost:8080/api/sensordata)

jika berhasil berarti docker tahap development berhasil di jalankan.
