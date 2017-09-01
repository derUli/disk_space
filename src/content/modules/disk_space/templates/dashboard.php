<?php
$acl = new ACL ();
if ($acl->hasPermission ( "disk_space" )) {
	function formatSize($bytes) {
		$types = array (
				'B',
				'KB',
				'MB',
				'GB',
				'TB'
		);
		for($i = 0; $bytes >= 1024 && $i < (count ( $types ) - 1); $bytes /= 1024, $i ++)
			;
		return (round ( $bytes, 2 ) . " " . $types [$i]);
	}
	?>
<h2 class="accordion-header"><?php translate("USED_DISK_SPACE");?></h2>
<div class="accordion-content">
<?php

	/* get disk space free (in bytes) */
	$df = disk_free_space ( ULICMS_ROOT );
	/* and get disk space total (in bytes) */
	$dt = disk_total_space ( ULICMS_ROOT );
	/* now we calculate the disk space used (in bytes) */
	$du = $dt - $df;
	/* percentage of disk used - this will be used to also set the width % of the progress bar */
	$dp = sprintf ( '%.2f', ($du / $dt) * 100 );

	/* and we formate the size from bytes to MB, GB, etc. */
	$df = formatSize ( $df );
	$du = formatSize ( $du );
	$dt = formatSize ( $dt );
	?>
<style type='text/css'>
.prgbar {
	background: #A7C6FF;
	width: <?php echo intval($dp); ?>%;
	height: 38px;
	overflow: hidden;
	color: white;
	text-align: center;
	padding-top: 8px;
}
</style>

	<div class='prgbar'><?php translate("disk_used", array("%percent%" => $dp));?></div>

</div>
<?php }?>
