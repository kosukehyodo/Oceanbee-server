$(function () {
    
    const stripe = Stripe(process.env.MIX_STRIPE_KEY);
    const elements = stripe.elements();

    /* Stripe Elementsを使ったFormの各パーツをどんなデザインにしたいかを定義 */
    const style = {
        base: {
            fontSize: "15px",
            color: "#32325d",
            lineHeight: "0.8rem",
            fontSmoothing: "antialiased"
        }
    };

    /* フォームでdivタグになっている部分をStripe Elementsを使ってフォームに変換 */
    const cardNumber = elements.create("cardNumber", { style: style });
    cardNumber.mount("#cardNumber");
    const cardCvc = elements.create("cardCvc", { style: style });
    cardCvc.mount("#securityCode");
    const cardExpiry = elements.create("cardExpiry", { style: style });
    cardExpiry.mount("#expiration");

    var form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        stripe.createToken(cardNumber).then(function (result) {
            if (result.token == null) {
                // カード削除時
                form.submit();
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById("payment-form");
        var hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "stripeToken");
        hiddenInput.setAttribute("value", token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
});