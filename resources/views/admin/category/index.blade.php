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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Registration</th>
                            <th scope="col">Period</th>
                          </tr>
                        </thead> 
                        <tbody>
                          <tr>
                            <th scope="row">0</th>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                          </tr>
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