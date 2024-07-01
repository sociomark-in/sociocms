<?php

if ( ! function_exists('status_badge'))
{
	function status_badge($status){
		$class = '';
		switch ($status) {
			case 'Unpublished':
				$class = 'bg-secondary';
				break;
			case 'Published':
				$class = 'bg-success';
				break;
			case 'Draft':
				$class = 'bg-warning';
				break;
			case 'Archived':
				$class = 'bg-danger';
				break;
			
			default:
				$class = 'bg-secondary';
				break;
		}
		return '<span class="badge '. $class .'">' . $status . '</span>';
	}
}
