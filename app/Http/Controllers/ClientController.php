<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $clients = Client::all();
            return view('client.index', compact('clients'));

        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');

    }

        /**
     * Store a new client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try{

            $validated = $request->validate([
                'fname' => 'required|max:50|string',
                'lname' => 'required|max:50|string',
                'contact' => 'required|max:20|string',
                'email' => 'required|max:160|email',
                'gender' => 'required',
                'date_of_birth' => 'required|date',
                'street_no' => 'required|max:10',
                'street_address' => 'required|max:255',
                'city' => 'required|max:100',
                'status' => 'in:on'
            ]);



            $client = new Client();
            $client->first_name = $request->fname;
            $client->last_name = $request->lname;
            $client->contact = $request->contact;
            $client->email = $request->email;
            $client->gender = $request->gender;
            $client->dob = $request->date_of_birth;
            $client->street_no = $request->street_no;
            $client->street_address = $request->street_address;
            $client->city = $request->city;

            if($request->status == 'on'){
                $status = 1;

            }else{
                $status = 0;
            }
            $client->status = $status;
            $client->save();

            return back()->with('status','Client saved successfully');
        }catch(\Exception $e){

            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::where('id',$id)->first();
        return view('client.edit',compact('client'));

    }

        /**
     * Update client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        try{

            $validated = $request->validate([
                'fname' => 'required|max:50|string',
                'lname' => 'required|max:50|string',
                'contact' => 'required|max:20|string',
                'email' => 'required|max:160|email',
                'gender' => 'required',
                'date_of_birth' => 'required|date',
                'street_no' => 'required|max:10',
                'street_address' => 'required|max:255',
                'city' => 'required|max:100',
                'status' => 'in:on'
            ]);


            $client = Client::where('id',$id)->first();

            $client->first_name = $request->fname;
            $client->last_name = $request->lname;
            $client->contact = $request->contact;
            $client->email = $request->email;
            $client->gender = $request->gender;
            $client->dob = $request->date_of_birth;
            $client->street_no = $request->street_no;
            $client->street_address = $request->street_address;
            $client->city = $request->city;
            if($request->status == 'on'){
                $status = 1;

            }else{
                $status = 0;
            }
            $client->status = $status;
            $client->save();

            return back()->with('status','Client update successfully');
        }catch(\Exception $e){

            return $e->getMessage();
        }
    }


    /**
     * Remove the client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Client::where('id',$id)->delete();
        return back()->with('status','Client deleted');
    }
}
