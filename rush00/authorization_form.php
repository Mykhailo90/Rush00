
<?php
  require_once 'header.php';
 ?>

 <div class="container_page main_part">
   <table>
     <tr>
       <td>
         <div class="form_registr">
           <form class="registration" action="registr_form.php" method="post">

             <h2>Для <strong id="new">НОВЫХ</strong> пользователей:</h2>
             <table class="reg_f">
               <tr>
                 <td><p>Имя пользователя: </p></td>
                 <td class="fil"><input type="text" name="login" maxlength="29"/></td>
               </tr>
               <tr>
                 <td><p>Электронный адрес: </p></td>
                 <td><input type="email" name="email" maxlength="40"/></td>
               </tr>
               <tr>
                 <td><p>Номер телефона: </p></td>
                 <td><input type="number" name="phone_number" maxlength="14"/></td>
               </tr>
               <tr>
                 <td><p>Пароль: </p></td>
                 <td><input type="password" name="pass1" maxlength="14" /></td>
               </tr>
               <tr>
                 <td><p>Повторите пароль: </p></td>
                 <td><input type="password" name="pass2" maxlength="14" /></td>
               </tr>
             </table>
             <p id="rem">Запомнить меня: <input type="checkbox" name="remember" /></p>
             <p><input id="sub1" type="submit" value="Регистрация"/></p>
           </form>
         </div>
       </td>

       <td id="a1">
         <div class="form_auth">
           <form class="authorization" action="login.php" method="post">
             <h2>Для <strong id="old">ЗАРЕГЕСТРИРОВАННЫХ</strong> пользователей:</h2>
             <p>Имя пользователя: <input type="text" name="login" maxlength="29" /></p>
             <p>Пароль: <input type="password" name="password" maxlength="14" /></p>
             <p><input type="submit" name="submit" id="sub2" value="Вход" /></p>
           </form>
         </div>
       </td>
     </tr>
   </table>
   <div style="margin-top: 40px;">
      <img src="http://www.pit4sport.com.ua/wp-content/uploads/2016/04/0adsEMTvJls-2.jpg" alt="pitashka">
   </div>

 </div>
<?php
  require_once 'footer.php';
 ?>
