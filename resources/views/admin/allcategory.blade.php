@extends('admin.layouts.template')
@section('page_title')
    All Category - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">Available Category Information</h5>
            @if (session()->has('msg'))
                <div class="alert alert-success">
                    {{ session()->get('msg') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Products</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td>Electronices</td>
                            <td>10</td>
                            <td>100</td>
                            <td>

                                <a href="#"><i class="fa fa-edit fa-2x"></i></a>
                                <a href="#"
                                    onclick="confirm('Are you sure, You want to delete this category ?')||event.stopimmediatepropagation()"
                                    style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
