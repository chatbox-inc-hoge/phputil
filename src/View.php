<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/28
 * Time: 8:20
 */

namespace Chatbox;


class View {

    static public function render($fileName,array $data = []){
        return static::process_file($fileName,$data);
    }

    static protected function process_file($fileName,array $data)
    {
        $clean_room = function($__file_name, array $__data){
            extract($__data, EXTR_REFS);
            ob_start();
            try{
                include $__file_name;
            }
            catch (\Exception $e){
                // Delete the output buffer
                ob_end_clean();
                // Re-throw the exception
                throw $e;
            }
            // Get the captured output and close the buffer
            return ob_get_clean();
        };
        return $clean_room($fileName, $data);
    }

} 