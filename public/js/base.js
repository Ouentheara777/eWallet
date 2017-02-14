$.noConflict();
(function ($) {

    $(document).ready(function () {
        // For Adding Item.
        $('.action_add').on('click', function () {
            var label = $(this).val();
            var item = $(this).data('sku');
            var current = $(this);

            current.attr('disabled', 'disabled');
            current.val('Adding...');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/item/add',
                type: 'POST',
                data: {sku: item},
                success: function () {
                    setTimeout(function () {
                        current.removeAttr('disabled');
                        current.val(label);
                    }, 200);
                },
                failed: function () {
                    current.html('Try Again');
                    setTimeout(function () {
                        current.html(label);
                    }, 200);
                }
            });

        });
        $('.action_remove').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var current = $(this);
            var confirm_remove = confirm('Are You sure to remove this Item ?');

            if (!confirm_remove) return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'GET',
                success: function () {
                    current.closest('tr').remove();
                }
            })
            ;
        });
        $('#action_submit').on('click', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/checkout',
                type: 'POST',
                success: function (credit) {
                    $('#user_credit').html(credit);
                    $('#panel_checkout').html(response.checkout());
                }
            });

        });

        var response = {
            checkout: function () {
                var html = '<div class="alert alert-success">' +
                    '<h3>Payment Completed !</h3>' +
                    '<p>Thanks for using e-Wallet.</p>' +
                    '<a href="/home" class="btn btn-primary">Back</a></div>';
                return html;
            }
        }
    });
})(jQuery);