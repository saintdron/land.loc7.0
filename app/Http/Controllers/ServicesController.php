<?php

namespace App\Http\Controllers;

use App\Service;

class ServicesController extends Controller
{
    //
    public function execute()
    {
        if (view()->exists('admin.services')) {
            return view('admin.services', [
                'title' => 'Сервисы',
                'services' => Service::all()
            ]);
        }

        abort(404);
    }
}
