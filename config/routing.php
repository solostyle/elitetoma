<?php

$routing = array(
	'/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3'
	/* keep these separated by slashes */
	/* '/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1/\2/\3' */
);

/* can specify default home page i guess? */
$default['controller'] = 'categories';
$default['action'] = 'index';
