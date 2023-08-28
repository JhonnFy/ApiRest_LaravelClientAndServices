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

        # modifie message json
        $index_clients = [
            'message' => 'Client Consulted SuccessFully',
            'List Clients' =>$clients
        ];
        # return json
        return response()->json($index_clients, 201);
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
            'List Clients' =>$clients
        ];
        # return json
        return response()->json($data, 201);

    }


    /*
    # select one id
    */
    public function show(Client $id)
    {  

        # modifie message json
        $data = [
            'message' => 'Client Consulted SuccessFully',
            'Client Data' =>$id
        ];
        # return json
        return response()->json($data, 201);

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
    public function update(Request $request, $id)

    #Request $request, Client $client
    #Request $request, $id
    {
     
        $update_client['name'] = $request['name'];
        $update_client['email'] = $request['email'];
        $update_client['phone'] = $request['phone'];
        $update_client['address'] = $request['address'];

        Client::find($id)->update($update_client);
        $inject = Client::find($id);
            
        $clients = Client::all();

        # modifie message json
        $data = [
            'message' => 'Client Update Success',
            'List Clients' =>$clients
        ];
        # return json
        return response()->json($data, 201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $delete = Client::find($id)->delete();
        $client = Client::All();
        
        # modifie message json
        $data = [
            'message' => 'Client Delete Success',
            'List Clients' =>$client
        ];
        # return json
        return response()->json($data, 201);
    }


}
