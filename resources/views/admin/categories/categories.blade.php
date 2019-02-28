@extends('user-account.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                @include('layouts.partials.messages')
            </div>
        </div>
        <div class="row">
            <div>
                <form class="form-inline" action="{{route('category_store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="parentCategory" class="sr-only">Parent Category</label>
                        <select class="form-control" name="parent_id" id="parentCategory">
                            <option value="0"></option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="category" class="sr-only">New Vategory</label>
                        <input type="text" id="category" class="form-control" name="category_name" placeholder="Category">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add category</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <ul>
                    @foreach($categories->where('parent_id', 0) as $category)
                        <li>
                            <h3>{{$category->category_name}}</h3>
                            @if($category->childs->count()>0)
                                <ul>
                                    @foreach($category->childs as $cat_2_level)
                                        <li>
                                            <h4>--{{$cat_2_level->category_name}}</h4>
                                            @if($cat_2_level->childs->count()>0)
                                                <ul>
                                                    @foreach($cat_2_level->childs as $cat_3_level)
                                                        <li>
                                                            <h4>--{{$cat_3_level->category_name}}</h4>
                                                            @if($cat_3_level->childs->count()>0)
                                                                <ul>
                                                                    @foreach($cat_3_level->childs as $cat_4_level)
                                                                        <li>
                                                                            <h4>--{{$cat_4_level->category_name}}</h4>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <ul>
                    @foreach($categories as $category)
                        <li>
                            <form class="form-inline" action="{{route('category_delete', $category->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <h3>{{$category->category_name}}  </h3>
                                <button type="submit" class="btn btn-danger btn-sm">&times</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection
