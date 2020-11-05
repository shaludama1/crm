<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client : '.$client->name) }}
        </h2>
    </x-slot>


    <div class="container-fluid">
       <div class="row">

       
        <div class="col-md-6">

            @if(\Session::has('done'))
        <div class="alert alert-success mt-3">
            {{ \Session::get('done') }}
        </div>
        @endif
        @if(\Session::has('error'))
        <div class="alert alert-danger mt-3">
            {{ \Session::get('error') }}
        </div>
        @endif

            <h2 class="mt-3">Client Plans</h2>
            <hr>

            

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
                            <a class="btn btn-danger" href="{{ route('plans.change' , ['plan' => $plan->id]) }}">Deactivate</a>   
                            @else
                            <a class="btn btn-success" href="{{ route('plans.change' , ['plan' => $plan->id]) }}">Activate</a>
                            @endif
                        </td> 
         
                    </tr>
                    @endforeach
                    
                </tbody>
               
            </table>
        </div>

        <div class="col-md-6">

           

            <h2 class="mt-3">Client Shops</h2>
            <hr>

            <table class="table table-responsive">
                <thead>
                    <tr>
                     <th>Name</th>
                     <th>Location</th>  
                    </tr>
                </thead>
        
                <tbody>
                    @foreach($shops as $shop)
                    <tr>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->location }}</td>     
                        <td><a class="btn btn-success" href="{{ route('shops.show' , ['shop' => $shop->id]) }}">Show</a></td>    
                        <td><a class="btn btn-warning" href="{{ route('shops.edit' , ['shop' => $shop->id]) }}">Edit</a></td>    
                        <td>
                            <form action="{{ route('shops.destroy' , ['shop' => $shop->id]) }}" method="POST">
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
        

    </div>
     
    </div>
    
 
    
</x-app-layout>
