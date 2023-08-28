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
            'message' => 'Client Created SuccessFully',
            'List Clients' =>$services
        ];
        # return json
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
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
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
