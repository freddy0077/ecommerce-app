

<div class="portlet-body form">
    <!-- BEGIN FORM-->

    {{--<form action="{{url('/store/quick-add-products')}}"  method="post" enctype="multipart/form-data"  id="product-form">--}}

        @for($i = 0; $i < $count; $i++)
                <div class="row">
                    <div class="col-md-12">
                    {{--<div class="col-md-1"></div>--}}
                    <div class="col-md-3"><input type="text" class="form-control" name="name[]" id="name" placeholder="name of product" required></div>
                        <span class="help-block"></span>

                        <div class="hidden-lg hidden-md"><br><br></div>

                    <div class="col-md-3"><input type="text" class="form-control" name="price[]" id="price" placeholder="price of product" required></div>
                        <div class="hidden-lg hidden-md"><br><br></div>

                    <div class="col-md-3">
                        <select class="form-control" name="sub_category[]" id="category" required>

                            <option></option>

                            @foreach($sub_categories as $sub_category)

                                <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>

                            @endforeach

                        </select>
                        {{--<input type="text" class="form-control" name="name" id="name" placeholder="product category">--}}
                    </div>
                        <div class="hidden-lg hidden-md"><br><br></div>

                        <div class="col-md-3">
                            <input type="file" class="form-control" name="image[]" id="image" required>
                        </div>
                        <div class="hidden-lg hidden-md"><br><br></div>

                    </div>
                </div>

            <br>
        @endfor

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn dark">
                        <i class="fa fa-check"></i> Submit</button>
                    <a href="javascript:;" class="btn btn-outline grey-salsa">Cancel</a>
                </div>
            </div>
        </div>
    {{--</form>--}}
    <!-- END FORM-->
</div>



{{--<div class="form-body">--}}
    {{--<div class="form-group">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label class="control-label col-md-3">Product name </label>--}}
        {{--<div class="col-md-4">--}}

            {{--<input type="text" class="form-control" name="name" id="name">--}}

            {{--<div class="help-block"> </div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label class="control-label col-md-3">Price</label>--}}
        {{--<div class="col-md-4">--}}
            {{--<input type="number" class="form-control" name="price">--}}
            {{--<span class="help-block">  </span>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group " id="sub_category">--}}

    {{--</div>--}}
{{--</div>--}}