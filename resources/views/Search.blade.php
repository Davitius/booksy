@extends('layouts.main')

@section('content')

    <main>
        <div class="min-vh-100">
            <div class="container pt-5">
                <div class="city mx-auto mb-3">
                        <select class="city" id="city" name="city" onchange="getSelectValue();">
                            @if($city == '')
                                <option value="">აირჩიეთ ქალაქი.</option>@endif
                            <option value="">{{$city}}</option>
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
                </div><!-- /.col-sm-4 -->


                {{--                 ========== მენიუ - სლაიდერი ==========--}}
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

            {{--  ძებნის შედეგი  --}}
            <div class="container min-vh-100 pb-3 mt-3">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($search as $result)
                        <div class="col-md-3">
                            <div class="salon_card shadow-sm">
                                <div class="SalonPosterDiv">
                                    @if($result->photo != '')
                                        <a href="{{ route('Salon', $result->id) }}">
                                            <img class="salonposterimg" src="../../storage/{{$result->photo}}"
                                                 alt="salon picture"></a>
                                    @else
                                        <a href="{{ route('Salon', $result->id) }}">
                                            <img src="{{asset('img/nophoto1.png')}}" class="salonposterimg"></a>
                                    @endif
                                </div>
                                <div class="SalonNameDiv">
                                    <p style="font-size: 120%"> {{$result->name}}</p>
                                    <div class="motto">
                                        <p> {{$result->motto}}</p>
                                    </div>
                                </div>
                                <div class="row SalonRating1">
                                    <div class="text-center mx-auto SalonRatingDiv">
                                        @if($result->rating == 0)
                                            <i class="fa-regular fa-star"></i>
                                        @else
                                            @if ($result->rating > 0 && $result->rating <= 0.5)
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                            @endif
                                            @if ($result->rating > 0.5)
                                                <i class="fa-solid fa-star"></i>

                                            @endif
                                        @endif

                                        @if($result->rating < 1)
                                            <i class="fa-regular fa-star"></i>
                                        @else
                                            @if ($result->rating >= 1 && $result->rating <= 1.5)
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                            @endif
                                            @if ($result->rating > 1.5)
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                        @endif

                                        @if($result->rating < 2)
                                            <i class="fa-regular fa-star"></i>
                                        @else
                                            @if ($result->rating >= 2 && $result->rating <= 2.5)
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                            @endif
                                            @if ($result->rating > 2.5)
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                        @endif

                                        @if($result->rating < 3)
                                            <i class="fa-regular fa-star"></i>
                                        @else
                                            @if ($result->rating >= 3 && $result->rating <= 3.5)
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                            @endif
                                            @if ($result->rating > 3.5)
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                        @endif

                                        @if($result->rating < 4)
                                            <i class="fa-regular fa-star"></i>
                                        @else
                                            @if ($result->rating >= 4 && $result->rating <= 4.5)
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                            @endif
                                            @if ($result->rating > 4.5)
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /.row -->
                <div class="PaginBtn mt-3 d-flex justify-content-center">
                    <label
                        class="">{{ $search->appends(['MenuSearch' => request()->Search])->links() }}</label>
                </div>
                @if(count($search) == '')
                    <div class="notfoundDiv mx-auto">
                        <label class="">ჩანაწერი არ მოიძებნა.</label>
                    </div>
                @endif
            </div><!-- /.container min-vh-80 mb-3 mt-3-->
        </div><!-- /.min-vh-100 -->
    </main>
@endsection
