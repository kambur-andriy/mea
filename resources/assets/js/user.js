require('./bootstrap');

require('./helpers');

$(document).ready(function () {

    /**
     * Search on the page
     */
    $('#search_form input[type="text"]').on('keyup', function(event) {

        // Clear form
        if (event.keyCode === 27) {

            $('#clear_search').trigger('click');

        }

        // Toggle visibility of the clear button
        if ($(this).val().length === 0) {

            $('#clear_search').addClass('d-none');

        } else {

            $('#clear_search').removeClass('d-none');

        }

    });

    $('#clear_search').on('click', function() {

        $('#search_form input[type="text"]').val('');

        $('#search_form').trigger('submit');

        $(this).addClass('d-none');

    });

    /**
     * Set active menu item on the left panel
     */
    const url = window.location.href;

    $('.sidebar-wrapper .active').removeClass('active');

    $('.sidebar-wrapper a[href="' + url + '"]').parent().addClass('active');


    /**
     * Logout
     */
    $('#log_out').on('click', function (event) {

        event.preventDefault();

        axios.post(
            '/account/logout',
            qs.stringify({})
        )
            .then(
                () => {

                    window.location.href = '/';

                }
            )
            .catch(
                error => {

                    processErrors(error, $(this));

                }
            )
    });

});