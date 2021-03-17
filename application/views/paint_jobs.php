<div class="paint-jobs">
	<div>
		<h3>Paint Jobs in Progress</h3>
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Plate No.</th>
				<th>Current Color</th>
				<th>Target Color</th>
				<th>Action</th>
			</tr>

			<?php

				$sQueue = "";
				$nCntr 	=	0;
				foreach ($paintjobs[0] as $key => $aValue) {
					if ($nCntr < 5) {
						echo "<tr>
								<td>".$aValue['plateno']."</td>
								<td>".ucfirst($aValue['currentcolor'])."</td>
								<td>".ucfirst($aValue['targetcolor'])."</td>
								<td> <label class='action' data-id='".$aValue['id']."'>Mark as Completed</label></td>
							<tr>
							";
						
					} else {
						$sQueue .= "<tr>
										<td>".$aValue['plateno']."</td>
										<td>".ucfirst($aValue['currentcolor'])."</td>
										<td>".ucfirst($aValue['targetcolor'])."</td>
									<tr>
									";;
					}
					$nCntr++;
				}

			?>
		</table>

		
	</div>

	<div>
		<h3>&nbsp;</h3>
		<table cellspacing="0" cellpadding="0" class="tbl-shop-perf">
			<tr> <th colspan="2">SHOP PERFORMANCE</th></tr>
			<tbody class="tbl-body"></tbody>	
		</table>
	</div>

	
</div>

<div>
	<h3>Paint Jobs in Queue</h3>
	<table cellspacing="0" cellpadding="0">
		<tr>
			<th>Plate No.</th>
			<th>Current Color</th>
			<th>Target Color</th>
		</tr>

		<?=$sQueue;?>
	</table>
</div>

<script type="text/javascript" src="assets/js/jquery.js"></script>

<script type="text/javascript">

	$(document).ready(function () {
	
		$(".action").on('click', function(e) {

			e.preventDefault();
			var vId =	$(this).attr('data-id');

			$.ajax({
				url 		: 'update-job',
				type 		: 'POST',
				data 		: {'id' : vId},
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
		});

		// setInterval('performance()', 5000);

		performance();
	});

	function performance() {
		$.ajax({
			url 		: 'get-performance',
			type 		: 'POST',
			beforeSend	: function() {
				// $("body").css({'pointer-events' : 'none'});
				
			}, 
			success 	: function(result) {
				console.log(result);
				
				// $("body").css({'pointer-events' : ''});
				console.log(result);
				eval(result);
			},
			error 		: function(e) {
				console.log(e.responseText);

				// $("body").css({'pointer-events' : ''});

			}
		});
	}
</script>