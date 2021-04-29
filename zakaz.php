<?php
include 'temp/headk.php'; 
include 'database.php'; 

if(!empty($_POST['fio']))
{
  $fio = $_POST['fio'];   
  $tel = $_POST['tel']; 
  $email = $_POST['email']; 
  $prichina = $_POST['prichina'];
  $d_zaezda = $_POST['d_zaezda'];
  $vremya = $_POST['vremya'];
  $id_stancia = $_POST['id_stancia'];
  $id_avto = $_POST['id_avto'];
  $sql = ("insert into klient (fio, tel, email, prichina, d_zaezda, vremya, id_stancia, id_avto) values ('$fio','$tel', '$email', '$prichina', '$d_zaezda', '$vremya', '$id_stancia', '$id_avto')"); 
  $result=$conn->query($sql); 
}
?>
		<div class="fon1"><h1> SMOKIN SICK STYLE</h1></div>
    <section>
           <main class="main">
               <div class="container" style="width: 400px; height: 200px">
                  <div class="row">
                      <div class="col" >
                    <div class="card-deck">
                  <div class="card">
                    <div class="card-footer" style="background-color:#f2f1f0">
                      <h2 style="color: #080808; font-size: 20px;"></h2>
                    </div>
                    <div class="card-body" >
 <form method="post" >
 <?php echo '<div>' .$sms.'</div>' ?>

  <input type="text" class="form-control" name="fio" placeholder="ФИО" requered><br>
          <input type="text" class="form-control" name="tel" placeholder="Телефон" requered><br>
          <input type="text" class="form-control" name="email" placeholder="email" requered><br>
          <input type="text" class="form-control" name="prichina" placeholder="Причина" requered><br>

          <?php $sql = "SELECT * FROM stancia ";
                /*Выпадающий список*/
                $result_select =$conn->query($sql);
                echo "<select name = 'id_stancia'>";

                while($object = mysqli_fetch_object($result_select)){
                echo "<option value = '$object->id_stancia' > $object->nazvanie </option>";
                }
                echo "</select>";
                ?><br><br>
                <?php $sql = "SELECT * FROM avto ";
                /*Выпадающий список*/
                $result_select =$conn->query($sql);
                echo "<select name = 'id_avto'>";

                while($object = mysqli_fetch_object($result_select)){
                echo "<option value = '$object->id_avto' > $object->marka </option>";
                }
                echo "</select>";
                ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <br><br>

          <input type="date" name="d_zaezda">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                     
            <select name="vremya">
              <option selected value="09:00">09:00</option>
              <option value="09:30">09:30</option>
              <option value="10:00">10:00</option>
              <option value="10:30">10:30</option>
              <option value="11:00">11:00</option>
              <option value="11:30">11:30</option>
              <option value="12:00">12:00</option>
              <option value="12:30">12:30</option>
              <option value="13:00">13:00</option>
              <option value="13:30">13:30</option>
              <option value="14:30">14:00</option>
              <option value="14:30">14:30</option>
              <option value="15:00">15:00</option>
              <option value="15:30">15:30</option>
              <option value="16:00">16:00</option>
              <option value="16:30">16:30</option>
              <option value="17:00">17:00</option>
              <option value="17:30">17:30</option>
              <option value="18:00">18:00</option>
              <option value="18:30">18:30</option>
              <option value="19:00">19:00</option>
              <option value="19:30">19:30</option>
              <option value="20:00">20:00</option>
            </select><br><br>
            
            						<input name="submit" type="submit" class="btn btn-primary" value="Войти">
                        <br>
         </div>  </div></div>  </div>
          </form>
          </div></div>   
                </section>
<?php include 'temp/footer.php'; ?>