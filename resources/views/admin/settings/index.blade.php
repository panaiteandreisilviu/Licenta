@extends('layouts.admin.default', ['title' => 'Settings and API Keys', 'subtitle' => ''])
@section('content')

    <div class="row">

        <div class="col-xs-12">
            @include('layouts.errors')
        </div>

        <form method="POST" action="/admin/settings/store" enctype="multipart/form-data">

            {{csrf_field()}}

            <div class="col-sm-6 col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Facebook</h3>
                    </div>

                    <div class="box-body">
                        {{--<div class="form-group">
                            <label for="FACEBOOK_APP_ID">App ID</label>
                            <input class="form-control" id="FACEBOOK_APP_ID" name="FACEBOOK_APP_ID" placeholder="App ID" type="text" value="{{$settings ? $settings->FACEBOOK_APP_ID : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="FACEBOOK_APP_SECRET">App Secret</label>
                            <input class="form-control" id="FACEBOOK_APP_SECRET" name="FACEBOOK_APP_SECRET" placeholder="App Secret" type="text" value="{{$settings ? $settings->FACEBOOK_APP_SECRET : ''}}">
                        </div>--}}

                        @if(count($user_accounts))
                            <h3>Facebook Apps</h3>
                            <table id="dataTable" class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th style="max-width:110px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_accounts as $account)
                                    <tr>
                                        <td>{{$account['id']}}</td>
                                        <td>{{$account['name']}}</td>
                                        <td>{{$account['category']}}</td>
                                        <td>
                                            <a href="/facebook/retrievePageAccessToken/{{$account['id']}}" class="btn btn-primary btn-xs retrievePageAccessToken"
                                               data-fb_page_app_id="{{$account['id']}}" data-fb_page_access_token="{{$account['access_token']}}">
                                                <i class="fa fa-edit"></i> Get token
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>

                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="form-group">
                                <div class="alert alert-info alert-dismissible" style="background-color: #3C8DBC !important; border:0">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Info</h4>
                                    Please login with facebook to view available apps.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-sm-6 col-xs-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Twitter</h3>
                    </div>

                    <div class="box-body">

                        <div class="form-group">
                            <label for="TWITTER_CONSUMER_KEY">Consumer Key</label>
                            <input class="form-control" id="TWITTER_CONSUMER_KEY" name="TWITTER_CONSUMER_KEY" placeholder="Consumer key" type="text" value="{{$settings ? $settings->TWITTER_CONSUMER_KEY : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="TWITTER_CONSUMER_SECRET">Consumer Secret</label>
                            <input class="form-control" id="TWITTER_CONSUMER_SECRET" name="TWITTER_CONSUMER_SECRET" placeholder="Consumer secret" type="text" value="{{$settings ? $settings->TWITTER_CONSUMER_SECRET : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="TWITTER_ACCESS_TOKEN">Access Token</label>
                            <input class="form-control" id="TWITTER_ACCESS_TOKEN" name="TWITTER_ACCESS_TOKEN" placeholder="Access token" type="text" value="{{$settings ? $settings->TWITTER_ACCESS_TOKEN : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="TWITTER_ACCESS_SECRET">Access Secret</label>
                            <input class="form-control" id="TWITTER_ACCESS_SECRET" name="TWITTER_ACCESS_SECRET" placeholder="Access secret" type="text" value="{{$settings ? $settings->TWITTER_ACCESS_SECRET : ''}}">
                        </div>

                    </div>

                </div>


            </div>

            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-mail-forward"></i> Submit
                </button>
            </div>

        </form>


    </div>

    <script>
        $(function(){
            $('#dataTable').DataTable({
//            "paging": false,
//            "searching": false,
//            "lengthChange": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false
            });

            $('.retrievePageAccessToken').on('click', function(){

                var fb_page_app_id = $(this).data('fb_page_app_id');
                var fb_page_access_token = $(this).data('fb_page_access_token');
                axios.post('/facebook/retrievePageAccessToken?fb_page_app_id=' + fb_page_app_id + '&fb_page_access_token=' + fb_page_access_token, {
                    'enabled': this.enabled
                })
                    .then(function (response) {
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            })
        })
    </script>
    
@endsection