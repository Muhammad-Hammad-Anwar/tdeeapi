@extends('admin.layout.app')

@section('title','Update Page')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Edit Page</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pages.home.index') }}">Page</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            <a href="{{ route('pages.home.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card wizard-content">
    <div class="card-body">
        <h4 class="card-title">Update Home Page with Multistep</h4>
        <form method="POST" action="{{ route('pages.update', $page->id) }}" class="validation-wizard wizard-circle" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('admin.page.home.form') 
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // To drage and drop image file in image field
        $('.dropify').dropify();
         // To multiselect in related tools section
         $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function () {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function () {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        // To add content with tiny editor in content section
        if ($("#textarea").length > 0) {
            tinymce.init({
                selector: "textarea#textarea",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });
</script>
<script>
    var form = $(".validation-wizard").show();
    var _token = $("input[name='_token']").val();
    var id = {{ $page->id }};
    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function (event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function (event, currentIndex) {
            form.submit();
        }
    }),
    $(".validation-wizard").validate({
        errorClass: "text-danger",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().removeClass('has-danger');
            $(element).removeClass('form-control-danger');
            $(element).parent().addClass('has-success');
            $(element).addClass('form-control-success');
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules:{
            slug:{
                "remote":
                {
                    url: "{{ route('pages.check_slug') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        id:id,
                        language_id: function() {
                            return $("select[name='language_id']").find(":selected").val();
                        },
                        slug: function() {
                            return $("input[name='slug']").val();
                        }
                    },
                }
            }
        },
        messages:{
            slug:{
                required: "Please enter a unique slug for this page.",
                remote: jQuery.validator.format("{0} is already taken.")
            }
        },
    })
</script>
@endsection