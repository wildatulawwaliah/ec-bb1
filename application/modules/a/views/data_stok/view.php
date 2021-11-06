<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
      </span>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="table_barang" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Stok</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.$d->kode_barang.'</td>';
              echo '<td class="center">'.$d->nama_barang.'</td>';
              echo '<td class="center">'.$d->kategori.'</td>';
              echo '<td class="center">'.$d->satuan.'</td>';
              echo '<td class="center">'.$d->stok.'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>
