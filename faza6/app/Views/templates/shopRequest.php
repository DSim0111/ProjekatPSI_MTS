
<?php echo "<p>Date submitted: " . $shop->submitDate . "</p>"; ?>
<div class='row shopReport'>
    <div class='col-sm-12'>
        <h3>Information</h3>
        <table class='table table-striped table-light text-center myTable'> 
            <thead class='thead'> 
            <th> 
                First name
            </th>
            <th>
                Last name
            </th> 
            <th> 
                Shop name
            </th>
            <th> 
                e-mail
            </th>
            <th> 
                Address 
            </th>
            <th> 
                Phone number
            </th>
            </thead>
            <tbody class='align-middle'>
                <?php
                echo "<td>{$shop->name}</td>";
                echo "<td>{$shop->surname}</td>";
                echo "<td>{$shop->shopName}</td>";
                echo "<td>{$shop->email}</td>";
                echo "<td>{$shop->address}</td>";
                echo "<td>{$shop->phoneNum}</td>";
                ?>
            </tbody>
        </table>
        <br>
        <div class='row'>
            <div class='col-sm-1'>
                <form method='POST' action='<?php echo base_url("Administrator/reject"); ?>'>
                    <input type='hidden' name='id' value='<?php echo "{$shop->id}"; ?>'>
                    <button type='submit' class="btn btn-danger inline float-right declineBtn">Reject</button>
                </form>
            </div>
            <div class='col-sm-1'>
                <form method='POST' action='<?php echo base_url("Administrator/accept"); ?>'>
                    <input type='hidden' name='id' value='<?php echo "{$shop->id}"; ?>'>
                    <button type='submit' class="btn btn-info inline float-right  acceptBtn"> Accept</button>
                </form>
                <br>
            </div>
        </div>

    </div>
</div>

