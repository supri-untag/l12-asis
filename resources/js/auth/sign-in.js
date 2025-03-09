"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleValidation = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
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
                                message: 'Email harus diisi'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Password harus diisi'
                            },
                            stringLength: {
                                min: 8,
                                message: 'Kurang dari 8 karater'
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
    }


    var handleSubmitAjax = function(e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Hide loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Enable button
                    submitButton.disabled = true;

                    // Check axios library docs: https://axios-http.com/docs/intro
                    axios.post(form.getAttribute('action'), {
                        email: form.querySelector('[name="email"]').value,
                        password: form.querySelector('[name="password"]').value,
                        token: form.querySelector('[name="_token"]').value
                    }).then(function (response) {
                        if (response.data.error_code === 0) {

                            console.log(response)
                            submitButton.setAttribute('data-kt-indicator', 'off');
                            submitButton.disabled = false;

                            form.querySelector('[name="email"]').value= "";
                            form.querySelector('[name="password"]').value= "";
                            Swal.fire({
                                text: response.data.message,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed){
                                    var redirectUrl = form.getAttribute('data-kt-redirect-url')
                                    if (redirectUrl){
                                        location.href = redirectUrl;
                                    }
                                }
                            })
                        } else {
                            // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: response.data.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, Perbaiki",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                            submitButton.disabled = false;
                            submitButton.setAttribute('data-kt-indicator', 'off');
                        }
                    }).catch(function (error) {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/

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

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');

            handleValidation();
            handleSubmitAjax(); // use for ajax submit
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
