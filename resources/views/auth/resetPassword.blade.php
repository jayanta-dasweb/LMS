@extends('auth.layouts.app')

@section('title', 'Reset Password - Servile Relocations')

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
                     <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" method="POST">
                        @csrf
                        <input type="hidden" name="reset_token" value="{{ request()->segment(3) }}"> 
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                           <!--begin::Logo-->
                           <a href="javascript:void(0)" class="mb-0 mb-lg-12">
                               <img alt="Logo" src="{{ asset('assets/media/logos/servile-logo.png') }}"/>
                           </a>    
                           <!--end::Logo-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                           <!--begin::Title-->
                           <h1 class="text-dark fw-bolder mb-3">
                              Reset Password
                           </h1>
                           <!--end::Title-->
                           <div class="text-black fw-semibold fs-6">
                              Enter your new password and confirm password.
                           </div>
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                           <!--begin::Wrapper-->
                           <div class="mb-1">
                              <!--begin::Input wrapper-->
                              <div class="position-relative mb-3">    
                                 <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off"/>
                                 <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                 <i class="ki-outline ki-eye-slash fs-2"></i>                    <i class="ki-outline ki-eye fs-2 d-none"></i>                </span>
                              </div>
                              <!--end::Input wrapper-->
                              <!--begin::Meter-->
                              <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                 <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                              </div>
                              <!--end::Meter-->
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Hint-->
                           <div class="text-muted">
                              Use 8 or more characters with a mix of letters, numbers & symbols.
                           </div>
                           <!--end::Hint-->
                        </div>
                        <!--end::Input group--->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                           <!--begin::Wrapper-->
                           <div class="mb-1">
                              <!--begin::Input wrapper-->
                              <div class="position-relative mb-3">    
                                 <input class="form-control bg-transparent" type="password" placeholder="Confirm Password" name="confirm-password" autocomplete="off"/>
                                 <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                 <i class="ki-outline ki-eye-slash fs-2"></i>                    <i class="ki-outline ki-eye fs-2 d-none"></i>                </span>
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
                           <button type="submit" id="kt_new_password_submit" class="btn btn-primary">
                              <!--begin::Indicator label-->
                              <span class="indicator-label">
                              Reset Password</span>
                              <!--end::Indicator label-->
                              <!--begin::Indicator progress-->
                              <span class="indicator-progress">
                              Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                              </span>
                              <!--end::Indicator progress-->        
                           </button>
                        </div>
                        <!--end::Submit button-->
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
    <!-- Additional styles specific to the reset-password page can be included here -->
    <style>
        /* Add custom styles for the reset-password page */
    </style>
@endpush

@push('scripts')
    <!-- Additional scripts specific to the reset-password page can be included here -->
    <script>
      "use strict";

      // Class Definition
      var KTAuthNewPassword = function () {
         // Elements
         var form;
         var submitButton;
         var validator;
         var passwordMeter;

         var handleForm = function (e) {
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validator = FormValidation.formValidation(
                  form,
                  {
                     fields: {
                        'password': {
                              validators: {
                                 notEmpty: {
                                    message: 'The password is required'
                                 },
                                 callback: {
                                    message: 'Please enter a valid password',
                                    callback: function (input) {
                                          if (input.value.length > 0) {
                                             return validatePassword();
                                          }
                                    }
                                 }
                              }
                        },
                        'confirm-password': {
                              validators: {
                                 notEmpty: {
                                    message: 'The password confirmation is required'
                                 },
                                 identical: {
                                    compare: function () {
                                          return form.querySelector('[name="password"]').value;
                                    },
                                    message: 'The password and its confirmation are not the same'
                                 }
                              }
                        },
                        'toc': {
                              validators: {
                                 notEmpty: {
                                    message: 'You must accept the terms and conditions'
                                 }
                              }
                        }
                     },
                     plugins: {
                        trigger: new FormValidation.plugins.Trigger({
                              event: {
                                 password: false
                              }
                        }),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                              rowSelector: '.fv-row',
                              eleInvalidClass: '',  // comment to enable invalid state icons
                              eleValidClass: '' // comment to enable valid state icons
                        })
                     }
                  }
            );

            submitButton.addEventListener('click', function (e) {
                  e.preventDefault();

                  validator.revalidateField('password');

                  validator.validate().then(function (status) {
                     if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple clicks
                        submitButton.disabled = true;

                        // Perform AJAX request
                        $.ajax({
                              type: 'POST',
                              url: '{{ route('auth.reset-password.process')}}', 
                              data: $(form).serialize(),
                              headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                              },
                              success: function (response) {
                                 // Handle success response
                                 if (response.success) {
                                    Swal.fire({
                                          text: response.message,
                                          icon: 'success',
                                          buttonsStyling: false,
                                          confirmButtonText: 'Ok, got it!',
                                          customClass: {
                                             confirmButton: 'btn btn-primary'
                                          }
                                    }).then(function (result) {
                                          if (result.isConfirmed) {
                                             window.location.href = '{{ route('auth.sign-in.show') }}';
                                          }
                                    });
                                 } else {
                                    console.log(response.message)
                                    // Handle error response
                                    Swal.fire({
                                          text: response.message,
                                          icon: 'error',
                                          buttonsStyling: false,
                                          confirmButtonText: 'Ok, got it!',
                                          customClass: {
                                             confirmButton: 'btn btn-primary'
                                          }
                                    });
                                 }
                              },
                              error: function (error) {
                                 // Handle AJAX error
                                 console.error('AJAX Error:', error);
                              },
                              complete: function () {
                                 // Hide loading indication
                                 submitButton.removeAttribute('data-kt-indicator');

                                 // Enable button
                                 submitButton.disabled = false;
                              }
                        });
                     } else {
                        // Show error popup for form validation errors
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

            form.querySelector('input[name="password"]').addEventListener('input', function () {
                  if (this.value.length > 0) {
                     validator.updateFieldStatus('password', 'NotValidated');
                  }
            });
         }

         var validatePassword = function () {
            return (passwordMeter.getScore() === 100);
         }

         // Public Functions
         return {
            // public functions
            init: function () {
                  form = document.querySelector('#kt_new_password_form');
                  submitButton = document.querySelector('#kt_new_password_submit');
                  passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));
                  handleForm();
            }
         };
      }();

      // On document ready
      KTUtil.onDOMContentLoaded(function () {
         KTAuthNewPassword.init();
      });


    </script>
@endpush
