<?php
class ProductImage extends CI_Model {
    public function __construct() {
        parent::__construct(); // CI_Model yapıcısını çağır
        $this->load->database(); // Veritabanı bağlantısını yükle
    }

    /**
     * Ürün resmi ekleme fonksiyonu
     * @param array $data - product_id ve image_path içermelidir
     * @return bool - Başarı durumunu döndürür
     */
    public function set_product_image($data) {
        // Girdi doğrulama
        if (isset($data['product_id'], $data['image_path'])) {
            // Dosya uzantısından MIME türünü belirle
            $data['image_type'] = $this->get_mime_type($data['image_path']);

            // Veritabanına ekleme yap
            return $this->db->insert('product_images', $data);
        }

        // Eksik veya hatalı veri durumunda false döndür
        return false;
    }

    /**
     * Dosya uzantısından MIME türünü belirleme
     * @param string $file_path - Dosya yolu
     * @return string - MIME türü
     */
    private function get_mime_type($file_path) {
        $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        $mime_types = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'webp' => 'image/webp',
        ];

        // Bilinmeyen türler için varsayılan MIME türü döndür
        return isset($mime_types[$extension]) ? $mime_types[$extension] : 'application/octet-stream';
    }
}
