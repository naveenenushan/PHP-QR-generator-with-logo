# PHP-QR-generator-with-logo

# Usage

include(APPPATH . 'libraries/QRLibrary/qr_make.php');


    $qr_obg= new qr_make();

    $qr_name=$qr_obg->getImageOFQR('QWD1234');

# Update logo path
    
    $logo =  base_url('assets/uploads/1x/qrLOGO.jpg');
