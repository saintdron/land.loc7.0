<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use DB;
use Validator;

class PortfolioAddController extends Controller
{
    //
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|max:200',
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

            $portfolio = new Portfolio($input);
            if ($portfolio->save()) {
                return redirect('admin')->with('status', 'Работа добавлена');
            }
        }

        if (view()->exists('admin.portfolio_add')) {
            $filters = DB::table('portfolio')->distinct()->pluck('filter');
            return view('admin.portfolio_add', [
                'title' => 'Новая работа',
                'filters' => $filters
            ]);
        }

        abort(404);
    }
}
