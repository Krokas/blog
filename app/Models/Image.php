<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'average_color'
    ];

    public static function getAverageColor(UploadedFile $img) {
        $img = @imagecreatefromstring(file_get_contents($img->getRealPath()));
        $x = imagesx($img);
        $y = imagesy($img);
        $tmp_img = ImageCreateTrueColor(1,1);
        ImageCopyResampled($tmp_img,$img,0,0,0,0,1,1,$x,$y);
        $rgb = ImageColorAt($tmp_img,0,0);
        $r   = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b  =  $rgb & 0xFF;
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return $hex;
    }
}
