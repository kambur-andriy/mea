// Errors
window.showFormError = (message, target) => {

    if (typeof message === 'object') {
        message = message.join('');
    }

    target.addClass('is-invalid');
    target.parent().addClass('has-error');

    if (target.next('.invalid-tooltip').length === 0) {
        target.after(
            $('<div />').addClass('invalid-tooltip')
        );
    }

    target.next('.invalid-tooltip').html(message);

};

window.clearFormError = target => {

    target.parent().removeClass('has-error');
    target.removeClass('is-invalid');
    target.next('.invalid-tooltip').remove();

};

$(document).on('focus', 'input[type="text"], input[type="email"], input[type="password"], textarea', function () {

    clearFormError($(this));

});

window.processErrors = (error, form) => {

    if (error.response.status == 422) {

        const errors = error.response.data.errors;

        $.each(
            errors,
            (field, message) => {

                let formControll = $('input[name="' + field + '"]', form);

                if (formControll.length === 0) {

                    formControll = $('#' + field, form);

                }

                showFormError(message, formControll);

            }
        )

    } else {

        const message = error.response.data.message;

        showError(message)
    }

}


// Messages
window.showError = message => {

    if (typeof message === 'object') {
        message = message.join('');
    }

    if (message.length === 0) {
        message = 'An error occurred'
    }

    return swal(
        {
            title: "Error!",
            text: message,
            icon: "error",
            dangerMode: true,
        }
    );

};

window.showMessage = message => {

    if (typeof message === 'object') {
        message = message.join('');
    }

    return swal(
        {
            title: "Success!",
            text: message,
            icon: "success",
            buttons: {
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "swal-button--success",
                    closeModal: true
                }
            },
        }
    );

}

window.showConfirmation = message => {

    return swal(
        {
            title: "Are you sure?",
            text: message,
            icon: "info",
            buttons: true,
        }
    );

}

window.showEdit = (title, form) => {

    return swal(
        {
            title: title,
            icon: "info",
            content: form,
            buttons: true,
        }
    );

}

window.showTranslation = (word, translation) => {

    return swal(
        {
            title: word,
            icon: "success",
            text: translation,
            buttons: false,
        }
    );

}

// Spinner
window.showSpinner = button => {

    button.prop('disabled', true);

    button
        .append(
            $('<div />')
                .addClass('spinner-container')
                .append(
                    $('<i />').addClass('material-icons spinner').html('autorenew')
                )
        )
}

window.hideSpinner = target => {

    target.prop('disabled', false);

    $('.spinner-container').remove();

}


// Form
window.clearForm = form => {

    $('input[type="text"], input[type="email"], input[type="password"]', form).each(function () {
        $(this).val('');
    });

    $('textarea', form).each(function () {
        $(this).val('');
    });

}


// Modals
window.showModal = (title, content, footer = '') => {

    const modalPopup = $('<div />')
        .addClass('modal')
        .attr(
            {
                'id': 'deleteCollection',
                'tabindex': '-1',
                'role': 'dialog'
            }
        )
        .append(
            $('<div />')
                .addClass('modal-dialog modal-dialog-centered')
                .attr('role', 'document')
                .append(
                    $('<div />')
                        .addClass('modal-content')
                        .append(
                            $('<div / >')
                                .addClass('modal-header')
                                .append(
                                    $('<h5 />')
                                        .addClass('modal-title text-primary')
                                        .html(title)
                                )
                                .append(
                                    $('<button />')
                                        .addClass('close')
                                        .attr(
                                            {
                                                'data-dismiss': 'modal',
                                                'area-label': 'Close'
                                            }
                                        )
                                        .append(
                                            $('<span />')
                                                .attr('area-hidden', 'true')
                                                .html('&times;')
                                        )
                                )
                        )
                        .append(
                            $('<div />')
                                .addClass('modal-body')
                                .append(content)
                        )
                        .append(
                            $('<div />')
                                .addClass('modal-footer')
                                .append(footer)
                        )
                )
        )

    modalPopup.modal(
        {
            'keyboard': true,
            'focus': true,
            'show': true
        }
    );

}

window.closeModal = () => {

    $('.close').trigger('click');

}
