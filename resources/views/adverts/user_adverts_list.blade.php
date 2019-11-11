@extends('layouts.app')
@section('content')
    @foreach($adverts as $advert)
    <div class="ui items">
        <div class="item">
            <div class="ui small image">
                <img src="" alt="Labas">
            </div>
            <div class="content">
                <div class="header">{{$advert->title}}</div>
                <div class="meta">
                    <span class="price">@if($advert->price){{$advert->price}} {{$advert->currency}}@endif</span>
                    <span class="stay">1 Month</span>
                </div>
                <div class="description">
                    <p>{{$advert->short_description}}</p>
                </div>
            </div>
        </div>
    </div>
                    <li>{{$advert->id}}</li>
                    <li>{{$advert->title}}</li>
                    <li>{{$advert->type}}</li>
                    <li>{{$advert->short_description}}</li>
                    {{--<li>{{$advert->image}}</li>--}}

                    <li>@if($advert->price){{$advert->price}} {{$advert->currency}}@endif</li>
                    <li>{{$advert->created_at}}</li>
                </ul>
            </li>
        @endforeach
    </ul>

@endsection('content')
