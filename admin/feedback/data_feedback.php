<section class="content-header">
    <h1 class="fa fa-caret-square-o-up">
        Feedback |
        <small>
            <a href="?page=admin">Beranda</a> >
            <a href="?page=data-feedback">Data Feedback</a>
        </small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No HP / Email</th>
                            <th>Nilai</th>
                            <th>Feedback</th>
                            <th>tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_feedback order by tanggal asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <?php echo $data['no_hp']; ?>
                            </td>
                            <td>
                                <?php echo $data['nilai']; ?>
                            </td>
                            <td>
                                <?php echo $data['feedback']; ?>
                            </td>
                            <td>
                                <?php echo tanggal ($data['tanggal']); ?>
                            </td>
                            <td>
                                <a href="?page=edit-feedback&kode=<?php echo $data['id_feedback']; ?>" title="Ubah"
                                    class="btn btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        <?php
                  }
                ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>