<?php


/**
 *
 * PGDH - A simple wrapper to manipulate images using PHP-GD
 *
 * @author      Shyamin Ayesh (https://twitter.com/shyaminayesh)
 * @copyright   Copyright (c) 2019 Shyamin Ayesh
 *
 */


class pgdh {


    /**
     * We need to store the image resource data
     * in order to manipulate and do other things.
     */
    private $registry = array();


    /**
     * Here we list all the supported mime types
     * for PGDH to process and manipulate.
     */
    private $allowed_mime_types = array(
        'image/jpeg',
        'image/png'
    );



    // CONSTRUCTOR
    public function __construct($image) {


        /**
         * We need PHP-GD installed for this library to
         * work correctly.
         */
        if ( !extension_loaded('gd') ):
            throw new Exception("PHP-GD Extension not loaded.");
        endif;


        /**
         * We need to check if the resource file is a image
         * or not and then we need to verify loaded file is
         * a allowed file type PGDH to handle.
         */
        if ( !in_array( mime_content_type($image), $this->allowed_mime_types ) ):
            throw new Exception("PGDH can't handle provided resource file.");
        endif;


        /**
         * Create PHP-GD Object as per the mime_type
         * of provided resource file,
         */
        if ( mime_content_type($image) == 'image/jpeg' ):
            $this->registry['im'] = imagecreatefromjpeg($image);
        elseif ( mime_content_type($image) == 'image/png' ):
            $this->registry['im'] = imagecreatefrompng($image);
        endif;
    }



    // DESTRUCTOR
    public function __destruct() {
        imagedestroy($this->im);
    }



    /**
     * A helper for query data from registry
     */
    public function __get($key) {
        if ( isset($this->registry[$key]) ):
            return $this->registry[$key];
        else:
            return false;
        endif;
    }
}

?>
