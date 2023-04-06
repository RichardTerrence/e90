<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <!-- card for table -->
                <div class="card p-0 col-md-8 overflow-hidden">
                    <!-- success alert -->
                    @if(session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <table class="table">
                        <thead class="table-primary">
                          <tr>
                            <th scope="col">List No.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Date of Creation</th>
                            <th scope="col">Period</th>
                          </tr>
                        </thead> 
                        <tbody>
                            @php($i=1)
                            @foreach ($categories as $category) 
                          <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->user_id}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                              @if($category->created_at==NULL)
                                  <span class="text-danger">Date Not Set</span>
                              @else
                              {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <!-- card for add category --->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <input type="category_name" name="category_name" class="form-control" id="category_name" aria-describedby="category_name">
                                  @error('category_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>