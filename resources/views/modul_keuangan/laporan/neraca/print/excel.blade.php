<?php 
	$tanggal_1 = switchBulan(explode('/', $_GET['d1'])[0]).' '.explode('/', $_GET['d1'])[1];
?>

<table width="100%">
	<thead>
		<tr>
			<td></td>
			<td style="font-weight: 800">Laporan Neraca</td>
		</tr>

		<tr>
			<td></td>
			<td>{{ jurnal()->companyName }}</td>
		</tr>

		<tr>
			<td></td>
			<td style="border-bottom: 1px solid #ccc; padding-bottom: 20px;"><small>Bulan {{ $tanggal_1 }}</small></td>
		</tr>
	</thead>
</table>

<br>
	
	@if($_GET['tampilan'] == 'tabular')
		<table width="100%" style="font-size: 9pt;">
			<tbody>
				<tr>
					<td></td>
					<td width="50%" style="padding: 5px; text-align: center; border: 1px solid #ccc;">Aktiva</td>
					<td width="50%" style="padding: 5px; text-align: center; border: 1px solid #ccc;">Pasiva</td>
				</tr>

				<tr>
					<td></td>
					<td style="vertical-align: top;">
						<table width="100%">
							<?php $aktiva = $pasiva = 0 ?>
							@foreach($data['data'] as $key => $header)
								@if($header->gs_kelompok == 'aktiva')
									<?php $totHead = 0 ?>
									<tr>
										<td colspan="2" style="border: 1px solid #ccc; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; background-color: #0099cc; color: #ffffff">{{ $header->gs_nama }}</td>
									</tr>
		 
									@foreach($header->group as $key => $group)
										<tr>
											<td style="border: 1px solid #ccc; padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #555555; color: #ffffff">{{ $group->ag_nama }}</td>

											<?php 
												$totGR = 0;

												foreach($group->akun as $key => $akun){
													foreach($akun->fromKelompok as $key => $detail){
														$totGR += $detail->saldo_akhir;
													}
												}

												$totHead += $totGR;
											?>

											<td style="font-weight: 800; border: 1px solid #cccccc; text-align: right; padding: 5px;">{{ $totGR }}</td>
										</tr>

										@foreach($group->akun as $key => $akun)
											
											<?php 
												$nama = "";

												foreach($data['kelompok'] as $r => $kelompok){
													if($akun->ak_kelompok == $kelompok->ak_kelompok){
														$nama = $kelompok->ak_nama;
														break;
													}
												}
											?>

											<tr>
												<td style="border: 1px solid #ccc; padding-left: 40px; padding-top: 5px; padding-bottom: 5px;">{{ $nama }}</td>

												<?php 
													$tot = 0;

													foreach($akun->fromKelompok as $key => $detail){
														$tot += $detail->saldo_akhir;
													}
												?>

												<td style="font-weight: normal; border: 1px solid #cccccc; text-align: right; padding: 5px;">{{ $tot }}</td>
												</tr>

										@endforeach

									@endforeach

									<tr>
										<td style="border: 1px solid #ccc; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; background-color: #eeeeee;">Total {{ $header->gs_nama }}</td>

										<td style="font-weight: 800; border: 1px solid #cccccc; text-align: right; padding: 5px; background-color: #eeeeee;">{{ $totHead }}</td>
										
									</tr>

									<tr>
										<td colspan="2">&nbsp;</td>
									</tr>

									<?php $aktiva += $totHead ?>
								@endif
							@endforeach
						</table>
					</td>
				<tr>

				<tr>
					<td></td>
					<td style="vertical-align: top;">
						<table width="100%">
							@foreach($data['data'] as $key => $header)
								@if($header->gs_kelompok == 'pasiva')
									<?php $totHead = 0 ?>
									<tr>
										<td colspan="2" style="border: 1px solid #ccc; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; background-color: #0099cc; color: #ffffff">{{ $header->gs_nama }}</td>
									</tr>
		 
									@foreach($header->group as $key => $group)
										<tr>
											<td style="border: 1px solid #ccc; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;background-color: #555555; color: #ffffff">{{ $group->ag_nama }}</td>

											<?php 
												$totGR = 0;

												foreach($group->akun as $key => $akun){
													foreach($akun->fromKelompok as $key => $detail){
														$totGR += $detail->saldo_akhir;
													}
												}

												$totHead += $totGR;
											?>

											<td style="font-weight: 800; border: 1px solid #cccccc; text-align: right; padding: 5px;">{{ $totGR }}</td>
										</tr>

										@foreach($group->akun as $key => $akun)
											
											<?php 
												$nama = "";

												foreach($data['kelompok'] as $r => $kelompok){
													if($akun->ak_kelompok == $kelompok->ak_kelompok){
														$nama = $kelompok->ak_nama;
														break;
													}
												}
											?>

											<tr>
												<td style="border: 1px solid #ccc; padding-left: 40px; padding-top: 5px; padding-bottom: 5px;">{{ $nama }}</td>

												<?php 
													$tot = 0;

													foreach($akun->fromKelompok as $key => $detail){
														$tot += $detail->saldo_akhir;
													}
												?>

												<td style="font-weight: normal; border: 1px solid #cccccc; text-align: right; padding: 5px;">{{ $tot }}</td>
												</tr>

										@endforeach

									@endforeach

									<tr>
										<td style="border: 1px solid #ccc; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; background-color: #eeeeee;">Total {{ $header->gs_nama }}</td>

										<td style="font-weight: 800; border: 1px solid #cccccc; text-align: right; padding: 5px; background-color: #eeeeee;">{{ $totHead }}</td>
									
									</tr>

									<tr>
										<td colspan="2">&nbsp;</td>
									</tr>

									<?php $pasiva += $totHead ?>
								@endif
							@endforeach
						</table>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<table width="100%">
							<tr>
								<td style="border: 1px solid #ccc; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;">Total Aktiva</td>

								<td style="font-weight: 800; border: 1px solid #cccccc; text-align: right; padding: 5px;">{{ $aktiva }}</td>
							</tr>
						</table>
					</td>
				<tr>

				<tr>
					<td></td>
					<td>
						<table width="100%">
							<tr>
								<td style="border: 1px solid #ccc; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;">Total Aktiva</td>

								<td style="font-weight: 800; border: 1px solid #cccccc; text-align: right; padding: 5px;">{{ $pasiva }}</td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	@endif