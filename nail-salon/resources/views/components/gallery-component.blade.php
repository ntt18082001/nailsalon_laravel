    <!-- GALLERY-4
============================================= -->
    <section id="gallery-4" class="gallery-section division">
        <!-- GALLERY-4  -->
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
                @foreach ($data as $item)
                    <!-- ROW -->
                    <div class="col">
                        <!-- IMAGE #1 -->
                        <div id="img-4-1" class="gallery-image">
                            <a class="image-link" href="storage/nailservice/{{$item->cover_path}}">
                                <div class="hover-overlay">
                                    <!-- Image -->
                                    <img class="img-fluid" src="storage/nailservice/{{$item->cover_path}}"
                                        alt="gallery-image" />
                                    <div class="item-overlay"></div>

                                    <!-- Image Description -->
                                    <div class="image-description white--color">
                                        <div class="image-caption">
                                            <h5 class="h5-lg">{{$item->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END ROW -->
                @endforeach
            </div>
            <!-- End row -->
        </div>
        <!-- END GALLERY-4  -->
    </section>
    <!-- END GALLERY-4 -->
