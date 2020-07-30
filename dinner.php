<!--
WebApp Code Name : kcalmeter
Date: 14-11-2019
Author : Fabrizio Del Tufo
Module : dinner.php
Last Upd : 10 June 2020
-->

<!-- crea connessioneDB + path -->
<?php require_once 'config.php'; ?>

<!-- carica header image + menu -->
<?php include FRONT_END . DS . 'header.php'; ?>

<!-- carica le funzioni ma non le esegue fino a chiamata -->
<?php include FRONT_END . DS . 'functions.php'; ?>

<!-- LOGIN / SIGNUP CHECK -->
<?php check_iduser(); ?>
<?php astro(); ?>


<?php //session_start(); ?>
<?php //echo " Astro " . $_SESSION['username'] . " - ID : " . $_SESSION['iduser']  ;?>






<!-- richiamo la cancella_rec x verificare se e' stato premuto il bottone CANCELLA
se si , cancella il record  -->



      <?php cancella_rec("pasti"); ?>


      <!-- =========================================== HEADER - MAIN MENU ============================================== -->

               <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
                 <ul class="navbar-nav">

                   <li class="nav-item">
                     <a class="nav-link" href="home.php">Home</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="food.php">Food List</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="breakfast.php">Breakfast</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="snack-am.php">SnackAM</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="lunch.php">Lunch</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="snack-pm.php">SnackPM</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link active" href="dinner.php">Dinner</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="tot-day.php">Tot KCal Day</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="backup.php">Backup</a>
                   </li>

                 </ul>
               </nav>



<!-- PAGE CONTENT -  CENA -->

      <div>
          <h2 class="text-center tit">YOUR DINNER</h2>
          <p class="text-center">Select from the food list (dropdown menu) the items of your meal and hit on insert.</p>
      </div>


      <!--   DROPDOWN LISTA ALIMENTI -->

      <div class="text-center">
          <td>
            <div class="dropdown">
              <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Food List</button>
              <div class="dropdown-menu">


              <table class="text-center table table-striped table-hover table-condensed table-bordered table-sm">


                <?php lista_alimenti('DD', 'dinner.php') ; ?> <!-- DD = mostra lista alimento nel DROPDOWN -->



              </div>
            </div>
          </td>

        </div>
                <hr>
                <p><b>* Required Fields.</b></p>



                      <!-- FORM INSERISCI ALIMENTI DEL PASTO -->

                      <div class="container-fluid text-center">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

                        <div class="row d-flex justify-content-center">



                                      <!-- COLONNA -->
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                          <label for="gruppo">* FOOD GROUP</label>
                                          <input  required value="<?php echo($_GET['gruppo']);?>" type="text" name="gruppo" class="form-control">
                                        </div>
                                      </div>


                                      <!-- COLONNA -->
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                          <label for="alimento">* FOOD ITEM</label>
                                          <input required value="<?php echo($_GET['alimento']);?>" type="text" name="alimento" class="form-control">
                                        </div>
                                      </div>




                                      <!-- COLONNA -->
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                          <label for="calorie">* KCALORIES (100 gr)</label>
                                          <input required value="<?php echo($_GET['calorie']);?>" type="text" name="calorie" class="form-control">
                                        </div>
                                      </div>



                                      <!-- COLONNA -->
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                          <label for="dose_porzione_gr">* PORTION (gr)</label>
                                          <input required value="<?php echo($_GET['dose_porzione_gr']);?>" type="text" name="dose_porzione_gr" class="form-control">
                                        </div>
                                      </div>



                                      <!-- COLONNA -->
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                          <label for="kcal_dose_porzione">KCAL x PORTION</label>
                                          <input READONLY value="<?php echo($_GET['kcal_dose_porzione']);?>" type="text" name="kcal_dose_porzione" class="bg-secondary text-light form-control">
                                        </div>
                                      </div>



                                      <!-- COLONNA -->
                                      <div class="col-sm-10">
                                        <div class="form-group">
                                          <label for="note">NOTE</label>
                                          <input value="<?php echo($_GET['note']);?>" type="text" name="note" class="form-control">
                                        </div>
                                      </div>

                                      <!-- COLONNA -->
                                      <div class="col-sm-3">
                                        <div class="form-group">
                                          <label for="note"></label>
                                          <input HIDDEN READONLY value="<?php echo($_GET['modifica_id']);?>" type="text" name="id_rec" class="form-control">
                                        </div>
                                      </div>




                          </div>

                          <div class="row d-flex justify-content-center">


                          <!-- BOTTONE AGGIUNGI / RESET -->
                          <div class="form-group text-center">
                              <input type="submit" name="aggiungi" value="Insert / Update" class="btn btn-success btn-lg">
                            <!--  <input type="reset" name="reset" value="[Reset]" class="btn btn-danger btn-lg"> -->
                          </div>

                          </div>


                      </form>

                      </div>

          <?php aggiungiAlimentoPasto("CEN"); ?>


          <hr>


          <!-- lista alimenti pasti con FORM per intercettare bottone CANCELLA (id_rec) -->
          <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          <div class="table-responsive-sm">
                  <table class="text-center table table-striped table-hover table-condensed table-bordered table-sm">

                  <!-- FUNZIONE lista_ali_pasti() -->
                    <?php lista_ali_pasti(CEN); ?>

                  <!-- TOTALE CALORIE PASTO  -->
                  <tfoot class="bg-warning">
                      <tr>
                        <th colspan="5">MEAL TOTAL Kcal </th>
                        <?php echo "<th>$sum_calorie</th>" ?>
                      </tr>
                  </tfoot>

                  </table>

                  <!-- Numero righe / alimenti in tabella -->
                  <div class="text-center bg-white text-dark">
                    Date : <?php echo date('d-n-Y'); ?> | <?php echo "Listed Items : " . $row_count; ?>
                  </div>
                </div>
              </form>




                <!-- SALVA CALORIE PASTO nella TOTALE GIORNATA-->
                <?php aggiornaTotali("CEN"); ?>




                    <!-- FOOTER -->
                    <?php include FRONT_END . '/footer.php'; ?>
