@extends('layouts.UserProfile')

@section('header')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პირადი ინფორმაცია</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">პროფილი</a></li>
                        <li class="breadcrumb-item">პირადი ინფორმაცია</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection




@section('body')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$Stats['CountActiveRes']}}</h3>

                    <p>ჩემი ჯავშნები</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                {{--                            <a href="#" class="small-box-footer">ნახე მეტი <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->

        @if((Auth::user()->staffstatus == 'Staff') || (Auth::user()->staffstatus == 'Manager'))
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$Stats['CountMyActiveEvents']}}<sup style="font-size: 20px"></sup></h3>

                    <p>კლიენტის დაჯავშნული ვიზიტი</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{--                            <a href="#" class="small-box-footer">ნახე მეტი <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        @endif

        @if(Auth::user()->staffstatus == '')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$Stats['CountReservs']}}<sup style="font-size: 20px"></sup></h3>

                    <p>ჩემი აქტიური ჯავშნები</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{--                            <a href="#" class="small-box-footer">ნახე მეტი <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
    @endif


        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$feedbacks}}</h3>

                    <p>კომენტარები</p>
                </div>
                <div class="icon">
                    {{--                                <i class="ion ion-person-add"></i>--}}
                    <i class="far fa-comments"></i>
                </div>
                {{--                            <a href="#" class="small-box-footer">ნახე მეტი <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$Stats['Rating']}}</h3>

                    <p>რეიტინგი</p>
                </div>
                <div class="icon">
                    {{--                                <i class="ion ion-pie-graph"></i>--}}
                    <i class="fas fa-heart"></i>
                </div>
                {{--                            <a href="#" class="small-box-footer">ნახე მეტი <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->





    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-md-6 mx-auto mt-5 mb-5 p-0">

                <div class="text-center">
                    @if(Auth::user()->photo != '')
                        <img class="profile-user-img img-fluid img-circle" src="../../storage/{{$user->photo}}"
                             alt="User profile picture">
                    @else
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/DefaultAvatar.png')}}"
                             alt="User profile picture">
                    @endif
                </div>

                <p class="text-muted text-center">{{$user->access}}</p>





                <div class="userinfocard mt-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>პირადი ინფორმაცია</th>
                            <th>@if(Auth::user()->phone != '')
                                    <a href="{{ route('UserProfile.edit', Auth::user()->id) }}"
                                       class="btn btn-primary">განაახლე</a>
                                @else
                                    <a href="{{ route('UserProfile.edit', Auth::user()->id) }}"
                                       class="btn btn-primary">შეავსე</a>
                                @endif</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>სახელი:</td>
                            <td>
                                {{$user->firstname}}
                            </td>
                        </tr>
                        <tr>
                            <td>გვარი:</td>
                            <td>
                                {{$user->lastname}}
                            </td>
                        </tr>
                        <tr>
                            <td>მობილური:</td>
                            <td>
                                {{$user->phone}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>სხვა მონაცემები</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ID:</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>ელ. ფოსტა:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>რეიტინგი:</td>
                            <td>{{$user->rating}}</td>
                        </tr>
                        <tr>
                            <td>სტატუსი:</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('Job')}}">
                                        <button class="btn btn-info">{{$user->access}}</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>შეიქმნა:</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>

            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->


@endsection
