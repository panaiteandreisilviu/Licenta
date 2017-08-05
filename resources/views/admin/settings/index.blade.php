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
                        <div class="form-group">
                            <label for="FACEBOOK_APP_ID">App ID</label>
                            <input class="form-control" id="FACEBOOK_APP_ID" name="FACEBOOK_APP_ID" placeholder="App ID" type="text" value="{{$settings ? $settings->FACEBOOK_APP_ID : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="FACEBOOK_APP_SECRET">App Secret</label>
                            <input class="form-control" id="FACEBOOK_APP_SECRET" name="FACEBOOK_APP_SECRET" placeholder="App Secret" type="text" value="{{$settings ? $settings->FACEBOOK_APP_SECRET : ''}}">
                        </div>

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
                                            <a href="/facebook/set_facebook_token/{{$account['id']}}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-edit"></i> Get Token
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
                            <div class="col-xs-12">
                                <span class="alert alert-warning">
                                    Login to facebook to view available apps.
                                </span>
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
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-mail-forward"></i> Submit
                </button>
            </div>

        </form>


    </div>

    <script>
        $(function(){
            $('#dataTable').DataTable({
            "paging": true,
                "searching": false,
//            "lengthChange": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false
            });
        })
    </script>
    
@endsection