@foreach ($data as $item)
    @if (count($item->list_nail_services) > 0)
        <h6>{{ $item->name }}</h6>
        <ol>
            @foreach ($item->list_nail_services as $nail)
                <li>
                    <div class="form-check" data-cate-name="{{$item->name}}" data-service-name="{{$nail->name}}" 
                        data-price="{{$nail->price_couleur}}" data-id="{{$nail->id}}">
                        <input class="form-check-input checkbox" type="checkbox" id="inlineCheckbox{{ $nail->id }}">
                        <label class="form-check-label" for="inlineCheckbox{{ $nail->id }}" style="display: block">
                            <span>{{ $nail->name }} </span><span> - {{ $nail->price_couleur }} €</span>
                        </label>
                    </div>
                </li>
            @endforeach
        </ol>
    @endif
@endforeach
