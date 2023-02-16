<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
    $data = Venda::select('code','total_un', 'created_at')
                ->get()
                ->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
         });
       
        $valor = [];
        $mes = [];
        foreach($data as $key => $value){
            
            $mes[] = $key;
        }
        return view('home', ['data' => $data],['mes' => $mes]);
    }

}
