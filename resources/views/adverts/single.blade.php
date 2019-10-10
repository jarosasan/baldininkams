@extends('layouts.app')
@section('content')

 <ul>
    {{--<li>ID {{$advert->id}}</li>--}}
    <li>{{$advert->title}}</li>
    <li>{{$advert->type}}</li>
    <li>{{$advert->description}}</li>
    <li>User {{$advert->user_id}}</li>
    <li>Category {{$advert->category}}</li>
    <li>Phone {{$advert->phone}}</li>
    <li>Email {{$advert->email}}</li>
    <li>Web {{$advert->web_page}}</li>
    {{--<li>{{$advert->image}}</li>--}}
    <li>{{$advert->city}}</li>
     @if($advert->price)<li>{{$advert->price}} {{$advert->currency}}</li>>@else<li>{{$advert->type}}</li>@endif
    <li>{{$advert->created_at}}</li>
    <li>Status {{$advert->status_id}}</li>
</ul>
@endsection('content')


