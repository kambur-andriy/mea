require('./bootstrap');

require('./helpers');

const showForm = form => {

    $('input[type="email"], input[type="password"]', form).val('');

    form.removeClass('d-none');

    $('input:eq(0)', form).focus();

}

const hideForm = form => {

    form.addClass('d-none');

}

$(document).ready(function () {

    $('.switch_login').on('click', function () {

        hideForm($('form:visible'));

        showForm($('#log_in_frm'));

    });

    $('#switch_register').on('click', function () {

        hideForm($('form:visible'));

        showForm($('#register_frm'));

    });

    $('#switch_password').on('click', function () {

        hideForm($('form:visible'));

        showForm($('#reset_password_frm'));

    });

    $('#switch_home').on('click', function () {

        window.location.href = '/';

    });

    $('#register_frm').on('submit', function (event) {

        event.preventDefault();

        const button = $(this).find('button[type="submit"]');

        showSpinner(button);

        const credentials = {
            email: $('input[name="email"]', this).val(),
            password: $('input[name="password"]', this).val(),
            password_confirmation: $('input[name="password_confirmation"]', this).val(),
        };

        axios.post(
            '/account/create',
            qs.stringify(credentials)
        )
            .then(
                () => {

                    hideSpinner(button);

                    clearForm($(this));

                    showMessage('You are successfully registered. Use your credentials to log in to the system.')
                        .then(
                            () => {

                                hideForm($('form:visible'));

                                showForm($('#log_in_frm'));

                            }
                        );

                }
            )
            .catch(
                error => {

                    hideSpinner(button);

                    processErrors(error, $(this));

                }
            )
    });

    $('#log_in_frm').on('submit', function (event) {

        event.preventDefault();

        const button = $(this).find('button[type="submit"]');

        showSpinner(button);

        const credentials = {
            email: $('input[name="email"]', this).val(),
            password: $('input[name="password"]', this).val(),
        };

        axios.post(
            '/account/login',
            qs.stringify(credentials)
        )
            .then(
                response => {

                    hideSpinner(button);

                    clearForm($(this));

                    window.location.href = response.data.homePage;

                }
            )
            .catch(
                error => {

                    hideSpinner(button);

                    processErrors(error, $(this));

                }
            )
    });

    $('#reset_password_frm').on('submit', function (event) {

        event.preventDefault();

        const button = $(this).find('button[type="submit"]');

        showSpinner(button);

        const credentials = {
            email: $('input[name="email"]', this).val(),
        };

        axios.post(
            '/account/reset-password',
            qs.stringify(credentials)
        )
            .then(
                () => {

                    hideSpinner(button);

                    clearForm($(this));

                    showMessage('We sent you an email with reset password instructions.')

                }
            )
            .catch(
                error => {

                    hideSpinner(button);

                    processErrors(error, $(this));

                }
            )
    });

    $('#update_password_frm').on('submit', function (event) {

        event.preventDefault();

        const button = $(this).find('button[type="submit"]');

        showSpinner(button);

        const queryParams = qs.parse(window.location.search.substring(1));

        const credentials = {
            token: queryParams.reset_token,
            password: $('input[name="password"]', this).val(),
            password_confirmation: $('input[name="password_confirmation"]', this).val(),
        };

        axios.post(
            '/account/update-password',
            qs.stringify(credentials)
        )
            .then(
                () => {

                    hideSpinner(button);

                    clearForm($(this));

                    showMessage('Your password successfully updated.')
                        .then(
                            () => {

                                hideForm($('form:visible'));

                                showForm($('#log_in_frm'));

                            }
                        );

                }
            )
            .catch(
                error => {

                    hideSpinner(button);

                    processErrors(error, $(this));

                }
            )
    });

});