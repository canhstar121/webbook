<?php
namespace App\Helpers;

use App\Models\Category;
use Intervention\Image\Facades\Image;

class CategoriesHelper
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function dataTree($parentId, $id = 0, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->html .= '<option selected value="' . $value->id . '"> ' . $text . $value['name'] . ' </option>';
                } else {
                    $this->html .= '<option value="' . $value->id . '"> ' . $text . $value['name'] . ' </option>';
                }
                $this->dataTree($parentId, $value['id'], $text . ' - - ');
            }
        }
        return $this->html;
    }

    public function ImageResize($file, $folder, $width = 350, $height = 449)
    {
        if (is_array($file) == 1) {
            $arr = [];
            foreach ($file as $image) {
                $name = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize($width, $height);
                // $image_resize->text('BOOKSTORE', 200, 330, function ($font) {
                //     $font->file(public_path('Admin/fonts/TheBlacklist.ttf'));
                //     $font->size(20);
                //     // $font->color('#e1e1e1');
                //     $font->color([255, 255, 255, 0.5]);
                //     $font->align('right');
                //     $font->valign('top');
                //     $font->angle(30);
                // });
                $image_resize->save(public_path('uploads/' . $folder . '/' . $name));
                $arr[] = $name;
            }
            return implode('|', $arr);
        } else {

            $image = $file;
            $name = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize($width, $height);
            // $image_resize->text('BOOKSTORE', 200, 330, function ($font) {
            //     $font->file(public_path('Admin/fonts/TheBlacklist.ttf'));
            //     $font->size(20);
            //     $font->color([255, 255, 255, 0.5]);
            //     $font->align('right');
            //     $font->valign('top');
            //     $font->angle(30);
            // });
            $image_resize->limitColors(255, '#ff9900');
            $image_resize->save(public_path('uploads/' . $folder . '/' . $name));

            return $name;
        }
    }

}
