<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Session;
use Hash; //for decript password

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signUp()
    {
        return view('admin.SignupForm');

    }

    public function signMe(Request $request)
    {
        //print_r($_POST); // This is echo the form for post method
        //print_r($request->all()); //Use $request method
        // echo $request->first_name; // get here single record using request method

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = $request->password;
        $remember_token = $request->token;
        $date = date('Y-m-d H:i:s');
        $validator = Validator::make(
            array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'c_password' => $request->c_password,
            ),array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required |email ',
                'password' => 'required',
                'c_password' => 'required | same:password'
            )
        );
        if($validator->fails()){
            return redirect('signUp')->withErrors($validator)->withInput();
        }else{
            // echo"This is fine";
            $data = array(
                "name" =>$first_name."".$last_name,
                "email"=>$email,
                "password"=>Hash::make($password),
                "remember_token"=>$remember_token,
                "created_at"=>$date,
                "updated_at"=>$date

            );

            $id_email = DB::table('users')->SELECT('email')->WHERE('email',$email)->get();
           // dd($id_email);
            if(count($id_email)== 0){

                if(DB::table('users')->insert($data)){
                    return redirect('signUp')->with("success","Successfully Sign Up");
                }else{
                    return redirect('signUp')->with("error","Not Inserted");
                }
            }else{
                return redirect('signUp')->with("error","Email is already there");
            }
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
