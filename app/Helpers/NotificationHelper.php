<?php

namespace App\Helpers;

class NotificationHelper
{
    public static function success($message)
    {
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Success!',
            'text' => $message,
        ]);
    }

    public static function error($message)
    {
        session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Error!',
            'text' => $message,
        ]);
    }
}
