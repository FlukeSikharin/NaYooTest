ข้อที่1 " ใช้ flowgorithm ในการทำงาน" 

ข้อที่ 2-4
1. สามารถ clone project ได้ด้วยคำสั่ง
git clone https://github.com/FlukeSikharin/NaYooTest.git

2. หลังจากนั้น ใช้คำสั่ง cd เพื่อเข้าไปไฟล์ project
cd NaYooTest

3. ใช้คำสั่งติดตั้ง composer 
composer global require laravel/installer

4.ติดตั้ง npm
npm install 
npm run dev

5.คัดลอกไฟล์ .env 
cp .env.example .env

6.เปลี่ยน name (DB_DATABASE) ในไฟล์ .env ให้เท่ากับ nayootest

7.ใช้คำสั่ง
php artisan key:generate

8.ใช้คำสั่ง
php artisan migrate

9.ใช้คำสั่ง
php artisan serve

10.ไปที่ localhost:8000