<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Master Rumah Duka
                        </div>
						<a href="?page=rumah_duka&aksi=tambah" class="btn btn-primary" style="margin-left: 13px; margin-top: 8px;"><i 
									class="fa fa-plus"></i>Tambah Data</a>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
										    <th>No</th>
                                            <th>Nama Kota  </th>
											<th>Nama Rumah Duka</th>
											<th>Alamat Rumah Duka</th>
											<th>Telp Rumah Duka</th>
											<th>WA Rumah Duka</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									    $no = 1;
										$sql = $koneksi->query("select * from tb_mrumah_duka INNER JOIN tb_mkota on tb_mrumah_duka.id_kota = tb_mkota.id_kota");
										while ($data = $sql->fetch_assoc()) {
                                        
									?>
									    <tr>
										    <td><?php echo $no++;?></td>
									        <td><?php echo $data['nama_kota'];?></td>
											<td><?php echo $data['nama_rumah_duka'];?></td>
											<td><?php echo $data['alamat_rumah_duka'];?></td>
											<td><?php echo $data['telp_rumah_duka'];?></td>
											<td><?php echo $data['wa_rumah_duka'];?></td>

									    </tr>
										<?php } ?>
									<tbody>
									</table>
									</div>

									
									
									

						   
						   </div>
					    </div>
				      </div>
</div>