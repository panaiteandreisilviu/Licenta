@extends('layouts.admin.default', ['title' => 'Mail Inbox Associations', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Associations -
                        <span class="label label-default" style="background-color: {{$mailInbox->label_color}}; color:{{$mailInbox->getLabelContrastColor()}};">
                            {{$mailInbox->label_name}}
                        </span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="/admin/mail_inbox_associations_save/{{$mailInbox->id}}" enctype="multipart/form-data" id="associationForm">
                    {{csrf_field()}}
                    {{method_field('POST')}}

                    <div class="box-body">
                        <table id="mailInboxAssociations" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Host Address</th>
                                <th>Host Inbox</th>
                                <th>Association</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mailInboxRemoteList as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{preg_replace("@{}@", '', str_replace($mailInbox->host, '', $item->name))}}</td>
                                    <td>
                                        <select class="form-control association" data-host="{{$item->name}}">
                                            <option value=""></option>
                                            <option value="inbox">Inbox</option>
                                            <option value="sent">Sent</option>
                                            <option value="important">Important</option>
                                            <option value="span">Spam</option>
                                            <option value="drafts">Drafts</option>
                                            <option value="trash">Trash</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="formSubmitButton">
                            <i class="fa fa-mail-forward"></i> Submit
                        </button>
                        <a href="/admin/mail_inboxes" class="btn btn-default pull-right">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>

                </form>



            </div>
            <!-- /.box -->

        </div>
    </div>


    <script>
        $(function(){
            $('#mailInboxAssociations').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false
            });

            var $form = $("#associationForm");
            $("#formSubmitButton").on('click', function(event){
                event.preventDefault();
                $('.association').each(function($index, $item){
                    var association = $($item).val();
                    var host = $($item).data('host');
                    var $input = $('input');
                    /*if(){

                    }*/
                });

                console.log($form.serialize());
                //$form.submit();
            });
        });


    </script>

    <!-- /.box -->
@endsection