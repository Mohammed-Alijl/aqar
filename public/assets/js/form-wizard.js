$(function () {
    'use strict'
    const translations = document.getElementById('translations');
    const nextLabel = translations.dataset.next;
    const previousLabel = translations.dataset.previous;
    const finishLabel = translations.dataset.finish;
    $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>'
    });
    $('#wizard2').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                // Step 1 form validation
                if (currentIndex === 0) {
                    var fname = $('#firstname').parsley();
                    var lname = $('#lastname').parsley();
                    if (fname.isValid() && lname.isValid()) {
                        return true;
                    } else {
                        fname.validate();
                        lname.validate();
                    }
                }
                // Step 2 form validation
                if (currentIndex === 1) {
                    var email = $('#email').parsley();
                    if (email.isValid()) {
                        return true;
                    } else {
                        email.validate();
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            } else {
                return true;
            }
        },
    });
    $('#add-aqar').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        stepsOrientation: 1,
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                // Step 1 form validation
                if (currentIndex === 0) {
                    let title = $('#title').parsley();
                    let zone = $('#zone').parsley();
                    let attachment = $('#input-b3').parsley();
                    let price = $('#price').parsley();
                    if (title.isValid() && zone.isValid() && attachment.isValid() && price.isValid()) {
                        return true;
                    } else {
                        title.validate();
                        zone.validate();
                        attachment.validate();
                        price.validate();
                    }
                }
                // Step 2 form validation
                if (currentIndex === 1) {
                    let latitude = document.getElementById('latitude').value;
                    let longitude = document.getElementById('longitude').value;
                    return !!(latitude && longitude);
                }
                // Step 3 form validation
                if (currentIndex === 2) {
                    return true;
                }

                // Step 4 form validation
                if (currentIndex === 3) {
                    let email = $('#email').parsley();
                    if (email.isValid()) {
                        return true;
                    } else {
                        email.validate();
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            } else {
                return true;
            }
        },
        onFinished: function () {
            document.forms[2].submit();
        },
        labels: {
            next: nextLabel,
            previous: previousLabel,
            finish: finishLabel
        }
    });
    $('#edit-aqar').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        stepsOrientation: 1,
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                // Step 1 form validation
                if (currentIndex === 0) {
                    let title = $('#title').parsley();
                    let zone = $('#zone').parsley();
                    let price = $('#price').parsley();
                    if (title.isValid() && zone.isValid() && price.isValid()) {
                        return true;
                    } else {
                        title.validate();
                        zone.validate();
                        price.validate();
                    }
                }
                // Step 2 form validation
                if (currentIndex === 1) {
                    return true;
                }
                // Step 3 form validation
                if (currentIndex === 2) {
                    let latitude = document.getElementById('latitude').value;
                    let longitude = document.getElementById('longitude').value;
                    return !!(latitude && longitude);
                }
                // Step 4 form validation
                if (currentIndex === 3) {
                    let email = $('#email').parsley();
                    if (email.isValid()) {
                        return true;
                    } else {
                        email.validate();
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            } else {
                return true;
            }
        },
        onFinished: function () {
            document.forms[2].submit();
        },
        labels: {
            next: nextLabel,
            previous: previousLabel,
            finish: finishLabel
        }
    });
    $('#show-aqar').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        stepsOrientation: 1,
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                return true;
                // Always allow step back to the previous step even if the current step is not valid.
            } else {
                return true;
            }
        },
        onFinished: function () {
            window.location.replace("../aqars");
        },
        labels: {
            next: nextLabel,
            previous: previousLabel,
            finish: finishLabel
        }
    });
});
