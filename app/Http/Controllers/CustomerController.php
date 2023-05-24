<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCustomer = Customer::all();
        return response()->json(['status' => true, 'message' => 'success', 'data' => $allCustomer]);
    }

    public function carCustomer(string $id){
        $carCustomer = Car::query();
        $carCustomer->where('customer_id','=',$id);
        return \response()->json(['status'=>true,'message'=>'success','data'=>$carCustomer],Response::HTTP_OK);
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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json(['status' => !isNull($customer), 'message' => $customer ? 'Success' : 'Not Found', 'object' => $customer], $customer ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(Customer $customer)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phoneNumber' => 'required',
            'email' => 'required',
        ]);

        if (!$validator->fails()) {
            $updated = DB::table('customers')->where('id', '=', $id)->update($request->all());
            return \response()->json(['status' => $updated == 1, 'message' => $updated == 1 ? 'Success' : 'Failed Update'], $updated == 1 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return \response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
