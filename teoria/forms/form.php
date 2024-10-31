<form action="index.php" method="get">
    <!-- <label for="asignatura" >Asignaturas: </label>
    <select name='asignatura[]' multiple>
        <option value="ingles" id="ingles">Ingles</option>
        <option value="frances" id="frances">Frances</option>
        <option value="matematicas" id="Mates">Matemáticas</option>
        <option value="ciencias" id="ciencias">Ciencias</option>
    </select> -->
    <br>
    <label for="opcion-1">
        <input type="checkbox" value="Manzana" id="opcion-1" name='frutas[]' >Manzana</input>
    </label>
    <label for="opcion-2">
        <input type="checkbox" value="Platano" id="opcion-2" name='frutas[]' >Platano</input>
    </label>
    <label for="opcion-3">
        <input type="checkbox" value="Naranja" id="opcion-3" name='frutas[]' >Naranja</input>
    </label>
    <label for="opcion-4">
        <input type="checkbox" value="Sandia" id="opcion-4" name='frutas[]' >Sandia</input>
    </label>
    <button type="submit">Enviar</button>
</form>