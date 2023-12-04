@extends('auth.layouts.app')

@section('title', 'Forget Password - Servile Relocations')

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
                    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" method="POST">
                        @csrf
                        <!--begin::Heading-->
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
                                Forget Password
                            </h1>
                            <div class="text-black fw-semibold fs-6">
                                Enter the email id associated with your account & we'll send you a link to reset your password
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group--->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/> 
                            <!--end::Email-->
                        </div>
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-5">
                        </div>
                        <!--end::Wrapper-->    
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_password_reset_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Reset Password
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
                            <a href="{{ route('auth.sign-in.show') }}" class="link-primary">
                                Click here to Login
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
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2 d-none d-lg-block " style="background-image: url('{{ asset('assets/media/misc/sign-in-logistics.png') }}')">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">          
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
@endsection

@push('styles')
    <!-- Additional styles specific to the forget-password page can be included here -->
    <style>
        
    </style>
@endpush

@push('scripts')
    <!-- Additional scripts specific to the forget-password page can be included here -->
    <script>
        "use strict";

        // Class Definition
        var KTAuthResetPassword = function() {
            // Elements
            var form;
            var submitButton;
            var validator;

            var handleForm = function () {
                // Init form validation rules.
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
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',  // comment to enable invalid state icons
                                eleValidClass: '' // comment to enable valid state icons
                            })
                        }
                    }
                );

                // Handle form submission
                form.addEventListener('submit', function (e) {
                    e.preventDefault(); // Prevent the default form submission

                    // Validate form
                    validator.validate().then(function (status) {
                        if (status === 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');

                            // Disable button to avoid multiple clicks
                            submitButton.disabled = true;

                            // Make an Ajax request
                            $.ajax({
                                url: '{{ route('auth.forget-password.process') }}',
                                type: 'POST',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    email: form.querySelector('[name="email"]').value,
                                },
                                success: function (response) {
                                    console.log(response)
                                    // Hide loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    if (response.success) {
                                        // Show success popup
                                        Swal.fire({
                                            text: response.message,
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                form.querySelector('[name="email"]').value = "";
                                                window.location.href = '{{ route('auth.sign-in.show') }}';
                                            }
                                        });
                                    } else {
                                        // Show error popup
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
                                error: function (xhr, status, error) {
                                    // Handle Ajax error
                                    console.error(xhr.responseText);
                                    Swal.fire({
                                        text: "An error occurred. Please try again.",
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
                                }
                            });
                        } else {
                            // Show error popup
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
                        }
                    });
                });
            };


            // Public Functions
            return {
                // public functions
                init: function() {
                    form = document.querySelector('#kt_password_reset_form');
                    submitButton = document.querySelector('#kt_password_reset_submit');

                    handleForm();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTAuthResetPassword.init();
        });

    </script>
@endpush
