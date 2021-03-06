<?php
class UsersController extends Controller {

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create() {
    	if (Request::ajax()) {
    		$validator = Validator::make(
    			array(
    				'puid' => Input::get('puid'),
    				'email' => Input::get('email'),
    				'password' => Input::get('password'),
                    // 'g-recaptcha-response' => Input::get('captcha'),
    				),
    			array(
    				'puid' => 'required|numeric|unique:users',
    				'email' => 'required|email|unique:users',
    				'password' => 'required|min:5'
                    // 'g-recaptcha-response' => 'required|recaptcha',
    				)
    			);
    		if ($validator->fails()) {
    			$response = array('status' => 'danger', 'text' => $validator->messages());
    		}
    		else {
    			$user = new User;
    			$user->puid = Crypt::encrypt(Input::get('puid'));
    			$user->email = Input::get('email');
    			$user->password = Hash::make(Input::get('password'));
    			$user->save();

    			$user = User::find($user->id);
    			Auth::login($user);
    			$response = array('status' => 'success', 'text' => 'Success');
    		}
    		return Response::json($response); 
    		exit();
    	}
    }

    public function doLogin() {
    	if (Request::ajax()) {
    		$validator = Validator::make(
    			array(
    				'email' => Input::get('email'),
    				'password' => Input::get('password'),
    				),
    			array(
    				'email' => 'required|email',
    				'password' => 'required|min:5'
    				)
    			);
    		if ($validator->fails()) {
    			$response = (array('status' => 'danger', 'text' => $validator->messages()));
    		}
    		else {
    			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
    				$response = array('status' => 'success', 'text' => 'Success');
                    //var_dump( Auth::user() );
    			}
    			else {
    				$response = array('status' => 'danger', 'text' => array('1' => 'Invalid information'));
    			}
    		}
    		return Response::json($response); 
    		exit();
    	}       
    }

    public function logout() {
    	Auth::logout();
    	return Redirect::action('PageController@home');
    }

    public function manage() {
    	$data['name'] = "Manage Account";
    	return View::make('user/manage', compact('data'));
    }

    public function manageBadInfo() {
       return Redirect::action('UsersController@manage')->with('message', 'Could not authenticate with Purdue. Please make sure your PUID and email are correct.');
    }
    public function doManage() {
        if (Request::ajax()) {
            $validator = Validator::make(
                array(
                    'puid' => Input::get('puid'),
                    'email' => Input::get('email'),
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'gender' => Input::get('gender'),
                    'height' => Input::get('height'),
                    'weight' => Input::get('weight'),
                    ),
                array(
                    'puid' => 'required|numeric',
                    'email' => 'required|email|unique:users,email,'.Auth::user()->id,
                    'firstname' => 'alpha_dash',
                    'lastname' => 'alpha_dash',
                    'gender' => 'numeric',
                    'height' => 'numeric',
                    'weight' => 'numeric',
                    )
                );
            if ($validator->fails()) {
                $response = array('status' => 'danger', 'text' => $validator->messages());
            }
            else {
                $user = User::find(Auth::user()->id);
                $user->puid = Crypt::encrypt(Input::get('puid'));
                $user->email = Input::get('email');
                $user->firstname = Input::get('firstname');
                $user->lastname = Input::get('lastname');
                $user->gender = Input::get('gender');
                $user->height =Input::get('height');
                $user->weight = Input::get('weight');
                $user->save();
                $response = array('status' => 'success', 'text' => 'Success');
            }
            return Response::json($response); 
            exit();
        }
    }
}