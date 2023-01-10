@extends('layouts.UserProfile')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">სპეციალობები და სერვისები</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('AdminPanel')}}">ადმინ-პანელი</a></li>
                        <li class="breadcrumb-item">სპეციალობები</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('body')
    <div class="row mt-5">

        <div class="col-lg-10 mx-auto mb-3">
            @if($errors->any())
                <div class="alert alert-danger" style="font-size: 80%">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <li class="list-group-item">
                        <div class="card p-3">
                            <label class="text-center">ახალი სპეციალობის დამატება.</label>
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{route('AdminPanel.addSpec')}}"
                                      class="d-flex justify-content-center">
                                    @csrf
                                    <div class="" style="width: 300px; height: 150px">
                                        <input type="text" class="form-control" name="spec" id="spec"
                                               placeholder="სპეციალობა">
                                        <button type="submit" class="btn btn-success mt-3 w-100">დამატება</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </li>

                    <li class="list-group-item">
                        <div class="col-12 mt-3">
                            <div class="card">

                                {{--=================== User Search ==========================--}}
                                <div class="card-header">
                                    <h3 class="card-title">სპეციალობები:</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>სპეციალობა</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        @foreach($Categoriess as $Category)
                                            <tbody>
                                            <tr>
                                                <td>{{$Category->id}}</td>
                                                <td>{{$Category->spec}}</td>
                                                <td>
                                                    <a href="{{ route('AdminPanel.SpecEdit', $Category->id) }}">
                                                        <button class="btn btn-default" title="ნახვა სრულად">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20"
                                                                 fill="dodgerblue" class="bi bi-eye-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <div class="PaginBtn mt-3 d-flex justify-content-center">
                                        <label
                                            class="">{{ $Categoriess->appends([])->links() }}</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </li>
                </div>
                <div class="col-md-6">
                    <li class="list-group-item">
                        <div class="card p-3">
                            <label class="text-center">ახალი მომსახურების დამატება.</label>
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{route('AdminPanel.addRole')}}"
                                      class="d-flex justify-content-center">
                                    @csrf
                                    <div class="" style="width: 300px; height: 150px">
                                        <select class="form-control" name="role" id="role">
                                            @foreach($Categories as $category)
                                                <option class=""
                                                        value="{{$category->spec}}">{{$category->spec}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control" name="service" id="service"
                                               placeholder="მომსახურება">
                                        <button type="submit" class="btn btn-success mt-3 w-100">დამატება</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </li>

                    <li class="list-group-item">
                        <div class="col-12 mt-3">
                            <div class="card">

                                {{--=================== User Search ==========================--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="btn-group">
                                        <form method="get" action="{{route('AdminPanel.RoleSearch')}}">
                                            <div class="card-tools">
                                                <div class="btn-group">
                                                    <select class="form-control" name="RoleSearch" id="RoleSearch">
                                                        @foreach($Categories as $Role)
                                                            <option class=""
                                                                    value="{{$Role->spec}}">{{$Role->spec}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <a href="{{route('AdminPanel.Categories')}}">
                                            <button class="btn btn-default">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-arrow-clockwise"
                                                     viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->


                                <div class="card-body table-responsive p-0">
                                    @if(isset($Services))
                                        @if(count($Services))
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>სპეციალობა</th>
                                                    <th>მომსახურება</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                @foreach($Services as $Role)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$Role->id}}</td>
                                                        <td>{{$Role->role}}</td>
                                                        <td>{{$Role->service}}</td>
                                                        <td>
                                                            <a href="{{ route('AdminPanel.RoleEdit', $Role->id) }}">
                                                                <button class="btn btn-default" title="ნახვა სრულად">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                         height="20"
                                                                         fill="dodgerblue" class="bi bi-eye-fill"
                                                                         viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                        <path
                                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                            <div class="PaginBtn mt-3 d-flex justify-content-center">
                                                <label
                                                    class="">{{ $Services->appends(['RoleSearch' => request()->RoleSearch])->links() }}</label>
                                            </div>
                                        @else
                                            <div
                                                class="NotFound bg-warning d-flex justify-content-center pt-3">
                                                <p class="">ჩანაწერი არ მოიძებნა.</p>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </li>
                </div>
            </div>
        </div><!-- /.col-lg-10 -->


        {{--    სტატისტიკა    --}}
        <div class="col-lg-2">
            <div class="CardInfo mb-3">
                <label class="">სტატისტიკა</label>
                <div class="mt-3">
                    <p class="">სპეციალობა: {{$Statistic['allspec']}}</p>
                </div>
                <div class="">
                    <p class="">მომსახურება: {{$Statistic['allservice']}}</p>
                </div>
            </div>

            <div class="CardInfo mb-3">
                <label class=""></label>
                <div class="mt-3">
                    <p class=""></p>
                </div>
                <div class="">
                    <p class="" style="color: green"></p>
                </div>
                <div class="">
                    <p class="" style="color: red"></p>
                </div>
            </div>

            <div class="CardInfo mb-3">
                <label class=""></label>
                <div class="mt-3">
                    <p class=""></p>
                </div>
                <div class="">
                    <p class="" style="color: green"></p>
                </div>
                <div class="">
                    <p class="" style="color: red"></p>
                </div>
            </div>
        </div><!-- /.col-lg-3 -->
    </div> <!-- /row -->
@endsection
