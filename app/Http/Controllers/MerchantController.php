<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMerchant = Merchant::all();
        return response()->json(['status' => true, 'message' => 'success', 'data' => $allMerchant]);
    }

    public function carMerchant(string $id){
//        $carMerchant = Car::with('merchant_id')->count('merchant_id');
//        $carMerchant->where('merchant_id',"=",$id)->get();
//        return \response()->json(['status'=>true,'message'=>'success','data'=>$carMerchant],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merchant = Merchant::findOrFail($id);

        return response()->json(['status' => !isNull($merchant), 'message' => $merchant ? 'Success' : 'Not Found', 'object' => $merchant], $merchant ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(Merchant $merchant)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator(\request()->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required',
            'phoneNumber' => 'required',
        ]);

        if (!$validator->fails()) {
            $updated = DB::table('merchants')->where('id', '=', $id)->update(\request()->all());
            return \response()->json(['status' => $updated == 1, 'message' => $updated == 1 ? 'Success' : 'Failed'], $updated == 1 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return \response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
