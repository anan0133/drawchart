<?php
namespace App\Helper;
use Illuminate\Support\Facades\Storage;
use Image;

class Upload
{
    /**
     * [Helper] support upload thumbnail to serve
     * @param file $file image file
     * @param string $old_file_name name old file will be delete
     * @return null: failed | string: success
     */
    public static function Thumbnail($file, $old_file_name = null)
    {
        $type = 'file/images';
        $thumbnail_file = null;

        $file_name = null;
        $thumbnail_path = null;

        $now = \Carbon\Carbon::now()->format('Y/m/d');
        /**
         * condition
         * [TRUE] store thumbnail
         * [FALSE] get default img
         */
        if ($file) {
            try {
                // store img
                $file_name = '/' . $file->store($type . '/' . $now);
                // delete old img
                if ($old_file_name != null && $file_name != null && $old_file_name ) {
                    Storage::delete($old_file_name);
                }
                $thumbnail_file = $file_name;

            } catch (\Exception $e) {
                \Log::error($e);
            }
        } else if (!$old_file_name) {
            $thumbnail_file = null;
        } else {
            return $old_file_name;
        }

        return $thumbnail_file;
    }

    
    public static function AddAvatar($file, $old_file_name = null)
    {
        $type = 'file/avatar';
        $file_name = null;
        /**
         * condition
         * [TRUE] store thumbnail
         * [FALSE] get default img
         */
        if ($file) {
            try {
                // store img
                $file_name = '/' . $file->store($type);
                // delete old img
                if ($old_file_name != null && $file_name != null) {
                    Storage::delete($old_file_name);
                }
            } catch (\Exception $e) {
                \Log::error($e);
            }
        }
        return $file_name;
    }

    /**
     * [Helper] support upload thumbnail to serve
     * @param file $file image file
     * @param string $old_file_name name old file will be delete
     * @return null: failed | string: success
     */
    public static function Image($file)
    {
        $type = 'file/chart/';
        $file_name = null;
        $now = \Carbon\Carbon::now()->format('Y/m/d');
        /**
         * condition
         * [TRUE] store thumbnail
         * [FALSE] get default img
         */
        if ($file) {
            try {
                // store img
                $file_name = '/' . $file->store($type . '/' . $now);
            } catch (\Exception $e) {
                \Log::error($e);
            }
        } else {
            $file_name = null;
        }
        return $file_name;
    }
}

?>
