# 🏫 Website Informasi Sekolah Dasar Pondok Gede

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)

**Platform informasi lengkap untuk sekolah dasar di wilayah Pondok Gede**

[Demo Live](#) | [Dokumentasi](#dokumentasi) | [Kontribusi](#kontribusi)

</div>

## 📋 Deskripsi

Website Informasi Sekolah Dasar Pondok Gede adalah platform digital yang menyediakan informasi lengkap tentang sekolah-sekolah dasar di wilayah Pondok Gede. Website ini dirancang untuk membantu orang tua, siswa, dan masyarakat dalam mencari informasi terkait pendidikan dasar di area tersebut.

## ✨ Fitur Utama

🎯 **Pencarian Sekolah**: Temukan sekolah dasar berdasarkan lokasi, akreditasi, dan fasilitas
📍 **Peta Interaktif**: Visualisasi lokasi sekolah dengan Google Maps integration
📊 **Profil Lengkap**: Informasi detail setiap sekolah termasuk fasilitas dan program unggulan
📱 **Responsive Design**: Akses optimal di desktop, tablet, dan mobile
🔍 **Filter & Sorting**: Pencarian advanced dengan berbagai kriteria
📈 **Dashboard Admin**: Panel admin untuk mengelola data sekolah
📧 **Kontak Langsung**: Informasi kontak dan formulir inquiry
⭐ **Rating & Review**: Sistem penilaian dari orang tua dan siswa

## 🛠️ Tech Stack

```
Frontend:
├── HTML5 - Struktur halaman
├── CSS3 - Styling dan layout responsive
└── JavaScript - Interaktivitas dan AJAX

Backend:
├── PHP 7.4+ - Server-side logic
├── MySQL - Database management
└── Apache/Nginx - Web server

Libraries & Frameworks:
├── Bootstrap 5 - UI Framework
├── jQuery - DOM manipulation
├── Chart.js - Data visualization
├── Leaflet/Google Maps API - Maps integration
└── SweetAlert2 - Modern alerts
```


## 🚀 Instalasi & Setup

### Prerequisites
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau MariaDB
- Apache/Nginx web server
- Composer (optional)

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/username/sekolah-dasar-pondok-gede.git
cd sekolah-dasar-pondok-gede
```

2. **Database Setup**
```bash
# Import database
mysql -u username -p database_name < database/sekolah_dasar.sql
```

3. **Konfigurasi Database**
```php
// config/database.php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'sekolah_dasar_db');
```

4. **Setup Web Server**
```bash
# Untuk Apache, pastikan mod_rewrite aktif
sudo a2enmod rewrite
sudo systemctl restart apache2
```

5. **Akses Website**
```
http://localhost/sekolah-dasar-pondok-gede
```

## 🖥️ Screenshots

<div align="center">

### Homepage
![Homepage](screenshots/homepage.png)

### Daftar Sekolah
![Daftar Sekolah](screenshots/sekolah-list.png)

### Detail Sekolah
![Detail Sekolah](screenshots/sekolah-detail.png)

### Peta Interaktif
![Peta](screenshots/maps.png)

</div>

## 🎨 Fitur CSS Modern

- **Flexbox & Grid Layout**: Layout modern dan responsive
- **CSS Variables**: Konsistensi theme dan mudah customize
- **Animations**: Smooth transitions dan hover effects
- **Dark Mode**: Toggle tema gelap/terang
- **Mobile-First Design**: Optimized untuk perangkat mobile

```css
/* Contoh CSS Variables */
:root {
  --primary-color: #3498db;
  --secondary-color: #2ecc71;
  --accent-color: #e74c3c;
  --text-color: #2c3e50;
  --bg-color: #ecf0f1;
}
```

## ⚡ JavaScript Features

- **ES6+ Syntax**: Modern JavaScript features
- **AJAX Requests**: Dynamic content loading
- **Interactive Maps**: Real-time location display
- **Form Validation**: Client-side validation
- **Search Functionality**: Live search dengan debouncing

```javascript
// Contoh Live Search
const searchInput = document.getElementById('searchSchool');
const debounce = (func, wait) => {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};

searchInput.addEventListener('input', debounce(searchSchools, 300));
```

## 📱 Responsive Breakpoints

```css
/* Mobile First Approach */
/* Small devices (phones, 576px and down) */
@media (max-width: 575.98px) { }

/* Medium devices (tablets, 768px and down) */
@media (max-width: 767.98px) { }

/* Large devices (desktops, 992px and down) */
@media (max-width: 991.98px) { }

/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) { }
```

## 🔐 Keamanan

- **SQL Injection Protection**: Prepared statements
- **XSS Prevention**: Input sanitization
- **CSRF Protection**: Token validation
- **Password Hashing**: Secure password storage
- **Session Management**: Secure session handling

## 📊 Database Schema

```sql
-- Tabel Utama
sekolah (
  id, nama_sekolah, alamat, telepon, 
  email, website, akreditasi, 
  jumlah_siswa, fasilitas, 
  latitude, longitude, foto_sekolah
)

program_unggulan (
  id, sekolah_id, nama_program, 
  deskripsi, created_at
)

fasilitas_sekolah (
  id, sekolah_id, nama_fasilitas, 
  kondisi, jumlah
)

rating_review (
  id, sekolah_id, nama_reviewer, 
  rating, review, created_at
)
```


## 🔧 Kustomisasi

### Mengubah Theme Color
```css
/* assets/css/style.css */
:root {
  --primary-color: #your-color;
  --secondary-color: #your-secondary;
}
```

### Menambah Fitur Baru
1. Buat file PHP di folder `pages/`
2. Tambahkan route di `index.php`
3. Update navbar di `includes/navbar.php`

## 🤝 Kontribusi

Kami menyambut kontribusi dari developer lain! Silakan:

1. Fork repository ini
2. Buat branch feature (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### Guidelines Kontribusi
- Ikuti coding standard PHP PSR-4
- Tulis komentar yang jelas
- Test fitur sebelum submit
- Update dokumentasi jika diperlukan

## 🐛 Bug Reports & Feature Requests

Gunakan [GitHub Issues](https://github.com/username/sekolah-dasar-pondok-gede/issues) untuk:
- 🐛 Melaporkan bug
- 💡 Request fitur baru  
- 📖 Pertanyaan dokumentasi
- 💬 Diskusi pengembangan

## 📝 Changelog

### v1.2.0 (2024-01-15)
- ✨ Tambah fitur rating & review
- 🗺️ Integrasi Google Maps
- 📱 Improved mobile responsiveness
- 🔍 Enhanced search functionality

### v1.1.0 (2023-12-20)
- 🎨 Dark mode toggle
- 📊 Dashboard admin
- 🔐 Security improvements
- 🐛 Bug fixes

### v1.0.0 (2023-11-30)
- 🎉 Initial release
- 📋 Basic CRUD functionality
- 🎯 Search & filter features
- 📱 Responsive design

## 📄 Lisensi

Project ini dilisensikan under MIT License - lihat file [LICENSE](LICENSE) untuk detail.

## 👨‍💻 Developer

<div align="center">

**[Nama Developer]**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/username)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/username)
[![Email](https://img.shields.io/badge/Email-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:email@example.com)

</div>

## 🙏 Acknowledgments

- Bootstrap team untuk framework CSS
- Google Maps API
- Font Awesome untuk icons
- Komunitas PHP Indonesia
- Seluruh kontributor project

---

<div align="center">

**⭐ Jika project ini membantu, jangan lupa berikan star!**

Made with ❤️ for education in Pondok Gede

</div>
