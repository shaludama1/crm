<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan : '.$plan->name) }}
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

            <h2 class="mt-3">Clients</h2>
            <hr>

            <form action="{{ route('plans.add_client' , $plan->id) }}" method="POST">
                @csrf
                <label for="client">Select Client</label>
                <select name="client_id" class="form-control">
                    @foreach(App\Models\Client::all() as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-success mt-2 mb-2">Add Client</button>
            </form>

            <table class="table table-responsive">
                <thead>
                    <tr>
                     <th>Name</th>
                     <th>Username</th>
                     <th>Budget</th>    
                    </tr>
                </thead>
        
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->username }}</td>
                        <td>{{ $client->budget }}</td>       
                        <td><a class="btn btn-success" href="{{ route('clients.show' , ['client' => $client->id]) }}">Show</a></td>    
                        <td><a class="btn btn-warning" href="{{ route('clients.edit' , ['client' => $client->id]) }}">Edit</a></td>    
                        <td><a class="btn btn-danger" href="{{ route('clients.destroy' , ['client' => $client->id]) }}">Delete</a></td>    
         
                    </tr>
                    @endforeach
                    
                </tbody>
               
            </table>
        </div>
        

    </div>
     
    </div>
    
 
    
</x-app-layout>
