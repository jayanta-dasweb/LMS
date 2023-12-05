@extends('dashboard.layouts.app')

@section('title', 'Costing Charges Creation ')

@section('content')
    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" method="post">
        @csrf
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin::General options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Create Costing Charges</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row">
                        <!--begin::Label-->
                        <label class="required form-label">Costing Charges Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="name" class="form-control mb-2" placeholder="Costing Charges name"
                            value="" />
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">A Costing Charges name is required and recommended to be unique.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div>
                        <!--begin::Label-->
                        <label class="form-label">Description</label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select" name="status">
                            <option></option>
                            <option value="active" selected>Active</option>
                            <option value="deactivate">Deactivate</option>
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Set a Costing Charges active / deactivate</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::General options-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="#" id="kt_ecommerce_add_product_cancel" class="btn btn-success me-5">
                    Cancel
                </a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">
                        Save
                    </span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Main column-->
    </form>
@endsection

@push('scripts')
    <!-- Additional scripts specific to the forget-password page can be included here -->
    <script>
        "use strict";

        // Class definition
        var KTAppEcommerceSaveCategory = function() {

            // Private functions

            // Init quill editor
            const initQuill = () => {
                // Define all elements for quill editor
                const elements = [
                    '#kt_ecommerce_add_category_description',
                    '#kt_ecommerce_add_category_meta_description'
                ];

                // Loop all elements
                elements.forEach(element => {
                    // Get quill element
                    let quill = document.querySelector(element);

                    // Break if element not found
                    if (!quill) {
                        return;
                    }

                    // Init quill --- more info: https://quilljs.com/docs/quickstart/
                    quill = new Quill(element, {
                        modules: {
                            toolbar: [
                                [{
                                    header: [1, 2, false]
                                }],
                                ['bold', 'italic', 'underline'],
                                ['image', 'code-block']
                            ]
                        },
                        placeholder: 'Type your text here...',
                        theme: 'snow' // or 'bubble'
                    });
                });

            }

            // Init tagify
            const initTagify = () => {
                // Define all elements for tagify
                const elements = [
                    '#kt_ecommerce_add_category_meta_keywords'
                ];

                // Loop all elements
                elements.forEach(element => {
                    // Get tagify element
                    const tagify = document.querySelector(element);

                    // Break if element not found
                    if (!tagify) {
                        return;
                    }

                    // Init tagify --- more info: https://yaireo.github.io/tagify/
                    new Tagify(tagify);
                });
            }

            // Init form repeater --- more info: https://github.com/DubFriend/jquery.repeater
            const initFormRepeater = () => {
                $('#kt_ecommerce_add_category_conditions').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function() {
                        $(this).slideDown();

                        // Init select2 on new repeated items
                        initConditionsSelect2();
                    },

                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            // Init condition select2
            const initConditionsSelect2 = () => {
                // Tnit new repeating condition types
                const allConditionTypes = document.querySelectorAll(
                    '[data-kt-ecommerce-catalog-add-category="condition_type"]');
                allConditionTypes.forEach(type => {
                    if ($(type).hasClass("select2-hidden-accessible")) {
                        return;
                    } else {
                        $(type).select2({
                            minimumResultsForSearch: -1
                        });
                    }
                });

                // Tnit new repeating condition equals
                const allConditionEquals = document.querySelectorAll(
                    '[data-kt-ecommerce-catalog-add-category="condition_equals"]');
                allConditionEquals.forEach(equal => {
                    if ($(equal).hasClass("select2-hidden-accessible")) {
                        return;
                    } else {
                        $(equal).select2({
                            minimumResultsForSearch: -1
                        });
                    }
                });
            }

            // Category status handler
            const handleStatus = () => {
                const target = document.getElementById('kt_ecommerce_add_category_status');
                const select = document.getElementById('kt_ecommerce_add_category_status_select');
                const statusClasses = ['bg-success', 'bg-warning', 'bg-danger'];

                $(select).on('change', function(e) {
                    const value = e.target.value;

                    switch (value) {
                        case "published": {
                            target.classList.remove(...statusClasses);
                            target.classList.add('bg-success');
                            hideDatepicker();
                            break;
                        }
                        case "scheduled": {
                            target.classList.remove(...statusClasses);
                            target.classList.add('bg-warning');
                            showDatepicker();
                            break;
                        }
                        case "unpublished": {
                            target.classList.remove(...statusClasses);
                            target.classList.add('bg-danger');
                            hideDatepicker();
                            break;
                        }
                        default:
                            break;
                    }
                });


                // Handle datepicker
                const datepicker = document.getElementById('kt_ecommerce_add_category_status_datepicker');

                // Init flatpickr --- more info: https://flatpickr.js.org/
                $('#kt_ecommerce_add_category_status_datepicker').flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                });

                const showDatepicker = () => {
                    datepicker.parentNode.classList.remove('d-none');
                }

                const hideDatepicker = () => {
                    datepicker.parentNode.classList.add('d-none');
                }
            }

            // Condition type handler
            const handleConditions = () => {
                const allConditions = document.querySelectorAll('[name="method"][type="radio"]');
                const conditionMatch = document.querySelector(
                    '[data-kt-ecommerce-catalog-add-category="auto-options"]');
                allConditions.forEach(radio => {
                    radio.addEventListener('change', e => {
                        if (e.target.value === '1') {
                            conditionMatch.classList.remove('d-none');
                        } else {
                            conditionMatch.classList.add('d-none');
                        }
                    });
                })
            }

            // Submit form handler
            const handleSubmit = () => {
                // Define variables
                let validator;

                // Get elements
                const form = document.getElementById('kt_ecommerce_add_category_form');
                const submitButton = document.getElementById('kt_ecommerce_add_category_submit');

                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            'name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Name is required'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                );

                // Handle submit button
               form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    validator.validate().then(function(status) {

                        if (status === 'Valid') {

                            submitButton.setAttribute('data-kt-indicator', 'on');

                            // Disable submit button whilst loading
                            submitButton.disabled = true;
                            // Perform Ajax request
                            $.ajax({
                                url: '{{ route("master.costing-charges.create.process") }}', // Replace with your actual route
                                method: 'POST',
                                data: $('#kt_ecommerce_add_category_form').serialize(),
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {

                                    console.log('Success:', response);
                                    Swal.fire({
                                        text: response.message,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result) {
                                        if (result.isConfirmed) {
                                            form.reset();
                                            submitButton.removeAttribute(
                                                'data-kt-indicator');
                                            submitButton.disabled = false;
                                        }
                                    });
                                },
                                error: function(xhr, status, error) {

                                    // Handle errors
                                    console.error('Error:', xhr.responseText);
                                    var errorMessage = xhr.responseJSON.message;
                                    Swal.fire({
                                        text: errorMessage,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                    submitButton.removeAttribute(
                                        'data-kt-indicator');
                                    submitButton.disabled = false;
                                }
                            });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                            submitButton.removeAttribute(
                                'data-kt-indicator');
                            submitButton.disabled = false;
                        }
                    });
                })
            }

            // Public methods
            return {
                init: function() {
                    // Init forms
                    initQuill();
                    initTagify();
                    initFormRepeater();
                    initConditionsSelect2();

                    // Handle forms
                    handleStatus();
                    handleConditions();
                    handleSubmit();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTAppEcommerceSaveCategory.init();
        });
    </script>
@endpush
