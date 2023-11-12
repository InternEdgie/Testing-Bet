<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Bet</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center p-5">
        <div class="align-items-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="width: 40rem;">
                        <div class="card-header">
                            <h5 class="card-title text-center mb-0">
                                Three Digit Draw
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="insertBet" method="post" id="betForm">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="bet_number">Bet Number</label>
                                        <input type="number" class="form-control" placeholder="Number (3 digit)" maxlength="3" name="bet_number">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bet_number">Bet Amount</label>
                                        <input type="number" class="form-control" placeholder="Amount" min="0.00" max="10000.00" step="0.01" name="bet_amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bet_type">Bet Type</label>
                                    <select name="bet_type" id="bet_type" class="form-control">
                                        <option value="" disabled selected>SELECT STRAIGHT/RAMBLE</option>
                                        <option value="0">STRAIGHT</option>
                                        <option value="1">RAMBLE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="draw_time">Draw Time</label>
                                    <select name="draw_time" id="draw_time" class="form-control">
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
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Bet Number</th>
                                <th>Bet Amount</th>
                                <th>Time Draw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ticket_id"></td>
                                <td class="bet_number"></td>
                                <td class="bet_amount"></td>
                                <td class="time_draw"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button class="btn btn-primary" id="submit_bet">PROCEED TO BET</button>
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

                var bet_number = $('input[name="bet_number"]').val()
                var bet_amount = $('input[name="bet_amount"]').val()
                var bet_type = $('select[name="bet_type"]').val()
                var time_draw = $('select[name="draw_time"]').val()
                var _token = $('input[name="_token"]').val()

                bet_amount = Number(bet_amount).toFixed(2)

                var randomNumber = Math.floor(Math.random() * 100);
                var randomLetters = generateRandomLetter();
                var currentYear = new Date().getFullYear();
                var ticket_id = "3D" + randomNumber + randomLetters + currentYear

                $('.ticket_id').text(ticket_id)
                $('.bet_number').text(bet_number)
                $('.bet_amount').text(bet_amount)
                $('.time_draw').text(time_draw)
            })
            $('#submit_bet').on('click', function(e) {
                var ticket = $('.ticket_id').text()
                var number = $('.bet_number').text()
                var amount = $('.bet_amount').text()
                var draw = $('.time_draw').text()
            })
        });
    </script>
</body>

</html>