@extends('auth.layouts.app')

@section('title', 'Sign In - Servile Relocations')

@section('content')
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"  method="POST">
                        <!--begin::Heading-->
                        @csrf
                        <div class="text-center mb-11">
                            <!--begin::Logo-->
                            <a href="{{ route('auth.sign-in.show') }}" class="mb-0 mb-lg-12">
                                <img alt="Logo" src="{{ asset('assets/media/logos/servile-logo.png') }}"/>
                            </a>
                            <!--end::Logo-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">
                                Sign In
                            </h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Separator-->
                        <div class="separator separator-content my-14">
                            <span class="w-350px text-black fw-semibold fs-5">Let's convert to a lead</span>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Input group--->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/>
                            <!--end::Email-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off"/>
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="ki-outline ki-eye-slash fs-2"></i>
                                        <i class="ki-outline ki-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Input group--->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-5">
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Sign In
                                </span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            <!--begin::Link-->
                            <a href="{{ route('auth.forget-password.show') }}" class="link-primary">
                                Forgot Password ?
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <div class="d-flex flex-stack px-10 mx-auto">
                <!--begin::Links-->
                <div class="d-flex fw-semibold fs-base gap-5 text-black">
                    © 2023 Servile Relocations Pvt. Ltd. All Rights Reserved.
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2 d-none d-lg-block "
             style="background-image: url('{{ asset('assets/media/misc/sign-in-logistics.png') }}')">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!-- Additional content for the aside section can go here -->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
@endsection

@push('styles')
    <!-- Additional styles specific to the sign-in page can be included here -->
    <style>
        /* Add custom styles for the sign-in page */
    </style>
@endpush

@push('scripts')
    <!-- Additional scripts specific to the sign-in page can be included here -->
    <script>
        "use strict";

        var KTSigninGeneral = (function () {
            var form;
            var submitButton;
            var validator;

            var handleValidation = function () {
                // Initialize FormValidation
                validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'email': {
                                validators: {
                                    regexp: {
                                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                        message: 'The value is not a valid email address',
                                    },
                                    notEmpty: {
                                        message: 'Email address is required'
                                    }
                                }
                            },
                            'password': {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
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
            };

            var handleSubmitAjax = function () {
                // Handle form submission with AJAX
                submitButton.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent the default form submission

                    // Validate form fields
                    validator.validate().then(function (status) {
                        if (status == 'Valid') {
                            // If form is valid, disable submit button and show loading indicator
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;

                            // Get CSRF token value from the meta tag
                            var csrfToken = $('meta[name="csrf-token"]').attr('content');

                            // Use jQuery AJAX to submit the form with CSRF token
                            $.ajax({
                                url: '{{ route('auth.sign-in.process') }}',
                                type: 'POST',
                                data: {
                                    email: form.querySelector('[name="email"]').value,
                                    password: form.querySelector('[name="password"]').value
                                },
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                success: function (response) {
                                    // Handle successful form submission
                                    if (response.success) {
                                        form.querySelector('[name="email"]').value = "";
                                        form.querySelector('[name="password"]').value = "";
                                        location.href = response.redirectUrl;
                                    } else {
                                        // Handle unsuccessful form submission
                                        Swal.fire({
                                            text: response.message,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }

                                    // Reset loading indicator and enable submit button
                                    submitButton.removeAttribute('data-kt-indicator');
                                    submitButton.disabled = false;
                                },
                                error: function (error) {
                                    // Handle AJAX error
                                    Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });

                                    // Reset loading indicator and enable submit button
                                    submitButton.removeAttribute('data-kt-indicator');
                                    submitButton.disabled = false;
                                },
                                complete: function () {
                                    // Always run after success or error
                                    submitButton.removeAttribute('data-kt-indicator');
                                    submitButton.disabled = false;
                                }
                            });
                        } else {
                            // Handle form validation errors
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
                });
            }

            return {
                init: function () {
                    // Initialize form and submit button
                    form = document.querySelector('#kt_sign_in_form');
                    submitButton = document.querySelector('#kt_sign_in_submit');

                    // Set up form validation and AJAX submission
                    handleValidation();
                    handleSubmitAjax();
                }
            };
        })();

        // Run the initialization function when the DOM is ready
        KTUtil.onDOMContentLoaded(function () {
            KTSigninGeneral.init();
        });
        
    </script>
@endpush
