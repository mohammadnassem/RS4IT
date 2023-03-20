@extends('pages.dashboard.sidebar', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Users Page',
    'description'=> 'An empty page with a fluid vertical layout.',
    'breadcrumbs' => ["/Dashboards/passenger"=>"Home"]
])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>

@endsection

@section('js_vendor')
    <script src="/js/vendor/bootstrap-submenu.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.editablerows.js"></script>
@endsection
@section('page-content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Content Start -->
                <div class="data-table-rows slim">
                    <!-- Table Start -->
                    <div class="data-table-responsive-wrapper">
                        <table id="datatableRows" class="data-table nowrap hover">
                            <thead>
                            <tr>
                                <th class="text-muted text-small text-uppercase">Name</th>
                                <th class="text-muted text-small text-uppercase">Place of birth</th>
                                <th class="text-muted text-small text-uppercase">Profession</th>
                                <th class="text-muted text-small text-uppercase">Arrival date</th>
                                <th class="text-muted text-small text-uppercase">Gender</th>
                                <th class="empty">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($passengers as $passenger)
                            <tr>
                                <td><a class="list-item-heading body" href="passengerDetail/{{$passenger->passenger_id}}"> {{$passenger->first_name}}</a></td>
                                <td>{{$passenger->place_of_birth}}</td>
                                <td>{{$passenger->profession}}</td>
                                <td>{{$passenger->arrival_date}}</td>
                                <td>{{$passenger->gender}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table End -->
                </div>
                <!-- Content End -->

            </div>
        </div>
    </div>
@endsection
