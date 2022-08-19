<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./products">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ $_SERVER['REQUEST_URI'] == "/products" ? "active" : "" }}" href="{{ Request::root() . "/products" }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $_SERVER['REQUEST_URI'] == "/users" ? "active" : "" }}" href="./users">Users</a>
        </li>
      </ul>
    </div>
  </div>
</nav>