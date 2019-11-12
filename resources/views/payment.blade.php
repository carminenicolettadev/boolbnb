<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Braintree AirBnB</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    
        
    <div>

        <p>ID dell'appartamento: {{$singleFlat -> id}}</p>
        <p>ID del proprietario: {{$singleFlat -> user_id}}</p>

        <p>Nome del proprietario: {{$user -> name}}</p>

        @foreach ($singleFlat -> payments as $payment)
            <p>Prezzo: {{$payment}}</p><br>
        @endforeach

        <h1>Metti in mostra il tuo appartamento!</h1>
        <p>Sponsorizzazione per 24 ore: costo € 2,99</p>
        <p>Sponsorizzazione per 72 ore: costo € 5,99</p>
        <p>Sponsorizzazione per 144 ore: costo € 9,99</p>

        <label for="sponsor">Scegli la tua sponsorizzazione</label>
        <select name="sponsor" id="sponsorVal">
            <option value="2.99">24 ore</option>
            <option value="5.99">72 ore</option>
            <option value="9.99">144 ore</option>
        </select>
        {{-- Al click prendiamo il valore costo selezionato
            var costo = document.getElementById('sponsorVal').value; --}}
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="dropin-container"></div>
                    <button id="submit-button">Request payment method</button>
                </div>
            </div>
        </div>

        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                authorization: "{{ Braintree_ClientToken::generate() }}",
                container: '#dropin-container'
                }, function (createErr, instance) {
                    button.addEventListener("click", function () {
                        instance.requestPaymentMethod(function (err, payload) {
                            $.get('{{route("payment.make")}}', {payload}, function (response) {
                                if (response.success) {
                                    alert('Payment successfull!');
                                } else {
                                    alert('Payment failed');
                                }
                            }, 'json');
                        });
                    });
                });
        </script>

    </body>
</html>