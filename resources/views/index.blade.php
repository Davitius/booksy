@extends('layouts.main')

@section('content')

    <main>
        {{-- ========== კარუსელი ========== --}}
        <center>
            <div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button id="CaruselSlideBtn1" type="button" data-bs-target="#myCarousel" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button id="CaruselSlideBtn2" type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    <button id="CaruselSlideBtn3" type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                </div><!-- /.carousel-indicators -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="carouselimg" src="img/carousel1.jpg">
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1 class="CarouselText1">მოძებნე საუკეთესო სტილისტი.</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="carouselimg" src="img/carousel2.jpg">
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 class="CarouselText2">დაჯავშნე ადგილი.</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="carouselimg" src="img/carousel3.jpg">
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1 class="CarouselText3">მიიღე საუკეთესო სერვისი.</h1>
                            </div>
                        </div>
                    </div>
                </div><!-- /.carousel-inner -->
            </div><!-- /.myCarousel -->
        </center>


        {{-- ========== ქალაქის ასარჩევი ========== --}}
        <div class="container">
            <div class="city mx-auto mb-3">
                    <select class="city" id="city" name="city" onchange="getSelectValue();">
                        <option value="">აირჩიეთ ქალაქი.</option>
                        <option value="თბილისი">თბილისი.</option>
                        <option value="ბათუმი">ბათუმი.</option>
                        <option value="ქუთაისი">ქუთაისი.</option>
                        <option value="რუსთავი">რუსთავი.</option>
                        <option value="გორი">გორი.</option>
                        <option value="ზუგდიდი">ზუგდიდი.</option>
                        <option value="ფოთი">ფოთი.</option>
                        <option value="ხაშური">ხაშური.</option>
                        <option value="სამტრედია">სამტრედია.</option>
                        <option value="სენაკი">სენაკი.</option>
                        <option value="ზესტაფონი">ზესტაფონი.</option>
                        <option value="მარნეული">მარნეული.</option>
                        <option value="თელავი">თელავი.</option>
                        <option value="ახალციხე">ახალციხე.</option>
                        <option value="ქობულეთი">ქობულეთი.</option>
                        <option value="ოზურგეთი">ოზურგეთი.</option>
                        <option value="კასპი">კასპი.</option>
                        <option value="ჭიათურა">ჭიათურა.</option>
                        <option value="წყალტუბო">წყალტუბო.</option>
                        <option value="საგარეჯო">საგარეჯო.</option>
                        <option value="გარდაბანი">გარდაბანი.</option>
                        <option value="ბორჯომი">ბორჯომი.</option>
                        <option value="ტყიბული">ტყიბული.</option>
                        <option value="ხონი">ხონი.</option>
                        <option value="ბოლნისი">ბოლნისი.</option>
                        <option value="ახალქალაქი">ახალქალაქი.</option>
                        <option value="გურჯაანი">გურჯაანი.</option>
                        <option value="მცხეთა">მცხეთა.</option>
                        <option value="ყვარელი">ყვარელი.</option>
                        <option value="ახმეტა">ახმეტა.</option>
                        <option value="ქარელი">ქარელი.</option>
                        <option value="ლანჩხუთი">ლანჩხუთი.</option>
                        <option value="დუშეთი">დუშეთი.</option>
                        <option value="საჩხერე">საჩხერე.</option>
                        <option value="დედოფლისწყარო">დედოფლისწყარო.</option>
                        <option value="ლაგოდეხი">ლაგოდეხი.</option>
                        <option value="ნინოწმინდა">ნინოწმინდა.</option>
                        <option value="აბაშა">აბაშა.</option>
                        <option value="წნორი">წნორი.</option>
                        <option value="თერჯოლა">თერჯოლა.</option>
                        <option value="მარტვილი">მარტვილი.</option>
                        <option value="ხობი">ხობი.</option>
                        <option value="წალენჯიხა">წალენჯიხა.</option>
                        <option value="ვანი">ვანი.</option>
                        <option value="ბაღდათი">ბაღდათი.</option>
                        <option value="ვალე">ვალე.</option>
                        <option value="ჩხოროწყუ">ჩხოროწყუ.</option>
                        <option value="თეთრიწყარო">თეთრიწყარო.</option>
                        <option value="დმანისი">დმანისი.</option>
                        <option value="ონი">ონი.</option>
                        <option value="წალკა">წალკა.</option>
                        <option value="ამბროლაური">ამბროლაური.</option>
                        <option value="სიღნაღი">სიღნაღი.</option>
                        <option value="ცაგერი">ცაგერი.</option>
                        <option value="ჯვარი">ჯვარი.</option>
                    </select>
            </div>
        </div><!-- /.container -->


        {{-- ========== სლაიდერი მენიუ ========== --}}
        <div class="container mb-5">
            <div class="SliderMenuDiv">
                <input type="radio" name="dot" id="one">
                <input type="radio" name="dot" id="two">
                <div class="main-card">
                    <div class="cards">
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/cuttinghair.jpg"
                                             alt="თმის შეჭრა, შეღებვა, ვარცხნილობა">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">თმის შეჭრა, შეღებვა, ვარცხნილობა</div>
                                    </div>
                                    <input type="text" id="location1" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch"
                                           value="თმის შეჭრა, შეღებვა, ვარცხნილობა" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/shave.jpeg" alt="წვერის გაპარსვა">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">წვერის გაპარსვა</div>
                                    </div>
                                    <input type="text" id="location2" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="წვერის გაპარსვა" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/Makeup.jpg" alt="მაკიაჟი">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">მაკიაჟი</div>
                                    </div>
                                    <input type="text" id="location3" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="მაკიაჟი" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/manicure.jpg" alt="მანიკური">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">მანიკური</div>
                                    </div>
                                    <input type="text" id="location4" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="მანიკური" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/Pedicure.jpg" alt="პედიკური">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">პედიკური</div>
                                    </div>
                                    <input type="text" id="location5" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="პედიკური" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/lashes_brows.jpg" alt=">წარბები და წამწამები">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">წარბები და წამწამები</div>
                                    </div>
                                    <input type="text" id="location6" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="წარბები და წამწამები"
                                           hidden>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.cards -->
                    <div class="cards">
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/tattooing.jpg" alt="ტატუირება">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">ტატუირება</div>
                                    </div>
                                    <input type="text" id="location7" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="ტატუირება" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/spa.jpg" alt="სპა">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">სპა</div>
                                    </div>
                                    <input type="text" id="location8" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="სპა" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/Epilation.jpg" alt="ეპილაცია">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">ეპილაცია</div>
                                    </div>
                                    <input type="text" id="location9" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="ეპილაცია" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/skincare.jpg" alt="კანის მოვლა">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">კანის მოვლა</div>
                                    </div>
                                    <input type="text" id="location10" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="კანის მოვლა" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/Festivehairstyle.jpg"
                                             alt="სადღესასწაულო მაკიაჟი, ვარცხნილობა">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">სადღესასწაულო მაკიაჟი, ვარცხნილობა</div>
                                    </div>
                                    <input type="text" id="location11" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch"
                                           value="სადღესასწაულო მაკიაჟი, ვარცხნილობა" hidden>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="get" action="{{route('menusearch')}}">
                                <div class="content">
                                    <button class="contentBtn" type="submit">
                                    <div class="img">
                                        <img src="img/servicemenu/solarium.jpg" alt="სოლარიუმი">
                                    </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">სოლარიუმი</div>
                                    </div>
                                    <input type="text" id="location12" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch" value="სოლარიუმი" hidden>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.cards -->
                </div><!-- /.min-card -->

                <div class="button" style="display: flex; justify-content: center; margin-top: 1em">
                    <label for="one" class=" active one"></label>
                    <label for="two" class="two"></label>
                </div>
            </div><!-- /.SliderMenuDiv -->
        </div><!-- /.container -->


        {{-- ========== სვაიპერი "ჩვენ გირჩევთ" ========= --}}
        <div class="col-md-10 mx-auto recomended pt-5 pb-3 mb-5">
{{--            <hr class="featurette-divider">--}}
            <h2 class="GeoArtText">ჩვენ გირჩევთ:</h2>
            <div class="mainswiper">
                <div class="swiper mySwiper container">
                    <div class="swiper-wrapper content">


                        @foreach($BestUsers as $best)
                            <div class="swiper-slide card-swiper">
                                <div class="card-content">
                                    <div class="image">
                                        @if($best->photo != '')
                                            <a class="" href="{{route('SalonStaff', $best->id)}}">
                                                <img class="Staffimg" alt="პერსონალის ფოტო"
                                                     src="../../storage/{{$best->photo}}">
                                                <a/>
                                                @else
                                                    <a class="" href="{{route('SalonStaff', $best->id)}}">
                                                        <img class="Staffimg" alt="პერსონალის ფოტო"
                                                             src="img/barberdefault.jpg">
                                                    </a>
                                        @endif
                                    </div>
                                    <div class="media-icons">
                                        <i class="fab fa-facebook"></i>
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-github"></i>
                                    </div>
                                    <div class="name-profession">
                                        <span class="name">{{$best->firstname}} {{$best->lastname}}</span>
                                        <span class="profession">{{$best->role}}</span>
                                    </div>
                                    <div class="BestRating1">
                                        <div class="text-center mx-auto SalonRatingDiv">
                                            {{--                                        <label class="ratingSmall">{{$result->rating}}</label>--}}
                                            @if($best->rating == 0)
                                                <i class="fa-regular fa-star"></i>
                                            @else
                                                @if ($best->rating > 0 && $best->rating <= 0.5)
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                @endif
                                                @if ($best->rating > 0.5)
                                                    <i class="fa-solid fa-star"></i>

                                                @endif
                                            @endif

                                            @if($best->rating < 1)
                                                <i class="fa-regular fa-star"></i>
                                            @else
                                                @if ($best->rating >= 1 && $best->rating <= 1.5)
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                @endif
                                                @if ($best->rating > 1.5)
                                                    <i class="fa-solid fa-star"></i>
                                                @endif
                                            @endif

                                            @if($best->rating < 2)
                                                <i class="fa-regular fa-star"></i>
                                            @else
                                                @if ($best->rating >= 2 && $best->rating <= 2.5)
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                @endif
                                                @if ($best->rating > 2.5)
                                                    <i class="fa-solid fa-star"></i>
                                                @endif
                                            @endif

                                            @if($best->rating < 3)
                                                <i class="fa-regular fa-star"></i>
                                            @else
                                                @if ($best->rating >= 3 && $best->rating <= 3.5)
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                @endif
                                                @if ($best->rating > 3.5)
                                                    <i class="fa-solid fa-star"></i>
                                                @endif
                                            @endif

                                            @if($best->rating < 4)
                                                <i class="fa-regular fa-star"></i>
                                            @else
                                                @if ($best->rating >= 4 && $best->rating <= 4.5)
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                @endif
                                                @if ($best->rating > 4.5)
                                                    <i class="fa-solid fa-star"></i>
                                                @endif
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
{{--                <div class="swiper-button-next"></div>--}}
{{--                <div class="swiper-button-prev"></div>--}}
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- საიტის სერვისი -->
        <div class="marketing col-md-10 mx-auto">
{{--            <hr class="featurette-divider">--}}
            <div class="featurette">
                <div class="col-md-7">
                    <h3 class="">მოძებნე საუკეთესო სტილისტი ან სალონი. </h3>
                    <p class="lead"></p>
                </div>
                <div class="col-md-5">
                    <img class="frontimg" src="img/frontimg1.PNG">
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="featurette">
                <div class="col-md-7">
                    <h3 class="">დაჯავშნე სპეციალისტთან ვიზიტი შენთვის სასურველ
                        დროს. </h3>
                    <p class="lead"></p>
                </div>
                <div class="col-md-5">
                    <img class="frontimg" src="img/frontimg2.PNG">
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="featurette">
                <div class="col-md-7">
                    <h3 class="">მიიღე მაღალი ხარისხის სერვისი. </h3>
                    <p class="lead"></p>
                </div>
                <div class="col-md-5">
                    <img class="frontimg" src="img/frontimg3.PNG">
                </div>
            </div>
        </div><!-- /.container -->

    </main>
@endsection
