<?php

namespace Hillel\Src\Models;

use Illuminate\Http\RedirectResponse;

class Validator
{
    static public function validation($request,array $settings)
    {
        $validator = validator()->make($request, $settings);
        if($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['request'] = $request;
        }

        return $request;
    }
}

