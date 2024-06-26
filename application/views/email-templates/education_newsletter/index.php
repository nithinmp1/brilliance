<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!-- NAME: 1:3 COLUMN -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Brilliance Newsletter</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style type="text/css">
	.graph {
		width: 100px;
		/* Set the width and height to define the size of the graph */
		height: 100px;
		border-radius: 50%;
		/* Make it a circle */
		position: relative;
		background-color: #ccc;
		/* Background color of the graph */
	}
	
	.segment {
		position: absolute;
		width: 100%;
		height: 100%;
		clip-path: polygon(50% 50%, 100% 0, 100% 100%);
		border-radius: 50%;
		/* Make it a circle */
	}
	
	.segment-1 {
		background-color: #3498db;
		/* Color of the first segment */
		transform: rotate(30deg);
		/* Adjust rotation for each segment */
	}
	body,
	#bodyTable,
	#bodyCell {
		height: 100% !important;
		margin: 0;
		padding: 0;
		width: 100% !important;
	}
	
	table {
		border-collapse: collapse;
	}
	
	img,
	a img {
		border: 0;
		outline: none;
		text-decoration: none;
	}
	
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		margin: 0;
		padding: 0;
	}
	
	p {
		margin: 1em 0;
		padding: 0;
	}
	
	a {
		word-wrap: break-word;
	}
	
	.ReadMsgBody {
		width: 100%;
	}
	
	.ExternalClass {
		width: 100%;
	}
	
	.ExternalClass,
	.ExternalClass p,
	.ExternalClass span,
	.ExternalClass font,
	.ExternalClass td,
	.ExternalClass div {
		line-height: 100%;
	}
	
	table,
	td {
		mso-table-lspace: 0pt;
		mso-table-rspace: 0pt;
	}
	
	#outlook a {
		padding: 0;
	}
	
	img {
		-ms-interpolation-mode: bicubic;
	}
	
	body,
	table,
	td,
	p,
	a,
	li,
	blockquote {
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}
	
	#bodyCell {
		padding: 20px;
	}
	
	.Image {
		vertical-align: bottom;
	}
	
	.TextContent img {
		height: auto !important;
	}
	/*
	@tab Page
	@section background style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
	
	body,
	#bodyTable {
		/*@editable*/
		background-color: #2f70dd;
	}
	/*
	@tab Page
	@section background style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
	
	#bodyCell {
		/*@editable*/
		border-top: 0;
	}
	/*
	@tab Page
	@section email border
	@tip Set the border for your email.
	*/
	
	#templateContainer {
		/*@editable*/
		border: 0;
	}
	/*
	@tab Page
	@section heading 1
	@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
	@style heading 1
	*/
	
	h1 {
		/*@editable*/
		color: #606060 !important;
		display: block;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 40px;
		/*@editable*/
		font-style: normal;
		/*@editable*/
		font-weight: bold;
		/*@editable*/
		line-height: 125%;
		/*@editable*/
		letter-spacing: -1px;
		margin: 0;
		/*@editable*/
		text-align: left;
	}
	/*
	@tab Page
	@section heading 2
	@tip Set the styling for all second-level headings in your emails.
	@style heading 2
	*/
	
	h2 {
		/*@editable*/
		color: #404040 !important;
		display: block;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 26px;
		/*@editable*/
		font-style: normal;
		/*@editable*/
		font-weight: bold;
		/*@editable*/
		line-height: 125%;
		/*@editable*/
		letter-spacing: -.75px;
		margin: 0;
		/*@editable*/
		text-align: left;
	}
	/*
	@tab Page
	@section heading 3
	@tip Set the styling for all third-level headings in your emails.
	@style heading 3
	*/
	
	h3 {
		/*@editable*/
		color: #606060 !important;
		display: block;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 18px;
		/*@editable*/
		font-style: normal;
		/*@editable*/
		font-weight: bold;
		/*@editable*/
		line-height: 125%;
		/*@editable*/
		letter-spacing: -.5px;
		margin: 0;
		/*@editable*/
		text-align: left;
	}
	/*
	@tab Page
	@section heading 4
	@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
	@style heading 4
	*/
	
	h4 {
		/*@editable*/
		color: #808080 !important;
		display: block;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 16px;
		/*@editable*/
		font-style: normal;
		/*@editable*/
		font-weight: bold;
		/*@editable*/
		line-height: 125%;
		/*@editable*/
		letter-spacing: normal;
		margin: 0;
		/*@editable*/
		text-align: left;
	}
	/*
	@tab Preheader
	@section preheader style
	@tip Set the background color and borders for your email's preheader area.
	*/
	
	#templatePreheader {
		/*@editable*/
		background-color: #2f70dd;
		/*@editable*/
		border-top: 0;
		/*@editable*/
		border-bottom: 0;
	}
	/*
	@tab Preheader
	@section preheader text
	@tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
	*/
	
	.preheaderContainer .TextContent,
	.preheaderContainer .TextContent p {
		/*@editable*/
		color: #bdd8f9;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 11px;
		/*@editable*/
		line-height: 125%;
		/*@editable*/
		text-align: center;
	}
	/*
	@tab Preheader
	@section preheader link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
	
	.preheaderContainer .TextContent a {
		/*@editable*/
		color: #ffb555;
		/*@editable*/
		font-weight: normal;
		/*@editable*/
		text-decoration: underline;
	}
	/*
	@tab Header
	@section header style
	@tip Set the background color and borders for your email's header area.
	*/
	
	#templateHeader {
		/*@editable*/
		background-color: #2f70dd;
		/*@editable*/
		border-top: 0;
		/*@editable*/
		border-bottom: 0;
	}
	/*
	@tab Header
	@section header text
	@tip Set the styling for your email's header text. Choose a size and color that is easy to read.
	*/
	
	.headerContainer .TextContent,
	.headerContainer .TextContent p {
		/*@editable*/
		color: #606060;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 15px;
		/*@editable*/
		line-height: 150%;
		/*@editable*/
		text-align: left;
	}
	/*
	@tab Header
	@section header link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
	
	.headerContainer .TextContent a {
		/*@editable*/
		color: #6DC6DD;
		/*@editable*/
		font-weight: normal;
		/*@editable*/
		text-decoration: underline;
	}
	/*
	@tab Body
	@section body style
	@tip Set the background color and borders for your email's body area.
	*/
	
	#templateBody {
		/*@editable*/
		background-color: #FFFFFF;
		/*@editable*/
		border-top: 0;
		/*@editable*/
		border-bottom: 0;
	}
	/*
	@tab Body
	@section body text
	@tip Set the styling for your email's body text. Choose a size and color that is easy to read.
	*/
	
	.bodyContainer .TextContent,
	.bodyContainer .TextContent p {
		/*@editable*/
		color: #7a8991;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 15px;
		/*@editable*/
		line-height: 150%;
		/*@editable*/
		text-align: left;
	}
	/*
	@tab Body
	@section body link
	@tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
	*/
	
	.bodyContainer .TextContent a {
		/*@editable*/
		color: #eb7f30;
		/*@editable*/
		font-weight: bold;
		/*@editable*/
		text-decoration: underline;
	}
	/*
	@tab Columns
	@section column style
	@tip Set the background color and borders for your email's columns area.
	*/
	
	#templateColumns {
		/*@editable*/
		background-color: #FFFFFF;
		/*@editable*/
		border-top: 0;
		/*@editable*/
		border-bottom: 0;
	}
	/*
	@tab Columns
	@section left column text
	@tip Set the styling for your email's left column text. Choose a size and color that is easy to read.
	*/
	
	.leftColumnContainer .TextContent,
	.leftColumnContainer .TextContent p {
		/*@editable*/
		color: #7a8991;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 14px;
		/*@editable*/
		line-height: 150%;
		/*@editable*/
		text-align: center;
	}
	/*
	@tab Columns
	@section left column link
	@tip Set the styling for your email's left column links. Choose a color that helps them stand out from your text.
	*/
	
	.leftColumnContainer .TextContent a {
		/*@editable*/
		color: #6DC6DD;
		/*@editable*/
		font-weight: normal;
		/*@editable*/
		text-decoration: underline;
	}
	/*
	@tab Columns
	@section center column text
	@tip Set the styling for your email's center column text. Choose a size and color that is easy to read.
	*/
	
	.centerColumnContainer .TextContent,
	.centerColumnContainer .TextContent p {
		/*@editable*/
		color: #7a8991;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 14px;
		/*@editable*/
		line-height: 150%;
		/*@editable*/
		text-align: center;
	}
	/*
	@tab Columns
	@section center column link
	@tip Set the styling for your email's center column links. Choose a color that helps them stand out from your text.
	*/
	
	.centerColumnContainer .TextContent a {
		/*@editable*/
		color: #6DC6DD;
		/*@editable*/
		font-weight: normal;
		/*@editable*/
		text-decoration: underline;
	}
	/*
	@tab Columns
	@section right column text
	@tip Set the styling for your email's right column text. Choose a size and color that is easy to read.
	*/
	
	.rightColumnContainer .TextContent,
	.rightColumnContainer .TextContent p {
		/*@editable*/
		color: #7a8991;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 14px;
		/*@editable*/
		line-height: 150%;
		/*@editable*/
		text-align: center;
	}
	/*
	@tab Columns
	@section right column link
	@tip Set the styling for your email's right column links. Choose a color that helps them stand out from your text.
	*/
	
	.rightColumnContainer .TextContent a {
		/*@editable*/
		color: #6DC6DD;
		/*@editable*/
		font-weight: normal;
		/*@editable*/
		text-decoration: underline;
	}
	/*
	@tab Footer
	@section footer style
	@tip Set the background color and borders for your email's footer area.
	*/
	
	#templateFooter {
		/*@editable*/
		background-color: #2f70dd;
		/*@editable*/
		border-top: 0;
		/*@editable*/
		border-bottom: 0;
	}
	/*
	@tab Footer
	@section footer text
	@tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
	*/
	
	.footerContainer .TextContent,
	.footerContainer .TextContent p {
		/*@editable*/
		color: #bdd8f9;
		/*@editable*/
		font-family: Helvetica;
		/*@editable*/
		font-size: 11px;
		/*@editable*/
		line-height: 125%;
		/*@editable*/
		text-align: center;
	}
	/*
	@tab Footer
	@section footer link
	@tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
	*/
	
	.footerContainer .TextContent a {
		/*@editable*/
		color: #ffb555;
		/*@editable*/
		font-weight: normal;
		/*@editable*/
		text-decoration: underline;
	}
	
	@media only screen and (max-width: 480px) {
		body,
		table,
		td,
		p,
		a,
		li,
		blockquote {
			-webkit-text-size-adjust: none !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		body {
			width: 100% !important;
			min-width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[id=bodyCell] {
			padding: 10px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=TextContentContainer] {
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=BoxedTextContentContainer] {
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=mcpreview-image-uploader] {
			width: 100% !important;
			display: none !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		img[class=Image] {
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=ImageGroupContentContainer] {
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=ImageGroupContent] {
			padding: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=ImageGroupBlockInner] {
			padding-bottom: 0 !important;
			padding-top: 0 !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		tbody[class=ImageGroupBlockOuter] {
			padding-bottom: 9px !important;
			padding-top: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=CaptionTopContent],
		table[class=CaptionBottomContent] {
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=CaptionLeftTextContentContainer],
		table[class=CaptionRightTextContentContainer],
		table[class=CaptionLeftImageContentContainer],
		table[class=CaptionRightImageContentContainer],
		table[class=ImageCardLeftTextContentContainer],
		table[class=ImageCardRightTextContentContainer] {
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=ImageCardLeftImageContent],
		td[class=ImageCardRightImageContent] {
			padding-right: 18px !important;
			padding-left: 18px !important;
			padding-bottom: 0 !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=ImageCardBottomImageContent] {
			padding-bottom: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=ImageCardTopImageContent] {
			padding-top: 18px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		table[class=CaptionLeftContentOuter] td[class=TextContent],
		table[class=CaptionRightContentOuter] td[class=TextContent] {
			padding-top: 9px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=CaptionBlockInner] table[class=CaptionTopContent]:last-child td[class=TextContent] {
			padding-top: 18px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=BoxedTextContentColumn] {
			padding-left: 18px !important;
			padding-right: 18px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=columnsContainer] {
			display: block !important;
			max-width: 600px !important;
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=TextContent] {
			padding-right: 18px !important;
			padding-left: 18px !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section template width
	@tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.
	*/
		table[id=templateContainer],
		table[id=templatePreheader],
		table[id=templateHeader],
		table[id=templateColumns],
		table[class=templateColumn],
		table[id=templateBody],
		table[id=templateFooter] {
			/*@tab Mobile Styles
@section template width
@tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.*/
			max-width: 600px !important;
			/*@editable*/
			width: 100% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section heading 1
	@tip Make the first-level headings larger in size for better readability on small screens.
	*/
		h1 {
			/*@editable*/
			font-size: 24px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section heading 2
	@tip Make the second-level headings larger in size for better readability on small screens.
	*/
		h2 {
			/*@editable*/
			font-size: 20px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section heading 3
	@tip Make the third-level headings larger in size for better readability on small screens.
	*/
		h3 {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section heading 4
	@tip Make the fourth-level headings larger in size for better readability on small screens.
	*/
		h4 {
			/*@editable*/
			font-size: 16px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Boxed Text
	@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		table[class=BoxedTextContentContainer] td[class=TextContent],
		td[class=BoxedTextContentContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Preheader Visibility
	@tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
	*/
		table[id=templatePreheader] {
			/*@editable*/
			display: block !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Preheader Text
	@tip Make the preheader text larger in size for better readability on small screens.
	*/
		td[class=preheaderContainer] td[class=TextContent],
		td[class=preheaderContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 14px !important;
			/*@editable*/
			line-height: 115% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Header Text
	@tip Make the header text larger in size for better readability on small screens.
	*/
		td[class=headerContainer] td[class=TextContent],
		td[class=headerContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Body Text
	@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=bodyContainer] td[class=TextContent],
		td[class=bodyContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Left Column Text
	@tip Make the left column text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=leftColumnContainer] td[class=TextContent],
		td[class=leftColumnContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Center Column Text
	@tip Make the center column text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=centerColumnContainer] td[class=TextContent],
		td[class=centerColumnContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section Right Column Text
	@tip Make the right column text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=rightColumnContainer] td[class=TextContent],
		td[class=rightColumnContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 18px !important;
			/*@editable*/
			line-height: 125% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		/*
	@tab Mobile Styles
	@section footer text
	@tip Make the body content text larger in size for better readability on small screens.
	*/
		td[class=footerContainer] td[class=TextContent],
		td[class=footerContainer] td[class=TextContent] p {
			/*@editable*/
			font-size: 14px !important;
			/*@editable*/
			line-height: 115% !important;
		}
	}
	
	@media only screen and (max-width: 480px) {
		td[class=footerContainer] a[class=utilityLink] {
			display: block !important;
		}
	}
	</style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
	<center>
		<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color: #2f70dd;">
			<tr>
				<td align="center" valign="top" id="bodyCell">
					<!-- BEGIN TEMPLATE // -->
					<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
						<tr>
							<td align="center" valign="top">
								<!-- BEGIN PREHEADER // -->
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="templatePreheader" style="background-color:#2f70dd">
									<tr>
										<td valign="top" class="preheaderContainer" style="padding-top:9px;">
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="TextBlock">
												<tbody class="TextBlockOuter">
													<tr>
														<td valign="top" class="TextBlockInner">
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="366" class="TextContentContainer">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent" style="padding-top:9px; padding-left:18px; padding-bottom:9px; padding-right:0;">
																			<div style="text-align: center;">Auto generated quiz assessment from brilliance. Create an account for learn more</div>
																		</td>
																	</tr>
																</tbody>
															</table>
															<table align="right" border="0" cellpadding="0" cellspacing="0" width="197" class="TextContentContainer">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:0;">
																			<div style="text-align: center;"><a href="#" target="_blank">View this email in your browser</a></div>
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
								</table>
								<!-- // END PREHEADER -->
							</td>
						</tr>
						<tr>
							<td align="center" valign="top">
								<!-- BEGIN HEADER // -->
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader" style="background-color:#2f70dd">
									<tr>
										<td valign="top" class="headerContainer">
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="DividerBlock" style="background-color: #2F70DD;">
												<tbody class="DividerBlockOuter">
													<tr>
														<td class="DividerBlockInner" style="padding: 18px 18px 0px;">
															<table class="DividerContent" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td> <span></span> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="ImageBlock">
												<tbody class="ImageBlockOuter">
													<tr>
														<td valign="top" style="padding:0px" class="ImageBlockInner">
															<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="ImageContentContainer">
																<tbody>
																	<tr>
																		<td class="ImageContent" valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;"> <img align="center" alt="" src="<?=site_url('assets/email/05cf8ae7-9e45-4e84-83be-235d4a1d8010.png')?>" width="600" style="max-width:1200px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="Image"> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</table>
								<!-- // END HEADER -->
							</td>
						</tr>
						<tr>
							<td align="center" valign="top">
								<!-- BEGIN BODY // -->
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody" style="background-color:#FFFFFF">
									<tr>
										<td valign="top" class="bodyContainer">
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="TextBlock">
												<tbody class="TextBlockOuter">
													<tr>
														<td valign="top" class="TextBlockInner">
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="TextContentContainer">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;"> <span style="font-size:24px"><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><strong><span style="color:#3a85e2"><span style="font-size:30px">BRILLIANCE QUIZ ASSESSMENT</span></span>
																			<br> <span style="color:#A9A9A9"><span style="font-size:18px">INCREASE YOUR PERFORMANCE WITH US</span></span>
																			</strong>
																			</span>
																			</span>
																			<br>
																			<br> Hi
																			<?=ucfirst(strtolower($name))?>,
																				<br>
																				<br> Thank you for participating in our quiz, Your score for the quiz is: 1
																				
																				<br> <span style="font-size:13px"><a href="<?=site_url()?>" target="_blank">Learn more +</a></span>
																				<br> <span style="color:#A9A9A9"><span style="font-size:18px"><strong>BREAKDOWN OF QUESTIONS</strong></span></span>
																				<?php 
																					foreach ($quiz as $key => $value) {
																				?>
																					<input type="checkbox" id="toggle<?=$key?>" style="display: none;">
																					<label for="toggle<?=$key?>" class="toggle-label" style="display: block;background-color: #3498db;
																					color: white;padding: 10px;cursor: pointer;text-align: center;" >
																						<?=$value['text']?>
																					</label>
																					<div class="content" style="max-height: 300px;overflow: auto;">
																						<?php foreach ($value['choices'] as $choices) { ?>
																							<p>
																								<?=$choices?>.
																									<?php if ($choices === $value['answer']) { ?>
																										<img alt="" src="<?=site_url('assets/email/tick.png')?>" width="20" class="Image">
																									<?php } ?>
																									<?php if (($value['choosedAnswer'] !== $value['answer']) && 
																											$value['choosedAnswer'] === $choices) { ?> 
																										<img alt="" src="<?=site_url('assets/email/cross.png')?>" width="20" class="Image">
																									<?php } ?>
																							</p>
																							<?php } ?>
																					</div>
																					<br>
																					<?php
																						}
																					?>
																					<!-- <br> -->
																				<!-- <br> <strong>The Image below illustrates the industry average score for the quiz:</strong>
																				<br> -->
																		</td>
																	</tr>
																</tbody>
															</table>
															
														</td>
													</tr>
													<?php /*
													<tr>
														<td valign="top" class="CaptionLeftContentInner" style="padding:0 9px ;">
															<table class="CaptionLeftImageContentContainer" align="right" border="0" cellpadding="0" cellspacing="0" width="176">
																<tbody align="center">
																	<tr>
																		<td valign="top" class="TextContent">
																			<div class="graph">
																				<div class="segment segment-1"></div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
															<table class="CaptionLeftTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="264">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent"> <span style="color:#3a85e2">
																			<span style="font-size:19px">
																				<strong>Calculation On?</strong>
																			</span> </span>
																			<br>
																			<br> <span style="line-height:20.7999992370605px">Consectetur adipiscing eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam:&nbsp;</span>
																			<ul>
																				<li> <span style="line-height:20.7999992370605px">Lorem ipsum dolor</span> </li>
																				<li> <span style="line-height:20.7999992370605px">Deserunt mollit</span> </li>
																				<li> <span style="line-height:20.7999992370605px">Laborum vero</span> </li>
																				<li> <span style="line-height:20.7999992370605px">Blanditis proident</span> </li>
																				<li>Velit esse</li>
																			</ul>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													*/ ?>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="DividerBlock">
												<tbody class="DividerBlockOuter">
													<tr>
														<td class="DividerBlockInner" style="padding: 40px 18px;">
															<table class="DividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 1px;border-top-style: dashed;border-top-color: #BFD1D3;">
																<tbody>
																	<tr>
																		<td> <span></span> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="CaptionBlock">
												<tbody class="CaptionBlockOuter">
													<tr>
														<td class="CaptionBlockInner" valign="top" style="padding:9px;">
															<table border="0" cellpadding="0" cellspacing="0" class="CaptionLeftContentOuter" width="100%">
																<tbody>
																	<tr>
																		<td valign="top" class="CaptionLeftContentInner" style="padding:0 9px ;">
																			<table align="right" border="0" cellpadding="0" cellspacing="0" class="CaptionLeftImageContentContainer">
																				<tbody>
																					<tr>
																						<td class="CaptionLeftImageContent" valign="top"> <img alt="" src="<?=site_url('assets/email/50173a6e-6c53-47a4-ab91-8aa6fb765885.png')?>" width="264" style="max-width:532px;" class="Image"> </td>
																					</tr>
																				</tbody>
																			</table>
																			<table class="CaptionLeftTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="264">
																				<tbody>
																					<tr>
																						<td valign="top" class="TextContent"> <span style="color:#3a85e2"><span style="font-size:19px"><strong>WHY US?</strong></span></span>
																							<br>
																							<br> <span style="line-height:20.7999992370605px">Consectetur adipiscing eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam:&nbsp;</span>
																							<ul>
																								<li><span style="line-height:20.7999992370605px">Lorem ipsum dolor</span></li>
																								<li><span style="line-height:20.7999992370605px">Deserunt mollit</span></li>
																								<li><span style="line-height:20.7999992370605px">Laborum vero</span></li>
																								<li><span style="line-height:20.7999992370605px">Blanditis proident</span></li>
																								<li>Velit esse</li>
																								<li>Eligendi optio sit</li>
																								<li>Cilium quod maxime</li>
																								<li>Dolore magna</li>
																							</ul> <span style="line-height:20.7999992370605px">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat pariatur. Excepteur sint tempor magna incididunt labor doloramet n</span>am libero. </td>
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
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="DividerBlock">
												<tbody class="DividerBlockOuter">
													<tr>
														<td class="DividerBlockInner" style="padding: 20px 18px 0px;">
															<table class="DividerContent" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td> <span></span> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="TextBlock">
												<tbody class="TextBlockOuter">
													<tr>
														<td valign="top" class="TextBlockInner">
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="TextContentContainer">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
																			<!-- <div style="text-align: center;"><strong style="color: #DB2626;font-size: 27px;line-height: 20.7999992370605px;">Only $199.00</strong></div> -->
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="DividerBlock">
												<tbody class="DividerBlockOuter">
													<tr>
														<td class="DividerBlockInner" style="padding: 20px 18px 0px;">
															<table class="DividerContent" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td> <span></span> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="ButtonBlock">
												<tbody class="ButtonBlockOuter">
													<tr>
														<td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="ButtonBlockInner">
															<table border="0" cellpadding="0" cellspacing="0" class="ButtonContentContainer" style="border-collapse: separate !important;border: 2px none #707070;border-radius: 99px;background-color: #EC9F3B;">
																<tbody>
																	<tr>
																		<td align="center" valign="middle" class="ButtonContent" style="font-family: Arial; font-size: 14px; padding: 18px;"> <a class="Button" title="Do not wait!" href="<?=$loginLink?>" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Do not wait!</a> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="DividerBlock">
												<tbody class="DividerBlockOuter">
													<tr>
														<td class="DividerBlockInner" style="padding: 30px 18px 40px;">
															<table class="DividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top-width: 1px;border-top-style: dashed;border-top-color: #BFD1D3;">
																<tbody>
																	<tr>
																		<td> <span></span> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="TextBlock">
												<tbody class="TextBlockOuter">
													<tr>
														<td valign="top" class="TextBlockInner">
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="TextContentContainer">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
																			<div style="text-align: left;"><span style="font-size:20px"><strong style="font-family:arial,helvetica neue,helvetica,sans-serif; font-size:24px; line-height:20.7999992370605px"><span style="color: #3A85E2;">TESTIMONIALS</span></strong>
																				</span>
																			</div>
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
								</table>
								<!-- // END BODY -->
							</td>
						</tr>
						<tr>
							<td align="center" valign="top">
								<!-- BEGIN COLUMNS // -->
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateColumns" style="background-color:#FFFFFF">
									<tr>
										<td align="left" valign="top" class="columnsContainer" width="33%">
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
												<tr>
													<td valign="top" class="leftColumnContainer">
														<table border="0" cellpadding="0" cellspacing="0" width="100%" class="CaptionBlock">
															<tbody class="CaptionBlockOuter">
																<tr>
																	<td class="CaptionBlockInner" valign="top" style="padding:9px;">
																		<table align="left" border="0" cellpadding="0" cellspacing="0" class="CaptionBottomContent" width="false">
																			<tbody>
																				<tr>
																					<td class="CaptionBottomImageContent" align="left" valign="top" style="padding:0 9px 9px 9px;"> <img alt="" src="<?=site_url('assets/email/3b516fb1-ffa5-4496-87f7-447fba0a5fea.png')?>" width="164" style="max-width:328px;" class="Image"> </td>
																				</tr>
																				<tr>
																					<td class="TextContent" valign="top" style="padding:0 9px 0 9px;" width="164">
																						<br> "Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit minus."
																						<br>
																						<br> <span style="font-size:12px"><strong>George Brown</strong></span> </td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</table>
										</td>
										<td align="left" valign="top" class="columnsContainer" width="33%">
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
												<tr>
													<td valign="top" class="centerColumnContainer">
														<table border="0" cellpadding="0" cellspacing="0" width="100%" class="CaptionBlock">
															<tbody class="CaptionBlockOuter">
																<tr>
																	<td class="CaptionBlockInner" valign="top" style="padding:9px;">
																		<table align="left" border="0" cellpadding="0" cellspacing="0" class="CaptionBottomContent" width="false">
																			<tbody>
																				<tr>
																					<td class="CaptionBottomImageContent" align="left" valign="top" style="padding:0 9px 9px 9px;"> <img alt="" src="<?=site_url('assets/email/5e98398e-ae6b-4520-b721-2c2a5d614740.png')?>" width="164" style="max-width:328px;" class="Image"> </td>
																				</tr>
																				<tr>
																					<td class="TextContent" valign="top" style="padding:0 9px 0 9px;" width="164">
																						<br> "Voluptatem accusantium doloremque laudantium, totam rem aperiam eaque quae dolor."
																						<br>
																						<br> <strong style="font-size:12px; line-height:20.7999992370605px">Sarah Smith</strong> </td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</table>
										</td>
										<td align="left" valign="top" class="columnsContainer" width="33%">
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
												<tr>
													<td valign="top" class="rightColumnContainer">
														<table border="0" cellpadding="0" cellspacing="0" width="100%" class="CaptionBlock">
															<tbody class="CaptionBlockOuter">
																<tr>
																	<td class="CaptionBlockInner" valign="top" style="padding:9px;">
																		<table align="left" border="0" cellpadding="0" cellspacing="0" class="CaptionBottomContent" width="false">
																			<tbody>
																				<tr>
																					<td class="CaptionBottomImageContent" align="left" valign="top" style="padding:0 9px 9px 9px;"> <img alt="" src="<?=site_url('assets/email/d3714ba9-7799-43de-a2aa-3284eb903f74.png')?>" width="164" style="max-width:328px;" class="Image"> </td>
																				</tr>
																				<tr>
																					<td class="TextContent" valign="top" style="padding:0 9px 0 9px;" width="164">
																						<br> "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur adipisci."
																						<br>
																						<br> <strong style="font-size:12px; line-height:20.7999992370605px">Jessica Clark</strong> </td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- // END COLUMNS -->
							</td>
						</tr>
						<tr>
							<td align="center" valign="top">
								<!-- BEGIN FOOTER // -->
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter" style="background-color:#2f70dd">
									<tr>
										<td valign="top" class="footerContainer" style="padding-bottom:9px;">
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="ImageBlock">
												<tbody class="ImageBlockOuter">
													<tr>
														<td valign="top" style="padding:0px" class="ImageBlockInner">
															<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="ImageContentContainer">
																<tbody>
																	<tr>
																		<td class="ImageContent" valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0;"> <img align="left" alt="" src="<?=site_url('assets/email/83a74d92-32d3-4f40-81f6-df585908f3c9.png')?>" width="600" style="max-width:1200px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="Image"> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="DividerBlock" style="background-color: #2F70DD;">
												<tbody class="DividerBlockOuter">
													<tr>
														<td class="DividerBlockInner" style="padding: 18px 18px 0px;">
															<table class="DividerContent" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td> <span></span> </td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="TextBlock">
												<tbody class="TextBlockOuter">
													<tr>
														<td valign="top" class="TextBlockInner">
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="TextContentContainer">
																<tbody>
																	<tr>
																		<td valign="top" class="TextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
																			<div style="text-align: center;">You are receiving this email because you subscribed our website.&nbsp;If you want to unsubscribe, <a href="#" target="_self">click here</a>.
																				<br>
																				<br> Designed by <a href="<?=site_url()?>" target="_blank">Brilliance</a></div>
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
								</table>
								<!-- // END FOOTER -->
							</td>
						</tr>
					</table>
					<!-- // END TEMPLATE -->
				</td>
			</tr>
		</table>
	</center>
</body>

</html>