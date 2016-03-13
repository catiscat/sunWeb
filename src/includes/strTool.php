<?php
    /**
     *用于判断某字符串是否以特定字符串开头。
     *@param  $haystack  #被检测字符串
     *@param  $needle  #特定字符串
     *@return  boolean  #true则是开头，否则false
     */
    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }
    /**
     *用于判断某字符串是否以特定字符串结尾。
     *@param $haystack #被检测字符串
     *@param $needle  #特定字符串
     *@return boolean #true则是结尾，否则false
     */
    function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }
?>