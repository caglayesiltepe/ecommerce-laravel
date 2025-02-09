<script src="{{asset('backoffice/')}}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/js/bootstrap.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/hammer/hammer.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/i18n/i18n.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/js/menu.js"></script>


<script src="{{asset('backoffice/')}}/assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="{{asset('backoffice/')}}/assets/vendor/libs/%40form-validation/auto-focus.js"></script>

<script src="{{asset('backoffice/')}}/assets/js/main.js"></script>

<script src="{{asset('backoffice/')}}/assets/js/pages-auth.js"></script>

@if(isset($process_name))
    <script src="{{ asset('backoffice/js/process/' . $process_name . '.js') }}"></script>
@endif

</body>

</html>
