<!--
WebApp Code Name : kcalmeter
Date: 14-11-2019
Author : Fabrizio Del Tufo
Module : export.php
Last Upd : 10 June 2020
-->

<!-- FORM EXPORT -->

<div class="container-width text-center">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row d-flex justify-content-center">

      <div class="form-group text-center">
        <h3>Export the food list to your download folder</h3>
        <input id="BTN_export" type="submit" name="export" value="Export">
      </div>

    </div>

</form>

</div>

<?php export (); ?>
