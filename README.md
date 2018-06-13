# PHP-QR-generator-with-logo

#usage

include(APPPATH . 'libraries/QRLibrary/qr_make.php');


    $qr_obg= new qr_make();

    $qr_name=$qr_obg->getImageOFQR('QWD1234');
