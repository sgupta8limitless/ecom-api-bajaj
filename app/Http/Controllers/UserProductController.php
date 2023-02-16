<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use PHPUnit\Framework\TestStatus\Success;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }


    public function userProducts($id)
    {
        $data=User::find($id)->products()->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userProduct=new UserProduct;
        $userProduct->user_id=$request->user_id;
        $userProduct->product_id=$request->product_id;
        $userProduct->amount=$request->amount;
        $userProduct->save();

        return ["succes"=>true,"message"=>"Added To Cart"];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=UserProduct::find($id);
        $item->quantity=$request->quantity;
        $item->amount=$request->amount;

        $item->save();

        return ["succes"=>true,"message"=>"Updated The Cart"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $item=UserProduct::find($id);
        $item->delete();
        return ["succes"=>true,"message"=>"removed The Cart"];

    }
}
