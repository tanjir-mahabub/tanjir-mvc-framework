<?php
session_start();

use App\Config\FormKey;

$hashKey = new FormKey();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php Form Submission</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <style>
        .bg-light {
            background-color: #002b56!important;
        }
        a {
            color: white;
        }
        a:hover {
            color: red;
        }
        .navbar-toggler {
            background-color: #bd0000 !important;
        }
      .error {
            width: 100%;
            font-size: .875em;
            color: #dc3545;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- <a class="navbar-brand">Brand</a> -->
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="nav w-100 px-5 justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo BASE_URL ?>/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL ?>/report">Report</a>
            </li>            
        </ul>
    </div>
</nav>

    <div class="container my-5">
        <div class="row">
            <div class="col pb-5">
                <h1 class="h3 text-center">
                    Simple PHP form submission script <br> 
                    with frontend validation</h1>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col">
                <div class="card p-5 shadow rounded">
                    <div class="card-title">
                        <h2 class="h4 text-center pb-3">Entry Form</h2>
                        <div id="message" class="text-center"></div>
                    </div>
                    <div class="card-body">
                        <form id="entryForm" action="index.php" method="post">
                            <?php $hashKey->outputKey(); ?>   
                            <input id="ip" type="hidden" name="buyer_ip">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="buyer">Buyer</label>
                                    <input id="buyer" type="text" class="form-control" name="buyer" placeholder="Name" >
                                </div>
                                <div class="col">
                                    <label for="buyer_email">Buyer Email</label>
                                    <input id="email" type="email" class="form-control" name="buyer_email" placeholder="Email" >
                                </div>
                            </div>
                        
                        
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="city">City</label>
                                    <input id="city" type="text" class="form-control" name="city" placeholder="City" >
                                </div>
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone-addon">880</span>
                                        <input type="text" class="form-control" id="phone" aria-describedby="phone-addon" name="phone" placeholder="Phone" >
                                    </div>
                                </div>
                            </div>
                        
                        
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="items">Items</label>
                                    <input id="items" type="text" class="form-control" name="items" placeholder="Items" >
                                </div>
                                <div class="col">
                                    <label for="amount">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="amount">$</span>
                                        <input type="number" class="form-control" aria-describedby="amount" name="amount" placeholder="0" min="0" step="0.01">
                                        <!-- <span class="input-group-text">.00</span> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="receipt_id">Receipt Id</label>
                                    <input id="receipt_id" type="text" class="form-control" name="receipt_id" placeholder="Receipt Id" >
                                </div>
                            </div>
                                                
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="entry_by">Entry By</label>
                                    <input id="entry_by" type="number" class="form-control" name="entry_by" placeholder="Entry By" >                                    
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="note">Note</label>
                                    <textarea id="note" class="form-control" name="note" cols="30" rows="5" placeholder="Enter your text..." ></textarea>
                                </div>
                            </div>
                            <input id="submit" class="btn btn-success" type="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>

<script src="<?php echo BASE_URL ?>/public/js/app.js" ></script>

</body>
</html>

<?php session_destroy(); ?>