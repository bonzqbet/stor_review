<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class AjaxController extends Controller
{
    //
    public function index()
    {
        $db = new DB;
        $data = $db::table('product_tbl')->paginate(5);
        // dd($user);
        return view('front.home',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function show(Request $request)
    {
        $db = new DB;
        $data = $db::table('product_tbl')->paginate(5);
        
        // return redirect()->route('store.show',compact($data));
        // return json_encode($data);
    }

    public function destroy($req)
    {
        $db = new DB;
        $data = $db::table('comment_tbl')->where(
            [
                ['comment_id','=', $req]
                ])->get();
                
        // $db::table('comment_tbl')->delete($req);
        $db::table('comment_tbl')->where('comment_id', '=', $req)->delete();
        // dd($data[0]->comment_product_id);
        // return view('layouts.his',compact('data'))->with('i',(request()->input('page',1)-1)*5);
        return redirect()->route('store.show',$data[0]->comment_product_id)->with('success','deleted comment successfully');

    }

    public function edit($req){
        $db = new DB;
        $data = $db::table('product_tbl')->where(
            [
                ['id','=', $req],
            ])->get();
        // dd($data);
        return view('front.core.edititem',compact('data'));
    }

    public function update(Request $req){
        $db = new DB;
        $data = $db::table('product_tbl')->where(
            [
                ['id','=', $req->product_id],
            ])
            ->update(
                [
                    'product_name' => $req->Pname,
                    'product_price' => $req->price,
                    'product_detail' => $req->Detail,

                ]);
        
        return redirect()->route('store.show',$req->product_id);
        // return view('front.core.edititem',compact('data'));
    }
}
