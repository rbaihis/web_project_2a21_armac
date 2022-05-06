<?php
  require_once '../../config.php'; 

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=lesCommandes.xls");

?>
       
        <table class="table">
             
                        <tr>
                        <th> itemName</th>
                        <th> price</th>
                        <th>card holder</th>
                        <th>MM</th>
                        <th>YY</th>
                        <th>CARD number</th>
                        <th>CVC</th>
                        </tr>
                
                        <?php
                        $resultJ = $con->query("SELECT `cardholder`, `MM`,`YY`,`cardnumber`,`cvc` FROM clients");
                        while ($rowJ = $resultJ->fetch(PDO::FETCH_ASSOC)): ?>
                        
                        
                        
                        <?php
                        $result = $con->query("SELECT `itemName`,`price` FROM commande");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                        <td><?php echo $row['itemName']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $rowJ['cardholder']; ?></td>
                        <td><?php echo $rowJ['MM']; ?></td>
                        <td><?php echo $rowJ['YY']; ?></td>
                        <td><?php echo $rowJ['cardnumber']; ?></td>
                        <td><?php echo $rowJ['cvc']; ?></td>
                     
                         
                        </tr>
                         <?php endwhile; ?>
                         <?php endwhile; ?>
                    </tbody>
                </table>
                <br>
        </div>
        <br>
    <a  href="table-marketing.php"><button type="button" class="btn btn-info px-5">export</button></a>
       
    
    
    <br>





   