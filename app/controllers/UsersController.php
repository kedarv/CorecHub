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
                $json = json_encode(array('status' => 'danger', 'text' => $validator->messages()));
            }
            else {
                $user = new User;
                $user->puid = Crypt::encrypt(Input::get('puid'));
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();

                $user = User::find($user->id);
                Auth::login($user);
                $json = json_encode(array('status' => 'success', 'text' => 'Success'));
            }
            header('Content-Type: application/json');
            echo $json;
            exit();
        }
    }

}