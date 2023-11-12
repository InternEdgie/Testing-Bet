<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Testing Bet</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center p-5">
        <div class="align-items-center">
            <div class="row">
                <div class="col-md-12">
                    @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <div class="card" style="width: 40rem;">
                        <div class="card-header">
                            <h5 class="card-title text-center mb-0">
                                Three Digit Draw
                            </h5>
                        </div>
                        <div class="card-body">
                            <form id="betForm">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="bn">Bet Number</label>
                                        <input type="number" class="form-control" placeholder="Number (3 digit)" maxlength="3" name="bn" id="bn" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ba">Bet Amount</label>
                                        <input type="number" class="form-control" placeholder="Amount" min="0.00" max="10000.00" step="0.01" name="ba" id="ba" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bt">Bet Type</label>
                                    <select name="bt" class="form-control" id="bt" required>
                                        <option value="" disabled selected>SELECT STRAIGHT/RAMBLE</option>
                                        <option value="0">STRAIGHT</option>
                                        <option value="1">RAMBLE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dt">Draw Time</label>
                                    <select name="dt" class="form-control" id="dt" required>
                                        <option value="" disabled selected>SELECT LOTTO DRAW</option>
                                        <option value="14:00:00">2:00 PM</option>
                                        <option value="17:00:00">5:00 PM</option>
                                        <option value="21:00:00">9:00 PM</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" id="display_bet">BET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none" id="display_this">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Bet Number</th>
                                <th>Bet Amount</th>
                                <th>Bet Type</th>
                                <th>Time Draw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ticket_id"></td>
                                <td class="bet_number"></td>
                                <td class="bet_amount"></td>
                                <td class="bet_type"></td>
                                <td class="time_draw"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <form action="insertBet" id="proceed_bet" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="ticket_id" required>
                            <input type="hidden" class="form-control" name="bet_number" required>
                            <input type="hidden" class="form-control" name="bet_amount" required>
                            <input type="hidden" class="form-control" name="bet_type" required>
                            <input type="hidden" class="form-control" name="time_draw" required>
                            <div class="text-center">
                                <button class="btn btn-primary" id="submit_bet">PROCEED TO BET</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function generateRandomLetter() {
            var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var letter = "";
            for (var i = 0; i < 3; i++) {
                var randomIndex = Math.floor(Math.random() * alphabet.length);
                letter += alphabet[randomIndex];
            }
            return letter;
        }

        $(document).ready(function() {
            $('#betForm').on('submit', function(e) {
                e.preventDefault()

                var bet_number = $('input[name="bn"]').val()
                var bet_amount = $('input[name="ba"]').val()
                var bet_type = $('select[name="bt"]').val()
                var time_draw = $('select[name="dt"]').val()
                var _token = $('input[name="_token"]').val()

                bet_amount = Number(bet_amount).toFixed(2)

                var randomNumber = Math.floor(Math.random() * 100);
                var randomLetters = generateRandomLetter();
                var currentYear = new Date().getFullYear();
                var ticket_id = "3D" + randomNumber + randomLetters + currentYear

                if (bet_type == 0) {
                    bet_type = "STRAIGHT"
                } else if (bet_type == 1) {
                    bet_type = "RAMBLE"
                }

                $('.ticket_id').text(ticket_id)
                $('.bet_number').text(bet_number)
                $('.bet_amount').text(bet_amount)
                $('.bet_type').text(bet_type)
                $('.time_draw').text(time_draw)

                if (bet_type == "STRAIGHT") {
                    bet_type = 0
                } else if (bet_type == "RAMBLE") {
                    bet_type = 1
                }

                $('input[name="ticket_id"]').val(ticket_id)
                $('input[name="bet_number"]').val(bet_number)
                $('input[name="bet_amount"]').val(bet_amount)
                $('input[name="bet_type"]').val(bet_type)
                $('input[name="time_draw"]').val(time_draw)

                $('#display_this').removeClass('d-none')
            })
            // $('#proceed_bet').on('submit', function(e) {
            //     var form_data = new FormData($(this)[0]);
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         url: "{{ route('insertBet') }}",
            //         type: 'POST',
            //         data: form_data,
            //         enctype: 'multipart/form-data',
            //         processData: false,
            //         contentType: false,
            //         dataType: "json",
            //         success: function(response) {
            //             window.location.reload();
            //         }
            //     });
            // })
        });
    </script>
</body>

</html>