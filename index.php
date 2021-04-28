<?php
session_start();
$id_user=$_SESSION['id_user'];
include 'temp/headk.php'; 
include 'database.php'; 
if(!empty($_POST['id_stol']))
{
  $id_stol=$_POST['id_stol']; 
  $kolvo_mest=$_POST['kolvo_mest'];
  $statuss_arenda=$_POST['statuss_arenda'];
}

if(!empty($_POST['fio'])) 
{
  $id_menu=$_POST['id_menu'];
  $kolvo=$_POST['kolvo'];
  $n_scheta=$_POST['n_scheta'];
  $d_zakaz=$_POST['d_zakaz'];
  $summa=$_POST['summa'];
  $sql = ("insert into zakaz (id_stol, id_menu, kolvo, n_scheta, d_zakaz, summa)
  values ('$id_stol', '$id_menu', '$kolvo', '$n_scheta', '$d_zakaz', '$summa')"); 
  $sql1 = ("UPDATE stol SET statuss_arenda ='обслуживается' WHERE `id_stol`='".$id_stol."'");
  $result=$conn->query($sql); 
  $result=$conn->query($sql1);
}

if(!empty($_POST['fio']))
{
  $fio = $_POST['fio'];   
  $tel = $_POST['tel']; 
  $email = $_POST['email']; 
  $prichina = $_POST['prichina'];
  $sql = ("insert into klient (fio, tel, email, prichina) values ('$fio','$tel', '$email', '$prichina')"); 
  $result=$conn->query($sql); 
}
?>
<main>
<section class="fon">
<div class="fon1"><h1></h1><button type="button" class="btn btn-danger btnuvol" data-toggle="modal" data-target="#myModal">ПОДАТЬ ЗАЯВКУ</button></div>
<h1 align="center">"SMOKIN SICK STYLE"<P>ЛУЧШИЙ ВЫБОР СРЕДИ АВТОСЕРВИСОВ НА ЮГЕ РОССИИ</h1><br>
	    <div class="container">
            <div class=".align-content-center"> 
  </div>
</div>
  </section>
   </main>
<div class="container">
<div class="row">
           <form  method="POST"  role="form" class="form-inline">
           <img align="left" src="img/pp4.jpg" width="300%" height="450" class="img1">
           
           <h1 align="center">Отзыв постоянного клиента</h1><br>
           </div></div>
           <p><img src="img/pp07.jpg" alt="Иллюстрация" 
   width="%50" height="100" class="rightpic">
  Очень хороший серви!<p>
  Быстро и надежно выполняют работу, <p>цены не кусаются, почти всегда доступны, <p>на телефон отвечают
<p> 
                
          </form>
          </div></div></div>
          <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <h4 class="modal-title">Уволить официанта</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">	
          <div class="form-group mb-2  col-12">
          <form  method="post"  role="form" class="form-inline">
         <?php
          echo '<br><input type="hidden" name="id_user">'; 
         ?>
          
          <input type="text" class="form-control" name="fio" placeholder="ФИО" requered>
          <input type="text" class="form-control" name="tel" placeholder="Телефон" requered>
          <input type="text" class="form-control" name="email" placeholder="email" requered>
          <input type="text" class="form-control" name="prichina" placeholder="Причина" requered>       
          &nbsp; &nbsp; &nbsp; &nbsp; 
				</div>
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Закрыть</button>
      <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
      </form>
      </div>
    </div>
  </div>
</div>           
<?php include 'temp/footer.php'; ?>
