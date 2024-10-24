<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
  <div class="mb-3">
    <label for="apuesta"  class="form-label">Tipo de apuesta: </label>
   <select class="form-select" id="apuesta" name="apuesta">
    <option value="1">Rojo/Negro</option>
    <option value="2">Par/Impar</option>
    <option value="3">Pasa/Falta</option>
    <option value="4">Pleno</option>
    <option value="5">Docena</option>
    <option value="6">Columna</option>
    <option value="7">Dos docenas</option>
    <option value="8">Dos columnas</option>
    <option value="9">Seisena</option>
    <option value="10">Cuadro</option>
    <option value="11">Transversal</option>
    <option value="12">Caballo</option>

  </select>
  </div>
  <div class="mb-3">
    <label for="valorApuesta" class="form-label">Valor de apuesta:</label>
    <input type="text" class="form-control" name="valorApuesta" id="valorApuesta">
  </div>
  <div class="mb-3">
    <label for="money" class="form-label">Cantidad de dinero :</label>
    <input type="number" class="form-control" name="money" id="money">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>