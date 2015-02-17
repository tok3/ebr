<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
	<title>Ihre Energieberater</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11"> 

   {{ theme:css file="font-awesome.min.css"}}

		{{ theme:css file="bootstrap.min.css"}}

		 {{ theme:css file="ionicons.css" group="styles"}}
		 {{ theme:css file="datatables/dataTables.bootstrap.css" group="styles"}}

		{{ asset:css file="fullcalendar/fullcalendar.css" group="styles"}}
		{{ asset:css file="daterangepicker/daterangepicker-bs3.css" group="styles"}}
		 {{ asset:css file="bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" group="styles"}}
		 {{ asset:css file="AdminLTE.css" group="AdminLTE"}}

  {{ asset:render  group="AdminLTE"}}

  {{ asset:render  group="styles"}}

<script type="text/javascript">//<![CDATA[

      var isIE11 = !!(navigator.userAgent.match(/Trident/) && !navigator.userAgent.match(/MSIE/));

if (isIE11) {
  if (typeof window.attachEvent == "undefined" || !window.attachEvent) 
  window.attachEvent = window.addEventListener; 
}
	 var site_url = '<?php echo site_url();?>';
var base_url = '<?php echo base_url();?>';
var uri_string = '<?php echo uri_string();?>';
var base_url = '<?php echo base_url();?>';
var gid = '<?php echo base_url();?>';
var is_mobile = '0';
var uri_segments = new Array(<?php echo "\"" . implode("\", \"",$this->uri->segment_array()) . "\"";?>);

//]]>
</script>
{{ asset:js file="jquery/2.0.2/jquery.min.js" group="footer_js" }}
		 {{ asset:js file="jquery-ui-1.10.3.min.js" group="footer_js" }}
		 {{ asset:js file="bootstrap.min.js" group="footer_js" }}
         {{ asset:js file="plugins/datatables/jquery.dataTables.js" group="footer_js" }}
         {{ asset:js file="plugins/datatables/dataTables.bootstrap.js" group="footer_js" }}


         {{ asset:js file="raphael/2.1.2/raphael-min.js" group="" }}
		 {{ asset:js file="plugins/morris/morris.min.js" group="" }}
		 {{ asset:js file="plugins/sparkline/jquery.sparkline.min.js" group="" }}
		 {{ asset:js file="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" group="" }}
		 {{ asset:js file="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" group="" }}
		 {{ asset:js file="plugins/fullcalendar/fullcalendar.min.js" group="" }}
		 {{ asset:js file="plugins/jqueryKnob/jquery.knob.js" group="" }}
		 {{ asset:js file="plugins/daterangepicker/daterangepicker.js" group="" }}
		 {{ asset:js file="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" group="" }}
		 {{ asset:js file="plugins/iCheck/icheck.min.js" group="" }}

		 {{ asset:js file="AdminLTE/app.js" group="footer_js" }}
		 {{ asset:js file="cp_common.js" group="__footer_js" }}

		 {{ asset:js file="AdminLTE/demo.js" group="demo" }}
  {{ asset:render  group="footer_js"}}


   {{ template:metadata }}

</head>

<body class="skin-eb">

{{ template:body }}

<script type="text/javascript">//<![CDATA[

	  $(document).ready(function() {
		  
		 } );

//]]>
</script>


</body>

</html>