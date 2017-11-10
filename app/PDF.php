<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10-13-15
 * Time: 09:42 PM
 */

namespace App;
use DOMPDF;
class PDF {
    protected static $configured=false;

    public static function configure()
    {

        if(static::$configured) return;
        // disable DOMPDF's internal autoloader if you are using Composer
        define('DOMPDF_ENABLE_AUTOLOAD', false);

        // include DOMPDF's default configuration
        require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';
        static::$configured=true;
    }


    public static function render($file,$html){

        static::configure();
        // muestro el pdf
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("$file.pdf",array('Attachment'=>0));

    }
} 