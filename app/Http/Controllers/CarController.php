<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Double;
use phpseclib3\Math\BigInteger;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cars = Car::all();
        return response()->json(['status' => true, 'message' => 'success', 'data' => $cars], Response::HTTP_OK);
    }

    public function getCarsFilter(Request $request, string $year)
    {
        if ($year != null) {
//            $cars->where('year', 'like', '%' . $year . '%')->get();
            $cars = DB::table('cars')->get()->where('year', '=', $year);
            return \response()->json(['status' => true, 'message' => 'year', 'data' => $cars], Response::HTTP_OK);
        }

//        if ($price != null) {
//            $cars = DB::table('cars')->get()->where('price', '>=',$price);
//            return \response()->json(['status' => true, 'message' => 'price', 'data' => $cars], Response::HTTP_OK);
//        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'fullName' => 'required|string|min:2|max:150',
            'carModel' => 'required|string',
            'year' => 'required',
            'manufacturerType' => 'required',
            'engineCapacity' => 'required',
            'numberOfCylinders' => 'required',
            'price' => 'required',
            'isCarNew'=> 'required',
            'numberOfDoers'=> 'required',
            'description' => 'required|string|min:15',
            'typeOfFuel' => 'required|string',
            'typeOfGears' => 'required',
            'mileage' => 'required',
            'color' => 'required',
        ]);
        if (!$validator->fails()) {

            $car = Car::create($request->all());
            return \response()->json(['status' => !isNull($car), 'message' => $car ? "Success" : "Failed"], $car ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

        } else {
            return \response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $car = Car::findOrFail($id);
        return \response()->json(['status' => !isNull($car), 'message' => $car ? 'Success' : 'Not Found', 'object' => $car], $car ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'fullName' => 'required|string',
            'year' => 'required',
            'manufacturerType' => 'required',
            'engineCapacity' => 'required',
            'typeOfFuel' => 'required',
            'price' => 'required',
            'numberOfCylinders' => 'required',
            'typeOfGears' => 'required',
            'color' => 'required',
        ]);

        if (!$validator->fails()) {

            $updatedRowCount = DB::table('cars')->where('id', '=', $id)->update($request->all());
            return \response()->json(['status' => $updatedRowCount == 1, 'message' => $updatedRowCount == 1 ? 'Success' : 'Failed'], $updatedRowCount == 1 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return \response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $countOfDeletedRows = DB::table('cars')->delete($id);
        return \response()->json(['status' => $countOfDeletedRows == 1, 'message' => $countOfDeletedRows == 1 ? 'Deleted Successfully' : 'Failed'],
            $countOfDeletedRows == 1 ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);
    }
}
