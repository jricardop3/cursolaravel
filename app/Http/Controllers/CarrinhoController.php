<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));

    }
    public function AdicionaCarrinho(Request $request){
        \Cart::add([
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=> abs($request->qnt),
            'attributes'=> array(
                'image' => $request->img,
            )
        
            ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'O Produto foi adicionado ao carrinho com sucesso!');
    }
    public function removeCarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'O Produto foi removido do carrinho com sucesso!');

    }
    public function atualizaCarrinho(Request $request){
        \Cart::update($request->id,[
        'quantity'=>[
            'relative' => false,
            'value' => abs($request->quantity),
    
        ],
    
    ]);
    return redirect()->route('site.carrinho')->with('sucesso', 'O carrinho foi atualizado com sucesso!');
    }
    public function limparCarrinho(){
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Carrinho vazio!');
    }
}
