"use strict";
import all  from '../../app.js'

var KTGoPromiseDetail = function () {

    var form;
    var buttonDetails;
    var acceptButtons;
    var revisionButtons;
    var validator;

    var handlePromiseDetail = () => {
        const buttonDetail  =  document.querySelectorAll('._buttons-for-details');
        // console.log(buttonDetail)
        buttonDetail.forEach( d => {
            d.addEventListener('click', function (e) {
                e.preventDefault();
                all.showLoading();
                KTApp.showPageLoading();

                axios.post(d.getAttribute("href"), {
                    id : d.getAttribute("data-id"),
                    token : d.getAttribute("data-token"),
                }).then(function (response) {
                    if (response.data.error_code == 1) {
                        Swal.fire({
                            text: response.data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                    document.querySelector('#headerModalDetail').innerHTML = response.data.data.students.name + " - " + response.data.data.title_promise
                    form.querySelector('[name="nim"]').value= response.data.data.students.nim;
                    form.querySelector('[name="name"]').value= response.data.data.students.name;
                    form.querySelector('[name="h_name"]').value= response.data.data.students.name;
                    form.querySelector('[name="h_nim"]').value= response.data.data.students.nim;
                    form.querySelector('[name="title_promise"]').value= response.data.data.title_promise;
                    form.querySelector('[name="das_sein"]').value= response.data.data.das_sein;
                    form.querySelector('[name="das_sollen"]').value= response.data.data.das_sollen;
                    form.querySelector('[name="gaps"]').value= response.data.data.gaps;
                    form.querySelector('[name="h_promotor"]').value= response.data.data.promotor;
                    form.querySelector('[name="formulation"]').value = response.data.data.formulation;
                    form.querySelector('[name="key"]').value = response.data.data.id;
                    let promotor = response.data.data.promotor;
                    let promotorTrigger = $('[name="promotor"]');
                    promotorTrigger.val(promotor).trigger("change.select2")

                    switch (response.data.data.status_promise) {
                        case '3':
                            acceptButtons.disabled=true
                            revisionButtons.disabled=false
                            break
                        case '4':
                            acceptButtons.disabled=true
                            revisionButtons.disabled=true
                            break
                        default:
                            acceptButtons.disabled=false
                            revisionButtons.disabled=false
                    }
                }).finally(function () {
                    KTApp.hidePageLoading();
                    all.hideLoading();
                })
            })
        })
    }

    var handleFormRevision = function(e) {
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
        revisionButtons.addEventListener('click', function (e) {
            e.preventDefault();
            validator.validate().then(function(status) {
                if (status == 'Valid') {
                    // Show loading indication
                    revisionButtons.setAttribute('data-kt-indicator', 'on');
                    // Disable button to avoid multiple click
                    revisionButtons.disabled = true;
                    var url = revisionButtons.getAttribute("data-kt-send");
                    axios.post(url, {
                        h_name: form.querySelector('[name="h_name"]').value,
                        h_nim: form.querySelector('[name="h_nim"]').value,
                        h_promotor: form.querySelector('[name="h_promotor"]').value,
                        promotor: form.querySelector('[name="promotor"]').value,
                        title_promise: form.querySelector('[name="title_promise"]').value,
                        das_sein: form.querySelector('[name="das_sein"]').value,
                        das_sollen: form.querySelector('[name="das_sollen"]').value,
                        gaps: form.querySelector('[name="gaps"]').value,
                        formulation: form.querySelector('[name="formulation"]').value,
                        token: form.querySelector('[name="_token"]').value,
                        id: form.querySelector('[name="key"]').value,
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
                                revisionButtons.disabled = false;
                                revisionButtons.setAttribute('data-kt-indicator', 'off');
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
                                revisionButtons.disabled = false;
                                revisionButtons.setAttribute('data-kt-indicator', 'off');
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

    var handleFormAccept = (e) => {
        acceptButtons.addEventListener('click', ()=> {
            var url = acceptButtons.getAttribute("data-kt-send");
            axios.post(url, {
                token: form.querySelector('[name="_token"]').value,
                id: form.querySelector('[name="key"]').value,
            }).then( (response) => {
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
                        revisionButtons.disabled = false;
                        revisionButtons.setAttribute('data-kt-indicator', 'off');
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
                }
                acceptButtons.setAttribute('data-kt-indicator', 'on');

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
            }).finally( () => {
                acceptButtons.setAttribute('data-kt-indicator', 'off');
            })

        })
    }
        return {
        init : function () {
            form = document.querySelector('#kt_details_go_promise_form');
            buttonDetails = document.querySelectorAll('._buttons-for-details');
            acceptButtons= document.querySelector('#kt_accept_go_promise_button');
            revisionButtons= document.querySelector('#kt_revision_go_promise_button');
            handlePromiseDetail();
            handleFormRevision();
            handleFormAccept();
        }
    }
}();

//
KTUtil.onDOMContentLoaded(function() {
    KTGoPromiseDetail.init();
});
