<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Shop') }}
        </h2>
    </x-slot>


    <div class="container col-md-4">
        

        
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('shops.store') }}" method="POST">
            @csrf
            <label class="mt-3" for="name">Shop Name</label>
            <input type="text" class="form-control" name="name">
            <label class="mt-3" for="location">Shop Location</label>
            <input type="text" class="form-control" name="location">
            <button type="submit" class="btn btn-md btn-success mt-2">Create Shop</button>
        </form>
        
     
    </div>
    
 
    
</x-app-layout>
