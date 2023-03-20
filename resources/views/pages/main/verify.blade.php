@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
$title = 'Horizontal Starter Page';
$description= 'An empty page with a boxed horizontal layout.';
$breadcrumbs = ["/main"=>"Home"]
@endphp


@extends('horizontal', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Verification Email',
    'description'=> '',
    'breadcrumbs' => []
])

@section('style')
@endsection

@section('js_vendor')
    <script src="{{ asset('js/vendor/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>

@endsection

@section('js_page')
    <script src="{{ asset('js/cs/datatable.extend.js') }}"></script>
    <script src="{{ asset('js/plugins/datatable.editablerows.js') }}"></script>
    <script>
        const countryCodeEl = $('#countryCodeIconEl');

        $('[data-event]').on('click', function () {
            $(countryCodeEl).removeAttr('class');
            $(countryCodeEl).addClass(`fi fi-${$(this).data('iso')}`);
            $(countryCodeEl).attr('val', `+${$(this).data('code')}`);
        });
    </script>
@endsection
{{--    'breadcrumbs' => ["/"=>"Home"]--}}

{{--@section('page-content')--}}

{{--@endsection--}}

@section('content')
    <div class="card mb-5">
        <div class="card-body">
            <p class="p-card h3 text-center">
                An Email has been sent to you. Check your inbox.
            </p>
        </div>
    </div>
@endsection