@extends('layouts.app')
@section('content')
    <form class="ui form" method="post" action={{route('adverts.store') }} enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label>Pasirinkit</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="type" value=2>
                        <label>Ieškau</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="type" value=1>
                        <label>Siulau</label>
                    </div>
                </div>
                @error('type')
                <div class="ui pointing red basic label">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{--        <div class="field">--}}
{{--            <label>Pasirinkit</label>--}}
{{--            <div id="radiobox"></div>--}}
{{--            @error('type')--}}
{{--            <div class="ui pointing red basic label">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

        <div class="field">
            <label>Kategorija</label>
            <select {{--multiple="multiple"--}} name="category_id" class="ui dropdown" value="{{old('category_id')}}">
                <option value="">Pasirinkite Kategoriją</option>
                @foreach($categories as $category)
                    <option
                        {{old('category_id') ==$category->id ? 'selected' : ""}}
                        value={{$category->id}}>{{$category->category_name}}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Miestas</label>
            <select {{--multiple=""--}}name="city_id" value="{{old('city_id')}}" class="ui dropdown">
                <option value="">Pasirinkite miestą</option>
                @foreach($cities as $city)
                    <option {{old('city_id') ==$city->id ? 'selected' : ""}}
                            value={{$city->id}}>{{$city->name}}
                @endforeach
            </select>
            @error('city_id')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Pavadinimas</label>
            <input type="text" name="title" value="{{old('title')}}" placeholder="Pavadinimas">
            @error('title')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Aprašymas</label>
            <textarea name="description">{{old('description')}}</textarea>
            @error('description')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Kaina</label>
            <input type="text" name="price" value="{{old('price')}}">
            @error('price')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Nuotraukos</label>
            <input type="file" name="img[]" value="{{old('img')}}" multiple="multiple" placeholder="Pasirinkit
            nuotrauką">
            @error('img')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Telefonas</label>
            <input type="text" name="phone" value="{{old('phone')}}">
            @error('phone')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Elektroninio pašto adresas</label>
            <input type="email" name="email" value="{{old('email')}}">
            @error('email')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label>Web puslapis</label>
            <input type="text" name="web_page" value="{{old('web_page')}}">
            @error('web_page')
                <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="terms" required>
                <label>I agree to the Terms and Conditions</label>
                @error('terms')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="ui button" type="submit">Išsaugoti</button>
    </form>
@endsection('content')
