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
    quantity_unit ENUM('pieces', 'kg', 'liters', 'packs') NOT NULL COMMENT 'Ürün miktar birimi',
    extra_discount DECIMAL(10, 2) COMMENT 'Sepet ekstra indirim oranı',
    tax_rate DECIMAL(5, 2) COMMENT 'Ürünün vergi oranı (%)',
    sale_price_tl DECIMAL(10, 2) COMMENT 'Satış fiyatı (TL)',
    sale_price_usd DECIMAL(10, 2) COMMENT 'Satış fiyatı (USD)',
    sale_price_eur DECIMAL(10, 2) COMMENT 'Satış fiyatı (EUR)',
    second_sale_price DECIMAL(10, 2) COMMENT 'İkinci satış fiyatı (sadece TL)',
    deduct_from_stock BOOLEAN DEFAULT TRUE COMMENT 'Ürün satıldığında stoktan düşme durumu',
    status ENUM('active', 'inactive', 'pending') DEFAULT 'active' COMMENT 'Ürün durumu (aktif, pasif veya beklemede)',
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
    image_path VARCHAR(255) NOT NULL COMMENT 'Resim dosya yolu',
    image_type VARCHAR(50) NOT NULL COMMENT 'Resim dosya tipi (MIME type)',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati',
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) COMMENT='Ürün resimleri tablosu';

-- İndirimler tablosu
CREATE TABLE IF NOT EXISTS discounts (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Otomatik artan benzersiz kimlik numarası',
    product_id INT NOT NULL COMMENT 'Ürün kimlik numarası (foreign key)',
    customer_group ENUM('regular', 'vip', 'wholesale') NOT NULL COMMENT 'Müşteri grubu',
    discount_type ENUM('percentage', 'fixed') NOT NULL COMMENT 'İndirim türü (yüzde veya sabit fiyat)',
    discount_value_tl DECIMAL(10, 2) COMMENT 'İndirim değeri (TL)',
    discount_unit_tl ENUM('percentage', 'fixed') COMMENT 'İndirim birimi (TL)',
    discount_value_usd DECIMAL(10, 2) COMMENT 'İndirim değeri (USD)',
    discount_unit_usd ENUM('percentage', 'fixed') COMMENT 'İndirim birimi (USD)',
    discount_value_eur DECIMAL(10, 2) COMMENT 'İndirim değeri (EUR)',
    discount_unit_eur ENUM('percentage', 'fixed') COMMENT 'İndirim birimi (EUR)',
    priority INT(11) NOT NULL COMMENT 'Priority',
    start_date DATE NOT NULL COMMENT 'İndirim başlangıç tarihi',
    end_date DATE NOT NULL COMMENT 'İndirim bitiş tarihi',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma tarihi ve saati',
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) COMMENT='İndirimler tablosu';
