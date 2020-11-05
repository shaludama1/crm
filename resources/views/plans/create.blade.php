<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Plan For : '.$shop->name) }}
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

        <form action="{{ url('shops/'.$shop->id.'/plan/store') }}" method="POST">
            @csrf
            <h2 class="mt-3">{{ $shop->name }}</h2>
            <hr>
            <label class="mt-3" for="name">Plan Name</label>
            <input type="text" class="form-control" name="name">
            <label class="mt-3" for="price">Plan Price</label>
            <input type="text" class="form-control" name="price">
            <button type="submit" class="btn btn-md btn-success mt-2">Create Plan</button>
        </form>
        
     
    </div>
    
 
    
</x-app-layout>
