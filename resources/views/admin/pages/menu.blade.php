@extends('layouts.admin.default', ['title' => 'Edit pages menu', 'subtitle' => ''])
@section('content')

    <style>
        .panel-body{
            padding:2px !important;
        }

    </style>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Edit pages menu
                        <small></small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                        {{--<i class="fa fa-minus"></i></button>--}}
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                        {{--<i class="fa fa-times"></i></button>--}}
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                    @include('layouts.errors')

                    <div id="menuGroupsContainer"></div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fa fa-mail-forward"></i> Submit
                    </button>
                    <a href="/admin/posts" class="btn btn-default pull-right">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>

            </div>
            <!-- /.box -->

        </div>
    </div>


    <script>
        // Simple list
        $(function(){

            var menuItems = {!! json_encode($menuItems) !!};

            // Generate Menu lists
            for (var menuTitle in menuItems) {
                if (menuItems.hasOwnProperty(menuTitle)) {

                    var $listContainer = $('<div>').addClass('col-xs-12 panel panel-default menu-group');
                    var $list = $('<ul>');
                    $list.addClass('list-group');
                    $list.attr('group', 'menu-group');

                    var $listContainerBody = $('<div>').addClass('panel panel-body some-padding');
                    var $listTitle = $('<input>')
                        .addClass('form-control')
                        .val(menuTitle);
                        //.attr('name', 'title_' + i);

                    $listContainerBody
                        .append($listTitle);

                    $listContainer
                        .append($('<i>')
                            .addClass('glyphicon glyphicon-move glyphicon-move-menu')
                            .css({
                                'float' : 'right',
                                'margin-top': '5px',
                                'margin-right': '-10px',
                                'font-size': '17px'
                            })
                        );

                    $listContainer.append($listContainerBody);
                    $listContainer.append($list);

                    for(var j = 0; j < menuItems[menuTitle].length; j++) {

                        //Create each LI element
                        var $menuItem = $('<li>')
                            .append($('<i>').addClass('glyphicon glyphicon-move'))
                            .append(' ')
                            .append(menuItems[menuTitle][j]);
                        $menuItem.addClass('list-group-item');
                        $list.append($menuItem);
                    }

                    $("#menuGroupsContainer").append($listContainer);
                    Sortable.create($list[0], {
                        group: 'menu-items',
                        handle: '.glyphicon-move',
                        animation: 150
                    });


                }
            }

            Sortable.create($('#menuGroupsContainer')[0], {
                handle: '.glyphicon-move-menu',
                group: 'menu-groups',
                animation: 150
            });

            $('#submitBtn').on('click', function(){
                var data = {};
                $('.menu-group').each(function(index,group){
                    var title = $(group).find('input').val();
                    var items = $.map($(group).find('li'), function(item) { return $(item).text(); });
                    data[title] = items;
                });

                axios.post('/admin/pages/menu', {
                    'menuItems': data
                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            })
        });
    </script>


@endsection

