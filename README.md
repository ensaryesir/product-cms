# Ürün Yönetim Sistemi | Product CMS

Bu proje, ürünlerin, ürün detaylarının, ürün görsellerinin ve indirimlerinin yönetilebildiği bir içerik yönetim sistemidir.

This project is a content management system where products, product details, product images, and discounts can be managed.

## 🚀 Özellikler | Features

- Ürün ekleme, düzenleme, silme ve listeleme | Add, edit, delete and list products
- Ürün detaylarının yönetimi | Product details management
- Ürün görselleri yükleme ve yönetme | Upload and manage product images
- İndirim tanımlama ve yönetme | Define and manage discounts
- Kullanıcı dostu arayüz | User-friendly interface

## 📋 Gereksinimler | Requirements

- PHP >= 7.4
- MySQL >= 5.7
- Apache/Nginx Web Server
- Composer
- WAMP/XAMPP (For local development)

## 💻 Kurulum | Installation

1. Projeyi klonlayın | Clone the project:
```bash
git clone https://github.com/ensaryesir/product-cms.git
cd product-cms
```

2. Veritabanını oluşturun | Create database:
- MySQL veritabanı sunucunuzda yeni bir veritabanı oluşturun | Create a new database on your MySQL server
- `db/create_product_cms.sql` dosyasını kullanarak tabloları oluşturun | Create tables using the file

3. Konfigürasyon | Configuration:
- `application/config/database.php` dosyasını düzenleyerek veritabanı bağlantı bilgilerinizi girin | Enter your database connection information
- `application/config/config.php` dosyasında gerekli ayarlamaları yapın | Make necessary adjustments

4. Web sunucusu yapılandırması | Web server configuration:
- Document root dizinini proje klasörüne yönlendirin | Direct document root to project folder
- URL yeniden yazma (rewrite) modülünün aktif olduğundan emin olun | Ensure URL rewrite module is active

## 📁 Proje Yapısı | Project Structure

```
product-cms/
├── application/
│   ├── controllers/    # Controller files
│   ├── models/        # Model files
│   ├── views/         # View files
│   ├── config/        # Configuration files
│   └── ...
├── db/                # Database files
└── ...
```

## 🔧 Kullanım | Usage

1. Ürün Yönetimi | Product Management:
   - Yeni ürün ekleme | Add new product
   - Mevcut ürünleri düzenleme | Edit existing products
   - Ürün silme | Delete product
   - Ürün listesini görüntüleme | View product list

2. Ürün Detayları | Product Details:
   - Ürün özelliklerini tanımlama | Define product features
   - Teknik detayları ekleme | Add technical details

3. Ürün Görselleri | Product Images:
   - Çoklu görsel yükleme | Multiple image upload
   - Görsel sıralama | Image ordering
   - Ana görsel belirleme | Set main image

4. İndirim Yönetimi | Discount Management:
   - İndirim oluşturma | Create discount
   - İndirim süresini belirleme | Set discount duration
   - İndirim oranı tanımlama | Define discount rate

## 🛠️ Kullanılan Teknolojiler | Built With

- PHP
- MySQL
- JavaScript
- Bootstrap
- HTML/CSS

## 🤝 Katkıda Bulunma | Contributing

1. Fork edin | Fork it
2. Feature branch oluşturun | Create feature branch (`git checkout -b feature/amazing-feature`)
3. Değişikliklerinizi commit edin | Commit changes (`git commit -m 'feat: Add amazing feature'`)
4. Branch'inizi push edin | Push branch (`git push origin feature/amazing-feature`)
5. Pull Request oluşturun | Create Pull Request

## 📝 Lisans | License

Bu proje MIT lisansı altında lisanslanmıştır. | This project is licensed under the MIT License.

## 👨‍💻 Geliştirici | Developer

Ensar Yesir

## 📞 İletişim | Contact

- GitHub: [@ensaryesir](https://github.com/ensaryesir)
- LinkedIn: [ensar-yesir](https://linkedin.com/in/ensar-yesir)
- E-mail: yesirensar@gmail.com
