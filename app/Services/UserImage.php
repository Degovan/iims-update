<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;

class UserImage
{
    public static function upload(UploadedFile $photo): string
    {
        $path = public_path('assets/images/users');
        $name = time() . '_'. random_int(1, 999);
        $name = $name . '.' . $photo->getClientOriginalExtension();

        $photo->move($path, $name);
        return $name;
    }
}
