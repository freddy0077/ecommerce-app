

<div class="portlet-body form">
    <script>

        $('.remove-column').on('click',function(){
            $(this).parent().parent().remove();
            var count = $(this).data('count');
            confirm('Are you sure ?')
        })

    </script>
    <!-- BEGIN FORM-->

    {{--<form action="{{url('/store/quick-add-products')}}"  method="post" enctype="multipart/form-data"  id="product-form">--}}

        <?php $x=0; ?>
        @for($i = 0; $i < $count; $i++)
            <?php $x = $x+1?>
                <div class="row column-section">
                    <div class="col-md-12"  style="margin-left: 10%; width:80%; border: 5px outset #ccc; padding:8px 4px 6px 4px;">
                        <p style="margin-bottom: 0;" class="text-center column-count-{{$x}}"><strong>Column {{$x}}</strong></p>

                        {{--<div class="col-md-1"></div>--}}
                    <div class="col-md-2"><input type="text" class="form-control" name="name[]" id="name" placeholder="name of product" required></div>
                        <span class="help-block"></span>

                        <div class="hidden-lg hidden-md"><br><br></div>

                    <div class="col-md-2"><input type="text" class="form-control" name="price[]" id="price" placeholder="price of product" required></div>
                        <div class="hidden-lg hidden-md"><br><br></div>

                    <div class="col-md-3">
                        <select class="form-control" name="sub_category[]" id="category" required>

                            @foreach($sub_categories as $sub_category)
                            <option></option>
                                <optgroup label="{{$sub_category->name}}">
                                    @foreach($sub_category->subcategories as $sub)
                                    <option value="{{$sub->id}}">{{$sub->name}}</option>
                                    @endforeach
                                </optgroup>


{{--                                <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>--}}

                            @endforeach

                        </select>
                        {{--<input type="text" class="form-control" name="name" id="name" placeholder="product category">--}}
                    </div>
                        <div class="hidden-lg hidden-md"><br><br></div>

                        <div class="col-md-3">
                            <input type="file" class="form-control" name="image[]" id="image" required>
                        </div>
                        <div class="hidden-lg hidden-md"><br><br></div>

                        <div class="col-md-1">
                            {{--<button type="button" class="btn btn-success remove-column"><i class="fa fa-remove"></i></button>--}}
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-xs remove-column text-center"><i class="fa fa-remove" data-count="{{$x}}"></i></button>
                        </div>

                    </div>
                </div>

            <br>
        @endfor

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9 text-center">
                    <button class="btn dark">
                        <i class="fa fa-check"></i> Submit</button>
                    <a href="javascript:;" class="btn btn-outline grey-salsa">Cancel</a>
                </div>
            </div>
        </div>
    {{--</form>--}}
    <!-- END FORM-->
</div>
