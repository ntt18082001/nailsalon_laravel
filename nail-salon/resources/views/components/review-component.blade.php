@foreach ($data as $key => $value)
    <div class="review-1">

        <!-- Quote Icon -->
        <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
        </div>

        <!-- Text -->
        <p class="p-xl">&Prime;{{$value}} &Prime;
        </p>

        <!-- Testimonial Author -->
        <span class="testimonial-autor black--color">&mdash; {{$key}}</span>

    </div>
@endforeach
