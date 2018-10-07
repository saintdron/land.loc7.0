<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use DB;
use Validator;

class PortfolioEditController extends Controller
{
    //
    public function execute(Portfolio $portfolio, Request $request)
    {
        if ($request->isMethod('delete')) {
            if ($portfolio->delete()) {
                return redirect('admin')->with('status', 'Работа удалена');
            }
        }

        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|max:200',
                'images' => 'required'
            ];
            $attributeNames = [
                'name' => '"Название"',
                'images' => '"Новое изображение"'
            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);
            $validator->validate();

            $input = $request->except('_token');
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path('assets/img'), $input['images']);
            } else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $portfolio->fill($input);
            if ($portfolio->update()) {
                return redirect('admin')->with('status', 'Работа обновлена');
            }
        }

        if (view()->exists('admin.portfolio_edit')) {
            $filters = DB::table('portfolio')->distinct()->pluck('filter');
            return view('admin.portfolio_edit', [
                'title' => 'Редактирование работы – ' . $portfolio->name,
                'portfolio' => $portfolio,
                'filters' => $filters
            ]);
        }
    }
}
