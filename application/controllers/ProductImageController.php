<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property ProductImage $ProductImage
 * @property CI_Upload $upload
 */
class ProductImageController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ProductImage');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    /**
     * Ürün resmi yükleme işlemi
     */
    public function save() {
        if ($this->input->post()) {
            // Log the received data for debugging
            log_message('debug', 'Received data: ' . print_r($this->input->post(), true));

            // Yükleme klasörü ve ayarları
            $upload_path = FCPATH . 'uploads/';
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|webp'; // İzin verilen dosya türleri
            $config['max_size'] = 2048; // Maksimum dosya boyutu (2MB)
            $this->upload->initialize($config);

            // Dosya yükleme işlemi
            if (!$this->upload->do_upload('image_data')) {
                $error = $this->upload->display_errors();
                echo json_encode(['success' => false, 'error' => $error]);
            } else {
                // Yükleme başarılıysa dosya bilgilerini al
                $upload_data = $this->upload->data();
                
                // MIME türünü dosya uzantısından belirle
                $image_type = $this->ProductImage->get_mime_type($upload_data['file_name']);
                
                // Veritabanına kaydedilecek veri
                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'image_path' => 'uploads/' . $upload_data['file_name'],
                    'image_type' => $image_type, // MIME türü burada belirleniyor
                    'created_at' => date('Y-m-d H:i:s')
                );

                // Model üzerinden veriyi kaydet
                if ($this->ProductImage->set_product_image($data)) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Veritabanına kaydedilirken bir hata oluştu.']);
                }
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'No data received']);
        }
    }
}
