<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

get_header('shop'); ?>

		<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
		?>
		
		<div id="leftSection">
			<div id="productRange">

				<h3 class="prange_title">
						<?php 
						$terms1 = get_the_terms( get_the_ID(), 'product_cat' );
						query_posts( 'posts_per_page=20' );
						foreach ( $terms1 as $term ) 
						{
							$catname = $term->name;
							$catslug = $term->slug;
							$url = get_term_link( $term->slug, 'product_cat' );
						}
						echo '<a href="' . $url . '">' . $catname . '</a>';
						//print_r($terms1);
						
						?>

				</h3>
				<ul class="prange">
				<?php echo do_shortcode("[product_category1 category=$catslug]"); ?>
				</ul>
				<h3 class="prange_title">Recommended</h3>
				<ul class="prange">
					<?php 
					if ( function_exists( 'woocommerce_upsell_display' ) ) {

							woocommerce_upsell_display();
					}
					
					?>
				</ul>
			</div>
			
			<div class="container">
				<a href="<?php bloginfo('url'); ?>/join-us/"><img src="<?php bloginfo('template_directory'); ?>/images/join_offer_list_left.jpg" alt="" title="" /></a><br/>
				<a href="<?php bloginfo('url'); ?>/sale/"><img src="<?php bloginfo('template_directory'); ?>/images/shop_on_sale_left.jpg" alt="" title="" /></a><br/>
			</div>
				
		</div>
		<div id="rightSection">
		<?php woocommerce_breadcrumb(); ?>
		<?php
		
		 while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content');
		?>


	</div>
<input type="hidden" name="testshipresult" id="testshipresult" value="">
<?php get_footer('shop'); ?>

<script>
$(document).ready(function(){
$.support.cors = true;
// call your other functions below.....
})
</script>

<script type="text/javascript">
  var  depotid = 0;
  var state1 = "";
  var sub1v = "";
  var state1v = "";

function validatepickup()
{
	if(document.addtocart.pickUp.checked==false)
	{
		alert("Please select pickup shipping");
		return false;
	}
	if(document.addtocart.pickUp.checked==true)
	{
		if(document.addtocart.warehouse.value=="yes")
		{
			fprice.value = 	document.addtocart.warehouse1.value;
		}
	}
}
 
function validate()
{
	var pcode, qty;
	var pcode=document.addtocart.pcode;
	var qty=document.addtocart.quantity;
	var fprice = document.addtocart.freightprice;

	pcode.value=pcode.value.replace(/(^\s+)(\s+$)/, "");
	qty.value=qty.value.replace(/(^\s+)(\s+$)/, "");

	if(document.addtocart.pickUp.checked==false && document.addtocart.Delivery.checked==false && document.addtocart.bigpostdp.checked==false)
	{
		alert("Please select shipping");
		return false;
	}

	if(document.addtocart.pickUp.checked==false)
	{
	
		if ((pcode.value==null)||(pcode.value=="") || isNaN(pcode.value))
		{
			alert("Please type your Shipping Postcode with only numbers for this field")
			pcode.focus();
			return false;
		}
	}
	
	if ((qty.value==null)||(qty.value=="") || isNaN(qty.value))
	{
		alert("Please type Quantity with only numbers for this field")
		qty.focus()
		return false;
	}

	if(jQuery('select.variation_sel').length)
	{
		vval = jQuery('select.variation_sel').val();

		if(vval=="")
		{
			alert("Please select option for the product");
			jQuery('select.variation_sel').focus();
			return false;
		}

	}

	if(document.addtocart.pickUp.checked==false)
	{
	
		if(document.addtocart.bigpost_calc.value=="noshipping")
		{
			document.getElementById('freightp').innerHTML = "$0";
			document.getElementById('bigpost_address').style.display = "block";
			return true;
		}

		if ((fprice.value==null)||(fprice.value=="") || isNaN(fprice.value) || fprice.value==0)
		{
			alert("Please click Calculate Shipping")
			return false;
		}
	}

	if(document.addtocart.pickUp.checked==true)
	{
		if(document.addtocart.warehouse.value=="yes")
		{
			fprice.value = 	document.addtocart.warehouse1.value;
		}
	}

	if(document.addtocart.bigpostdp.checked==true)
	{
		if(document.addtocart.bigpost_suburb.value=="" || document.addtocart.bigpost_suburb.value==null)
		{
			alert("Please input suburb")
			return false;
		}
	}
}


function calc_ship()
{
	var pcode=document.addtocart.pcode;
	var pd_id=document.pdid.pd_id; 
	var qty=document.addtocart.quantity;

	 var xmlHttp = getXMLHttp();

	 xmlHttp.onreadystatechange = function()
	  {
		if(xmlHttp.readyState == 4)
		{
		  HandleResponse(xmlHttp.responseText);
		}
	  }

	 if(document.addtocart.warehouse.value=="yes")
	  {
		xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freight.php?f=" + pcode.value + "&pd=" + pd_id.value + "&qty=" + qty.value + "&whouse=yes", true);
		
	  }
	  if(document.addtocart.warehouse.value=="no")
	  {
		xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freight.php?f=" + pcode.value + "&pd=" + pd_id.value + "&qty=" + qty.value + "&whouse=no", true);
	  }
	  xmlHttp.send(null);
}


function freight1()
{

	var pcode=document.addtocart.pcode;
	var pd_id=document.pdid.pd_id; 
	var qty=document.addtocart.quantity;

	
	if(document.addtocart.Delivery.checked==false && document.addtocart.pickUp.checked==false && document.addtocart.bigpostdp.checked==false)
	{
		alert("Please select shipping mode (pick up, delivery or depot dilvery)");
		document.getElementById('loader').style.display = "none";
		pcode.focus();
		return false;
	}

	if ((pcode.value==null)||(pcode.value=="") || isNaN(pcode.value))
	{
		alert("Please type your Shipping Postcode with only numbers for this field");
		pcode.value="";
		pcode.focus();
		return false;
	}
	else
	{

		var xmlHttp = getXMLHttp();

		if(document.addtocart.bigpost_calc.value=="yes")
		{
				if(document.addtocart.bigpostdp.checked==true)
				{
					document.getElementById('bigpost').style.display = "block";

					if(pcode.value!=document.addtocart.pcode_h.value)
					{
						document.addtocart.bigpost_suburb_h.value="notext";
					}
					
					//alert(suburb.value);

					 xmlHttp.onreadystatechange = function()
					  {
						if(xmlHttp.readyState == 4)
						{
						  HandleResponse1(xmlHttp.responseText);
						}
					  }

					  xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freightdb.php?f=" + pcode.value + "&pd=" + pd_id.value, true);
					  xmlHttp.send(null);

				}
				else
				{

			//		var url = "../../freight.php?f=" + pcode.value + "&url=products/basins/stella400.php&pd=" + pd_id.value + "&qty=" + qty.value;
			//		document.location.href=url;

					
					 
					  xmlHttp.onreadystatechange = function()
					  {
						if(xmlHttp.readyState == 4)
						{
						  HandleResponse2(xmlHttp.responseText);
						}
					  }
					  if(document.addtocart.warehouse.value=="yes")
					  {
						//xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freight.php?f=" + pcode.value + "&pd=" + pd_id.value + "&qty=" + qty.value + "&whouse=yes", true);
						calc_ship();
						return;
					  }
					  if(document.addtocart.warehouse.value=="no")
					  {
						   if(document.addtocart.fontaineshipping.value=="yes")
						   {
								calc_ship();
						   }
						   else
						   {
								xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freightdb1.php?f=" + pcode.value + "&pd=" + pd_id.value, true);
						   }
					  }
					  xmlHttp.send(null);
				}
		}

		if(document.addtocart.bigpost_calc.value=="no")
		{
				  xmlHttp.onreadystatechange = function()
					  {
						if(xmlHttp.readyState == 4)
						{
						  HandleResponse2(xmlHttp.responseText);
						}
					  }
					  if(document.addtocart.warehouse.value=="yes")
					  {
						//xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freight.php?f=" + pcode.value + "&pd=" + pd_id.value + "&qty=" + qty.value + "&whouse=yes", true);
						calc_ship();
						return;
					  }
					  if(document.addtocart.warehouse.value=="no")
					  {
						   if(document.addtocart.fontaineshipping.value=="yes")
						   {
								calc_ship();
						   }
						   else
						   {
								xmlHttp.open("GET", "<?php bloginfo('template_directory'); ?>/freightdb1.php?f=" + pcode.value + "&pd=" + pd_id.value, true);
						   }
					  }
					  xmlHttp.send(null);
		}

	//	var sendData = new ajaxRequest('http://localhost/fontaine/freight.php', 'request=true', showReceived);
	//	sendData.sendPostData();
	}

}

function showReceived(returnData)
{
alert(returnData.responseText);
}

function cal_freight()
{
	var pcode=document.addtocart.pcode;

	if(document.addtocart.pickuponly.value=="yes")
	{
		alert("This product is only for pickup");
		return false;
	}

	if ((pcode.value==null)||(pcode.value=="") || isNaN(pcode.value))
	{
		if(document.addtocart.pickUp.checked==false)
		{

			alert("Please type your Shipping Postcode with only numbers for this field");
			pcode.value="";
			pcode.focus();
			return false;
		}
	}

	if(document.addtocart.bigpost_calc.value=="noshipping")
	{
		document.getElementById('freightp').innerHTML = "$0";
		return true;
	}

	if(pcode.value.length==4)
	{
		//$(".loader").css("display", "block");
		document.getElementById('loader').style.display = "block";
		freight1();

	}

}

function chk1()
{
	document.getElementById('freightp').innerHTML = "$0";
	document.addtocart.freightprice.value="0";

	if(document.addtocart.Delivery.checked==true)
	{
		document.addtocart.Delivery.checked=false;
		if(document.addtocart.warehouse.value=="yes")
		{
			pickupship();
		}
	}

	if(document.addtocart.pickUp.checked==true)
	{
		document.addtocart.pcode.readOnly=true;
		document.addtocart.pcode.value="";

		if(document.addtocart.warehouse.value=="yes")
		{
			document.getElementById('whouse1').style.display = "block";
			document.getElementById('pcode').style.display = "none";
			document.getElementById('calc_shipping').style.display = "none";
			document.getElementById('warehouse_address').style.display = "block";
		}

	}
	if(document.addtocart.pickUp.checked==false)
	{
		document.addtocart.pcode.readOnly=false;
		document.addtocart.pcode.value="";
	}
	if(document.addtocart.bigpostdp.checked==true)
	{
		document.addtocart.bigpostdp.checked=false;
	}
	document.getElementById('bigpost').style.display = "none";
	document.getElementById('bigpost_address').style.display = "none";
}
function chk2()
{
	document.getElementById('freightp').innerHTML = "";
	document.addtocart.freightprice.value="0";
	if(document.addtocart.pickUp.checked==true)
	{
		document.addtocart.pickUp.checked=false;
		document.addtocart.pcode.readOnly=false;
		document.getElementById('freightp').innerHTML = "";
		document.addtocart.freightprice.value="";

		if(document.addtocart.warehouse.value=="yes")
		{
			document.getElementById('whouse1').style.display = "none";
			document.getElementById('pcode').style.display = "block";
			document.getElementById('calc_shipping').style.display = "block";
			document.getElementById('warehouse_address').style.display = "none";
		}
	}
	if(document.addtocart.bigpostdp.checked==true)
	{
		document.addtocart.bigpostdp.checked=false;
	}
	document.getElementById('bigpost').style.display = "none";
	document.getElementById('bigpost_address').style.display = "none";
}

function chk3()
{
	document.getElementById('freightp').innerHTML = "";
	document.addtocart.freightprice.value="0";
	if(document.addtocart.pickUp.checked==true)
	{
		document.addtocart.pickUp.checked=false;
		document.addtocart.pcode.readOnly=false;
		document.getElementById('freightp').innerHTML = "";
		document.addtocart.freightprice.value="";

		if(document.addtocart.warehouse.value=="yes")
		{
			document.getElementById('whouse1').style.display = "none";
			document.getElementById('pcode').style.display = "block";
			document.getElementById('calc_shipping').style.display = "block";
			document.getElementById('warehouse_address').style.display = "none";
		}
	}
	if(document.addtocart.Delivery.checked==true)
	{
		document.addtocart.Delivery.checked=false;
		document.getElementById('freightp').innerHTML = "";
		document.addtocart.freightprice.value="";
	}
	//document.getElementById('bigpost').style.display = "block";
	//document.getElementById('bigpost_address').style.display = "block";
}


function pickupship()
{
	var warehouse1 = document.addtocart.warehouse1;
	var warehouse2 = document.addtocart.warehouse2;
    document.addtocart.freightprice.value=warehouse1.value;
	//alert(warehouse1.options[warehouse1.selectedIndex].text);
	var selindex = warehouse1.selectedIndex;
	warehouse2.selectedIndex = selindex;
	//alert(warehouse2.value);
	if(document.addtocart.warehouse.value=="yes")
	{
		document.getElementById('freightp').innerHTML = "pickup fee: $" + warehouse1.value;
	}
	if(document.addtocart.warehouse.value=="no")
	{
		document.getElementById('freightp').innerHTML = "$" + warehouse1.value;
	}
	document.getElementById('warehouse_address').innerHTML = "<span><b>Pickup Address:</b></span> " + warehouse2.options[warehouse2.selectedIndex].text;
}


function ajaxRequest(theURL, sendString, callbackFunction)
{
var thisRequestObject;

thisRequestObject = initiateRequest();
thisRequestObject.onreadystatechange = processRequest;

function initiateRequest()
{
if (window.XMLHttpRequest)
return new XMLHttpRequest();
elseif (window.ActiveXObject)
return new ActiveXObject("Microsoft.XMLHTTP");
}

function processRequest()
{
if (thisRequestObject.readyState == 4)
{
if (thisRequestObject.status == 200)
{
if (callbackFunction)
callbackFunction(thisRequestObject, sendString);
}
else
alert("There was an error: (" + thisRequestObject.status + ") " + thisRequestObject.statusText);
}
}

this.sendGetData = function()
{
if (theURL)
{
thisRequestObject.open("GET", theURL, true);
thisRequestObject.send(sendString);
}
}

this.sendPostData = function()
{
if (theURL)
{
thisRequestObject.open("POST", theURL, true);
thisRequestObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
thisRequestObject.send(sendString);
}
}
}

//-->


function getXMLHttp()
{
  var xmlHttp

  try
  {
    //Firefox, Opera 8.0+, Safari
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    //Internet Explorer
    try
    {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
      try
      {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e)
      {
        alert("Your browser does not support AJAX!")
        return false;
      }
    }
  }
  return xmlHttp;
}

function HandleResponse(response)
{

   if(response=="error – please contact us")
   {
		document.getElementById('freightp').innerHTML = response;
		document.addtocart.freightprice.value="0";
   }
   else
   {
		document.getElementById('freightp').innerHTML = " $" + response;
		document.addtocart.freightprice.value=response;
   }  
   
 //alert(response);
 document.getElementById('loader').style.display = "none";

	if(response=="N/A")
	{
		document.getElementById('na').style.display = "block";
	}
	else
	{
		document.getElementById('na').style.display = "none";
	}

}

function HandleResponse2(response)
{
   if(response=="N/A")
   {
		calc_ship();
		return;
   }


   var str = response.split(",");
   var pcode=document.addtocart.pcode;
   var qty1=document.addtocart.quantity;
   var valhidden = document.getElementById("testshipresult");
   valhidden.value = response; 


   if(str[4]!="0")
   {
	    tval = (qty1.value * str[4]);
		document.getElementById('freightp').innerHTML = " $" + tval;
		document.addtocart.freightprice.value=str[4];
		document.getElementById('loader').style.display = "none";
		return true;
   }

		$.support.cors = true;
	    query = pcode.value;
	    $.ajax({
		url: "https://www.bigpost.com.au/api/suburbs/",
		dataType: "json",
		type: "GET",
		crossDomain: true,
		data: {q:query},
		beforeSend: function (xhr) {
		xhr.setRequestHeader("AccessToken", "01DC8057805141CEB7F8131E0E15B4EC");
		},
		success: function(response)
		{
			//alert(response);
			console.log(response);
			j = 0;
			s = 0;
			for(var i=0;i<response.length;i++)
			{
				var obj = response[i];
				for(var key in obj)
				{
					if(key=="Suburb")
					{
						attrName = key;
						attrValue = obj[key];
						if(j==0)
						{
							sub1v = attrValue; 
						}
						j++;
						
					}
					if(key=="State")
					{
						attrName = key;
						attrValue = obj[key];
						if(s==0)
						{
							state1v = attrValue; 
						}
						s++;
						
					}
				}
			}

			getQuote1(state1v,sub1v,pcode.value,str[0],str[1],str[2],str[3]);

		},
		error: function(jqXHR, exception) {
				if (jqXHR.status === 0) {
					alert('Not connect.\n Verify Network.');
					calc_ship();
					 return false;
				} else if (jqXHR.status == 404) {
					alert('Requested page not found. [404]');
					calc_ship();
					 return false;
				} else if (jqXHR.status == 500) {
					alert('Internal Server Error [500].');
					calc_ship();
					 return false;
				} else if (exception === 'parsererror') {
					alert('Requested JSON parse failed.');
					calc_ship();
					 return false;
				} else if (exception === 'timeout') {
					alert('Time out error.');
					calc_ship();
					 return false;
				} else if (exception === 'abort') {
					alert('Ajax request aborted.');
					calc_ship();
					 return false;
				} else {
				//	alert('Uncaught Error.\n' + jqXHR.responseText);
					calc_ship();
					 return false;

				}
			}
		});

}

function getQuote1(stt,sub1,pc1,st1,st2,st3,st4)
{
	params = {"FromSuburb":"Hallam","FromState":"VIC","FromPostcode":"3803","DeliveryType":"HDS","ToSuburb":sub1,"ToState":stt,"ToPostcode":pc1,"DeliveryItems":[{"ItemDescription":"Vanity Unit","Quantity":"1","DeadWeight":st1,"Depth":st2,"Width":st3,"Height":st4}]};

	$.support.cors = true;
	$.ajax({
	url: "https://www.bigpost.com.au/api/requestquote/",
	dataType: "xml",
	type: "POST",
	crossDomain: true,
	data: params,
	beforeSend: function (xhr) {
	xhr.setRequestHeader("AccessToken", "01DC8057805141CEB7F8131E0E15B4EC");
	},
	//success: parseXml,
	success: function(xml) 
	{
		 $(xml).find("QuotePrice").each(function()
		{
	
		 t1 = $(this).find("Total").text();
		 t1 = t1.replace("$","");
		 var qty=document.addtocart.quantity;
		 document.addtocart.freightprice.value=t1;
		 t1 = (qty.value) * t1;
		 //alert(t1);
		 document.getElementById('freightp').innerHTML = "$" + t1;
 		 
		});

	},
	error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
				  alert('Not connect.\n Verify Network.');
                  calc_ship();
				  return false;
            } else if (jqXHR.status == 404) {
				 alert('Requested page not found. [404]');
                 calc_ship();
			     return false;
            } else if (jqXHR.status == 500) {
				 alert('Internal Server Error [500].');
				 calc_ship();
				 return false;
            } else if (exception === 'parsererror') {
				 alert('Requested JSON parse failed.');
           		 calc_ship();
				 return false;
            } else if (exception === 'timeout') {
				alert('Time out error.');
            	 calc_ship();
				 return false;
            } else if (exception === 'abort') {
				 alert('Ajax request aborted.');
            	 calc_ship();
				 return false;
            } else {
				//		alert(state1v + "----" + sub1v);
				// alert('Uncaught Error.\n' + jqXHR.responseText);
           		 calc_ship();
				 return false;
            }
        }
	});
	 document.getElementById('loader').style.display = "none";
	return true;
}


function HandleResponse1(response)
{
//	alert(response);
   if(response=="N/A")
   {
		document.getElementById('freightp').innerHTML = response;
		document.addtocart.freightprice.value="0";
		document.getElementById('loader').style.display = "none";
		return false;
   }
   var str = response.split(",");

   var pcode=document.addtocart.pcode;
   document.addtocart.pcode_h.value = pcode.value;
   var suburb=document.addtocart.bigpost_suburb_h;
   var sub1;
   if(suburb.value=="notext")
   {
		$.support.cors = true;
	    query = pcode.value;
	    $.ajax({
		url: "https://www.bigpost.com.au/api/suburbs/",
		dataType: "json",
		type: "GET",
		crossDomain: true,
		data: {q:query},
		beforeSend: function (xhr) {
		xhr.setRequestHeader("AccessToken", "01DC8057805141CEB7F8131E0E15B4EC");
		},
		success: function(response)
		{
			//alert(response);
			$('#bigpost_suburb').empty();   
			$('#bigpost_suburb').append('<option value="0"> Select Suburb </option>');
			console.log(response);
			j = 0;
			for(var i=0;i<response.length;i++)
			{
				var obj = response[i];
				for(var key in obj){
					if(key=="Suburb")
					{
					attrName = key;
					attrValue = obj[key];
					//$("#data").append(attrName + " : " + attrValue + "<br />");
					$('#bigpost_suburb').append('<option value="' + attrValue + '">' + attrValue + '</option>');
						if(j==0)
						{
							document.addtocart.bigpost_suburb_h.value = attrValue; 
							document.addtocart.pcode.value=pcode.value;
							
							//alert(document.addtocart.bigpost_suburb_h.value);
							//alert(document.addtocart.bigpost_suburb_h.value);
						}
						j++;
						
					}
					
				}
			}
			document.getElementById('bigpost_address').innerHTML = "please select suburb from the list";
			return true;

		},
		error: function(jqXHR, exception) {
				if (jqXHR.status === 0) {
					//alert('Not connect.\n Verify Network.');
					document.getElementById('bigpost_address').innerHTML = "Not connect.\n Verify Network.";
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;
				} else if (jqXHR.status == 404) {
					//alert('Requested page not found. [404]');
					document.getElementById('bigpost_address').innerHTML = "Requested page not found. [404]";
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;
				} else if (jqXHR.status == 500) {
					//alert('Internal Server Error [500].');
					document.getElementById('bigpost_address').innerHTML = "Internal Server Error [500].";
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;
				} else if (exception === 'parsererror') {
					//alert('Requested JSON parse failed.');
					document.getElementById('bigpost_address').innerHTML = "Requested JSON parse failed.";
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;
				} else if (exception === 'timeout') {
					//alert('Time out error.');
					document.getElementById('bigpost_address').innerHTML = "Time out error.";
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;
				} else if (exception === 'abort') {
					//alert('Ajax request aborted.');
					document.getElementById('bigpost_address').innerHTML = "Ajax request aborted.";
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;
				} else {
					//alert('Uncaught Error.\n' + jqXHR.responseText);
					document.getElementById('bigpost_address').innerHTML = jqXHR.responseText;
					document.getElementById('bigpost_address').style.display = "block";
					 document.getElementById('freightp').innerHTML = "";
		 			 document.addtocart.freightprice.value="";
					 document.addtocart.bigpost_suburb_h.value = "notext";
					 return false;

				}
			}
		});
	    
   }
  
  if(document.addtocart.bigpost_suburb_h.value!="notext")
  {
	  sub1 = document.addtocart.bigpost_suburb_h.value;
	  //document.addtocart.bigpost_suburb.value = document.addtocart.bigpost_suburb_h.value;
  }
   params = "p=" + pcode.value + "&s=" + sub1;
	$.support.cors = true;
	$.ajax({
	 url: "https://www.bigpost.com.au/api/depots/",
	dataType: "xml",
	type: "GET",
	crossDomain: true,
	data: params,
	beforeSend: function (xhr) {
	xhr.setRequestHeader("AccessToken", "01DC8057805141CEB7F8131E0E15B4EC");
	},
	success: function(xml) 
	{
				i=0;
		  $(xml).find("Depot").each(function()
		  {
			if(i==1)
			  {
					return false;
				 }
				dpsuburb = $(this).find("Suburb").text();
				$address1 = "<b>Depot pickup address</b>: " + $(this).find("DepotName").text() + " - " + $(this).find("Address").text() + ", " + dpsuburb + " (" + $(this).find("Distance").text() + " km from " + sub1 + " ), " + $(this).find("State").text() + ".";
				 document.getElementById('bigpost_address').innerHTML  = $address1;
				 depotid = $(this).find("DepotId").text();
				 state1 = $(this).find("State").text();
				 

				 document.addtocart.bigpost_add.value=$(this).find("DepotName").text() + " - " + $(this).find("Address").text() + ", " + dpsuburb + " (" + $(this).find("Distance").text() + " km from " + sub1 + " ), " + $(this).find("State").text() + ".";

				
				
		 //   $("#bigpost_address").append("Address: " + $(this).find("Address").text() + "<br />");
		//	$("#data").append("DepotId: " + $(this).find("DepotId").text() + "<br />");
		//	$("#data").append("Depotname: " + $(this).find("DepotName").text() + "<br />");
		//	$("#data").append("Distance: " + $(this).find("Distance").text() + "<br />");
		//	$("#bigpost_address").append("Latitude: " + $(this).find("Latitude").text() + "&nbsp;&nbsp;&nbsp;&nbsp;");
		//	$("#bigpost_address").append("Longitude: " + $(this).find("Longitude").text() + "&nbsp;");
			$("#bigpost_address").show();
		//	$("#data").append("Postcode: " + $(this).find("Postcode").text() + "<br />");
		//	$("#data").append("Suburb: " + $(this).find("Suburb").text() + "<br />");

			i++;
		  });
		//  document.getElementById('loader').style.display = "none";
		 // return true;
		 getQuote(depotid,state1,suburb.value,pcode.value,str[0],str[1],str[2],str[3]);

	},
	error: function(jqXHR, exception) {
			if (jqXHR.status === 0) {
               // alert('Not connect.\n Verify Network.');
				document.getElementById('bigpost_address').innerHTML = "Not connect.\n Verify Network.";
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            } else if (jqXHR.status == 404) {
               // alert('Requested page not found. [404]');
			   document.getElementById('bigpost_address').innerHTML = "Requested page not found. [404]";
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            } else if (jqXHR.status == 500) {
               // alert('Internal Server Error [500].');
				document.getElementById('bigpost_address').innerHTML = "Internal Server Error [500].";
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            } else if (exception === 'parsererror') {
               // alert('Requested JSON parse failed.');
			   document.getElementById('bigpost_address').innerHTML = "Requested JSON parse failed.";
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            } else if (exception === 'timeout') {
               // alert('Time out error.');
				 document.getElementById('bigpost_address').innerHTML = "Time out error.";
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            } else if (exception === 'abort') {
              //  alert('Ajax request aborted.');
				 document.getElementById('bigpost_address').innerHTML = "Ajax request aborted.";
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            } else {
               // alert('Uncaught Error.\n' + jqXHR.responseText);
				 document.getElementById('bigpost_address').innerHTML = jqXHR.responseText;
				document.getElementById('bigpost_address').style.display = "block";
				document.getElementById('loader').style.display = "none";
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            }
        }
	});

}

//getQuote(depotid,state1,suburb.value,pcode.value,str[0],str[1],str[2],str[3]);
function getQuote(dpid,stt,sub1,pc1,st1,st2,st3,st4)
{
		//	alert(dpid + " " + stt + " " + sub1 + " " + pc1 + " " + st1 + " " + st2 + " " + st3 + " " + st4);
	 //depotid = depotid;
	 //state1 = state1;

	//params = {"FromSuburb":"Hallam","FromState":"VIC","FromPostcode":"3803","DeliveryType":"DEPOT","ToSuburb":"Perth","ToState":"WA","ToPostcode":"6000","DepotId":"121","DeliveryItems":[{"ItemDescription":"Vanity Unit","Quantity":"1","DeadWeight":"40","Depth":"70","Width":"60","Height":"110"}]};

	params = {"FromSuburb":"Hallam","FromState":"VIC","FromPostcode":"3803","DeliveryType":"DEPOT","ToSuburb":sub1,"ToState":stt,"ToPostcode":pc1,"DepotId":dpid,"DeliveryItems":[{"ItemDescription":"Vanity Unit","Quantity":"1","DeadWeight":st1,"Depth":st2,"Width":st3,"Height":st4}]}
	$.support.cors = true;
	$.ajax({
	url: "https://www.bigpost.com.au/api/requestquote/",
	dataType: "xml",
	type: "POST",
	crossDomain: true,
	data: params,
	beforeSend: function (xhr) {
	xhr.setRequestHeader("AccessToken", "01DC8057805141CEB7F8131E0E15B4EC");
	},
	//success: parseXml,
	success: function(xml) 
	{
		 $(xml).find("QuotePrice").each(function()
		{
	
		 t1 = $(this).find("Total").text();
		 t1 = t1.replace("$","");
		 var qty=document.addtocart.quantity;
		 document.addtocart.freightprice.value=t1;
		 t1 = (qty.value) * t1;
		 //alert(t1);
		 document.getElementById('freightp').innerHTML = "$" + t1;
 		 
		});

	},
	error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 return false;
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 return false;
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].sssd' + jqXHR.responseText);
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 return false;
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 return false;
            } else if (exception === 'timeout') {
                alert('Time out error.');
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 return false;
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 return false;
            } else {
                alert(jqXHR.responseText);
				 document.getElementById('freightp').innerHTML = "";
		 		 document.addtocart.freightprice.value="";
				 document.addtocart.bigpost_suburb_h.value = "notext";
				 return false;
            }
        }
	});
  document.getElementById('loader').style.display = "none";
  return true;
}

function suburb1()
{
	if(document.addtocart.bigpost_suburb.value=="0")
	{
		alert("Please select suburb");
		return false;
	}
	document.addtocart.bigpost_suburb_h.value = document.addtocart.bigpost_suburb.value;
	cal_freight();
}

</script> 


<script type="text/javascript">
$(document).ready(function() {
   $('#product_cart #penquiry').click(function() {
		//alert('ddddddd');
    });
});
</script>	

<?php
if(isset($_SESSION['pickup_shipname']))
{ 
?>
	<script type="text/javascript">
		if(document.addtocart.warehouse.value=="yes")
		{
			document.getElementById('whouse1').style.display = "block";
			document.getElementById('pcode').style.display = "none";
			document.getElementById('calc_shipping').style.display = "none";
			document.getElementById('warehouse_address').style.display = "block";
		}
	</script>
<?php
}

if($_SESSION['BigPostDB']=="on")
{ 
?>
	<script type="text/javascript">
			document.getElementById('bigpost').style.display = "block";
			document.getElementById('bigpost_address').style.display = "block";
			 document.getElementById('bigpost_address').innerHTML = "<b>Depot pickup address</b>: " + document.addtocart.bigpost_add.value;
		   document.addtocart.pcode_h.value = document.addtocart.pcode.value;
	</script>
<?php
}


if(isset($_SESSION['pcode']))
{ 
	$p1="no";
	if(get_post_meta(get_the_ID(), 'pickuponly', true ))
	{
		$p1="yes";
	}

	if($p1=="no")
	{
?>
	<script type="text/javascript">
		cal_freight();
	</script>
<?php
	}
}
