@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<main class="container">
        <section>
            <div class="titlebar">
                <h1>Products</h1>
                <a href="{{ route('products.create') }}" class="btn-link">Add Product</a>
            </div>
            @if ($message = Session::get('success'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                    icon: "success",
                    title: "{{ $message }}"
                    });
                </script>
            @endif
            <div class="table">
                <div class="table-filter">
                    <div>
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ route('products.index') }}" method="GET" accept-charset="UTF-8" role="search">
                    <div class="table-search">
                            <input class="search-input" type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="table-product-head">
                    <p>Image</p>
                    <p>Name</p>
                    <p>Category</p>
                    <p>Inventory</p>
                    <p>Actions</p>
                </div>
                <div class="table-product-body">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <img src="{{ asset('image/' . $product->image) }}"/>
                            <p> {{ $product->name }} </p>
                            <p> {{ $product->category }} </p>
                            <p> {{ $product->quantity }} </p>
                            <div style="display:flex">     
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">
                                    <i class="fas fa-pencil-alt" ></i> 
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-delete" onclick="deleteConfirm(event)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @else
                    <p>Product not Found</p>
                    @endif
                </div>
                <!-- <div class="table-paginate">
                    <div class="pagination">
                        <a href="#" disabled>&laquo;</a>
                        <a class="active-page">1</a>
                        <a>2</a>
                        <a>3</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div> -->
            </div>
        </section>
    </main>  
    <script>
        window.deleteConfirm = function (e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            });
        }
    </script>
@endsection