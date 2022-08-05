<?php require_once '../header.php';?>

                        <h1 class="mt-4">Detalles</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="reportes.php">Reportes</a></li>
                            <li class="breadcrumb-item active">Detalles</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Servicios
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Editar</th>
                                            <th>Planta</th>
                                            <th>SC Creation Date</th>
                                            <th>Shopping Cart No.</th>
                                            <th>SC Description</th>
                                            <th>Product Description</th>
                                            <th>Created By Name</th>
                                            <th>Document Status</th>
                                            <th>PO Number</th>
                                            <th>IR</th>
                                            <th>Vendor DUNS</th>
                                            <th>Vendor Name</th>
                                            <th>Product Type Text</th>
                                            <th>Item Net Value</th>
                                            <th>Document Currency</th>
                                            <th>Cost Center</th>
                                            <th>Tarea</th>
                                            <th>Status</th>
                                            <th>Observaciones</th>                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Editar</th>
                                            <th>Planta</th>
                                            <th>SC Creation Date</th>
                                            <th>Shopping Cart No.</th>
                                            <th>SC Description</th>
                                            <th>Product Description</th>
                                            <th>Created By Name</th>
                                            <th>Document Status</th>
                                            <th>PO Number</th>
                                            <th>IR</th>
                                            <th>Vendor DUNS</th>
                                            <th>Vendor Name</th>
                                            <th>Product Type Text</th>
                                            <th>Item Net Value</th>
                                            <th>Document Currency</th>
                                            <th>Cost Center</th>
                                            <th>Tarea</th>
                                            <th>Status</th>
                                            <th>observaciones</th>       
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRepore" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>                         
                                    </tbody>
                                </table>
                            </div>
                        </div>


<?php require_once '../footer.php';?>


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar reporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" >
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Planta:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">SC Creation Date:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Shopping Cart No.:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">SC Description:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Description:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Created By Name:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Document Status:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">PO Number:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">IR:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Vendor DUNS:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Vendor Name:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Tipe Text:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Item Net Value:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Document Currency:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cost Center:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tarea:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Status:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Observaciones:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Actualizar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->