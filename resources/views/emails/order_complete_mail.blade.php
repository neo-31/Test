<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <title>Order Placed</title>
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<!-- BODY -->

<body bgcolor="#F0F0F0" text="#000000" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; background-color: #F0F0F0; color: #000000;">

    <!-- SECTION / BACKGROUND -->
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;">
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                bgcolor="#F0F0F0">

                <!-- WRAPPER LOGO -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;">

                    <tr>
                        <td align="center" rowspan="2" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0;  padding: 0; padding-left: 6.25%; padding-right: 6.25; width: 87.5%; padding-top: 20px; padding-bottom: 20px;">

                            <!-- LOGO -->
                            <a href="https://vdrresale.com/" target="_blank" style="text-decoration: none;">
                                <img border="0" vspace="0" hspace="0" src="{{ $message->embed(asset('public/email_signature/logo.png')) }}"
                                    alt="Logo" title="Logo" style="width: 50%; height: auto; color: #000000; font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" />
                            </a>
                        </td>
                    </tr>
                </table><!-- END OF WRAPPER LOGO -->

                <!-- Main WRAPPER / CONTAINER -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;">

                    <!-- HEADER -->
                    <tr>
                        <td align="center" colspan="2" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%; padding-top: 25px; color: #000000; font-family: 'Poppins', Helvetica, sans-serif;">
                            Your order has been Completed!
                        </td>
                    </tr>

                    <!-- HERO IMAGE -->
                    <tr>
                        <td align="center" valign="top"  colspan="2" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 20px;">
                            <a href="#" target="_blank" style="text-decoration: none;">
                                <img border="0" vspace="0" hspace="0" src="{{ $message->embed(asset('public/email_signature/hero.png')) }}"
                                    alt="Please enable to view this content" title="Hero Image" width="496"
                                    height="200" style="width: 496px; max-width: 560px; color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" />
                            </a>
                        </td>
                    </tr>

                    <!-- Order Details -->
                    <tr>
                    	<td align="center" colspan="2" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 0px; font-family: 'Poppins', Helvetica, sans-serif;">
                    		<h4>Great news, Maria! Your order’s has been delivered.</h4>
                    	</td>
                    </tr>
                    @php
                        // $order_id = $order_id;
                        $order_detail = getOrderDetails($order_id);
                        $user_detail = getUserInfo($order_detail->user_id);

                        $state_name = "";
                        $country_name = "";

                        // if(!empty($user_detail->state_id)){
                        //     $state_name = getStateInfo($user_detail->state_id)->state_name." , ";
                        // }
                        // if(!empty($user_detail->country)){
                        //     $country_name = getCountryInfo($user_detail->country)->country_name;
                        // }
                    @endphp
                    <tr>
                    	<td align="left" valign="top" colspan="2" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 3.25%; font-family: 'Poppins', Helvetica, sans-serif;">
                            <singleline>
				                <div mc:edit>
				                  Hey, {!! $user_detail->name !!}
				                </div>
				            </singleline>

                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 3.25%; font-family: 'Poppins', Helvetica, sans-serif;">
                            <h3 style="color: #dcbf60;">Shipping details</h3>
                            <p> <pre> {!! $user_detail->shipping_address !!} </pre>,<br>
                                {{ $state_name }}
                                {{ $country_name }}

                            </p>
                        </td>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 0px; padding-left: 6.25%; padding-right: 6.25%; font-family: 'Poppins', Helvetica, sans-serif;">

                        	<h3 style="color: #dcbf60;">Order Date</h3>
                            <p>{!! $order_detail->created_at !!}</p>
                        </td>
                    </tr>

                    <tr>
                    	<td align="center" colspan="2" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 0px; font-family: 'Poppins', Helvetica, sans-serif;">
                    		<h3 style="margin-top: 0; color: #dcbf60;">Your Products</h3>
                    	</td>
                    </tr>

                    <tr>
                    	<td align="left" colspan="2" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-top: 0px; font-family: 'Poppins', Helvetica, sans-serif; padding-left: 6.25%; padding-right: 6.25%;">
                    		<table  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" width="100%" style="border-collapse: collapse; border-spacing: 0; padding: 6%; width: 100%; max-width: 100%;">
                    			<thead align="left" valign="top">
                    				<tr style="border-top: 1px solid #E0E0E0;">
                    					<th style="padding-top: 15px; padding-bottom: 15px;">Name</th>
                    					<th style="padding-top: 15px; padding-bottom: 15px;">Qty</th>
                    					<th style="padding-top: 15px; padding-bottom: 15px;">Price</th>
                    				</tr>
                    			</thead>
                    			<tbody align="left" valign="top">
                                @foreach (getOrderProductDetails($order_detail->id) as $order_data )
                    				<tr style="border-top: 1px solid #E0E0E0;">
                    					<td style="padding-top: 15px;">
                    						<div style="display: inline-flex;">
	                    						<img src="{{ $message->embed(url(getProductDetails($order_data->product_id)->product_image)) }}" alt="product image" title="Logo" width="100" >
	                    						&nbsp;&nbsp;&nbsp;
	                    						<p>{{ getProductDetails($order_data->product_id)->product_name }}</p>
                    						</div>
                    					</td>
                    					<td style="padding-top: 15px;"> *{{ $order_data->quantity }}</td>
                    					<td style="padding-top: 15px;"> £ {{ $order_data->total_price }}</td>

                    				</tr>
                                @endforeach
                    				<tr>
				                        <td align="center" valign="top"  colspan="3" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; padding-top: 15px;">
				                            <hr align="center" style="margin: 0; padding: 0; width: 100%; border: 1px dashed #E0E0E0;" />
				                        </td>
				                    </tr>
				                    <tr>
				                        <td align="right" valign="top" style="padding-top: 15px;">
				                        	<b>Total(With including shipping charge & VAT)</b>
				                        </td>
                                        <td style="padding-top: 15px;">
                                			<b>*{{ $order_detail->total_qty }}</b>
                                		</td>
                                		<td style="padding-top: 15px;">
                                			<b>£ {{ $order_detail->actual_price }}</b>
                                		</td>
				                    </tr>
                    			</tbody>
                    		</table>
                    	</td>
                    </tr>

                    <!-- LINE -->
                    <tr>
                        <td align="center" valign="top"  colspan="2" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; padding-top: 25px;">
                            <hr align="center" style="margin: 0; padding: 0; width: 100%; border: 1px solid #E0E0E0;" />
                        </td>
                    </tr>

                    <!-- PARAGRAPH -->
                    <tr>
                        <td align="center" valign="top" colspan="2" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: 400; line-height: 160%; padding-top: 20px; padding-bottom: 25px; color: #000000; font-family: 'Poppins', Helvetica, sans-serif;">
                            Have a question?
                            <a href="mailto:info@vdrresale.com" target="_blank" style="color: #000; font-size: 16px; font-weight: 400; line-height: 160%; color: #dcbf60;">
                                info@vdrresale.com
                            </a>
                        </td>
                    </tr>

                </table>
                <!-- Main END OF WRAPPER -->

                <!-- Footer WRAPPER -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; max-width: 560px;">

                    <!-- SOCIAL -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; padding-top: 25px;">
                            <table width="256" border="0" cellpadding="0" cellspacing="0" align="center"
                                style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                                <tr>

                                    <!-- ICON 1 -->
                                    <td align="center" valign="middle" style="margin: 0;
										padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                                        <a href="https://www.facebook.com/VDResale/" target="_blank" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none;  display: inline-block; color: #000000;" alt="F" title="Facebook" width="45" height="45" src="{{ $message->embed(asset('email_signature/facebook.png')) }}" />
                                        </a>
                                    </td>

                                    <!-- ICON 2 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                                        <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fvoice-data-resale%2Fabout" target="_blank" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;" alt="T" title="Instagram" width="45" height="45" src="{{ $message->embed(asset('email_signature/linkdin.png')) }}" />
                                        </a>
                                    </td>

                                    <!-- ICON 3 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                                        <a href="https://api.whatsapp.com/send?phone=02084409908" target="_blank" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;" alt="G" title="Twitter" width="45" height="45" src="{{ $message->embed(asset('email_signature/whatsapp.png')) }}" />
                                        </a>
                                    </td>

                                    <!-- ICON 4 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                                        <a target="_blank" href="#" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0;
												margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;" alt="I" title="Youtube" width="45" height="45" src="{{ $message->embed(asset('email_signature/instagram.png')) }}" />
                                        </a>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- END OF SOCIAL -->

                    <!-- FOOTER -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;padding-top: 20px;padding-bottom: 20px;color: #999999;font-family: 'Poppins', Helvetica, sans-serif;">
                            &copy; 2021 vdrresale.com
                            <a href="https://vdrresale.com" target="_blank" style="text-decoration: underline; color: #000; font-size: 13px; font-weight: 400; line-height: 150%;">
                                Visit our website here
                            </a>

                        </td>
                    </tr>
                    <!-- END OF FOOTER -->

                </table><!-- END OF Footer WRAPPER -->

            </td><!-- END OF SECTION / BACKGROUND -->

        </tr>
    </table>
</body>

</html>
