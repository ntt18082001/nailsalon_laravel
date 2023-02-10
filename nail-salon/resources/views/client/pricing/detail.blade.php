<x-client-layout title="{{ $data->name }}">
    <div class="container mt-100">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ route('client.home') }}/{{ "storage/nailservice/$data->cover_path" }}" />
            </div>
            <div class="col-md-6">
                <h4>{{$data->name}}</h4>
                <p><strong>Note: </strong>{{$data->description}}</p>
                <p>Time duration: {{$data->duration}} mins</p>
                @if (isset($data->price_couleur))
                    <p><strong>Price Couleur: </strong>{{$data->price_couleur}}</p>
                @endif
                @if (isset($data->price_naturel))
                    <p><strong>Price Naturel: </strong>{{$data->price_naturel}}</p>
                @endif
                @if (isset($data->price_french))
                    <p><strong>Price French: </strong>{{$data->price_french}}</p>
                @endif
                <div class="mt-10 text-end">
                    <a href="{{route('client.booking.index')}}" class="btn rose--btn">Booking</a>
                </div>
            </div>
        </div>
    </div>
</x-client-layout>
