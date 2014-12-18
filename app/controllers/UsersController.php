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
                ),
                array(
                    'puid' => 'required|numeric',
                    'email' => 'required|email',
                    'password' => 'required'
                )
            );
            if ($validator->fails()) {
                $json = json_encode(array('status' => 'danger', 'text' => $validator->messages()));
            }
            else {
                 $json = json_encode(array('status' => 'success', 'text' => 'Success'));
            }
            header('Content-Type: application/json');
            echo $json;
            exit();
        }
    }

}