<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        # select all clients
        $services = Service::all();

        # modifie message json
        $index_services = [
            'message' => 'Service Consulted SuccessFully',
            'List Services' =>$services
        ];
        
        # return json
        return response()->json($index_services, 201);
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
        $new_service = [
            'name'=> $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];
        # insert
        $services = Service::create($new_service);
        # select * from client
        $services = Service::all();

        # modifie message json
        $data = [
            'message' => 'Service Created SuccessFully',
            'List Services' =>$services
        ];
        # return json
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $id)
    {
        # modifie message json
        $data = [
            'message' => 'Service Consulted SuccessFully',
            'List Services' =>$id
        ];
        # return json
        return response()->json($data, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update_client['name'] = $request['name'];
        $update_client['description'] = $request['description'];
        $update_client['price'] = $request['price'];

        Service::find($id)->update($update_client);
        $inject = Service::find($id);
            
        $services = Service::all();

        # modifie message json
        $data = [
            'message' => 'Service Update Success',
            'List Services' =>$services
        ];
        # return json
        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Service::find($id)->delete();
        $client = Service::All();
        
        # modifie message json
        $data = [
            'message' => 'Service Delete Success',
            'List Services' =>$client
        ];
        # return json
        return response()->json($data, 201);
    }
}
