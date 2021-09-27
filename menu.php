<nav class="sidebar nav-pills bg-light p-3">

    <div class="navbar-brand text-center">
        <img src="img/logo.png" hrel="Logo" title="Byte OS" height="70px">
    </div>

    <hr>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link link-dark <?php if($pagina == "inicio"){echo"active";}?>" href="sistema.php">
                <i class="bi-house me-3"></i>Início </a>
        </li>
        <span id="adm">
            <li class="nav-item">
                <a class="nav-link link-dark <?php if($pagina == "consultarEmpresa"){echo"active";}?>" href="consultarEmpresa.php">
                    <i class="bi-person-fill me-3"></i>Empresas </a>
            </li>
        </span>
        <span id="adm">
            <li class="nav-item"><a class="nav-link link-dark <?php if($pagina == "cadastrarEmpresa"){echo"active";}?>" href="novoEmpresa.php">
                    <i class="bi-person-plus-fill me-3"></i>Cadastrar Empresa </a></li>
        </span>
        <li class="nav-item">
            <a class="nav-link link-dark <?php if($pagina == "novoTicket"){echo"active";}?>" href="novoTicket.php">
                <i class="bi-file-plus me-3"></i>Novo Ticket </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark <?php if($pagina == "consultarTicket"){echo"active";}?>" href="#" data-bs-toggle="modal" data-bs-target="#consultarTicket">
                <i class="bi-search me-3"></i>Consultar Ticket </a>
        </li>
        <span id="adm">
            <li class="nav-item">
                <a class="nav-link link-dark <?php if($pagina == "finalizarTicket"){echo"active";}?>" href="#" data-bs-toggle="modal" data-bs-target="#finalizarTicket">
                    <i class="bi-file-check me-3"></i>Finalizar Ticket </a>
            </li>
        </span>
        <li class="nav-item">
            <a class="nav-link link-dark <?php if($pagina == "historico"){echo"active";}?>" href="historicoTicket.php">
                <i class="bi-clipboard-data me-3"></i>Historico de Tickets</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="index.php" onclick="return confirm('Deseja realmente sair?');">
                <i class="bi-door-open me-3"></i>Sair do Sistema</a>
        </li>
    </ul>
</nav>

<!-- Modal Consultar-->
<div class="modal fade" id="consultarTicket" tabindex="-1" aria-labelledby="consultar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="consultar">Consultar Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="exibirConsulta.php" class="row">
                    <label for="idTicket" class="col-sm-4 col-form-label">Número do Ticket:</label>
                    <div class="col-sm-8">
                        <input type="text" name="idTicket" class="form-control" id="consultar" required autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /Modal -->

<!-- Modal Finalizar Ticket-->
<div class="modal fade" id="finalizarTicket" tabindex="-1" aria-labelledby="finalizarTicket" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="finalizarTicket">Finalizar Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="finalizarTicket.php" class="row">
                    <label for="idTicket" class="col-sm-4 col-form-label">Número do Ticket:</label>
                    <div class="col-sm-8">
                        <input type="text" name="idTicket" class="form-control" id="consultar" required autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /Modal -->