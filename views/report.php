<?php 
use App\DB\Database;
use App\Models\FormModel;

$model = FormModel::read();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php Form Submission</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/report.js"></script>
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
    <div class="conrainer-fluid p-5 my-3">
        <div class="row">
            <div class="col">
                <div class="card p-3 rounded">
                    <div class="card-title px-3">
                        <h4 class="text-center pt-2">Report</h4>
                        <!-- filter area -->
                        <div class="row float-left">
                            <div class="col-auto">
                                <input class="form-control form-control-sm" type="text" name="date_range" id="filterByDate">                            
                            </div>                            
                        </div>
                        <div class="row float-right">
                            <div class="col-auto text-right">
                                <input class="form-control form-control-sm text-center" type="number" name="id_filter" id="filterById" placeholder="Filter by user ID">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Buyer Email</th>
                                    <th scope="col">Buyer IP</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Items</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Entry By</th>
                                    <th scope="col">Entry At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($model as $key =>$value)
                                    {
                                ?>
                                <tr>                                    
                                    <th scope="row"><?php echo $value['id']; ?></th>
                                    <td><?php echo $value['buyer']; ?></td>
                                    <td><?php echo $value['buyer_email']; ?></td>
                                    <td><?php echo $value['buyer_ip']; ?></td>
                                    <td><?php echo $value['city']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['items']; ?></td>
                                    <td><?php echo $value['amount']; ?></td>
                                    <td><?php echo $value['note']; ?></td>
                                    <td><?php echo $value['entry_by']; ?></td>
                                    <td>
                                        <?php 
                                            $date = $value['entry_at'];
                                            $newDate = date("m-d-Y", strtotime($date));
                                            echo $newDate; 
                                        ?>
                                    </td>
                                </tr>                                
                                    
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>