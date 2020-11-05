<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit : '.$shop->name) }}
        </h2>
    </x-slot>


    <div class="container col-md-4">
        
        @if(\Session::has('done'))
        <div class="alert alert-success mt-3">
            {{ \Session::get('done') }}
        </div>
        @endif

        
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('shops.update' , $shop->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <label class="mt-3" for="name">Shop Name</label>
            <input type="text" class="form-control" name="name" value="{{ $shop->name }}">
            <label class="mt-3" for="location">Shop Location</label>
            <input type="text" class="form-control" name="location" value="{{ $shop->location }}">
            <button type="submit" class="btn btn-md btn-warning mt-2">Edit Shop</button>
        </form>
        
     
    </div>
    
 
    
</x-app-layout>
