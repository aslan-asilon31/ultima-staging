@php
$path = asset('/user');
if ($data->rsvp_guest_name == "") {
    $guest_name = $data->rsvp_cust_name;
} else {
    $guest_name = $data->rsvp_guest_name;
}
if ($data->from == "ROOMS") {

    $cek = $data->room->photo ? true : false;
    if (!$cek) {
        $photo_path = $path."/"."null";
    }else{
        $photo_path = $path."/".$data->room->photo[0]->photo_path;
    }
    if($data->rsvp_total_extrabed > 0){
        $extrabed = $data->rsvp_total_extrabed."x Extra Bed";
    }else{
        $extrabed = "-";
    }
}else if($data->from == "PRODUCTS"){
    $cek = count($data['product']['photos']) > 0 ? true : false;
    if (!$cek) {
        $photo_path = $path."/"."null";
    }else{
        $photo_path = $path."/".$data['product']['photos'][0]->product_photo_path;
    }
}
$img = asset('images/logo/');
$gambar = $img."/".$setting->logo;
@endphp
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
	xmlns:v="urn:schemas-microsoft-com:vml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width" name="viewport" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<title></title>
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css" />
    <style type="text/css">
        :root {
            /* background */
            --primary-bg-color: #DAF2FC;
            --secondary-bg-color: #F8F8F8;
            --tertiary-bg-color: #1C4458;
            --quaternary-bg-color: #1B729E;
            /* grandient */
            --grandient-bg-color: linear-gradient(0deg, #DAF2FC, #DAF2FC);
            /* font  */
            --primary-font-color: #1B729E;
            --secondary-font-color: #333333;
            --tertiary-font-color: #ffffff;
            --quaternary-font-color: #818285;
        }

		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
	<style id="media-query" type="text/css">
		@media (max-width: 620px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #e6e6e6;">
	<table bgcolor="#e6e6e6" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
		style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e6e6e6; width: 100%;"
		valign="top" width="100%">
		<tbody>
			<tr style="vertical-align: top;" valign="top">
				<td style="word-break: break-word; vertical-align: top;" valign="top">
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div
								style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
											<div class="mobile_hide">
												<table border="0" cellpadding="0" cellspacing="0" class="divider"
													role="presentation"
													style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
													valign="top" width="100%">
													<tbody>
														<tr style="vertical-align: top;" valign="top">
															<td class="divider_inner"
																style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"
																valign="top">
																<table align="center" border="0" cellpadding="0"
																	cellspacing="0" class="divider_content" height="40"
																	role="presentation"
																	style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 40px; width: 100%;"
																	valign="top" width="100%">
																	<tbody>
																		<tr style="vertical-align: top;" valign="top">
																			<td height="40"
																				style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
																				valign="top"><span></span></td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- HORISON LOGO --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:35px; padding-bottom:35px; padding-right: 35px; padding-left: 35px;">
											<div align="left" class="img-container left fixedwidth"
												style="padding-right: 0px;padding-left: 0px;">
												<img alt="horison-logo" border="0" class="left fixedwidth"
													src="{{ $gambar }}"
													style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 190px; display: block;"
													title="Image" width="190" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- BOOKING ID HEAD --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #DAF2FC;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#DAF2FC;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="font-size: 12px; line-height: 1.2; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="line-height: 1.2; word-break: break-word; text-align: left; font-size: 20px; mso-line-height-alt: 24px; margin: 0;">
														<span style="font-size: 20px;"><strong><span style="">Booking
																	ID</span></strong></span></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="font-size: 12px; line-height: 1.2; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="line-height: 1.2; word-break: break-word; text-align: left; font-size: 20px; mso-line-height-alt: 24px; margin: 0;">
														<span
															style="font-size: 20px;"><strong>{{$data->reservation_id}}</strong></span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- DEAR CUSTOMER --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:10px;padding-left:0px;">
												<div
													style="font-size: 12px; line-height: 1.2; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 20px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 24px; margin: 0;">
														<span style="font-size: 20px;">Dear <strong>{{$data->rsvp_cust_name}}</strong>, your booking has been confirmed.</span>
													</p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="font-size: 12px; line-height: 1.2; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
														Please present either a copy or electronic copy of your voucher
														that attached to this E-mail. For further information please
														contact our customer services. </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- I DONT KNOW --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<table border="0" cellpadding="0" cellspacing="0" class="divider"
												role="presentation"
												style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
												valign="top" width="100%">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner"
															style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 35px; padding-bottom: 0px; padding-left: 35px;"
															valign="top">
															<table align="center" border="0" cellpadding="0"
																cellspacing="0" class="divider_content"
																role="presentation"
																style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #DAF2FC; width: 100%;"
																valign="top" width="100%">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
																			valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- PHOTO PATH --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div align="center" class="img-container center fullwidthOnMobile autowidth"
												style="padding-right: 0px;padding-left: 0px; max-height: 300px; overflow-y: hidden;">
												<img align="center" alt="primary_room_photo" border="0"
													class="center fullwidthOnMobile autowidth"
													src="{{$photo_path}}"
													style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 530px; display: block;"
													title="Alternate text" width="530" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@if($data->from == "ROOMS")
					{{-- ROOM TYPE ACCOMODATION --}}
					<div style="background-color:transparent;">
						<div class="block-grid two-up"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Room Type</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->room->room_name}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Accomodation</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->rsvp_total_room}} Room(s), {{$data->total_stay}} Night(s)</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					{{-- CHECKIN CHECKOUT --}}
                    <div style="background-color:transparent;">
                        @if($data->from == "ROOMS")
						<div class="block-grid two-up"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Check In</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->rsvp_checkin}} </strong><br /><strong>(after
															2:00 PM)</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Check Out</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->rsvp_checkout}} </strong><br /><strong>(after
															2:00 PM)</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                        @endif
						@if($data->from == "PRODUCTS")
						{{-- PACKAGE NAME --}}
						<div class="block-grid two-up"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Package Name</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data['product']->product_name}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Reserved For</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->rsvp_amount_pax}} Pax</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- RESERVE DATE --}}
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:20px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Date</strong></p>
												</div>
											</div>
											<div
												style="color:#555555;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="color:#333333;font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->rsvp_date_reserve}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>
					{{-- I DONT KNOW  --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<table border="0" cellpadding="0" cellspacing="0" class="divider"
												role="presentation"
												style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
												valign="top" width="100%">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner"
															style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 35px; padding-bottom: 0px; padding-left: 35px;"
															valign="top">
															<table align="center" border="0" cellpadding="0"
																cellspacing="0" class="divider_content"
																role="presentation"
																style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #DAF2FC; width: 100%;"
																valign="top" width="100%">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
																			valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- BOOKING DETAILS HEAD --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 20px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 24px; margin: 0;">
														<span style="font-size: 20px;"><strong>Booking
																Details</strong></span></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- GUEST --}}
					<div style="background-color:transparent;">
						<div class="block-grid two-up"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Guest Name</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$guest_name}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								@if($data->from == "ROOMS")
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Additional</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
													<strong>{{$extrabed}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
					{{-- ROOM CAPACITY --}}
					@if ($data->from == "ROOMS")
					<div style="background-color:transparent;">
						<div class="block-grid two-up"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Room Capacity</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>2 guest per rooms</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Breakfast</strong></p>
												</div>
											</div>
											<div
												style="color:#333333;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #333333; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p dir="ltr"
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>{{$data->rsvp_breakfast == 1 ? "Included" : "Not Included"}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					{{-- SPECIAL REQUEST --}}
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:20px; padding-right: 35px; padding-left: 35px;">
											<div
												style="color:#a8a8a8;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #a8a8a8; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
														style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin: 0;">
														<strong>Special Request</strong></p>
												</div>
											</div>
											<div
												style="color:#555555;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
												<div
													style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
													<p
                                                        style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
                                                        <strong>{{$data->rsvp_special_request}}</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					{{-- FOOTER --}}
					<div style="background-color:transparent;">
						<div class="block-grid two-up no-stack"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #DAF2FC;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color: #DAF2FC;">
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 35px;">
											<div class="mobile_hide">
												<div
													style="color:#1B729E;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div
														style="font-size: 12px; line-height: 1.2; color: #1B729E; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
															{{ $setting->title }}</p>
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
                                                            {{ $setting->address }}
                                                        </p>
													</div>
												</div>
											</div>
											<div class="mobile_hide">
												<div
													style="color:#1B729E;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div
														style="font-size: 12px; line-height: 1.2; color: #1B729E; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
															{{ $setting->phone }}<br />
                                                            {{ $setting->wa_number }}
														</p>
													</div>
												</div>
											</div>
											<div class="mobile_hide">
												<div
													style="color:#1B729E;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div
														style="font-size: 12px; line-height: 1.2; color: #1B729E; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0; text-decoration: none;">
                                                            {{ $setting->email }}
                                                        </p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col num6"
									style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<div class="mobile_hide">
												<table cellpadding="0" cellspacing="0" class="social_icons"
													role="presentation"
													style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
													valign="top" width="100%">
													<tbody>
														<tr style="vertical-align: top;" valign="top">
															<td style="word-break: break-word; vertical-align: top; padding-top: 20px; padding-right: 35px; padding-bottom: 10px; padding-left: 10px;"
																valign="top">
																<table align="right" cellpadding="0" cellspacing="0"
																	class="social_table" role="presentation"
																	style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;"
																	valign="top">
																	<tbody>
																		<tr align="right"
																			style="vertical-align: top; display: inline-block; text-align: right;"
                                                                            valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 0px; padding-left: 5px;"
																				valign="top"><a
																					href="{{ $setting->so_instagram }}"
																					target="_blank"><img alt="Instagram"
																						height="32"
																						src="https://img.icons8.com/fluent/48/000000/instagram-new.png"
																						style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
																						title="Instagram"
																						width="32" /></a></td>
																			<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 0px; padding-left: 5px;"
																				valign="top"><a
																					href="{{ $setting->so_facebook }}"
																					target="_blank"><img alt="Facebook"
																						height="32"
																						src="https://img.icons8.com/fluent/48/000000/facebook-new.png"
																						style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
																						title="Facebook"
																						width="32" /></a></td>
																			<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 0px; padding-left: 5px;"
																				valign="top"><a
																					href="{{ $setting->so_twitter }}"
																					target="_blank"><img alt="Twitter"
																						height="32"
																						src="https://img.icons8.com/fluent/48/000000/twitter.png"
																						style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
																						title="Twitter"
																						width="32" /></a></td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #DAF2FC;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color: #DAF2FC;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 35px; padding-left: 35px;">
											<div class="desktop_hide"
												style="mso-hide: all; display: none; max-height: 0px; overflow: hidden;">
												<div
													style="color:#d4b580;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div
														style="font-size: 12px; line-height: 1.2; color: #d4b580; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
															Horison Tirta Sanita</p>
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
															Jl. Raya Panawuan No. 98 - Sangkanhurip, Kuningan Jawa
															Barat, Kuningan</p>
													</div>
												</div>
											</div>
											<div class="desktop_hide"
												style="mso-hide: all; display: none; max-height: 0px; overflow: hidden;">
												<div
													style="color:#d4b580;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div
														style="font-size: 12px; line-height: 1.2; color: #d4b580; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">
                                                            {{ $setting->phone }}<br />
                                                            {{ $setting->wa_number }}
													</div>
												</div>
											</div>
											<div class="desktop_hide"
												style="mso-hide: all; display: none; max-height: 0px; overflow: hidden;">
												<div
													style="color:#d4b580;font-family:Cabin, Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
													<div
														style="font-size: 12px; line-height: 1.2; color: #d4b580; font-family: Cabin, Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
														<p
															style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0; text-decoration: none;">
															{{ $setting->email }}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="background-color:transparent;">
						<div class="block-grid"
							style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
							<div
								style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
								<div class="col num12"
									style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div style="width:100% !important;">
										<div
											style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
											<table border="0" cellpadding="0" cellspacing="0" class="divider"
												role="presentation"
												style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
												valign="top" width="100%">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td class="divider_inner"
															style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"
															valign="top">
															<table align="center" border="0" cellpadding="0"
																cellspacing="0" class="divider_content" height="30"
																role="presentation"
																style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;"
																valign="top" width="100%">
																<tbody>
																	<tr style="vertical-align: top;" valign="top">
																		<td height="30"
																			style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
																			valign="top"><span></span></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>
