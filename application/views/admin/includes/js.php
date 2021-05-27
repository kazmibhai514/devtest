	<script src="<?= base_url() ?>assetsAdmin/js/jquery.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/js/tether.min.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/unifyMenu/unifyMenu.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/onoffcanvas/onoffcanvas.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/js/moment.js"></script>

	<!-- Slimscroll JS -->
	<script src="<?= base_url() ?>assetsAdmin/vendor/slimscroll/slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/slimscroll/custom-scrollbar.js"></script>

	<!-- Chartist JS -->
	<script src="<?= base_url() ?>assetsAdmin/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/chartist/js/chartist-tooltip.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/chartist/js/custom/custom-area-chart.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/chartist/js/custom/donut-chart4.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/chartist/js/custom/custom-compare-line.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script> -->
	<script src="<?= base_url() ?>assetsAdmin/vendor/datatables/dataTables.min.js"></script>
	<script src="<?= base_url() ?>assetsAdmin/vendor/datatables/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
			<script src="<?= base_url() ?>assetsAdmin/vendor/flot/jquery.flot.min.js"></script>

			<script src="<?= base_url() ?>assetsAdmin/vendor/flot/jquery.flot.pie.min.js"></script>

			<script src="<?= base_url() ?>iiiassetsAdmin/vendor/flot/custom/pie.js"></script>
			<script src="<?= base_url() ?>assetsAdmin/vendor/morris/raphael-min.js"></script>
		<script src="<?= base_url() ?>assetsAdmin/vendor/morris/morris.min.js"></script>
		<script src="<?= base_url() ?>assetsAdmin/vendor/morris/custom/donutFormatter.js"></script>

	<script type="text/javascript" src="<?=base_url();?>assetsAdmin/vendor/editor/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assetsAdmin/vendor/editor/ckfinder/ckfinder.js"></script>
	<script src="<?=base_url();?>assetsAdmin/vendor/calendar/js/fullcalendar.min.js"></script>
	<script type="text/javascript">

//CKFinder.setupCKEditor( editor, '../' );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- Common JS -->
<script src="<?= base_url() ?>assetsAdmin/js/common.js"></script>
<script src="<?= base_url() ?>assetsAdmin/js/select2.min.js"></script>
<script type="text/javascript">
	var example=null;
	var tableval=null;
	function add_data(type,id='',action='',select_id='',valid='',tablename='',key='') 
	{   
		if(id=='')
		{
			$("#extraModel").modal();
			$("#extraTitle").html(type);
			$("#extraBoday").html("<h2 class='text-center'><span class='icon-spinner3'></span></h2>");
		}
		if(select_id=='')
		{
			var url="<?php echo base_url(); ?>admin/get_forms";

		}
		else
		{
			var url="<?php echo base_url(); ?>admin/get_forms?select_id="+select_id;

		}

		$.post(url,{'type':type,'id':valid,'tablename':tablename,'key':key}, 
			function(data)
			{
				console.log(data);
				if (example!=null && example.data('select2')) {
					example.select2("destroy");
				}
				$("input"). removeAttr("onkeypress");

				if(id=='')
				{
					$("#extraBoday").html(data); 
					if(type=='dailyroi')
					{
						setTimeout(function(){setCalander();monthlyroi()},2000);
					}	

				}
				else
				{
					if(action=='')
					{
						$("#"+id).html(data); 	

					}
					else
					{

						$("#"+id).append(data); 
							/*var ab=document.getElementById(id);
							var iddel="<div id='"+id+"'></div>";
							document.getElementById(id).innerHTML+=data;
							$("#"+id).removeAttr("id");
							ab.innerHTML+=iddel;
							ab.style.width='100%';	*/

						}

					}
					
					
					setSelect2();
					setHTMLEditor();


				});

	}
	function add_data_ac(type,id='',action='',select_id='',valid='') 
	{   
		if(id=='')
		{
			$("#extraModel").modal();
			$("#extraTitle").html(type);
			$("#extraBoday").html("<h2 class='text-center'><span class='icon-spinner3'></span></h2>");
		}
		if(select_id=='')
		{
			var url="<?php echo base_url(); ?>admin/get_forms";

		}
		else
		{
			var url="<?php echo base_url(); ?>admin/get_forms?select_id="+select_id;

		}
		$.post(url,{'type':type,'id':valid}, 
			function(data)
			{
				console.log(data);
				if (example!=null && example.data('select2')) {
					example.select2("destroy");
				}
				$("input"). removeAttr("onkeypress");

				if(id=='')
				{
					$("#extraBoday").html(data); 	

				}
				else
				{
						//alert(data);
						var newDiv = $(data);  //create Div Element w/ jquery
						$( "#"+id ).after(data);
						// var textnode = document.createContextualFragment(data);
						//document.getElementById('form_data').insertBefore(textnode, document.getElementById(id));
					}
					
					
					setSelect2();
					setHTMLEditor();

				});

	}  
	function checkval(thisd,val)
	{
		if($(thisd). prop("checked")==true ){
			$( val ).prop( "checked", true );
		}
		else if($(thisd). prop("checked")==false){
			$( val ).prop( "checked", false );
		}
	}
	function checkedall(val)
	{
		if($(val). prop("checked")==true ){
			$( val ).prop( "checked", false );
		}
		else if($(val). prop("checked")==false){
			$( val ).prop( "checked", true );
		}
	}
	function displayclass(val)
	{
		
		$( val ).css( "display", "block" );

	}
	function add_data2(type,id='',select_id='') 
	{   

		$("#extraModel").modal();
		$("#extraTitle").html("Add "+type);
		$("#extraBoday").html("<h2 class='text-center'><span class='icon-spinner3'></span></h2>");

		if(select_id=='')
		{
			var url="<?php echo base_url(); ?>admin/get_forms";

		}
		else
		{
			var url="<?php echo base_url(); ?>admin/get_forms?select_id="+select_id;

		}
		$.post(url,{'type':type,'id':id}, 
			function(data)
			{
				console.log(data);


				$("#extraBoday").html(data); 	


				setSelect2();
				setHTMLEditor();

			});

	}
	function getInsData(val)
	{
		if(val=='BPV' || val=='BRV')
		{

			document.getElementById('insmaindatavalue').innerHTML=document.getElementById('insdata').innerHTML;
		}
		else
		{
			document.getElementById('insmaindatavalue').innerHTML="";
		}
	}
	function calculateval(classval,id)
	{
		var maintotal=0;
		var slides = document.getElementsByClassName(classval);
		for (var i = 0; i < slides.length; i++) {

			if(slides.item(i).value!="")
			{
				maintotal+=parseInt(slides.item(i).value);
			}
		}
		document.getElementById(id).value=maintotal;
	}
	function submit_form(id,url,at='')
	{
		if(document.getElementById("editor1")!=null)
		{
			var value = CKEDITOR.instances['editor1'].getData();
			$("#editordata1").val(value);
			//alert("");
		}

		var form = new FormData($(id)[0]);
		$.ajax({
			type: "POST",
			url: '<?php echo base_url(); ?>'+url,
			data: form,
			cache: false,
			contentType: false,
			processData: false,
			success: function(res)
			{
				//alert(res);

				var dataval=res;
				dataval=dataval.split(",");
				if(dataval[1]=="error")
				{
					alert(dataval[0]);
				}
				else
				{
					if(at!='')
					{
						add_data(at);
					}
					else
					{
						console.log(res);
						location.reload();
					}
				}



			}

		});
		return false;
	}
	function open_model(id)
	{
		$(id).modal();
	}

	function deleteRecord(key,value,tableName,table2="",key2="",value2="",table3="",key3="",value3="")
	{
		var file = 'image';
		var file_path = 'assetsAdmin/cms_images/';
		if (confirm("Are you sure to delete?"))
		{  
			$.post("<?php echo base_url(); ?>Admin/deleteRecord",{key,value,tableName,file,file_path}, 
				function(data)
				{
					$("#row"+value).hide();
					$("#flash_data").html(data);
				});
			if(table2!="")
			{
				$.post("<?php echo base_url(); ?>Admin/deleteRecord",{"key":key2,"value":value2,"tableName":table2,file,file_path}, function(data){	console.log(data);  });
			}
			if(table3!="")
			{
				$.post("<?php echo base_url(); ?>Admin/deleteRecord",{"key":key3,"value":value3,"tableName":table3,file,file_path}, function(data){	console.log(data);  });
			}

		}
	}
	function updateRecord(tableName,key,value,ukey,uvalue)
	{

		if (confirm("Are you sure to Update?"))
		{  
			$.post("<?php echo base_url(); ?>Admin/updateRecord",{key,value,tableName,ukey,uvalue}, 
				function(data)
				{
					location.reload();

				});


		}
	}
	function update(id,type,tablename='',key='')
	{

		$("#extraModel").modal();
		$("#extraTitle").html(type);
		$("#extraBoday").html("<h2 class='text-center'><span class='icon-spinner3'></span></h2>");
		$.post("<?php echo base_url(); ?>admin/get_forms",{'type':type,'id':id,'tablename':tablename,'key':key}, 
			function(data)
			{
				console.log(data);

				$("#extraBoday").html(data);
				setTimeout(function(){	setSelect2();
					setHTMLEditor(); }, 1000);


			});

	}
	function setSelect2()
	{
		example=$(".select2").select2();

		$('.select2').css('width', '100%');


	}
	function setIdHtmlEmpty(id)
	{
		document.getElementById(id).innerHTML="";
	}
	function getSearch(val)
	{
		  tableval=tableval.search(val).draw();
	}
	function setHTMLEditor()
	{
			/*ClassicEditor.create(document.querySelector('#editor1')).then(function (editor) {
			})
			.catch(function (error) {
				console.error(error)
			})

			$('.textarea').wysihtml5({
				toolbar: { fa: true }
			})*/
			//$('.textarea').summernote();

			var editor = CKEDITOR.replace( 'editor1', {
				language: 'en'   
			});

		}
		setSelect2();
		function doit_onkeypress(event){
			if (event.keyCode ==32 || event.which == 32){
				$('.adddatabtn').click();
			}
		}
		$(function(){
			 tableval=$('table').DataTable({dom: 'Bfrtip',
				buttons: [
				'print','excel'
				]
			});
		});
		function checkBoxItem(val)
		{

			var slides = document.getElementsByClassName(val);
			for (var i = 0; i <=slides.length; i++) {
				//alert(i);
				
				if(document.getElementsByClassName(val)[i].checked==true ){
					//alert(slides.item(i).value);
					setIdHtmlEmpty(document.getElementsByClassName(val)[i].value);
				}
				
			}
			calculateval('totaldebit','totaldebit');calculateval('totalcredit','totalcredit');


		}
		function addNextRow(val,type)
		{
			var slides = document.getElementsByClassName(val);
			for (var i = 0; i <=slides.length; i++) {
				//alert(i);
				
				if(document.getElementsByClassName(val)[i].checked==true ){
					//alert(slides.item(i).value);
					//alert(document.getElementsByClassName(val)[i].value);
					add_data_ac(type,document.getElementsByClassName(val)[i].value,'+');

				}
				
			}
			calculateval('totaldebit','totaldebit');calculateval('totalcredit','totalcredit');

		}
		function priceCal(id1,id2,id3)
		{
			var val1=parseInt($(id1).val());
			alert(val1);
			var val2=parseInt($(id2).val());
			alert(val2);
			$(id3).val(val1*val2);
		}
	</script>

