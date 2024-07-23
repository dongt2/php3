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
        $products = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.*', 'category.name as category_name')
            ->orderBy('view', 'desc')
            ->get();
        return view('products', compact('products'));
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
        DB::table('products')->insert($data);
        return redirect()->route('products');
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
        $products = DB::table('products')->where('id', $id)->first();
        $category = DB::table('category')->select('id', 'name')->get();
        return view('edit', compact('products', 'category'))->with(['products' => $products, 'category' => $category]);
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
        DB::table('products')->where('id', $request->id)->update($data);
        return redirect()->route('products');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products');

    }

}
