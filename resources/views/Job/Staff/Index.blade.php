@extends('layouts.UserProfile')

@section('header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პერსონალი</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">ოფისი</a></li>
                        <li class="breadcrumb-item">პერსონალი</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('body')
    <div class="row mt-5">

        <div class="col-lg-8">
            {{--=================== თანამშრომლის დამატება ========================================--}}
            <li class="list-group-item">
                <b>პერსონალის პარამეტრები</b>
            </li>
            {{--=================== Staff Search ==========================--}}
            <li class="list-group-item mb-3">
                <div class="row p-3">
                    <div class="col-md-6 card">
                        <div class="card-header">
                            <h3 class="card-title">თქვენი სპეციალობა: {{ Auth::user()->role }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <form method="post" action="{{ route('Staff.RoleUpdate') }}">
                            @csrf
                            @method('patch')
                            <select class="form-control" name="spec" id="spec">
                                @foreach($specs as $spec)
                                    <option class="" value="{{ $spec->spec }}">{{ $spec->spec }}</option>
                                @endforeach
                            </select>
                            <div class="d-flex justify-content-around m-3">
                                <div class="form-check mt-1">
                                    <input type="checkbox" class="form-check-input" name="RoleConcent"
                                           id="RoleConsent"
                                           required>
                                    <label class="form-check-label"
                                           for="exampleCheck1">ვეთანხმები</label>
                                </div>
                                <button class="btn btn-success" type="submit">შეცვლა</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <div class="col-md-6 card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">თარიღი: {{date(time())}}</h3>
                            @if(Auth::user()->dayoff == 'working')
                                <form method="post" action="{{ route('Staff.WorkingUpdate') }}">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-default">დაისვენე</button>
                                </form>
                            @else
                                <form method="post" action="{{ route('Staff.WorkingUpdate') }}">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-default">ვმუშაობ</button>
                                </form>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        @if(Auth::user()->dayoff == 'working')
                            <div
                                class="card-body table-responsive p-0 d-flex justify-content-center align-items-center">
                                <img class="w-25" style="border-radius: 60px" src="/img/barberworking.gif">
                            </div>
                        @else
                            <div class="alert alert-danger p-0 text-center">
                                <label class="" style="font-weight: normal">თქვენ იმყოფებით დასვენების რეჟიმზე!</label>
                                <label class="" style="font-weight: normal">დასვენების რეჟიმის დროს ადგილის დაჯავშნა
                                    შეუძლებელია!</label>
                            </div>
                    @endif
                    <!-- /.card-body -->
                    </div>
                </div><!-- /.row -->


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ჩემი პრეისკურანტი.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-50">მომსახურება</th>
                                    <th>შესრულების დრო</th>
                                    <th>ფასი (₾)</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>

                                @foreach($BarbAbils as $ba)
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label class="w-100"
                                                   style="font-weight: normal">{{$ba->service}}</label>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <label class=""
                                                       style="font-weight: normal">{{$ba->hour}}:{{$ba->minute}}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <label class=""
                                                   style="font-weight: normal">{{$ba->price}}</label>
                                        </td>
                                        <td>
                                            <form action="{{ route('Staff.AbilityDelete', $ba->id) }}"
                                                  method="post">
                                                @csrf
                                                <button class="btn btn-default" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                         height="20"
                                                         fill="red"
                                                         class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-12 -->
            </li>


            <li class="list-group-item mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{Auth::user()->role}} - შესაძლო მომსახურება.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if($errors->any())
                                <div class="alert alert-danger" style="font-size: 80%">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>

                                    <th class="w-50">მომსახურება</th>
                                    <th>შესრულების დრო</th>
                                    <th>ფასი (₾)</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>

                                @foreach($userspecs as $userspec)
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label class="w-100"
                                                   style="font-weight: normal">{{$userspec->service}}</label>
                                        </td>
                                        <form method="post" action="{{ route('Staff.AbilityCreate', $userspec->id) }}">
                                            @csrf
                                            <td>
                                                <div class="btn-group">
                                                    <select class="form-control" name="hour" id="hour"
                                                            style="width: 100px">
                                                        <option class="" value="">საათი</option>
                                                        <option class="" value="0">0</option>
                                                        @for($h=1; $h<10; $h++)
                                                            <option class="" value="{{$h}}">{{$h}}</option>
                                                        @endfor
                                                    </select>
                                                    <label class=""
                                                           style="margin-right: 0.7em; margin-left: 0.7em; margin-top: 0.4em;">:</label>
                                                    <select class="form-control" name="minute" id="mminute"
                                                            style="width: 100px">
                                                        <option class="" value="">წუთი</option>
                                                        <option class="" value="00">00</option>
                                                        <option class="" value="30">30</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <input class="form-control" name="price" id="price"
                                                       style="width: 70px" type="number">
                                            </td>
                                            <td>
                                                <button class="btn btn-default" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                         height="20"
                                                         fill="green" class="bi bi-plus-circle-dotted"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.col-12 -->
            </li>
        </div>


        <div class="col-lg-4">
            {{--============================= Barber Foto Galery =====================================--}}
            <section class="col-lg-12 mb-5 mx-auto">
                {{--=====  დასახელება =====--}}
                <li class="list-group-item">
                    <b>ჩემი ვარცხნილობები</b>
                </li>
                <form method="post" action="{{ route('Staff.FlipPhotoUpdate') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <li class="list-group-item">
                        <div class="col-12">
                            <div class="card">

                                {{--=====  ფოტო_1 =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group FotoFrame">
                                        <label for="exampleInputFile">ფოტო №1:</label>
                                        <div class="input-group w-50">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="flipphoto1"
                                                       id="flipphoto1">
                                                <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                    ფოტო</label>
                                            </div>
                                        </div>
                                        @if(Auth::user()->flipphoto1 != '')
                                            <img class="barberworksimg" alt="ფოტო №1"
                                                 src="../../storage/{{Auth::user()->flipphoto1}}">
                                        @else
                                            <img class="barberworksimg" alt="ფოტო №1" src="{{asset('img/hsnp.jpg')}}">
                                        @endif
                                    </div>
                                </div>

                                {{--=====  ფოტო_2 =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group FotoFrame">
                                        <label for="exampleInputFile">ფოტო №2:</label>
                                        <div class="input-group w-50">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="flipphoto2"
                                                       id="flipphoto2">
                                                <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                    ფოტო</label>
                                            </div>
                                        </div>
                                        @if(Auth::user()->flipphoto2 != '')
                                            <img class="barberworksimg" alt="ფოტო №2"
                                                 src="../../storage/{{Auth::user()->flipphoto2}}">
                                        @else
                                            <img class="barberworksimg" alt="ფოტო №2" src="{{asset('img/hsnp.jpg')}}">
                                        @endif
                                    </div>
                                </div>

                                {{--=====  ფოტო_3 =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group FotoFrame">
                                        <label for="exampleInputFile">ფოტო №3:</label>
                                        <div class="input-group w-50">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="flipphoto3"
                                                       id="flipphoto3">
                                                <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                    ფოტო</label>
                                            </div>
                                        </div>
                                        @if(Auth::user()->flipphoto3 != '')
                                            <img class="barberworksimg" alt="ფოტო №3"
                                                 src="../../storage/{{Auth::user()->flipphoto3}}">
                                        @else
                                            <img class="barberworksimg" alt="ფოტო №3" src="{{asset('img/hsnp.jpg')}}">
                                        @endif
                                    </div>
                                </div>

                                {{--=====  ფოტო_4 =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group FotoFrame">
                                        <label for="exampleInputFile">ფოტო №4:</label>
                                        <div class="input-group w-50">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="flipphoto4"
                                                       id="flipphoto4">
                                                <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                    ფოტო</label>
                                            </div>
                                        </div>
                                        @if(Auth::user()->flipphoto4 != '')
                                            <img class="barberworksimg" alt="ფოტო №4"
                                                 src="../../storage/{{Auth::user()->flipphoto4}}">
                                        @else
                                            <img class="barberworksimg" alt="ფოტო №4" src="{{asset('img/hsnp.jpg')}}">
                                        @endif
                                    </div>
                                </div>

                                {{--=====  ფოტო_5 =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group FotoFrame">
                                        <label for="exampleInputFile">ფოტო №5:</label>
                                        <div class="input-group w-50">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="flipphoto5"
                                                       id="flipphoto5">
                                                <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                    ფოტო</label>
                                            </div>
                                        </div>
                                        @if(Auth::user()->flipphoto5 != '')
                                            <img class="barberworksimg" alt="ფოტო №5"
                                                 src="../../storage/{{Auth::user()->flipphoto5}}">
                                        @else
                                            <img class="barberworksimg" alt="ფოტო №5" src="{{asset('img/hsnp.jpg')}}">
                                        @endif
                                    </div>
                                </div>

                                {{--=====  თანხმობა =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="concent"
                                               id="consent"
                                               required>
                                        <label class="form-check-label"
                                               for="exampleCheck1">ვეთანხმები</label>
                                    </div>
                                </div>

                                {{--=====  ღილაკები =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="card-body d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">ატვირთე</button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                </div>
                            </div>
                        </div>
                    </li>
                </form>
            </section>
        </div>

    </div> <!-- /row -->


@endsection
