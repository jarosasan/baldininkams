@extends('layouts.app')
@section('content')
    <ul>

    @foreach($adverts as $advert)
        <li><ul>
                <li>{{$advert->id}}</li>
                <li>{{$advert->title}}</li>
                <li>{{$advert->type}}</li>
                <li>{{$advert->short_description}}</li>
                {{--<li>{{$advert->image}}</li>--}}
                <li>{{$advert->city}}</li>
                <li>@if($advert->price){{$advert->price}} {{$advert->currency}}@endif</li>
                <li>{{$advert->created_at}}</li>
            </ul>
            </li>
        @endforeach
    </ul>


@endsection('content')
