<label class="control-label col-md-3">Sub Category</label>
<div class="col-md-4">
    <select class="form-control" name="sub_category" id="sub_category">
        @foreach($sub_categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach

    </select>
    </div>

{{--<select class="form-control">--}}
    {{--@foreach($sub_categories as $sub_category)--}}
    {{--<option value="{{$sub_category->id}}">{{$sub_category->name}}</option>--}}
    {{--@endforeach--}}
{{--</select>--}}