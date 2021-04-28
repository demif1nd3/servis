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
		<div class="fon1"><h1> </h1></div>
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
                     
            <select name="vremya" size="2" multiple>
              <option selected value="s1">09:00</option>
              <option value="s2">09:30</option>
              <option value="s3">10:00</option>
              <option value="s4">10:30</option>
              <option value="s5">11:00</option>
              <option value="s6">11:30</option>
              <option value="s7">12:00</option>
              <option value="s8">12:30</option>
              <option value="s9">13:00</option>
              <option value="s10">13:30</option>
              <option value="s11">14:30</option>
              <option value="s12">14:30</option>
              <option value="s13">15:30</option>
              <option value="s14">15:30</option>
              <option value="s15">16:30</option>
              <option value="s16">16:30</option>
              <option value="s17">17:30</option>
              <option value="s18">17:30</option>
              <option value="s19">18:30</option>
              <option value="s20">18:30</option>
              <option value="s21">19:30</option>
              <option value="s22">19:30</option>
            </select><br><br>
            
            						<input name="submit" type="submit" class="btn btn-primary" value="Войти">
					
                      </form>
                    </div>        
                  </div> 
                    </div>
                </div>
                </div></div>
                </div>       
                </main>
	</section>
<?php include 'temp/footer.php'; ?>