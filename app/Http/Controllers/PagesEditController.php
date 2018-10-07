<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;

class PagesEditController extends Controller
{
    //
    public function execute(Page $page, Request $request)
    {
        if ($request->isMethod('delete')) {
            if ($page->delete()) {
                return redirect('admin')->with('status', 'Страница удалена');
            }
        }

        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            $rules = [
                'name' => 'required|max:100',
                'alias' => 'required|max:100|unique:pages,alias,' . $input['id'],
                'text' => 'required'
            ];
            $attributeNames = [
                'name' => '"Название"'
            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);
            $validator->validate();

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path('assets/img'), $input['images']);
            } else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $page->fill($input);
            if ($page->update()) {
                return redirect('admin')->with('status', 'Страница обновлена');
            }
        }

        if (view()->exists('admin.pages_edit')) {
            return view('admin.pages_edit', [
                'title' => 'Редактирование страницы – ' . $page->name,
                'page' => $page
            ]);
        }
    }
}
