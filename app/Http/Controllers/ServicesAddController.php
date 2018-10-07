<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;

class ServicesAddController extends Controller
{
    //
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|max:100',
                'icon' => 'required|max:100',
                'text' => 'required'
            ];
            $attributeNames = [
                'name' => '"Название"'
            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);
            $validator->validate();

            $service = new Service($request->all());
            if ($service->save()) {
                return redirect('admin')->with('status', 'Сервис добавлен');
            }
        }

        if (view()->exists('admin.services_add')) {
            return view('admin.services_add', [
                'title' => 'Новый сервис'
            ]);
        }

        abort(404);
    }
}
