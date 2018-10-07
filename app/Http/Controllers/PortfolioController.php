<?php

namespace App\Http\Controllers;

use App\Portfolio;

class PortfolioController extends Controller
{
    //
    public function execute()
    {
        if (view()->exists('admin.portfolio')) {
            return view('admin.portfolio', [
                'title' => 'Портфолио',
                'portfolio' => Portfolio::all()
            ]);
        }

        abort(404);
    }
}
