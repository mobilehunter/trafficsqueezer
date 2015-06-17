<?php error_reporting(5);
	system('service trafficsqueezerd stop');
	system('update-rc.d -f trafficsqueezerd remove');
	system('rm -rf /etc/init.d/trafficsqueezerd');
	system('rm -f /usr/sbin/trafficsqueezerd');

	system("rm -rf ./*~");
	system("rm -rf ./html/*~");
	system("rm -rf ./html/c/*~");
	system("rm -rf ./html/php/*~");
	system("rm -rf ./etc/init.d/*~");
?>
