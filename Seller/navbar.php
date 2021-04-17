<?php
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="./"><img src="./assets/img/avatars/logo.png" style="margin:inherit" alt="" width="30" height="24"><span>Jaipurplaza</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form action="./search.php" method="post" class="d-flex col-sm-8" style="margin: auto; ">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success text-white" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>';
?>