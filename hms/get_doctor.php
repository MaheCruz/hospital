<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Selecccionar Doctor</option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}
if(!empty($_POST["doctor"])) 
{
    $sql = mysqli_query($con, "select docFees, consultorio from doctors where id='" . $_POST['doctor'] . "'");
    $row = mysqli_fetch_array($sql);
    
    // Creando un array asociativo con los datos
    $result = array(
        'docFees' => htmlentities($row['docFees']),
        'consultorio' => htmlentities($row['consultorio'])
    );
    
    // Devolviendo los datos como JSON
    echo json_encode($result);
}

?>

