<?php
namespace App\Helper;

class BuildString
{
    /**
     * The limit string.
     */
    const NAME_USER = 30;
    const TITLE_CHART = 30;
    
    const END = '...';

    public static function initialPreviewConfig($type, $path, $url)
    {
        $fileName = class_basename($path);
        $fileType = pathinfo($path)['extension'];
        $string = [
                    'type' => $type,
                    'filetype' => $type.'/'.$fileType,
                    'caption' => $fileName,
                    'url' => $url,
                    'key' => $path
                    ];
        return $string;
    }

    public static function nameUser($str, $limit = self::NAME_USER)
    {
        return self::limit($str, $limit);
    }

    public static function titleChart($str, $limit = self::TITLE_CHART)
    {
        return self::limit($str, $limit);
    }

    protected static function limit($str, $limit)
    {
        $numBack = strlen($str) - $limit;
        if($numBack > strlen(self::END)) {

            $newPos = strrpos($str, ' ', -$numBack);
            return str_limit($str, $newPos + 1, $end = self::END);
        }
        return $str;
    }

    public static function Format($dateTime, $format = 'l d/m/Y')
    {
        return Carbon::parse($dateTime)->format($format);
    }
}

?>