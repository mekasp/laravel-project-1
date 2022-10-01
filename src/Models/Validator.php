<?php

namespace Hillel\Src\Models;

use Illuminate\Http\RedirectResponse;

class Validator
{
    static public function validation(array $settings)
    {
        $request = request()->all();

        $validator = validator()->make($request, $settings);
        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['request'] = $request;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        return $request;
    }
}

