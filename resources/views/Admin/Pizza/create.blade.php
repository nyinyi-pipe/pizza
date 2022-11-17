@extends('Admin.Layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                {{-- Session Message --}}
            @if (Session::has('createSuccess'))        
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">      
                    {{ Session::get('createSuccess') }}              
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                            
            @endif


                <div class="row mt-4">
                    <div class="col-8 offset-3 mt-5">
                        <div class="col-md-9">
                            {{-- back to category list --}}           
                            {{-- small><i class="fas fa-arrow-left"></i> back</small> --}}
                            <a href="{{ route('admin#pizza') }}" class="text-decoration-none text-black"><div class="mb-4">
                                <i class="fas fa-arrow-left"></i> back</div></a>
                            
                            
                            <div class="card">
                                <div class="card-header p-2">
                                    <legend class="text-center">Add New Pizza</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">

                                            {{-- Add Category Form --}}
                                            <form class="form-horizontal" action="{{ route('admin#insertPizza') }}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Pizza Name" name="name">
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('name'))                                                            
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif

                                                    </div>
                                                </div>  

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Pizza Image" name="image">
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('image'))                                                            
                                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                                        @endif

                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Price</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" placeholder="$$$" name="price">
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('price'))                                                            
                                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                                        @endif

                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select name="publish" class="form-control">
                                                            <option value="1">Publish</option>
                                                            <option value="0">Unpublish</option>
                                                        </select>
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('status'))                                                            
                                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                                        @endif

                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Category</label>
                                                    <div class="col-sm-10">                                                        
                                                        <select name="category" class="form-control">
                                                            <option value="">Choose Category</option>
                                                            @foreach ( $category as $items ) {{-- $category is Key Name --}}
                                                                <option value="{{ $items->category_id }}">{{ $items->category_name }}</option>                                                                
                                                            @endforeach
                                                            
                                                        </select>
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('category'))                                                            
                                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                                        @endif

                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Discount</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" placeholder="$$$" name="discount">
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('name'))                                                            
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif

                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Buy 1 Get 1</label>
                                                    <div class="col-sm-10 mt-2">
                                                       <input type="radio" name="buyOnegetOne" class="form-input-check" value="1"> Yes
                                                       <input type="radio" name="buyOnegetOne" class="form-input-check" value="0"> No
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('buyOnegetOne'))                                                            
                                                            <span class="text-danger">{{ $errors->first('buyOnegetOne') }}</span>
                                                        @endif
                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Waiting Time</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" placeholder="Waiting Time" name="waitingTime">
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('waitingTime'))                                                            
                                                            <span class="text-danger">{{ $errors->first('waitingTime') }}</span>
                                                        @endif
                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control rounded-0" name="description" rows="3"></textarea>
                                                        {{-- Input Validate --}}
                                                        @if ($errors->has('description'))                                                            
                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                        @endif
                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <a href="{{ route('admin#pizza') }}"><button type="submit" class="btn bg-dark text-white float-end">Add New</button></a>
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
