-- Veritabanı oluşturma
CREATE DATABASE IF NOT EXISTS product_cms;
USE product_cms;

-- Ürünler tablosu
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Otomatik artan benzersiz kimlik numarası',
    product_title VARCHAR(255) NOT NULL COMMENT 'Ürün başlığı',
    product_additional_info_title VARCHAR(255) COMMENT 'Ürün ek bilgi başlığı',
    product_additional_info_description TEXT COMMENT 'Ürün ek bilgi açıklaması',
    meta_title VARCHAR(255) COMMENT 'Meta başlık',
    meta_keywords TEXT COMMENT 'Meta anahtar kelimeler',
    meta_description TEXT COMMENT 'Meta açıklama',
    seo_url VARCHAR(255) COMMENT 'SEO adresi (girilmezse otomatik oluşturulur)',
    product_description TEXT COMMENT 'Ürün açıklaması (geniş alan, farklı yazı tipleri, fotoğraflar vs. eklenebilir)',
    video_embed_code TEXT COMMENT 'Video embed kodu (Vimeo, Google Video, YouTube gibi)',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati'
) COMMENT='Ürünler tablosu';

-- Ürün detayları tablosu
CREATE TABLE IF NOT EXISTS product_details (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Otomatik artan benzersiz kimlik numarası',
    product_id INT NOT NULL COMMENT 'Ürün kimlik numarası (foreign key)',
    product_code VARCHAR(255) NOT NULL COMMENT 'Ürün kodu (hem sayılar hem harfler içerebilir)',
    quantity INT NOT NULL COMMENT 'Ürün miktarı (0 ise "stokta yok" olarak listelenir)',
    extra_discount DECIMAL(10, 2) COMMENT 'Sepet ekstra indirim oranı',
    tax_rate DECIMAL(5, 2) COMMENT 'Ürünün vergi oranı (%)',
    sale_price DECIMAL(10, 2) COMMENT 'Satış fiyatı (TL, $, Euro)',
    second_sale_price DECIMAL(10, 2) COMMENT 'İkinci satış fiyatı (sadece TL)',
    deduct_from_stock BOOLEAN DEFAULT TRUE COMMENT 'Ürün satıldığında stoktan düşme durumu',
    status BOOLEAN DEFAULT TRUE COMMENT 'Ürün durumu (aktif veya pasif)',
    feature_section BOOLEAN DEFAULT TRUE COMMENT 'Özellik bölümünün gösterilme durumu',
    new_product_validity DATE COMMENT 'Yeni ürün geçerlilik süresi (tarih)',
    sort_order INT COMMENT 'Ürün sıralama numarası',
    show_on_homepage INT COMMENT 'Anasayfada gösterim sırası (0 ise gösterilmez)',
    is_new BOOLEAN DEFAULT FALSE COMMENT 'Yeni ürün durumu',
    installment BOOLEAN DEFAULT FALSE COMMENT 'Taksit durumu',
    warranty_period INT COMMENT 'Garanti süresi (ay cinsinden)',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati',
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) COMMENT='Ürün detayları tablosu';

-- Ürün resimleri tablosu
CREATE TABLE IF NOT EXISTS product_images (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Otomatik artan benzersiz kimlik numarası',
    product_id INT NOT NULL COMMENT 'Ürün kimlik numarası (foreign key)',
    image_data LONGBLOB NOT NULL COMMENT 'Resim verisi',
    image_type VARCHAR(50) NOT NULL COMMENT 'Resim dosya tipi (MIME type)',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati',
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) COMMENT='Ürün resimleri tablosu';

-- Müşteri grupları tablosu
CREATE TABLE IF NOT EXISTS customer_groups (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Otomatik artan benzersiz kimlik numarası',
    group_name VARCHAR(255) NOT NULL COMMENT 'Müşteri grubu adı',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati'
) COMMENT='Müşteri grupları tablosu';

-- İndirimler tablosu
CREATE TABLE IF NOT EXISTS discounts (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Otomatik artan benzersiz kimlik numarası',
    customer_group_id INT NOT NULL COMMENT 'Müşteri grubu kimlik numarası (foreign key)',
    discount_type ENUM('percentage', 'fixed') NOT NULL COMMENT 'İndirim türü (yüzde veya sabit fiyat)',
    discount_value DECIMAL(10, 2) NOT NULL COMMENT 'İndirim değeri (yüzde oranı veya sabit fiyat)',
    currency ENUM('TL', 'USD', 'EUR') COMMENT 'Para birimi (TL, Dolar, Euro)',
    start_date DATE NOT NULL COMMENT 'İndirim başlangıç tarihi',
    end_date DATE NOT NULL COMMENT 'İndirim bitiş tarihi',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati',
    FOREIGN KEY (customer_group_id) REFERENCES customer_groups(id) ON DELETE CASCADE
) COMMENT='İndirimler tablosu';