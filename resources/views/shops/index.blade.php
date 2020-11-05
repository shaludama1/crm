<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shops') }}
        </h2>
    </x-slot>


    <div class="container">
        @if(\Session::has('done'))
        <div class="alert alert-success mt-3">
            {{ \Session::get('done') }}
        </div>
        @endif
        <a href="{{ route('shops.create') }}" class="btn btn-lg btn-primary mt-3">Create New Shop</a>
        <hr>
     <table class="table table-responsive">
        <thead>
            <tr>
             <th>Name</th>
             <th>Location</th>
             <th>Created At</th>   
            </tr>
        </thead>

        <tbody>
            @foreach($shops as $shop)
            <tr>
                <td>{{ $shop->name }}</td>
                <td>{{ $shop->location }}</td>
                <td>{{ $shop->created_at }}</td>    
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
        <div class="m-5">
            {{ $shops->links() }}
        </div>
        
     
    </div>
    
 
    
</x-app-layout>
