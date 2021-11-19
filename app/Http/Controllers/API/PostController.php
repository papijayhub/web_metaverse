<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Flash;
use Response;

 class PostController extends Controller{

    public $successStatus = 200;

    public function getAllPosts(Request $request)
    {
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid
        // $user = User::where('id',$userid)->where('remember_token',$token)->first();

        // $post = Posts::all();
        $post = DB::table('posts')
           ->LeftJoin('users', 'posts.id', '=', 'users.id')
           ->select('posts.id', 'posts.title', 'posts.category', 'posts.description', 'users.name', 'posts.created_at', 'posts.updated_at', 'posts.id')
           ->get();

        return response()->json($post, $this->successStatus);

       
    }


    public function getPost(Request $request){

        $id = $request['pid']; //old post id
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();

        if($user != null){
            $post = Posts::where('id', $id)->first();

            if ($post != null){
                return response()->json($post, $this->successStatus);
            } else {
                return response()->json(['response' => 'Post not found'], 404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }

    public function searchPost(Request $request){

        $params = $request['p']; //p = params
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();

        if($user != null){
            $post = Posts::where('description','LIKE', '%' . $params . '%')
            ->orWhere('title','LIKE', '%' . $params . '%')
            ->get();
//select * from posts where description LIKE '$params' OR title LIKE '%params'
            if ($post != null){
                return response()->json($post, $this->successStatus);
            } else {
                return response()->json(['response' => 'Post not found'], 404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }

}