@extends('layout')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Todo App</title>
</head>
<body>
<body style="background-color: #DFD3C3">
    <div class="wrapper bg-white w-50 mx-auto h-80 mt-5 px-4" style="border-radius: 20px; padding: 20px;">
        @if (Session::get('notAllowed'))
        <div>
            {{Session::get('notAllowed')}}
        </div>
        @endif
        @if (Session::get('successAdd'))
        <div>
            {{Session::get('successAdd')}}
        </div>
        @endif
        @if (Session::get('successUpdate'))
        <div class="alert alert-info">
           <div>
            {{Session::get('successUpdate')}}
           </div>
        </div>
           @endif
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a href="{{route('create')}}" class="text-success">Create</a>  <a href="">Complated</a>
                </span>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fas fa-info" title="Info"></span>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted fas fa-comment btn"></span>
                </div>
                <div class="text-muted">2 todos</div>
                <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
            </div>
        </div>
        <div id="comments" class="mt-1">
            @foreach ($todos as $todo)
            <div class="comment d-flex align-items-start justify-content-between">
                <div class="mr-2">
                    <label class="option">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="d-flex flex-column">
                    {{--menampilkan data dinamis/data yg diambil dari db pada blade harus menggunakan{{}}--}}
                    {{-- path yang {id} dikirim data dinamis (data dr db) makanya disitu pake {{}}--}}
                    <a href="/edit/{{$todo['id']}}" class="text-justify">
                        {{$todo['title']}}
                    </a>
                    <p>{{$todo['description']}}</p>
                    {{--konsep ternary : if column status baris ini isinya 1 bakal mclin teks 'Complated' selain dari tiu akan menampilkan teks 'On-Process'--}}
                    <p class="text-muted">
                        {{$todo['status'] == 1 ? 'Complated' : 'On-Process'}} <span class="date">Dec 16, 2019</span></p>
                        {{--carboin itu package laravel untuk mengelola yg berhubngan dengan date. tedinya value column date di db kan 
                        bentuknya format 2022-11-22 nah kita pengaen ubh bentuk formatnya jadi 22 november, 2022--}}
                </div>
                <div class="ml-md-4 ml-0">
                    <span class="date">{{\Carbon\Carbon::parse($todo['date'])->format('j F, Y')}}</span>
                </div>
            </div>
          @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
@endsection