<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthController extends Controller
{
    //Register Customer
    public function registerCustomer(Request $request)
    {
        $validator = Validator($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phoneNumber' => 'required|min:10|max:10',
            'email' => 'required|email|unique:customers,email',
            'password' => ['required', 'string', Password::min(8)
                ->letters()
                ->numbers()
                ->symbols()
                ->mixedCase()
                ->uncompromised()],
        ]);

        if (!$validator->fails()) {
            $customer = new Customer();
            $customer->firstName = $request->input('firstName');
            $customer->lastName = $request->input('lastName');
            $customer->phoneNumber = $request->input('phoneNumber');
            $customer->email = $request->input('email');
            $customer->password = Hash::make($request->input('password'));

            $saved = $customer->save();

            return response()->json(['status' => $saved, 'message' => $saved ? 'Registered' : 'Registration Failed', 'object' => $customer], $saved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    //Login Customer
    public function loginCustomer(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $customer = Customer::where('email', '=', $request->input('email'))->first();
            if (Hash::check($request->input('password'), $customer->password)) {
                $token = $customer->createToken('customer-api-token-' . $customer->id);
                $customer->token = $token->accessToken;
                return response()->json(['status' => true, 'message' => $customer]);
            } else {
                return response()->json(['status' => false, 'message' => 'Wrong Password'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    //Logout Customer
    public function logoutCustomer(Request $request)
    {
        $customer = $request->user('customer-api');
        $revoked = $customer->token()->revoke();
        return \response()->json(['status' => $revoked, 'message' => $revoked ? 'Logged Out' : 'Failed Logout',], $revoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /*
     * *******************
     */

    //Register Merchant
    public function registerMerchant(Request $request)
    {
        $validator = Validator($request->all(), [
            'firstName' => 'required|string',
//            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'typeOfMerchant' => 'required|string',
            'phoneNumber' => 'required|min:10|max:10',
            'email' => 'required|email|unique:merchants,email',
            'password' => ['required', 'string', Password::min(8)
                ->letters()
                ->numbers()
                ->symbols()
                ->mixedCase()
                ->uncompromised()],
        ]);

        if (!$validator->fails()) {
            $merchant = new Merchant();
            $merchant->firstName = $request->input('firstName');
//            $merchant->middleName = $request->input('middleName');
            $merchant->lastName = $request->input('lastName');
            $merchant->typeOfMerchant = $request->input('typeOfMerchant');
            $merchant->phoneNumber = $request->input('phoneNumber');
            $merchant->email = $request->input('email');
            $merchant->password = Hash::make($request->input('password'));

            $saved = $merchant->save();

            return response()->json(['status' => $saved, 'message' => $saved ? 'Registered' : 'Registration Failed', 'object' => $merchant], $saved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    //Log in Merchant
    public function loginMerchant(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:merchants,email',
            'password' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $merchant = Merchant::where('email', '=', $request->input('email'))->first();
            if (Hash::check($request->input('password'), $merchant->password)) {
                $token = $merchant->createToken('merchant-api-token-' . $merchant->id);
                $merchant->token = $token->accessToken;
                return response()->json(['status' => true, 'message' => $merchant]);
            } else {
                return response()->json(['status' => false, 'message' => 'Wrong Password'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    //Logout Merchant
    public function logoutMerchant(Request $request)
    {
        $merchant = $request->user('merchant-api');
        $revoked = $merchant->token()->revoke();
        return \response()->json(['status' => $revoked, 'message' => $revoked ? 'Logged Out' : 'Failed Logout',], $revoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

}
