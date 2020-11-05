<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop : '.$shop->name) }}
        </h2>
    </x-slot>


    <div class="container-fluid">
       <div class="row">

       
        <div class="col-md-6">
            <h2 class="mt-3">Clients</h2>
            <hr>

            <a href="{{ route('clients.create' , ['id' => $shop->id]) }}" class="btn btn-primary btn-lg m-2">Add New Client</a>

            <table class="table table-responsive">
                <thead>
                    <tr>
                     <th>Name</th>
                     <th>Budget</th>    
                    </tr>
                </thead>
        
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->budget }}</td>       
                        <td><a class="btn btn-success" href="{{ route('clients.show' , ['client' => $client->id]) }}">Show</a></td>    
                        <td><a class="btn btn-warning" href="{{ route('clients.edit' , ['client' => $client->id]) }}">Edit</a></td>    
                        <td>
                            <form action="{{ route('clients.destroy' , ['client' => $client->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>      
                        </td>    
         
                    </tr>
                    @endforeach
                    
                </tbody>
               
            </table>
        </div>
        <div class="col-md-6">
            @if(\Session::has('done'))
            <div class="alert alert-success mt-3">
                {{ \Session::get('done') }}
            </div>
            @endif
            <h2 class="mt-3">Plans</h2>
            <hr>

            <a href="{{ route('plans.create' , ['id' => $shop->id]) }}" class="btn btn-primary btn-lg m-2">Create New Plan</a>
            <table class="table table-responsive">
                <thead>
                    <tr>
                     <th>Name</th>
                     <th>Price</th> 
                    </tr>
                </thead>
        
                <tbody>
                    @foreach($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->price }}</td> 
                            
                        <td><a class="btn btn-success" href="{{ route('plans.show' , ['plan' => $plan->id]) }}">Show</a></td>    
                        <td><a class="btn btn-warning" href="{{ route('plans.edit' , ['plan' => $plan->id]) }}">Edit</a></td>    
                        <td>
                            <form action="{{ route('plans.destroy' , ['plan' => $plan->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>     
                        </td> 
                        
                        <td>
                            @if($plan->active)
                            <a class="btn btn-danger" href="{{ route('plans.change' , ['id' => $plan->id]) }}">Deactivate</a>   
                            @else
                            <a class="btn btn-success" href="{{ route('plans.change' , ['id' => $plan->id]) }}">Activate</a>
                            @endif
                        </td> 
         
                    </tr>
                    @endforeach
                    
                </tbody>
               
            </table> 
        </div>

    </div>
     
    </div>
    
 
    
</x-app-layout>
