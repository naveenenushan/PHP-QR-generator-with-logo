<?php
/**
 * Created by PhpStorm.
 * User: imac
 * Date: 6/13/18
 * Time: 10:01 AM
 */

class qr_make
{

    function getImageOFQR($id){


        /*
         * php QR Generator
         * BY:Naveen Enushan
         */


        $data = base_url('Ticket?ref=').$id;
        $size = '200x200';
        $logo =  base_url('assets/uploads/1x/qrLOGO.jpg');

        $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
        if($logo !== FALSE){
            imagefilter($QR, IMG_FILTER_COLORIZE, 175, 209, 56);
            $logo = imagecreatefromstring(file_get_contents($logo));
            $QR_width = imagesx($QR);
            $QR_height = imagesy($QR);

            $logo_width = imagesx($logo);
            $logo_height = imagesy($logo);


            $logo_qr_width = $QR_width/4;
            $scale = $logo_width/$logo_qr_width;
            $logo_qr_height = $logo_height/$scale;

            imagecopyresampled($QR, $logo, $QR_width/3+10, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        }



        $save_path ='assets/uploads/Tickets_QR/';
        //chmod($save_path,0755);
        $path=$save_path.$id.'.png';

        imagepng($QR, $path, 0, NULL);
        //imagepng($QR);
        imagedestroy($QR);

        return (base_url($path));

    }



}