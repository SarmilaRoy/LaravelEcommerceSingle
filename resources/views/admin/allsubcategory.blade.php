@extends('admin.layouts.template')
@section('page_title')
    All Sub Category - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Category</h4>
        <!-- Bootstrap Table with Header - Light -->
        @if (session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Available Sub Category Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Sub Category Name</th>
                            <th>Category</th>
                            <th>Products</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->subcategory_name}}</td>
                            <td>{{ $subcategory->category_name }}</td>
                            <td>{{ $subcategory->product_count }}</td>
                            <td>
                                {{-- <a href="" class="btn btn-sm btn-success">Edit</a>
                                <a href="" onclick="return confirm('are you sure to delete?')"
                                    class="btn btn-sm btn-danger">Delete</a> --}}
                                <a href="{{ route('editsubcategory',$subcategory->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('deletesubcategory',$subcategory->id) }}" class="btn btn-warning">Delete</a>
                                {{-- <a href="" class="btn btn-success"><i class="las la-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="las la-times"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $subcategories->links() }}
            </div>
        </div>
    @endsection
