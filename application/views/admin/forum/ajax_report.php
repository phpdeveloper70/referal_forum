<?php if(count($reports)>0){ ?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th width="5%">SNo.</th>
			<th>Report</th>
			<th>Time</th>	
		</tr>
	</thead>
	<tbody>
		<?php $i=0; foreach($reports as $report){ $i++; ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $report->report; ?></td> 
			<td><?php echo $report->report_time; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>