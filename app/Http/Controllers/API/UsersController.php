<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Shopkeepers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Logs;
// use Illuminate\Http\Response;
use Flash;
use Response;

class UsersController extends Controller{

    public $successStatus = 200;

    public function testQuery(){

        $shopkeepers = Shopkeepers::all();

        if (count ($shopkeepers) > 0){
            return response()-json($shopkeepers, $this->$successStatus);
            // return json_encode($shopkeepers, 200);
        }else{
            // return json_encode(['Error'=>'There is an error'], 404);
            return  response()-json(['Error'=>'There is an error'], 404);
        }      
    }
    public function login(){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){

            $user = Auth::user();
            $fortoken['id'] = $user->id;
            $fortoken['name'] = $user->name;
            $fortoken['username'] = $user->username;
            $fortoken['token'] = Str::random(32);
            
            //SAVE TOKEN TO remember_token table
            $user->remember_token =$fortoken['token'];
            $user->save();

            //SAVE LOGS
            $logs = new Logs();
            $logs->userid = $user->id;
            $logs->log = "Login";
            $logs->logdetails = "User $user->name has logged in to my system";
            $logs->logtype = "API login";
            $logs->save();


                    // return response()-json(['response' => 'ok'], $this->$successStatus);
                    return json_encode($fortoken, 404);
        }else{  
                    // return response()-json(['response' => 'User not found']);
                    return response()-json(['response'=>'User not found'], 404);
        }
    }


    
    public function register(Request $request){
        $validator =Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()){
            return response-json(['Response' => $validator->errors()], 401);
        }else{
            
            $input = $request->all();

            if(User::where('email', $input['email'])->exist()) {
                return response-json(['Response' => 'Email already exist'], 401);
            } elseif(User::where('username', $input['username'])->exist()){
                return response-json(['Response' => 'Username already exist'], 401);
            } else{
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);

                $fortoken['id'] = $user->id;
                $fortoken['name'] = $user->name;
                $fortoken['username'] = $user->username;
                $fortoken['token'] = Str::random(32);
                return response()-json($fortoken, 200); //$this->$successStatus
            }
        }
    }

    public function resetPassword(Request $request) {
        $user = User::where('email', $request['email'])->first();

        if ($user != null) {
            $user->password = bcrypt($request['password']);
            $user->save();

            return response()->json(['response' => 'You have successfully changed your password'], $this->successStatus);
        } else {
            return response()->json(['response' => 'User not found'], 404);
        }
    }


}



?>