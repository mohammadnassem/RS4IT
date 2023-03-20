@extends('layout_Dasbord',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Menu Start -->
            @include('_layout.nav_secondary')
            <!-- Menu End -->

            <!-- Page Content Start -->
            <div class="col">
                <!-- Title and Top Buttons Start -->
                <div class="page-title-container">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-12 col-md-7">
                            <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                            @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                        </div>
                        <!-- Title End -->
                    </div>
                </div>
                <!-- Title and Top Buttons End -->
                @yield('page-content')
            </div>
            <!-- Page Content End -->
        </div>
    </div>
@endsection
