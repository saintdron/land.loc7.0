<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;

class PagesAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|max:100',
                'alias' => 'required|unique:pages|max:100',
                'text' => 'required',
                'images' => 'required'
            ];
            $attributeNames = [
                'name' => '"Название"',
                'images' => '"Изображение"'
            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);
            $validator->validate();

            $input = $request->except('_token');
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path('assets/img'), $input['images']);
            }

            $page = new Page($input);
            if ($page->save()) {
                return redirect('admin')->with('status', 'Страница добавлена');
            }
        }

        if (view()->exists('admin.pages_add')) {
            $data = [
                'title' => 'Новая страница'
            ];
            return view('admin.pages_add', $data);
        }

        abort(404);
    }
}
