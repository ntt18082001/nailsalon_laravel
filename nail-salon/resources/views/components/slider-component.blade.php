 <!-- HERO-1
   ============================================= -->
 <section id="hero-1" class="hero-section division">
     <!-- SLIDER -->
     <div class="slider">
         <ul class="slides">
             @foreach ($data as $item)
                 <li id="slide-{{ $item->id }}">
                     <!-- Background Image -->
                     <img src="/storage/slider/{{ $item->img_path }}" alt="slide-background" />
                 </li>
             @endforeach
         </ul>
     </div>
     <!-- END SLIDER -->
 </section>
 <!-- END HERO-1 -->
