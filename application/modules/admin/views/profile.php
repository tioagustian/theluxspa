<form class="md-float-material form-material" id="form" url="<?= base_url('user/profile');?>">
	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h5>Informasi Pegawai</h5>
				</div>
				<div class="card-block">
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Nama Lengkap</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="nama_lengkap" class="form-control" readonly="readonly" value="<?= $user->nama_lengkap; ?>" />
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">NIP</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="nip" class="form-control" readonly="readonly" value="<?= $user->nip; ?>" />
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">NIK</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="nik" class="form-control" readonly="readonly" value="<?= $user->nik; ?>" />
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">NPWP</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="npwp" class="form-control" readonly="readonly" value="<?= $user->npwp; ?>" />
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Jenis Kelamin</label>
						</div>
						<div class="col-md-8">
							<select name="jenis_kelamin" class="form-control form-control-default fill" disabled="disabled" required="required">
                                <option value="0">Jenis Kelamin</option>
                                <option value="l" <?= ($user->jenis_kelamin == 'l') ? 'selected="selected"' : ""; ?>>Laki-laki</option>
                                <option value="p" <?= ($user->jenis_kelamin == 'p') ? 'selected="selected"' : ""; ?>>Perempuan</option>
                            </select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="row form-group form-primary">
								<div class="col-md-4">
									<label class="float-label">Tanggal Lahir</label>
								</div>
								<div class="col-md-8">
									<input type="date" name="tanggal_lahir" class="form-control" readonly="readonly" value="<?= $user->tanggal_lahir; ?>" />
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row form-group form-primary">
								<div class="col-md-4">
									<label class="float-label">Tempat Lahir</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="tempat_lahir" class="form-control" readonly="readonly" value="<?= $user->tempat_lahir; ?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Alamat</label>
						</div>
						<div class="col-md-8">
							<textarea name="alamat" class="form-control" readonly="readonly" style="min-height: 55px;"><?= $user->alamat; ?></textarea>
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Agama</label>
						</div>
						<div class="col-md-8">
							<select name="agama" class="form-control form-control-default fill" disabled="disabled" required="required">
                                <option value="0">Agama</option>
                                <option value="Islam" <?= ($user->agama == 'Islam') ? 'selected="selected"' : ""; ?>>Islam</option>
                                <option value="Kristen Protestan" <?= ($user->agama == 'Kristen Protestan') ? 'selected="selected"' : ""; ?>>Kristen Protestan</option>
                                <option value="Kristen Katholik" <?= ($user->agama == 'Kristen Katholik') ? 'selected="selected"' : ""; ?>>Kristen Katholik</option>
                                <option value="Hindu" <?= ($user->agama == 'Hindu') ? 'selected="selected"' : ""; ?>>Hindu</option>
                                <option value="Budha" <?= ($user->agama == 'Budha') ? 'selected="selected"' : ""; ?>>Budha</option>
                            </select>
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Status Perkawinan</label>
						</div>
						<div class="col-md-8">
							<select name="status_perkawinan" class="form-control form-control-default fill" disabled="disabled" required="required">
                                <option value="0">Status Perkawinan</option>
                                <option value="l" <?= ($user->status_perkawinan == 'l') ? 'selected="selected"' : ""; ?>>Lajang</option>
                                <option value="k" <?= ($user->status_perkawinan == 'k') ? 'selected="selected"' : ""; ?>>Kawin</option>
                                <option value="c" <?= ($user->status_perkawinan == 'c') ? 'selected="selected"' : ""; ?>>Cerai</option>
                            </select>
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Nomor Telepon</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="telepon" class="form-control" readonly="readonly" value="<?= $user->telepon; ?>" />
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Username</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="username" class="form-control" readonly="readonly" value="<?= $user->username; ?>" />
						</div>
					</div>
					<div class="row form-group form-primary">
						<div class="col-md-4">
							<label class="float-label">Email</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="email" class="form-control" readonly="readonly" value="<?= $user->email; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="overflow: hidden;">
				<div class="text-center p-t-10 p-b-10 m-b-10" style="background-color: #3f3f3f">
					<img src="<?= base_url('files/images/'.$user->foto.'?resize_crop=150x150&quality=100');?>" class="img-radius" alt="<?= $user->username.'.jpg';?>">
				</div>
				<ul>
					<li class="p-t-10 p-b-10 p-r-20 p-l-20 f-16">
						<a href="#" onclick="new Profile().openForm(this)">
                            <i class="feather icon-edit"></i> Edit profil
                        </a>
                    </li>
                    <li class="p-t-10 p-b-10 p-r-20 p-l-20 f-16">
                    	<a href="#">
                    		<i class="feather icon-lock"></i> Ubah password
                    	</a>
                    </li>
                    <li class="p-t-10 p-b-10 p-r-20 p-l-20 f-16">
                    	<a href="<?= base_url('logout');?>">
                    		<i class="feather icon-log-out"></i> Keluar
                    	</a>
                    </li>
				</ul>
			</div>
		</div>
	</div>
</form>