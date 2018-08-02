require('./bootstrap');

require('./helpers');

$(document).ready(function () {

    /**
     * Search functionality
     */
    $('#search_form').on('submit', function (event) {

        event.preventDefault();

        const search = $('input[type="text"]', $(this)).val().toLowerCase();

        $('#translations_list tr').each(function () {

            const word = $('td:eq(0)', $(this)).text();
            const translation = $('td:eq(1)', $(this)).text();

            const notFound = (word.toLowerCase().indexOf(search) === -1 && translation.toLowerCase().indexOf(search) === -1);

            if (notFound && search.length > 0) {
                $(this).hide();
            } else {
                $(this).show();
            }

        });

    });

    /**
     * Handle actions
     */
    $('#translate_word_frm').on('submit', function (event) {

        event.preventDefault();

        const button = $(this).find('button[type="submit"]');

        showSpinner(button);

        const credentials = {
            word: $('input[name="word"]', this).val()
        };

        axios.post(
            '/dictionary/translate',
            qs.stringify(credentials)
        )
            .then(
                response => {

                    hideSpinner(button);

                    clearForm($(this));

                    showTranslation(response.data.word, response.data.translation.join('; '))
                        .then(
                            () => $('input[name="word"]', this).focus()
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