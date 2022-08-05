<?php require_once '../header.php';?>

                        <h1 class="mt-4">Reporte de servicios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Reportes</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Reporte Excel</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Generar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Reporte PDF</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Generar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Enviar Reporte</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Enviar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Servicios
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Ver</th>
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
                                            <th>Ver</th>
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
                                              <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
                                            <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
                                            <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
                                            <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
                                            <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
                                            <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
                                            <a type="button" href="detalles_reportes.php" class="btn btn-primary">Ver</a></th>
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
