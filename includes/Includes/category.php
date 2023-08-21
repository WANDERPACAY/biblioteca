<div class="content-categories">
  <div class="label-wrapper">
    <input class="nav-item" name="nav" type="radio" id="opt-1" <?php if ($_SERVER['PHP_SELF'] === '/libros.php') echo 'checked'; ?> onclick="redirectToPage('libros.php')">
    <label class="category" for="opt-1">Libros</label>
  </div>
  <div class="label-wrapper">
    <input class="nav-item" name="nav" type="radio" id="opt-2" <?php if ($_SERVER['PHP_SELF'] === '/prestamos.php') echo 'checked'; ?> onclick="redirectToPage('prestamos.php')">
    <label class="category" for="opt-2">Préstamos</label>
  </div>
  <div class="label-wrapper">
    <input class="nav-item" name="nav" type="radio" id="opt-3" <?php if ($_SERVER['PHP_SELF'] === '/clientes.php') echo 'checked'; ?> onclick="redirectToPage('clientes.php')">
    <label class="category" for="opt-3">Clientes</label>
  </div>
</div>

<script>
function redirectToPage(pageURL) {
  window.location.href = pageURL;
}
</script>
