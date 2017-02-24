<?php
/**
 * 
 * @author Krios Mane
 * @version 0.10.0
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */
?>
<div class="row">
	<div class="col-sm-12">
		<form action="<?php echo site_url("plugin/fab_system_logs/download") ?>" method="post">
			<div class="text-center error-box">
				<h2 class="font-xl"><strong><i class="fa fa-fw fa-files-o fa-lg text-warning"></i> System logs</h2>
				<br>
				<p class="lead">
					Click "download" button to retrieve all system logs
				</p>
				<button class="btn btn-default" type="submit"><i class="fa fa-download"></i> <?php echo _("Download") ?></button>
			</div>
		</form>
	</div>
</div>