Requests.Thesis = {
    show: function ()
    {
        API.request('Thesis.Show', {
            debug: true
        }, function (data) {
            $('#page').html(data.render);
            Stylo.Trigger.initialize();

            $('.stylo .stylo-block') .hide();
            $('#start') .show();

            $('.stylo .button-trigger').click(function () {
                const target = $(this);
                const data = target.data('key');
                $('.stylo .stylo-block') .hide();
                $('#' + data).show();
            });

        }, function () {

        });
    }
}