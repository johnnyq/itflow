<?php include("header.php"); ?>

<?php $sql = mysqli_query($mysqli,"SELECT * FROM accounts ORDER BY account_id DESC"); ?>


<div class="card mb-3">
  <div class="card-header">
    <h6 class="float-left mt-1"><i class="fa fa-piggy-bank"></i> Accounts</h6>
    <button type="button" class="btn btn-primary btn-sm mr-auto float-right" data-toggle="modal" data-target="#addAccountModal"><i class="fas fa-plus"></i> New</button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th class="text-right">Balance</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
      
          while($row = mysqli_fetch_array($sql)){
            $account_id = $row['account_id'];
            $account_name = $row['account_name'];
            $opening_balance = $row['opening_balance'];

          ?>
          <tr>
            <td><?php echo "$account_name"; ?></a></td>
            <?php
            $sql2 = mysqli_query($mysqli,"SELECT SUM(invoice_payment_amount) AS total_payments FROM invoice_payments WHERE account_id = $account_id");
            $row2 = mysqli_fetch_array($sql2);
            
            $sql3 = mysqli_query($mysqli,"SELECT SUM(expense_amount) AS total_expenses FROM expenses WHERE account_id = $account_id");
            $row3 = mysqli_fetch_array($sql3);
            
            $balance = $opening_balance + $row2['total_payments'] - $row3['total_expenses'];
            if($balance == ''){
              $balance = '0.00'; 
            }
            ?>

            <td class="text-right text-monospace">$<?php echo $balance; ?></td>
            <td>
              <div class="dropdown dropleft text-center">
                <button class="btn btn-secondary btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal<?php echo $account_id; ?>">Edit</a>
                  <a class="dropdown-item" href="post.php?delete_account=<?php echo $account_id; ?>">Delete</a>
                </div>
              </div>      
            </td>
          </tr>

          <?php
          include("edit_account_modal.php");
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("add_account_modal.php"); ?>

<?php include("footer.php");