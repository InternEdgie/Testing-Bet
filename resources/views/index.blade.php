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
                            <form>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="bet_number">Bet Number</label>
                                        <input type="number" class="form-control" placeholder="Number (3 digit)" maxlength="3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bet_number">Bet Amount</label>
                                        <input type="number" class="form-control" placeholder="Amount" min="0.00" max="10000.00" step="0.01">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bet_number">Bet Type</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled selected>SELECT STRAIGHT/RAMBLE</option>
                                        <option value="0">STRAIGHT</option>
                                        <option value="1">RAMBLE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bet_number">Draw</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled selected>SELECT LOTTO DRAW</option>
                                        <option value="0">2:00 PM</option>
                                        <option value="1">5:00 PM</option>
                                        <option value="1">9:00 PM</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">SUBMIT BET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Bet Number</th>
                                <th>Bet Amount</th>
                                <th>Winning Amount</th>
                                <th>Time Draw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3D0001</td>
                                <td>361</td>
                                <td>10</td>
                                <td>6500</td>
                                <td>2:00pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
</body>

</html>