<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\LocationRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\VehicleRequest;
use App\Models\Category;
use App\Models\Driver;
use App\Models\Service;
use App\Models\User;
use App\Models\Vehicle;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all()->toArray();
        return view('admin.service.index')->with(compact('services'));

        // return view('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new User();
        $categories = Category::all();
        $data = [
            'is_edit' => false,
            'title' => 'Add Service',
            'button' => 'Submit',
            'route' => route('service.store'),
            'categories' => $categories,
            'edit_service' => $obj,
        ];

        return view('admin.service.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request = json_decode($request->data);
        // $variations = json_encode($request->variations);

        $request = $request->data;

        $service = new Service();
        $service->name = $request['name'];
        $service->category_id = $request['category_id'];
        $service->is_active = $request['is_active'];
        $service->save();

        foreach ($request['variations'] as $key => $variation) {
            $service->variations()->create([
                'title' => $variation['title'],
                'price' => $variation['price'],
            ]);
        }

        return redirect()->route('service.index')->with('success', 'Service has been added successfully');
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
    public function edit(Driver $driver)
    {
        $data = [
            'is_edit' => true,
            'title' => 'Update Driver',
            'button' => 'Update',
            'route' => route('driver.update', $driver->id),
            'edit_driver' => $driver->toArray(),
        ];
        return view('admin.driver.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $driver->update($request);
        return redirect()->route('driver.index')->with('success', 'Driver has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('driver.index')->with('success', 'Driver has been deleted successfully');
    }
}
