<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action= {{route('product.form.submit')}} method="POST">
  @csrf
  <label for="name"> name:</label><br>
  <input type="text" id="name" name="name" ><br>
  <label for="city">city:</label><br>
  <input type="text" id="city" name="city" ><br><br>
  <input type="submit" value="Submit">
</form> 



</body>
</html>