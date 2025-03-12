"use strict";
// Class definition
var KTGoPromiseAdd = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm  = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'h_name': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'h_nim': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'promotor': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'title_promise': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'das_sein': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'das_sollen': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'gaps': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
                    'formulation': {
                        validators: {
                            notEmpty: {
                                message: 'Wajib diisi'
                            }
                        }
                    },
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

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            validator.validate().then(function(status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;
                    let url = form.getAttribute('action')
                    axios.post(url, {
                        h_name: form.querySelector('[name="h_name"]').value,
                        h_nim: form.querySelector('[name="h_nim"]').value,
                        promotor: form.querySelector('[name="promotor"]').value,
                        title_promise: form.querySelector('[name="title_promise"]').value,
                        das_sein: form.querySelector('[name="das_sein"]').value,
                        das_sollen: form.querySelector('[name="das_sollen"]').value,
                        gaps: form.querySelector('[name="gaps"]').value,
                        formulation: form.querySelector('[name="formulation"]').value,
                        token: form.querySelector('[name="_token"]').value
                    }).then(function (response) {
                        switch (response.data.error_code) {
                            case 0:
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
                                break
                            case 1:
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, perbaiki",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                                submitButton.disabled = false;
                                submitButton.setAttribute('data-kt-indicator', 'off');
                                break
                            case 2:
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, perbaiki",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                                submitButton.disabled = false;
                                submitButton.setAttribute('data-kt-indicator', 'off');
                                break
                            default:
                                Swal.fire({
                                    text: "Maaf, "+ response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
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
            // Elements
            form = document.querySelector('#kt_add_go_promise_form');
            submitButton = document.querySelector('#kt_add_go_promise_button');
            handleForm ();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTGoPromiseAdd.init();
});
