<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
	<title>AdminLTE | Dashboard</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


   {{ template:metadata }}

		{{ asset:css file="bootstrap.min.css" group="styles"}}
		{{ asset:css file="font-awesome.css" group="styles"}}
		 {{ asset:css file="ionicons.css" group="styles"}}
		 {{ asset:css file="AdminLTE.css" group="styles"}}

  {{ asset:render  group="styles"}}




</head>
<body class="skin-blue">

   {{ template:body }}

<!-- footer scripts -->
{{ asset:js file="jquery/2.0.2/jquery.min.js" group="footer_js" }}
		 {{ asset:js file="jquery-ui-1.10.3.min.js" group="footer_js" }}
		 {{ asset:js file="bootstrap.min.js" group="footer_js" }}
         {{ asset:js file="plugins/datatables/jquery.dataTables.js" group="footer_js" }}

         {{ asset:js file="plugins/datatables/dataTables.bootstrap.js" group="footer_js" }}
		 {{ asset:js file="AdminLTE/app.js" group="footer_js" }}

		 {{ asset:js file="AdminLTE/demo.js" group="footer_js" }}
  {{ asset:render  group="footer_js"}}
   <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

</body>
</html>