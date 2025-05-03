<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'draft'     => Article::where('status', 'DRAFT')->count(),
            'publish'   => Article::where('status', 'PUBLISH')->count()
        ];
        return view('dashboards.index', ['data'=>$data]);
    }
}
