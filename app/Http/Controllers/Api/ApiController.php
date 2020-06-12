<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Responsecontroller as Responsecontroller;
use Carbon\Carbon;
use App\Model\User;
use Image;
use Hash;
use Storage;
use DB;
use Passport;
use Mail;
use Auth;
use URL;
use Validator;


class ApiController extends Responsecontroller
{
	protected $api_url;
    protected $api_request;

    public function __construct(Request $request)
    {
        $this->api_url = URL::current();
        $this->api_request = $request->all();
    }
    public function signup(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        );    
        $messages = array(
            'username.required' => 'Username is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email format is invalid.',
            'password.required' => 'Password Is required.',
            
        );
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
            return [
                'MESSAGE' => $validator->errors()->first(), 
                'STATUS' => 0,
                "is_token_expire" => 0
            ];
        }

        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country_id' => $request->country,
            'birthdate' => $request->birthdate
        ]);
        $user->save();

        return response()->json([
            "MESSAGE" => trans('message.signup_success'),
            "STATUS" => 1, 
            "is_token_expire" => 0
        ]);
    }
    public function login(Request $request)
    {   
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
            'device_token' => 'required',
            'device_type' => 'required'
        );    
        $messages = array(
            'email.required' => trans('message.email_required'),
            'email.email' => trans('message.email_format'),
            'password.required' => trans('message.pass_required'),
            'device_token.required' => trans('message.device_token'),
            'device_type.required' => trans('message.device_type'),
        );
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
            return [
                'MESSAGE' => $validator->errors()->first(), 
                'STATUS' => 0,
                "is_token_expire" => 0
            ];
        }
       
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        {
            return  response()->json([
                'MESSAGE' => trans('message.invalid_login'),
                'STATUS' => 0
            ]);
        }
        
        $token_null = DB::table('oauth_access_tokens')->where('user_id','=',Auth::id())->delete();
        DB::table('users')->where('id', '=', Auth::id())->update(['device_token' => '']);  
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $user_info = User::findOrFail(Auth::id());
        $user_info->device_token = $request->device_token;
        $user_info->device_type = $request->device_type;
        $user_info->save();
        if($user_info->status == 0)
        {
            return  response()->json([
                'MESSAGE' => trans('message.not_active'),
                'STATUS' => 0
            ]);
        }
        $return = response()->json([
        	'RESULT' => [
        		'access_token' => $tokenResult->accessToken, 
        		'username' => $user_info->username,
                'email' => $user_info->email,
        		"photo" => asset('images/'.$user_info->image),
        	],
        	"MESSAGE" => trans('message.welcome'),
    		"STATUS" => 1, 
            "is_token_expire" => 0
        ]);
        apilogs($this->api_url,$this->api_request,$return);
        return $return;
    }
    public function logout(Request $request)
    {
        $request->user()->token()->delete(); 
        //$request->user()->token()->revoke();
        DB::table('users')->where('id', '=', Auth::id())->update(['device_token' => '']);    
        return response()->json([
            "MESSAGE" => trans('message.logout'),
            "STATUS" => 1, 
            "is_token_expire" => 0
        ]);
    }

    public function forgot_password(Request $request)
    {
       $email = $request->email;
       $new_password = rand();

       $find = User::where('email',$email)->first();
       if($find)
       {
            sendmail($email,$newpassword,'forgot_password');
       }



    }

    public function user_profile()
    {
        $user = Auth::user();
        // $count_project = DB::table('meeting_user')
        //         ->where('status','=',1)
        //         ->where('user_id','=',Auth::id())
        //         ->count();
        
        // $count_notofication = DB::table('notifications')
        //     ->where('user_id','=',Auth::id())
        //     ->count();

        return response()->json([
            'RESULT' => [
                'fname' => $user->fname,
                'lname' => $user->lname,
                'email' => $user->email,
                "phone" => $user->phone,
                "photo" => asset('images/'.$user->image),
                //"project_count" => $count_project,
                //"notification_count" => $count_notofication
            ],
            "MESSAGE" => trans('message.success'),
            "STATUS" => 1, 
            "is_token_expire" => 0
        ]);
    }
    public function edit_user(Request $request)
    {
        $user = User::find(Auth::id());
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->save();
        return $this->sendResponse($user->toArray(), trans('message.profile_success'));
    }
    public function change_avatar(Request $request)
    {
        $user = User::find(Auth::id());
        if($request->hasFile('image'))
        {   
            $image = $request->file('image');   
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(950,950)->save($location);
            $user->image = $filename;
        }
        $user->save();

        return response()->json([
            'RESULT' => [
                "photo" => asset('images/'.$user->image),
            ],
            "MESSAGE" => trans('message.change_avatar'),
            "STATUS" => 1, 
            "is_token_expire" => 0
        ]);
    }
    

}
