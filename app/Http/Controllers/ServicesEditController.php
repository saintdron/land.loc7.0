<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;

class ServicesEditController extends Controller
{
    //
    public function execute(Service $service, Request $request)
    {
        if ($request->isMethod('delete')) {
            if ($service->delete()) {
                return redirect('admin')->with('status', 'Сервис удален');
            }
        }

        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|max:100',
                'icon' => 'required|max:100',
                'text' => 'required'
            ];
            $attributeNames = [
                'name' => '"Название"',
                'icon' => '"Новая иконка"'
            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);
            $validator->validate();

            $service->fill($request->all());
            if ($service->update()) {
                return redirect('admin')->with('status', 'Сервис обновлен');
            }
        }

        if (view()->exists('admin.services_edit')) {
            return view('admin.services_edit', [
                'title' => 'Редактирование сервиса – ' . $service->name,
                'service' => $service
            ]);
        }
    }
}
