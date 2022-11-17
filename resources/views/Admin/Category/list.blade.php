@extends('Admin.Layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        {{-- Add Category Success Message --}}
        @if (Session::has('CategoryAdd'))        
          <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">      
            {{ Session::get('CategoryAdd') }}              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>                            
        @endif

        {{-- Delete Category Success Message --}}
        @if (Session::has('DeleteCategory'))        
          <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">      
            {{ Session::get('DeleteCategory') }}              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>                            
        @endif

        {{-- Update Category Success Message --}}
        @if (Session::has('updateCategory'))        
          <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">      
            {{ Session::get('updateCategory') }}              
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>                            
        @endif
        

        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  {{-- Route to AddCategory Page --}}
                  <a href="{{ route('admin#addcategory') }}"><button class="btn btn-sm btn-outline-dark">Add Category</button></a>
                </h3>
                                
                <div class="card-tools">

                  {{-- Search Category --}}
                  <form action="{{ route('admin#searchCategory') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="searchCategory" class="form-control float-right" placeholder="Search" >  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- end card-header -->

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Product Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categoryList as $category )
                    {{-- <tr>
                      <td>{{ $category['category_id'] }}</td>
                      <td>{{ $category['category_name'] }}</td>
                      <td></td>
                      <td>
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr> --}}
                    <tr>
                      <td>{{ $category->category_id }}</td>
                      <td>{{ $category->category_name }}</td>
                      <td>1</td>
                      <td>

                        {{-- EDIT Category --}}
                        <a href="{{ route('admin#editCategory' , $category->category_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                        
                        {{-- DELETE Category --}}
                        <a href="{{ route('admin#deleteCategory' , $category->category_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>

                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>

                {{-- Pagination --}}
               <div class="mt-4 ms-2"> {{ $categoryList->links() }}</div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection