# stor_review
สร้างไฟล์ .env และแก้ไข password DB

ไฟล์ .env extends .env.example

# use command

composer require laravel/ui

# ข้อแนะนำ
	1. ลงฐานข้อมูลจาก Folder sql เท่านั้น เพราะตารางใน Migration Laravel ไม่ตรงกับ sql
	
	2. เปลี่ยนรหัสผ่านในการเชื่อมต่อกับฐานข้อมูล ในไฟล์ .env ให้ตรงกับฐานข้อมูลของท่าน
	
	3. User Admin คือ username : Admin Password : Superadmin
  
  
# รายละเอียดเกี่ยวกับโปรแกรม
	1. สามารถ register สมาชิกได้
	
	2. User Admin สามารถเพิ่ม ลบ แก้ไข้ สินค้าได้
	
	3. User Admin สามารถเพิ่ม Review สินค้าและลบ review ของ User คนอื่นได้
	
	4. User Normal สามารถเขียน review ได้ และลบได้เฉพาะแค่ review ตัวเอง
	
	5. มี Pagination ในส่วนของ List สินค้า และ review
