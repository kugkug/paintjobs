<h2>New Paint Job</h2>

<div class="cars">
	<div>
		<img src="assets/images/default_car.png" class="imgLeft">	
	</div>
	
	<div>
		<img src="assets/images/shape_1.png">
	</div>

	<div>

		<img src="assets/images/default_car.png" class="imgRight"> 
	</div>
</div>

<div class="details">
	<form class="frmDetails">
		<div class="form-group">
			<label>Plate No.</label>
			<input type="text" id="txtPlateNo">
		</div>

		<div class="form-group">
			<label>Current Color</label>
			<select id="selCurrCol">
				<option value=""></option>
				<option value="red">Red</option>
				<option value="green">Green</option>
				<option value="blue">Blue</option>
			</select>
		</div>

		<div class="form-group">
			<label>Target Color.</label>
			<select id="selTargetCol">
				<option value=""></option>
				<option value="red">Red</option>
				<option value="green">Green</option>
				<option value="blue">Blue</option>
			</select>
		</div>

		
			<button> Submit </button>
		
	</form>
</div>

<script type="text/javascript" src="assets/js/jquery.js"></script>

<script type="text/javascript">

	$(document).ready(function () {

		$("#selCurrCol").on('change', function () {
			var sCurrCol =	$(this).val();

			if (sCurrCol != "") {
				$(".imgLeft").attr('src', 'assets/images/' + sCurrCol + '_car.png');
			} else {
				$(".imgLeft").attr('src','assets/images/default_car.png');
			}

		});

		$("#selTargetCol").on('change', function () {
			var sCurrCol =	$(this).val();

			if (sCurrCol != "") {
				$(".imgRight").attr('src', 'assets/images/' + sCurrCol + '_car.png');
			} else {
				$(".imgRight").attr('src','assets/images/default_car.png');
			}

		});

		$("button").on('click', function(e) {

			e.preventDefault();
			if ($("#txtPlateNo").val() == "" || $("#selTargetCol").	val() == "") {
				alert("Please fill in Plate Number and Target Color");
			} else {
				var sData 	=	{'plateno' : $("#txtPlateNo").val(), 'currcolor' : $("#selCurrCol").val() ,'targetcolor' : $("#selTargetCol").val()};


				$.ajax({
					url 		: 'save-job',
					type 		: 'POST',
					data 		: sData,
					beforeSend	: function() {
						$("body").css({'pointer-events' : 'none'});
						
					}, 
					success 	: function(result) {
						console.log(result);
						
						$("body").css({'pointer-events' : ''});
						eval(result);
					},
					error 		: function(e) {
						console.log(e.responseText);

						$("body").css({'pointer-events' : ''});

					}
				});
			}
		});

		
	});

</script>