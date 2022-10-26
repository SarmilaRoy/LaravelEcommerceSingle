@extends('admin.layouts.template')
@section('page_title')
    All Products - Single Ecom
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>
        <!-- Bootstrap Table with Header - Light -->
        @if (session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Available Product Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img style="height: 100px;" src="{{ asset($product->product_img) }}" alt="">
                                    <br>
                                    <a href="" class="btn btn-primary">Update Image</a>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    {{-- <a href="" class="btn btn-sm btn-success">Edit</a>
                                <a href="" onclick="return confirm('are you sure to delete?')"
                                    class="btn btn-sm btn-danger">Delete</a> --}}
                                    {{-- <a href="" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-warning">Delete</a> --}}
                                    <a href="" class="btn btn-success"><i class="las la-edit"></i></a>
                                    <a href="" class="btn btn-warning"><i class="las la-times"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @endsection
