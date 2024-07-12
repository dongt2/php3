<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.*', 'category.name as category_name')
            ->orderBy('view', 'desc')
            ->get();
        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = DB::table('category')->select('id', 'name')->get();


        return view('create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];

//        dd($data);
        DB::table('product')->insert($data);
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        $category = DB::table('category')->select('id', 'name')->get();
        return view('edit', compact('product', 'category'))->with(['product' => $product, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            'update_at' => Carbon::now()
        ];
        DB::table('product')->where('id', $request->id)->update($data);
        return redirect()->route('product');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('product')->where('id', $id)->delete();
        return redirect()->route('product');

    }

}
