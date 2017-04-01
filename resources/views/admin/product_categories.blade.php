@extends('admin.layouts.master')

@section('scripts')

    <style>
        .portlet{
            margin-bottom: 200px;
        }
    </style>

    <script>

        $('.add-subcategory').on('click',function(){
//            alert($(this).data('id'))
            $('#add-more-subcategry').html('')
            $('#subcategory-modal').modal();
//            alert($(this).data('name'));
            $('.category-name').text($(this).data('name'));
            $('#category-id').val($(this).data('id'));

            $('#add-new-subcategory-form').attr('action','{{url('/admin/add-new-subcategory')}}')
        })



        $('.edit-category').on('click',function(){
            $('#edit-category-form').attr('action','{{url('/admin/update-category')}}');

//            $('#edit-enable').html('')
//            $('.current-enable-value').val($(this).data('enable'))
//            $('.current-enable-value').text($(this).data('enable') == 0 ? false : true);
//            if($(this).data('enable') == true){
//
//                $('#edit-enable').append('<option value="false">false</option>')
//            }else {
//                $('#edit-enable').append('<option value="true">true</option>')
//            }
            $('#edit-category-id').val($(this).data('id'))
            $('.name').val($(this).data('name'))
            $('#edit-category-modal').modal();

        })

        $('#edit-category-form').on('submit',function(e){
            e.preventDefault();
            $.post($(this).attr('action'),$(this).serialize(),function(){

            }).success(function(){
                swal('Success','successfully updated a category','success')
                setTimeout(function(){
                    location.reload();
                },2000)
            })
        })



        $('#add-more').on('click',function(){
//            alert('hello world');
            $('#add-more-subcategry').append(' <div class="col-sm-9">'+
                   ' <input type="text" class="form-control" name="name[]" placeholder="sub category name" required>'+
            '</div><br><br>')
        });

        $('#add-new-subcategory-form').on('submit',function(e){
            e.preventDefault();
            $.post($(this).attr('action'),$(this).serialize(),function(){

            }).success(function(){
                swal('Success','Successfully added new item(s) to Subcategory ','success')

                setTimeout(function(){
                    location.reload();
                },2000)

            })
        })

        $('#add-new-category').on('click',function(){
            $('#package-modal').modal();
            $('#add-new-category-form').attr('action','{{url('/admin/add-new-category')}}')
        })

        $('#add-new-category-form').on('submit',function(e){
            e.preventDefault();
            $.post($(this).attr('action'),$(this).serialize(),function(){

            }).success(function(){
                swal('Success','Successfully added a new category ','success');
                setTimeout(function(){},2000)
                location.reload();
            })
        })

    </script>

    @endsection


    @section('content')
            <!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="#">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Packages</a>
            <i class="fa fa-circle"></i>
        </li>
        {{--<li>--}}
        {{--<span>Tiles</span>--}}
        {{--</li>--}}
    </ul>
    <!-- END PAGE BREADCRUMBS -->


    <div class="page-content-inner">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                {{--<div class="note note-success">--}}
                {{--<p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>--}}
                {{--</div>--}}
                <br>
                <br>

                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Product Categories</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            {{--<a href="#portlet-config" data-toggle="modal" class="config"> </a>--}}
                            <a href="javascript:;" class="reload"> </a>

                            <button class="btn btn-success" id="add-new-category"> Add New Category</button>
                            {{--<a href="javascript:;" class="remove"> </a>--}}
                        </div>
                    </div>
                    <div class="portlet-body flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                                {{--<th>No.</th>--}}
                                <th> Image </th>
                                <th width=""> Name </th>
                                <th> Sub categories </th>
                                <th> Enabled </th>
                                <th class="numeric"> Timestamp </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--                            --><?php //$i = \App\User::all()->first(); ?>
                            @foreach($categories as $category)
                                <tr>
                                    {{--<td>{{$i++}}</td>--}}
                                    <td> {{$category->image}} </td>
                                    <td> {{$category->name}} </td>
                                    <td>
                                        <ul>
                                    @foreach($category->subcategories as $subcategory)
                                        <li>{{$subcategory->name}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$category->enable == 1 ? "true" :"false" }} </td>
                                    <td> {{$category->created_at}} </td>
                                    <td>
                                        <button class="btn btn-success btn-xs add-subcategory" data-name="{{$category->name}}" data-id="{{$category->id}}"><i class="fa fa-plus"></i></button> |

                                        <button class="btn btn-danger btn-xs edit-category" data-name="{{$category->name}}" data-enable="{{$category->enable}}" data-id="{{$category->id}}"><i class="fa fa-pencil-square"></i></button> |
                                        {{--<button class="btn btn-success confirm-token" data-token="{{$user->id}}">Confirm token</button>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $categories !!}
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="package-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Category</h4>
                </div>
                <form action="" id="add-new-category-form">

                    <div class="modal-body">
                        {{--<p>One fine body&hellip;</p>--}}
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Name of category" required>
                            </div>
                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" class="form-control" name="charge" placeholder="Charge" required>--}}
                            {{--</div>--}}
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-category-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update Category</h4>
                </div>
                <form action="" id="edit-category-form">

                    <div class="modal-body">
                        {{--<p>One fine body&hellip;</p>--}}
                        <input type="hidden" class="form-control" name="edit_category_id" id="edit-category-id">

                        <div class="row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control name" name="edit_category_name" placeholder="Name of category" required>
                            </div>
                            {{--<div class="col-sm-6">--}}
                                {{--<input type="number" class="form-control" name="charge" placeholder="Charge" required>--}}
                                {{--<select class="form-control" name="enable" id="edit-enable">--}}
                                    {{--<option class="current-enable-value"></option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="subcategory-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Sub Category to <strong class="category-name"></strong></h4>
                </div>
                <form action="" id="add-new-subcategory-form">

                    <div class="modal-body">
                        {{--<p>One fine body&hellip;</p>--}}
                        <input type="hidden" class="form-control" name="category" id="category-id" value="">

                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name[]" placeholder="sub category name" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="button" class="btn btn-success" id="add-more" value="add-more">
                            </div>
                            <br>
                            <br>

                            <div id="add-more-subcategry"></div>

                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection