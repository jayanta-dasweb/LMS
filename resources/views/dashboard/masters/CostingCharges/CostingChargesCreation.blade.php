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
                        <input type="text" name="category_name" class="form-control mb-2"
                            placeholder="Costing Charges name" value="" />
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
                            data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select">
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
                    <span class="indicator-label">
                        Save Changes
                    </span>
                    <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
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
                            'category_name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Category name is required'
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
                submitButton.addEventListener('click', e => {
                    e.preventDefault();

                    // Validate form before submit
                    if (validator) {
                        validator.validate().then(function(status) {
                            console.log('validated!');

                            if (status == 'Valid') {
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable submit button whilst loading
                                submitButton.disabled = true;

                                setTimeout(function() {
                                    submitButton.removeAttribute('data-kt-indicator');

                                    Swal.fire({
                                        text: "Form has been successfully submitted!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result) {
                                        if (result.isConfirmed) {
                                            // Enable submit button after loading
                                            submitButton.disabled = false;

                                            // Redirect to customers list page
                                            window.location = form.getAttribute(
                                                "data-kt-redirect");
                                        }
                                    });
                                }, 2000);
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
                            }
                        });
                    }
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
