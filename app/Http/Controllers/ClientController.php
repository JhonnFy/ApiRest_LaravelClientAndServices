<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        # select all clients
        $clients = Client::all();
        # return all clients, in format json
        return response()->json(["clients" => $clients], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # array select colum from model
        $new_client = [
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];
        # insert
        $clients = Client::create($new_client);
        # select * from client
        $clients = Client::all();

        # modifie message json
        $data = [
            'message' => 'Client Created SuccessFully',
            'List CLients Created' =>$clients
        ];
        # return json
        return response()->json($data, 201);

    }


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $update_client['name'] = $request['name'];
        $update_client['email'] = $request['email'];
        $update_client['phone'] = $request['phone'];
        $update_client['address'] = $request['address'];

        # select id, to update
        Client::find($id)->update($update_client);
        $inject = Customer::find($id);
            
        # select * from client
        $clients = Client::all();

        # modifie message json
        $data = [
            'message' => 'Client Update SuccessFully',
            'List CLients Update' =>$clients
        ];
        
        # return json
        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
