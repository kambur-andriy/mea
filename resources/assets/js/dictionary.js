require('./bootstrap');

require('./helpers');

$(document).ready(function () {

    /**
     * Search functionality
     */
    $('#search_form').on('submit', function (event) {

        event.preventDefault();

        const search = $('input[type="text"]', $(this)).val().toLowerCase();

        $('#descriptions_list tr').each(function () {

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
    $('#describe_word_frm').on('submit', function (event) {

        event.preventDefault();

        const button = $(this).find('button[type="submit"]');

        showSpinner(button);

        const credentials = {
            word: $('input[name="word"]', this).val(),
            transcription: $('input[name="transcription"]', this).val(),
            sound: $('input[name="sound"]', this).val(),
            description: $('#description', this).val(),
            translation: $('#translation', this).val(),
        };

        axios.post(
            '/dictionary/extend',
            qs.stringify(credentials)
        )
            .then(
                () => {

                    hideSpinner(button);

                    clearForm($(this));

                    showMessage('Word successfully added to the dictionary.')
                        .then(
                            () => $('input[type="text"]:eq(0)').focus()
                        )

                }
            )
            .catch(
                error => {

                    hideSpinner(button);

                    processErrors(error, $(this));

                }
            )

    });

    $('.play-sound').on('click', function(event) {

        event.preventDefault();

        const soundUrl = $(this).data('sound');

        const audio = new Audio(soundUrl);

        audio.play();

    });

    $('#show_answer').on('click', function(event) {

        event.preventDefault();

        $('#answer').removeClass('invisible');

    });

});