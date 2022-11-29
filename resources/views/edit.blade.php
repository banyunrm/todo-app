@extends('layout')

@section('content')
    
<div class="container content">  
    <form id="create-form" action="/todo/update/{{$todo['id']}}" method="POST">
       {{-- mengambil da nmengirim data input ke cotroller yang nantinya diambil oleh $request--}}
        @csrf
        @method('PATCH')
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif    
      <h3>Edit Todo</h3>
      
      <fieldset>
          <label for="">Title</label>
          {{--attribute value fungsinya untuk memasukkan data ke input--}}
          {{--kenapa datanya harus disimpan di input? karena ini kan fitur edit, kalau fitur edit belum tentu
          semua data column diubah. jadi untuk mengantisipasi hal itu, tampilin dulu semua data di inputnya baru nantinya pengguna yg menentukan data input
          mana yang mau diubah--}}
          <input placeholder="title of todo" type="text" name="title" value="{{$todo['title']}}">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date" value="{{$todo['date']}}">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          {{--karena textrarea tidak termasuk tag input, untuk menampilkan valuenya di pertengahan (sebelum penutup tag</textarea)--}}
          <textarea value="{{$todo['description']}}" name="description" placeholder="Type your descriptions here..." tabindex="5">{{$todo['description']}}</textarea>
      </fieldset>
      <fieldset>
          <button type="submit" id="contactus-submit">Submit</button>
      </fieldset>
      <fieldset>
          <a href="/todo/" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

@endsection