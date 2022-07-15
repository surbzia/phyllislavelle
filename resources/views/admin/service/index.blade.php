@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Services</h5>
            <a class="btn btn-info btn-md rounded-pill" href="{{ route('service.create') }}">Add Service</a>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Variations Count</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($services as $key => $service)
                                <tr>
                                    <td>{{ $service['id'] }}</td>
                                    <td>{{ $service['name'] }}</td>
                                    <td>{{ $service['category_name'] }}</td>
                                    <td>{{ $service['variation_count'] }}</td>

                                    <td>
                                        <span
                                            class="badge badge-pill {{ $service['is_active'] == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $service['is_active'] == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('service.edit', $service['id']) }}">Edit</a>

                                        <form method="post" action="{{ route('service.destroy', $service['id']) }}"
                                            id="service_delete_form">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill"
                                                onclick="deleteItem(event)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteItem(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this Service.??')) {
                $('#service_delete_form').submit();
            }

        }
    </script>
@endsection
