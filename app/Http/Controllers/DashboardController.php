<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
       public function index(){
        $usuarios = User::all()->count();
        //grafico 1 - usuarios
            $userData = User::select([
                DB::raw('YEAR(created_at) as ano'),
                DB::raw('COUNT(*) as total')
            ])
                ->groupBy('ano')
                ->orderBy('ano', 'asc')
                ->get();
                //preparar arrays
                    foreach($userData as $user){
                        $ano[] = $user->ano;
                        $total [] = $user->total;
                        
                    }
                    $userLabel = "'Comparativo de cadastro de usuarios'";
                    $userAno = implode(',', $ano);
                    $userTotal = implode(',', $total);
        //grafico 2 - Categorias
        $catData = Categoria::all();
        //preparar o array
        foreach($catData as $cat){
            $catNome[] ="'".$cat->nome."'";
            $catTotal[] = Produto::where('id_categoria',$cat->id)->count();
        }
        //formatação
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);
                
        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
