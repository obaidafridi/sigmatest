
    @extends('layouts.Front.master-front')
    @section('styles')
    <style>
      
    </style>
    @endsection
    @section('content')
    <main class="pageWrapper">
        <div class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center heading3">
                        <h3 class="commonTitle" style="background:black;color:white;padding:31px">Checkout</h3>
                    </div>
                </div>
                <br>
                <div class="row mt-20">
                     <div class="col-lg-12 text-center">
                        <div class="mt-10 text-center">
                            <div class="commonBox">
                                <div class="imgBox">
                                    <img src="{{asset($services->image)}}" alt="" class="img-fluid">
                                </div>
                                <p>{{$services->name}}<br>${{$services->price}}</p>
                                <br>
                                <form id="payment-form" action="{{route('submit.service')}}" method="post" style="width: 45% !important;margin:0 auto;">
                                        @csrf
                                        <input type="hidden" name="serviceid" value="{{$services->id}}">
                                        <input type="number" name="qty" value="1" required >
                                        <div class="bottom p-5">
                                            <div id="strip-button-container">
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-warning">Pay With Credit Card</button>
                                            <p><img src="{{ asset('img/creditcard.png') }}" alt="credit card icons" style="width:30%;" /></p>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>

    @endsection
    @section('script')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            $(document).ready(function (){
                var stripe = Stripe('pk_test_51H6zNfDIr4vVZ16GTMYDTcZb9IJpNuGaqT6b7oED9QQQ8cCtNqk0Nphoxo2p1YTT8ze35JGrjrtpiIOPIFxB2t22008OeJYgig');
                var elements = stripe.elements();
                // Custom styling can be passed to options when creating an Element.
                var style = {
                    base: {
                        color: "#32325d",
                        fontFamily: 'Arial, sans-serif',
                        fontSmoothing: "antialiased",
                        fontSize: "16px",
                        "::placeholder": {
                            color: "#32325d"
                        }
                    },
                    invalid: {
                        fontFamily: 'Arial, sans-serif',
                        color: "#fa755a",
                        iconColor: "#fa755a"
                    }
                };

                // Create an instance of the card Element.
                var card = elements.create('card', {style: style});

                // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#strip-button-container');

                // Create a token or display an error when the form is submitted.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    stripe.createToken(card).then(function (result) {
                        if (result.error) {
                            // Inform the customer that there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server.
                            stripeTokenHandler(result.token);
                        }
                    });
                });

                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    hiddenInput.setAttribute('style', "border:1px");
                    form.appendChild(hiddenInput);
                    // Submit the form
                    form.submit();
                }
            })
    </script>
    @endsection

