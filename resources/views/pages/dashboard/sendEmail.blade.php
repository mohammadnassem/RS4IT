
@extends('pages.dashboard.sidebar', [
    'html_tag_data' => ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"fluid" }, "storagePrefix" : "starter-project", "showSettings" : false }'],
    'title' => 'Send Email Page',
    'description'=> 'An empty page with a fluid vertical layout.',
    'breadcrumbs' => ["/Dashboards/passenger"=>"Home"]
])
@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
    <link rel="stylesheet" href="/css/vendor/bootstrap-datepicker3.standalone.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
    <script src="/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/forms/genericforms.js"></script>
@endsection

@section('page-content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Content Start -->
                <div>
                    <!-- Login Start -->
                    <section class="scroll-section" id="login">

                        <form class="card mb-5 tooltip-end-top" id="loginForm" novalidate>
                            <div class="card-body">
                                <p class="text-alternate mb-4">Please Enter User Email</p>
                                <div class="mb-3 filled">
                                    <i data-acorn-icon="user"></i>
                                    <input class="form-control" placeholder="Email" name="loginEmail" />
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 d-flex justify-content-between align-items-center">
                                <a href="#" class="me-3"></a>
                                <div>
                                    <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                        <span>Send</span>
                                        <i data-acorn-icon="chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Login End -->
                </div>
        </div>
    </div>
@endsection
