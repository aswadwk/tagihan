<div class="card col-md-6 p-0 offset-md-3 collapsed-card">
     <div class="card-header bg-primary">
          <h3 class="card-title">Filter Bulan</h3>
          <div class="card-tools">
               <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-plus"></i>
               </button>
          </div>
     </div>
     <div class="card-body pt-2">
          <form action="">
               <div class="bootstrap-timepicker ">
                    <div class="form-group">
                         <label>Pilih Bulan:</label>
                         <input type="text" class="form-control" name="bulan" id="datepicker" placeholder="mm-yyyy" required readonly>
                         <script>
                              var dp = $("#datepicker").datepicker({
                                   format: "yyyymm",
                                   startView: "months",
                                   minViewMode: "months",
                                   autoclose: true
                              });
                         </script>
                    </div>
               </div>
               <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary  px-4">Cari</button>
               </div>
          </form>
     </div>
</div>
<div class="card">
     <div class="card-header">
          <h3 class="card-title">Tagihan berdasarkan TH dan Tanggan POD-Time (Filter bulan)</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body pt-0">
          <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
               <thead>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th>COD</th>
                         <th>PAD</th>
                         <th>CASH</th>
                         <th class="bg-warning text-white">Total</th>
                         <th class="bg-success">Sudah-Setor</th>
                         <th class="bg-primary">Sisa-Tagihan</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    $total = 0;
                    $total_sudah = 0;
                    $total_sisa = 0;
                    foreach ($tagihan as $t) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $t->th; ?></td>
                              <td><?= $t->pod_time; ?></td>
                              <td class="bg-warning"><?= number_format($t->cod); ?></td>
                              <td class="bg-warning"><?= number_format($t->pad); ?></td>
                              <td class="bg-warning"><?= number_format($t->cash); ?></td>
                              <td class="bg-warning"><?= number_format($t->total); ?></td>
                              <td class="bg-success"><?= number_format($t->terkonfirmasi); ?></td>
                              <td class="bg-primary"><?= number_format($t->total - $t->terkonfirmasi); ?></td>
                         </tr>
                    <?php
                         $total += $t->total;
                         $total_sudah += $t->terkonfirmasi;
                         $total_sisa += $t->total - $t->terkonfirmasi;
                    }
                    ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th>COD</th>
                         <th>PAD</th>
                         <th>CASH</th>
                         <th class="bg-warning text-white"><?= number_format($total); ?></th>
                         <th class="bg-success"><?= number_format($total_sudah); ?></th>
                         <th class="bg-primary"><?= number_format($total_sisa); ?></th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>