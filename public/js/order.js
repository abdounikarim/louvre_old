var amount = price + '00';
var handler = StripeCheckout.configure({
    key: 'pk_test_41Zm37QedzTZiFq2AUxKnFU9',
    image: 'http://louvre.abdounikarim.com/favicon.ico',
    locale: 'auto',
    token: function(token) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        var form = $('<form action="' + result + '" method="post">' +
            '<input type="hidden" name="token" value="' + token.id + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    }
});

document.getElementById('customButton').addEventListener('click', function(e) {
    // Open Checkout with further options:
    handler.open({
        name: 'Paiement Billets',
        description: 'Musée du louvre',
        zipCode: true,
        currency: 'eur',
        amount: amount,
        email: 'abdounikarim@gmail.com',
    });
    e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
    handler.close();
});