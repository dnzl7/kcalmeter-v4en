<!--
WebApp Code Name : kcalmeter
Date: 14-11-2019
Author : Fabrizio Del Tufo
Module : import.php
Last Upd : 10 June 2020
-->

<!-- FORM IMPORT -->
<?php
  if (isset($_SESSION['iduser'])){
    $id_user = $_SESSION['iduser'] ;
  }
?>

<div class="container-width text-center">
  <h3>Import the food list from your folder</h3>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data">Select the file to upload :
    <input type="file" name="select">
    <input type="submit" name="upload" value="Upload File">
  </form>
</div>
<br>

<?php import (); ?>
