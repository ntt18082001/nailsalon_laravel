<style>
	.table, .th, .td {
		border: 1px solid;
	}

	.table {
		width: 100%;
		border-collapse: collapse;
	}
</style>

<div style="width: 100%; height: 50px; background-color: #000000;"></div>
<table width="650" cellspacing="0" cellpadding="0" style="table-layout:fixed;margin:0 auto;">
	<tbody>
		<tr>
			<td height="1" style="line-height:0px;font-size:0px"></td>
		</tr>
		<tr>
			<td valign="top">
				<table width="100%">
					<tbody>
						<tr>
							<td width="32">&nbsp;</td>
							<td valign="top">
								<table width="100%">
									<tbody>
										<tr>
											<td height="45">&nbsp;</td>
										</tr>
										<tr>
											<td valign="top"
												style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;line-height:26px;color:#363636">
												<div>
													Welcome
													<span>
														<b>
															{{$details['cus_name']}},
														</b>
													</span>
													<span style="color:green;">
														{{$details['title']}}
													</span>
												</div>
											</td>
										</tr>
										<tr>
											<td height="11" style="font-size:1px;line-height:1px">&nbsp;</td>
										</tr>
										<tr>
											<td valign="top"
												style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;line-height:26px;color:#363636">
												<div style="margin-top:10px;">
													<h4 style="text-align:center;">Infomation</h4>
													<hr />
													<div style="margin-top:10px; display:flex; width: 100%;">
														<div style="margin-right: 20px; width: 50%;">
															<i style="text-align:center;">Customer information</i>
															<hr />
															<h5>
																Fullname: <span> {{$details['cus_name']}}</span>
															</h5>
															<h5>
																Email: <span> {{$details['cus_email']}}</span>
															</h5>
															<h5>
																Phone number: {{$details['cus_phone']}}</span>
															</h5>
														</div>
														<div style="width: 50%;">
															<i style="text-align:center;">Appoinment information</i>
															<hr />
															<h5>
																Time: <span> {{$details['time']}} </span>
															</h5>
															<h5>
																{{$details['body']}}
															</h5>
														</div>
													</div>
												</div>
												<hr />
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<table width="100%" cellspacing="0" cellpadding="0">
				</table>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<table width="100%" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td width="32">&nbsp;</td>
							<td>
								<table width="100%" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td height="30">&nbsp;</td>
										</tr>
										<tr>
											<td valign="top"
												style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;line-height:28px;color:#363636">
												<div>
													Have a nice day!
												</div>
											</td>
										</tr>
										<tr>
											<td height="20">&nbsp;</td>
										</tr>
										<tr>
											<td height="40">&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<table style="font-family: Arial,Helvetica,sans-serif; width: 100%; background-color: #000000" width="100%">
	<tbody style="text-align: center; color: white">
		<tr>
			<td height="40"></td>
		</tr>
		<tr>
			<td style="font-size:16px">Copyright &reg; {{$details['brand_name']}}</td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
	</tbody>
</table>