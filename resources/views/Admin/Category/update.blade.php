@extends('Admin.Layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-8 offset-3 mt-5">
                        <div class="col-md-9">
                            {{-- back to category list --}}                                                        
                            {{-- small><i class="fas fa-arrow-left"></i> back</small> --}}
                            <a href="{{ route('admin#categorylist') }}" class="text-decoration-none text-black"><div class="mb-4"><i class="fas fa-arrow-left"></i> back</div></a>
                            
                            
                            <div class="card">
                                <div class="card-header p-2">
                                    <legend class="text-center">Edit Category</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">

                                            {{-- Add Category Form --}}
                                            <form class="form-horizontal" action="{{ route('admin#updateCategory') }}" method="POST">
                                                @csrf
                                                <div class="form-group row">

                                                    {{-- Hidden ID --}}
                                                    <input type="hidden" name="id" value="{{ $category->category_id }}">  {{-- $category comes from editCategory() in Controller --}}
                                                    

                                                    <label for="inputName" class="col-sm-2 col-form-label">Category Name</label>
                                                    <div class="col-sm-10">

                                                        {{-- Using Old Value --}}
                                                        <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{ old('name' ,$category->category_name)  }}">

                                                        {{-- Category Name Field Validate --}}
                                                        @if ($errors->has('name'))                                                            
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif

                                                    </div>
                                                </div>  
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        {{-- <a href="{{ route('admin#categorylist') }}"><button type="submit" class="btn bg-dark text-white">Update</button></a> --}}
                                                        <a href="#"><button type="submit" class="btn bg-dark text-white">Update</button></a>
                                                    </div>
                                                </div>                                              
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
