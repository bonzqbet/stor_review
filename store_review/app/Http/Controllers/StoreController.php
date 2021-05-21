<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    //
    public function index(){
        Session::put('active','');
        $db = new DB;
        $data = $db::table('product_tbl')->latest()->paginate(5);
        // dd($user);
        return view('front.home',compact('data'))->with('i',(request()->input('page',1)-1)*5);
       
    }

    public function grid(){
        Session::put('active','1');
        $db = new DB;
        $data = $db::table('product_tbl')->paginate(6);
        // dd($user);
        return view('front.homeGrid',compact('data'))->with('i',(request()->input('page',1)-1)*6)->with('active','2');
       
    }

    public function create(Request $req){
        $db = new DB;
        $MaxOrder = $db::table('product_tbl')->max('product_order');
        if($MaxOrder == null){
            $MaxOrder = 1;
        }else{
            $MaxOrder +=1;
        }
        
        $key = GenKey();
        $db::table('product_tbl')->insert(
            [
                'product_key' => $key,
                'product_name' => $req->Pname,
                'product_detail' => $req->Detail,
                'product_price' => $req->price,
                'product_order' => $MaxOrder,
            ]
        );
        // Input::file('photo')->move($destinationPath, $fileName);
        // $image_file->getRealPath(); // ---> FALSE
        // print_pre($req->file('ResumeNew.pdf'));
        // print_pre($req->input()['inputFileUpload']->getRealPath());

        // dd($req);
        return redirect()->route('store.index')->with('success','add successfully.');
        // dd(Session::get('status'),Session::get('username'));
        // return view('front.home');
    }

    public function edit(Request $req){
        // dd(Session::get('id'));
        $db = new DB;
        $MaxOrder = $db::table('comment_tbl')->max('comment_order');
        if($MaxOrder == null){
            $MaxOrder = 1;
        }else{
            $MaxOrder +=1;
        }
        
        $db::table('comment_tbl')->insert(
            [
                'comment_description' => $req->comment,
                'comment_user_id' => Session::get('id'),
                'comment_product_id' => $req->id_product,
                'comment_order' => $MaxOrder
            ]
        );

        return redirect()->route('store.show',$req->id_product)->with('success'.'Post comment successfullt.');

    }

    public function show($req){
        // dd($req);
        $db = new DB;
        $data = $db::table('product_tbl')->where(
            [
                ['id','=', $req]
            ])->get();

            $comment = $db::table('product_tbl')
            ->join('comment_tbl', 'comment_tbl.comment_product_id', '=', 'product_tbl.id')
            ->join('sy_stf', 'sy_stf.sy_stf_id', '=', 'comment_tbl.comment_user_id')
            ->where('product_tbl.id', $req)
            // ->get();
            ->paginate(5);
            // dd($comment);

        return view('front.view',compact('data'),compact('comment'))->with('i',(request()->input('page',1)-1)*5);
       
    }

    public function destroy($request)
    {
        DB::table('product_tbl')->delete($request);

        // return view('layouts.his',compact('data'))->with('i',(request()->input('page',1)-1)*5);
        return redirect()->route('store.index')->with('success','deleted successfully');

    }
    

}
