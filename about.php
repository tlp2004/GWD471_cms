
<?php $page_id = 'about';?>
<?php require_once('../../config.php'); ?>
<?php
//interact with database
$sql = 'SELECT * FROM widgets';

//send command to MySQL
$myData = $db->query($sql)
OR exit('unable to select data from table');

//close db connection
$db->close();
?>

<?php require_once('includes/top.php'); ?>
<?php require_once('includes/header.php'); ?>
   <section>
       <h2>About</h2>
       <?php
         echo '<div id="products">';
          while($row = $myData->fetch_assoc())
          {
            echo '<div class="product">';
            echo '<img src="" alt="" />';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>$' . $row['price'] . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '</div>';
          }
          echo '<br class="clear">';
          echo '</div>';
       ?>
   </section>
  <?php require_once('includes/footer.php');?>
</body>
</html>