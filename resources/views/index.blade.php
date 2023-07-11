@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach ($categories as $category)
      <div class="col-md-12">
            <h2 style="color:blue">{{ $category->name }}</h2>
            <div class="jumbutron">
                <div class="row">
                   @foreach (App\Models\Food::where('category_id', $category->id)->get() as $food)
                   <div class="col-md-3"> <img src="{{ asset('image') }}/{{ $food->image }}" width="200" height="155">
                    <span><p class="text-">{{ $food->name }}
                         <p>Rp. {{ $food->price }}</p> 
                        </p></span>
                        <p class="text-">
                            <a href="{{ route('detail',[$food->id]) }}">
                                <button class="btn btn-outline-danger">View</button>
                            </a>
                    </p>
                    </div>  
                   @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- <p style="color:blue">Hubungi Kami by. WhatsApp 081382563453</p> --}}
</div>
@endsection