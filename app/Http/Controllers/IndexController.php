<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

class IndexController extends Controller
{
    //
    public function execute(Request $request)
    {

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], [
//				'required' => 'Поле :attribute обязательно к заполнению',
//				'email' => 'Поле :attribute должно соответствовать email адресу',
            ]);

            $data = $request->all();
            $result = Mail::send('site.email', ['data' => $data], function ($message) use ($data) {
                $mail_admin = env('MAIL_ADMIN', 'saintdronchik@gmail.com');
                $message->from($data['email'], $data['name']);
                $message->to($mail_admin, 'Mr. Admin')->subject('Question');
            });
//			if ($result) {
            return redirect()->route('index')->with('status', 'Email is send');
//			}
        }

        $pages = Page::all();
        $services = Service::where('id', '<', 20)->get();
        $portfolio = Portfolio::get(['name', 'filter', 'images']);
        $peoples = People::take(3)->get();
        $tags = DB::table('portfolio')->distinct()->pluck('filter');

        $menu = [];
        foreach ($pages as $page)
            array_push($menu, ['title' => $page->name, 'alias' => $page->alias]);
        $items = [
            ['title' => 'services', 'alias' => 'service'],
            ['title' => 'portfolio', 'alias' => 'portfolio'],
            ['title' => 'team', 'alias' => 'team'],
            ['title' => 'contact us', 'alias' => 'contact']
        ];
        $menu = array_merge($menu, $items);

        return view('index', [
            'pages' => $pages,
            'services' => $services,
            'portfolio' => $portfolio,
            'peoples' => $peoples,
            'menu' => $menu,
            'tags' => $tags,
        ]);
    }
}
