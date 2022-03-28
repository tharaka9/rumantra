<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<title>My Account - Rumantra - By ERav Technology</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
	<meta name="author" content="D-THEMES">

	<?php include "include/headerscript1.php"; ?>
	<style>
		.card>.list-group:first-child .list-group-item:first-child {
			border-top-left-radius: 0.35rem;
			border-top-right-radius: 0.35rem;
		}

		.card>.list-group:last-child .list-group-item:last-child {
			border-bottom-right-radius: 0.35rem;
			border-bottom-left-radius: 0.35rem;
		}

		.card-header+.list-group .list-group-item:first-child {
			border-top: 0;
		}

		.list-group {
			display: -webkit-box;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			flex-direction: column;
			padding-left: 0;
			margin-bottom: 0;
		}

		.list-group-item-action {
			width: 100%;
			color: #485260;
			text-align: inherit;
		}

		.list-group-item-action:hover,
		.list-group-item-action:focus {
			z-index: 1;
			color: #485260;
			text-decoration: none;
			background-color: #eff3f9;
		}

		.list-group-item-action:active {
			color: #687281;
			background-color: #e3e6ec;
		}

		.list-group-item {
			position: relative;
			display: block;
			padding: 0.75rem 1.25rem;
			background-color: #fff;
			border: 1px solid rgba(0, 0, 0, 0.125);
		}

		.list-group-item:first-child {
			border-top-left-radius: 0.35rem;
			border-top-right-radius: 0.35rem;
		}

		.list-group-item:last-child {
			border-bottom-right-radius: 0.35rem;
			border-bottom-left-radius: 0.35rem;
		}

		.list-group-item.disabled,
		.list-group-item:disabled {
			color: #687281;
			pointer-events: none;
			background-color: #fff;
		}

		.list-group-item.active {
			z-index: 2;
			color: #fff;
			background-color: #0061f2;
			border-color: #0061f2;
		}

		.list-group-item+.list-group-item {
			border-top-width: 0;
		}

		.list-group-item+.list-group-item.active {
			margin-top: -1px;
			border-top-width: 1px;
		}

		.list-group-horizontal {
			-webkit-box-orient: horizontal;
			-webkit-box-direction: normal;
			flex-direction: row;
		}

		.list-group-horizontal .list-group-item:first-child {
			border-bottom-left-radius: 0.35rem;
			border-top-right-radius: 0;
		}

		.list-group-horizontal .list-group-item:last-child {
			border-top-right-radius: 0.35rem;
			border-bottom-left-radius: 0;
		}

		.list-group-horizontal .list-group-item.active {
			margin-top: 0;
		}

		.list-group-horizontal .list-group-item+.list-group-item {
			border-top-width: 1px;
			border-left-width: 0;
		}

		.list-group-horizontal .list-group-item+.list-group-item.active {
			margin-left: -1px;
			border-left-width: 1px;
		}

		@media (min-width: 576px) {
			.list-group-horizontal-sm {
				-webkit-box-orient: horizontal;
				-webkit-box-direction: normal;
				flex-direction: row;
			}

			.list-group-horizontal-sm .list-group-item:first-child {
				border-bottom-left-radius: 0.35rem;
				border-top-right-radius: 0;
			}

			.list-group-horizontal-sm .list-group-item:last-child {
				border-top-right-radius: 0.35rem;
				border-bottom-left-radius: 0;
			}

			.list-group-horizontal-sm .list-group-item.active {
				margin-top: 0;
			}

			.list-group-horizontal-sm .list-group-item+.list-group-item {
				border-top-width: 1px;
				border-left-width: 0;
			}

			.list-group-horizontal-sm .list-group-item+.list-group-item.active {
				margin-left: -1px;
				border-left-width: 1px;
			}
		}

		@media (min-width: 768px) {
			.list-group-horizontal-md {
				-webkit-box-orient: horizontal;
				-webkit-box-direction: normal;
				flex-direction: row;
			}

			.list-group-horizontal-md .list-group-item:first-child {
				border-bottom-left-radius: 0.35rem;
				border-top-right-radius: 0;
			}

			.list-group-horizontal-md .list-group-item:last-child {
				border-top-right-radius: 0.35rem;
				border-bottom-left-radius: 0;
			}

			.list-group-horizontal-md .list-group-item.active {
				margin-top: 0;
			}

			.list-group-horizontal-md .list-group-item+.list-group-item {
				border-top-width: 1px;
				border-left-width: 0;
			}

			.list-group-horizontal-md .list-group-item+.list-group-item.active {
				margin-left: -1px;
				border-left-width: 1px;
			}
		}

		@media (min-width: 992px) {
			.list-group-horizontal-lg {
				-webkit-box-orient: horizontal;
				-webkit-box-direction: normal;
				flex-direction: row;
			}

			.list-group-horizontal-lg .list-group-item:first-child {
				border-bottom-left-radius: 0.35rem;
				border-top-right-radius: 0;
			}

			.list-group-horizontal-lg .list-group-item:last-child {
				border-top-right-radius: 0.35rem;
				border-bottom-left-radius: 0;
			}

			.list-group-horizontal-lg .list-group-item.active {
				margin-top: 0;
			}

			.list-group-horizontal-lg .list-group-item+.list-group-item {
				border-top-width: 1px;
				border-left-width: 0;
			}

			.list-group-horizontal-lg .list-group-item+.list-group-item.active {
				margin-left: -1px;
				border-left-width: 1px;
			}
		}

		@media (min-width: 1200px) {
			.list-group-horizontal-xl {
				-webkit-box-orient: horizontal;
				-webkit-box-direction: normal;
				flex-direction: row;
			}

			.list-group-horizontal-xl .list-group-item:first-child {
				border-bottom-left-radius: 0.35rem;
				border-top-right-radius: 0;
			}

			.list-group-horizontal-xl .list-group-item:last-child {
				border-top-right-radius: 0.35rem;
				border-bottom-left-radius: 0;
			}

			.list-group-horizontal-xl .list-group-item.active {
				margin-top: 0;
			}

			.list-group-horizontal-xl .list-group-item+.list-group-item {
				border-top-width: 1px;
				border-left-width: 0;
			}

			.list-group-horizontal-xl .list-group-item+.list-group-item.active {
				margin-left: -1px;
				border-left-width: 1px;
			}
		}

		.list-group-flush .list-group-item {
			border-right-width: 0;
			border-left-width: 0;
			border-radius: 0;
		}

		.list-group-flush .list-group-item:first-child {
			border-top-width: 0;
		}

		.list-group-flush:last-child .list-group-item:last-child {
			border-bottom-width: 0;
		}

		.list-group-item-primary {
			color: #00327e;
			background-color: #b8d3fb;
		}

		.list-group-item-primary.list-group-item-action:hover,
		.list-group-item-primary.list-group-item-action:focus {
			color: #00327e;
			background-color: #a0c4fa;
		}

		.list-group-item-primary.list-group-item-action.active {
			color: #fff;
			background-color: #00327e;
			border-color: #00327e;
		}

		.list-group-item-secondary {
			color: #370067;
			background-color: #d5b8ef;
		}

		.list-group-item-secondary.list-group-item-action:hover,
		.list-group-item-secondary.list-group-item-action:focus {
			color: #370067;
			background-color: #c9a3ea;
		}

		.list-group-item-secondary.list-group-item-action.active {
			color: #fff;
			background-color: #370067;
			border-color: #370067;
		}

		.list-group-item-success {
			color: #005937;
			background-color: #b8e8d5;
		}

		.list-group-item-success.list-group-item-action:hover,
		.list-group-item-success.list-group-item-action:focus {
			color: #005937;
			background-color: #a5e2ca;
		}

		.list-group-item-success.list-group-item-action.active {
			color: #fff;
			background-color: #005937;
			border-color: #005937;
		}

		.list-group-item-info {
			color: #006c6f;
			background-color: #b8f2f3;
		}

		.list-group-item-info.list-group-item-action:hover,
		.list-group-item-info.list-group-item-action:focus {
			color: #006c6f;
			background-color: #a2eeef;
		}

		.list-group-item-info.list-group-item-action.active {
			color: #fff;
			background-color: #006c6f;
			border-color: #006c6f;
		}

		.list-group-item-warning {
			color: #7f5400;
			background-color: #fce5b8;
		}

		.list-group-item-warning.list-group-item-action:hover,
		.list-group-item-warning.list-group-item-action:focus {
			color: #7f5400;
			background-color: #fbdca0;
		}

		.list-group-item-warning.list-group-item-action.active {
			color: #fff;
			background-color: #7f5400;
			border-color: #7f5400;
		}

		.list-group-item-danger {
			color: #790b00;
			background-color: #f9bdb8;
		}

		.list-group-item-danger.list-group-item-action:hover,
		.list-group-item-danger.list-group-item-action:focus {
			color: #790b00;
			background-color: #f7a7a0;
		}

		.list-group-item-danger.list-group-item-action.active {
			color: #fff;
			background-color: #790b00;
			border-color: #790b00;
		}

		.list-group-item-light {
			color: #7c7e81;
			background-color: #fbfcfd;
		}

		.list-group-item-light.list-group-item-action:hover,
		.list-group-item-light.list-group-item-action:focus {
			color: #7c7e81;
			background-color: #eaeff5;
		}

		.list-group-item-light.list-group-item-action.active {
			color: #fff;
			background-color: #7c7e81;
			border-color: #7c7e81;
		}

		.list-group-item-dark {
			color: #101722;
			background-color: #c0c4ca;
		}

		.list-group-item-dark.list-group-item-action:hover,
		.list-group-item-dark.list-group-item-action:focus {
			color: #101722;
			background-color: #b2b7be;
		}

		.list-group-item-dark.list-group-item-action.active {
			color: #fff;
			background-color: #101722;
			border-color: #101722;
		}

		.list-group-item-black {
			color: black;
			background-color: #b8b8b8;
		}

		.list-group-item-black.list-group-item-action:hover,
		.list-group-item-black.list-group-item-action:focus {
			color: black;
			background-color: #ababab;
		}

		.list-group-item-black.list-group-item-action.active {
			color: #fff;
			background-color: black;
			border-color: black;
		}

		.list-group-item-white {
			color: #858585;
			background-color: white;
		}

		.list-group-item-white.list-group-item-action:hover,
		.list-group-item-white.list-group-item-action:focus {
			color: #858585;
			background-color: #f2f2f2;
		}

		.list-group-item-white.list-group-item-action.active {
			color: #fff;
			background-color: #858585;
			border-color: #858585;
		}

		.list-group-item-red {
			color: #790b00;
			background-color: #f9bdb8;
		}

		.list-group-item-red.list-group-item-action:hover,
		.list-group-item-red.list-group-item-action:focus {
			color: #790b00;
			background-color: #f7a7a0;
		}

		.list-group-item-red.list-group-item-action.active {
			color: #fff;
			background-color: #790b00;
			border-color: #790b00;
		}

		.list-group-item-orange {
			color: #803400;
			background-color: #fdd4b8;
		}

		.list-group-item-orange.list-group-item-action:hover,
		.list-group-item-orange.list-group-item-action:focus {
			color: #803400;
			background-color: #fcc59f;
		}

		.list-group-item-orange.list-group-item-action.active {
			color: #fff;
			background-color: #803400;
			border-color: #803400;
		}

		.list-group-item-yellow {
			color: #7f5400;
			background-color: #fce5b8;
		}

		.list-group-item-yellow.list-group-item-action:hover,
		.list-group-item-yellow.list-group-item-action:focus {
			color: #7f5400;
			background-color: #fbdca0;
		}

		.list-group-item-yellow.list-group-item-action.active {
			color: #fff;
			background-color: #7f5400;
			border-color: #7f5400;
		}

		.list-group-item-green {
			color: #005937;
			background-color: #b8e8d5;
		}

		.list-group-item-green.list-group-item-action:hover,
		.list-group-item-green.list-group-item-action:focus {
			color: #005937;
			background-color: #a5e2ca;
		}

		.list-group-item-green.list-group-item-action.active {
			color: #fff;
			background-color: #005937;
			border-color: #005937;
		}

		.list-group-item-teal {
			color: #00614d;
			background-color: #b8ece1;
		}

		.list-group-item-teal.list-group-item-action:hover,
		.list-group-item-teal.list-group-item-action:focus {
			color: #00614d;
			background-color: #a4e7d9;
		}

		.list-group-item-teal.list-group-item-action.active {
			color: #fff;
			background-color: #00614d;
			border-color: #00614d;
		}

		.list-group-item-cyan {
			color: #006c6f;
			background-color: #b8f2f3;
		}

		.list-group-item-cyan.list-group-item-action:hover,
		.list-group-item-cyan.list-group-item-action:focus {
			color: #006c6f;
			background-color: #a2eeef;
		}

		.list-group-item-cyan.list-group-item-action.active {
			color: #fff;
			background-color: #006c6f;
			border-color: #006c6f;
		}

		.list-group-item-blue {
			color: #00327e;
			background-color: #b8d3fb;
		}

		.list-group-item-blue.list-group-item-action:hover,
		.list-group-item-blue.list-group-item-action:focus {
			color: #00327e;
			background-color: #a0c4fa;
		}

		.list-group-item-blue.list-group-item-action.active {
			color: #fff;
			background-color: #00327e;
			border-color: #00327e;
		}

		.list-group-item-indigo {
			color: #2e0079;
			background-color: #d0b8f9;
		}

		.list-group-item-indigo.list-group-item-action:hover,
		.list-group-item-indigo.list-group-item-action:focus {
			color: #2e0079;
			background-color: #c0a0f7;
		}

		.list-group-item-indigo.list-group-item-action.active {
			color: #fff;
			background-color: #2e0079;
			border-color: #2e0079;
		}

		.list-group-item-purple {
			color: #370067;
			background-color: #d5b8ef;
		}

		.list-group-item-purple.list-group-item-action:hover,
		.list-group-item-purple.list-group-item-action:focus {
			color: #370067;
			background-color: #c9a3ea;
		}

		.list-group-item-purple.list-group-item-action.active {
			color: #fff;
			background-color: #370067;
			border-color: #370067;
		}

		.list-group-item-pink {
			color: #76002e;
			background-color: #f7b8d1;
		}

		.list-group-item-pink.list-group-item-action:hover,
		.list-group-item-pink.list-group-item-action:focus {
			color: #76002e;
			background-color: #f4a1c2;
		}

		.list-group-item-pink.list-group-item-action.active {
			color: #fff;
			background-color: #76002e;
			border-color: #76002e;
		}

		.list-group-item-red-soft {
			color: #7c6767;
			background-color: #faefef;
		}

		.list-group-item-red-soft.list-group-item-action:hover,
		.list-group-item-red-soft.list-group-item-action:focus {
			color: #7c6767;
			background-color: #f4dcdc;
		}

		.list-group-item-red-soft.list-group-item-action.active {
			color: #fff;
			background-color: #7c6767;
			border-color: #7c6767;
		}

		.list-group-item-orange-soft {
			color: #7d6f67;
			background-color: #fbf4ef;
		}

		.list-group-item-orange-soft.list-group-item-action:hover,
		.list-group-item-orange-soft.list-group-item-action:focus {
			color: #7d6f67;
			background-color: #f6e6db;
		}

		.list-group-item-orange-soft.list-group-item-action.active {
			color: #fff;
			background-color: #7d6f67;
			border-color: #7d6f67;
		}

		.list-group-item-yellow-soft {
			color: #7d7667;
			background-color: #fbf7ef;
		}

		.list-group-item-yellow-soft.list-group-item-action:hover,
		.list-group-item-yellow-soft.list-group-item-action:focus {
			color: #7d7667;
			background-color: #f6eddb;
		}

		.list-group-item-yellow-soft.list-group-item-action.active {
			color: #fff;
			background-color: #7d7667;
			border-color: #7d7667;
		}

		.list-group-item-green-soft {
			color: #637772;
			background-color: #edf8f5;
		}

		.list-group-item-green-soft.list-group-item-action:hover,
		.list-group-item-green-soft.list-group-item-action:focus {
			color: #637772;
			background-color: #dbf1eb;
		}

		.list-group-item-green-soft.list-group-item-action.active {
			color: #fff;
			background-color: #637772;
			border-color: #637772;
		}

		.list-group-item-teal-soft {
			color: #637977;
			background-color: #edf9f8;
		}

		.list-group-item-teal-soft.list-group-item-action:hover,
		.list-group-item-teal-soft.list-group-item-action:focus {
			color: #637977;
			background-color: #daf3f1;
		}

		.list-group-item-teal-soft.list-group-item-action.active {
			color: #fff;
			background-color: #637977;
			border-color: #637977;
		}

		.list-group-item-cyan-soft {
			color: #637b7e;
			background-color: #edfafb;
		}

		.list-group-item-cyan-soft.list-group-item-action:hover,
		.list-group-item-cyan-soft.list-group-item-action:focus {
			color: #637b7e;
			background-color: #d8f4f6;
		}

		.list-group-item-cyan-soft.list-group-item-action.active {
			color: #fff;
			background-color: #637b7e;
			border-color: #637b7e;
		}

		.list-group-item-blue-soft {
			color: #636f81;
			background-color: #edf4fd;
		}

		.list-group-item-blue-soft.list-group-item-action:hover,
		.list-group-item-blue-soft.list-group-item-action:focus {
			color: #636f81;
			background-color: #d6e6fa;
		}

		.list-group-item-blue-soft.list-group-item-action.active {
			color: #fff;
			background-color: #636f81;
			border-color: #636f81;
		}

		.list-group-item-indigo-soft {
			color: #6d6580;
			background-color: #f2eefc;
		}

		.list-group-item-indigo-soft.list-group-item-action:hover,
		.list-group-item-indigo-soft.list-group-item-action:focus {
			color: #6d6580;
			background-color: #e1d8f8;
		}

		.list-group-item-indigo-soft.list-group-item-action.active {
			color: #fff;
			background-color: #6d6580;
			border-color: #6d6580;
		}

		.list-group-item-purple-soft {
			color: #6e657c;
			background-color: #f3eefb;
		}

		.list-group-item-purple-soft.list-group-item-action:hover,
		.list-group-item-purple-soft.list-group-item-action:focus {
			color: #6e657c;
			background-color: #e4d9f6;
		}

		.list-group-item-purple-soft.list-group-item-action.active {
			color: #fff;
			background-color: #6e657c;
			border-color: #6e657c;
		}

		.list-group-item-pink-soft {
			color: #7b6571;
			background-color: #faeef4;
		}

		.list-group-item-pink-soft.list-group-item-action:hover,
		.list-group-item-pink-soft.list-group-item-action:focus {
			color: #7b6571;
			background-color: #f4dae7;
		}

		.list-group-item-pink-soft.list-group-item-action.active {
			color: #fff;
			background-color: #7b6571;
			border-color: #7b6571;
		}

		.list-group-item-primary-soft {
			color: #636f81;
			background-color: #edf4fd;
		}

		.list-group-item-primary-soft.list-group-item-action:hover,
		.list-group-item-primary-soft.list-group-item-action:focus {
			color: #636f81;
			background-color: #d6e6fa;
		}

		.list-group-item-primary-soft.list-group-item-action.active {
			color: #fff;
			background-color: #636f81;
			border-color: #636f81;
		}

		.list-group-item-secondary-soft {
			color: #6e657c;
			background-color: #f3eefb;
		}

		.list-group-item-secondary-soft.list-group-item-action:hover,
		.list-group-item-secondary-soft.list-group-item-action:focus {
			color: #6e657c;
			background-color: #e4d9f6;
		}

		.list-group-item-secondary-soft.list-group-item-action.active {
			color: #fff;
			background-color: #6e657c;
			border-color: #6e657c;
		}

		.list-group-item-success-soft {
			color: #637772;
			background-color: #edf8f5;
		}

		.list-group-item-success-soft.list-group-item-action:hover,
		.list-group-item-success-soft.list-group-item-action:focus {
			color: #637772;
			background-color: #dbf1eb;
		}

		.list-group-item-success-soft.list-group-item-action.active {
			color: #fff;
			background-color: #637772;
			border-color: #637772;
		}

		.list-group-item-info-soft {
			color: #637b7e;
			background-color: #edfafb;
		}

		.list-group-item-info-soft.list-group-item-action:hover,
		.list-group-item-info-soft.list-group-item-action:focus {
			color: #637b7e;
			background-color: #d8f4f6;
		}

		.list-group-item-info-soft.list-group-item-action.active {
			color: #fff;
			background-color: #637b7e;
			border-color: #637b7e;
		}

		.list-group-item-warning-soft {
			color: #7d7667;
			background-color: #fbf7ef;
		}

		.list-group-item-warning-soft.list-group-item-action:hover,
		.list-group-item-warning-soft.list-group-item-action:focus {
			color: #7d7667;
			background-color: #f6eddb;
		}

		.list-group-item-warning-soft.list-group-item-action.active {
			color: #fff;
			background-color: #7d7667;
			border-color: #7d7667;
		}

		.list-group-item-danger-soft {
			color: #7c6767;
			background-color: #faefef;
		}

		.list-group-item-danger-soft.list-group-item-action:hover,
		.list-group-item-danger-soft.list-group-item-action:focus {
			color: #7c6767;
			background-color: #f4dcdc;
		}

		.list-group-item-danger-soft.list-group-item-action.active {
			color: #fff;
			background-color: #7c6767;
			border-color: #7c6767;
		}

		.p-0 {
			padding: 0 !important;
		}
		.m-0 {
			margin: 0 !important;
		}
	</style>
</head>

<body class="my-account">
	<div class="page-wrapper">
		<?php include "include/menu1.php"; ?>

		<!-- Start of Main -->
		<main class="main">
			<!-- Start of Page Header -->
			<div class="page-header">
				<div class="container">
					<h1 class="page-title mb-0">My Account</h1>
				</div>
			</div>
			<!-- End of Page Header -->

			<!-- Start of Breadcrumb -->
			<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb">
						<li><a href="demo1.html">Home</a></li>
						<li>My account</li>
					</ul>
				</div>
			</nav>
			<!-- End of Breadcrumb -->
			<?php //print_r($profileinfo); ?>
			<!-- Start of PageContent -->
			<div class="page-content pt-2">
				<div class="container">
					<div class="tab tab-vertical row gutter-lg">
						<ul class="nav nav-tabs mb-6" role="tablist">
							<li class="nav-item">
								<a href="#account-dashboard" class="nav-link active">Dashboard</a>
							</li>
							<li class="nav-item">
								<a href="#account-orders" class="nav-link"><i class="w-icon-orders mr-2"></i>Orders</a>
							</li>
							<li class="nav-item">
								<a href="#commission" class="nav-link"><i class="w-icon-wallet2 mr-2"></i>Commission</a>
							</li>
							<li class="nav-item">
								<a href="#member" class="nav-link"><i class="w-icon-user mr-2"></i>Members</a>
							</li>
							<li class="nav-item">
								<a href="#account-addresses" class="nav-link"><i class="w-icon-map-marker mr-2"></i>Addresses</a>
							</li>
							<li class="nav-item">
								<a href="#account-details" class="nav-link"><i class="w-icon-user mr-2"></i>Account details</a>
							</li>
							<li class="link-item">
								<a href="<?php echo base_url().'Account/Logout' ?>"><i class="w-icon-logout mr-2"></i>Logout</a>
							</li>
						</ul>

						<div class="tab-content mb-6">
							<div class="tab-pane active in" id="account-dashboard">
								<?php //print_r($profileinfo); ?>
								<p class="greeting">
									Hello
									<span
										class="text-dark font-weight-bold"><?php if(!empty($_SESSION['accountname'])){echo $_SESSION['accountname'];} ?></span>
									(not
									<span
										class="text-dark font-weight-bold"><?php if(!empty($_SESSION['accountname'])){echo $_SESSION['accountname'];} ?></span>?
									<a href="<?php echo base_url().'Account/Logout' ?>" class="text-primary">Log
										out</a>)
								</p>

								<p class="mb-4">
									From your account dashboard you can view your <a href="#account-orders"
										class="text-primary link-to-tab">recent orders</a>,
									manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
										and billing
										addresses</a>, and
									<a href="#account-details" class="text-primary link-to-tab">edit your password and
										account details.</a>
								</p>

								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#account-orders" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-orders">
													<i class="w-icon-orders"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Orders</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#commission" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-orders">
													<i class="w-icon-wallet2"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Commission</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#member" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-orders">
													<i class="w-icon-user"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Members</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#account-addresses" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-address">
													<i class="w-icon-map-marker"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Addresses</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#account-details" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-account">
													<i class="w-icon-user"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Account Details</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-logout">
													<i class="w-icon-logout"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Logout</p>
												</div>
											</div>
										</a>
									</div>
								</div>
								<!-- Button trigger modal -->
							</div>

							<div class="tab-pane mb-4" id="account-orders">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-orders">
										<i class="w-icon-orders"></i>
									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
									</div>
								</div>

								<table class="shop-table account-orders-table mb-6">
									<thead>
										<tr>
											<th class="order-id">Order</th>
											<th class="order-date">Date</th>
											<th class="order-status">Status</th>
											<th class="order-total">Total</th>
											<th class="order-actions">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($customerorder->result() as $rowcustomerorder){ ?>
										<tr>
											<td class="order-id">#<?php echo $rowcustomerorder->idtbl_order ?></td>
											<td class="order-date"><?php echo date("F j, Y", strtotime($rowcustomerorder->orderdate)); ?></td>
											<td class="order-status"><?php if($rowcustomerorder->callstatus==1){echo '<a id="popoverData" class="text-primary" href="#" data-content="ඔබගෙන් ඇණැවුම් කල පාරිභෝගිකයා දුරකතනයට ප්‍රතිචාර නොදක්වන බැවින් , ඈණවුම හර්බ්ලයින් ආයතනයේ රදවාගෙන ඇත.එය යැවීමට අවශ්‍ය නම් තහවුරු කර 0769909994 ට ඇනවුම් අංකය සමග sms කරන්න" rel="popover" data-placement="bottom" data-original-title="දැන්වීම" data-trigger="hover">Cutomer Not Answer</a>';} else if($rowcustomerorder->deliverystatus==1){echo '<span class="success">Completed</span>';}else if($rowcustomerorder->status==2){echo '<span class="text-danger">Order Cancel</span>';}else{echo 'Processing';} ?></td>
											<td class="order-total">
												<span class="order-price"><?php echo number_format($rowcustomerorder->nettotal, 2) ?></span>
											</td>
											<td class="order-action">
												<a href="#"
													class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>

								<a href="<?php echo base_url().'Shop' ?>" class="btn btn-dark btn-rounded btn-icon-right">Go
									Shop<i class="w-icon-long-arrow-right"></i></a>
							</div>

							<div class="tab-pane" id="account-addresses">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-map-marker">
										<i class="w-icon-map-marker"></i>
									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
									</div>
								</div>
								<p>The following addresses will be used on the checkout page
									by default.</p>
								<div class="row">
									<div class="col-sm-6 mb-6">
										<div class="ecommerce-address billing-address pr-lg-8">
											<h4 class="title title-underline ls-25 font-weight-bold">Billing Address
											</h4>
											<address class="mb-4">
												<p><strong><?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->firstname.' '.$customerprofile->row(0)->lastname; } ?></strong></p>
												<?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->address.'<br>'.$customerprofile->row(0)->city; } ?>
											</address>
										</div>
									</div>
									<div class="col-sm-6 mb-6">
										<div class="ecommerce-address shipping-address pr-lg-8">
											<h4 class="title title-underline ls-25 font-weight-bold">Shipping Address
											</h4>
											<address class="mb-4">
												<address class="mb-4">
												<p><strong><?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->firstname.' '.$customerprofile->row(0)->lastname; } ?></strong></p>
												<?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->address.'<br>'.$customerprofile->row(0)->city; } ?>
											</address>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="account-details">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-account mr-2">
										<i class="w-icon-user"></i>
									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Name</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->firstname.' '.$customerprofile->row(0)->lastname; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Phone</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->phone; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Email</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->email; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Address</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->address; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">City</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->city; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Ref Code</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->refcode; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Date of birth</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->dob; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">NIC</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php echo $customerprofile->row(0)->nicno; ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Bank</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->bank.' - '.$customerprofilebank->row(0)->bankcode;} ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Branch</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->branch.' - '.$customerprofilebank->row(0)->branchcode;;} ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Account Name</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountname;} ?></div>
								</div>
								<div class="row">
									<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 font-weight-bold text-primary">Account No</div>
									<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountno;} ?></div>
								</div>
								<div class="row mt-2">
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">                                                    
										<!-- <p class="d-none" id="hideurl"><?php //echo base_url().'Loginregister/Registerwithcode/'.$profileinfo->profileinfo[0]->refcode; ?></p> -->
										
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-right">
										<p class="d-none" id="hideurl"><?php echo base_url().'Loginregister/Register'; ?></p>
										<span class="btn btn-primary btn-sm rounded-0" onclick="copyfunction('#hideurl')"><i class="icon-share"></i>&nbsp;Share your friends</span>										
									</div>
								</div>
								<?php //if(date('H:i:s')>'21:00:00' && date('H:i:s')<'08:00:00'){ ?>
								<div class="row mt-3">
									<div class="col-12">
										<div class="accordion accordion-icon accordion-simple">
											<div class="card">
												<div class="card-header">
													<a href="#collapse3-1" class="collapse"><i class="w-icon-long-arrow-right"></i>Update Profile </a>
												</div>
												<div class="card-body collapsed" id="collapse3-1">
													<form action="<?php echo base_url().'Account/Updateprofile' ?>" id="formprofileupdate" method="post" autocomplete="off">
														<div id="flashdata"></div>  
														<div class="row">
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">First Name <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark" name="regfirst" id="regfirst" value="<?php echo $customerprofile->row(0)->firstname ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Last Name <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark" name="reglast" id="reglast" value="<?php echo $customerprofile->row(0)->lastname ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Phone <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark <?php if(!empty($customerprofile->row(0)->phone)){echo "bg-grey";} ?>" name="regphone" id="regphone" minlength="10" maxlength="10" <?php if(!empty($customerprofile->row(0)->phone)){echo "readonly";} ?> value="<?php echo $customerprofile->row(0)->phone ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Email <span>*</span></label>
																<input type="email" class="form-control form-control-sm text-dark bg-grey" name="regemail" id="regemail" value="<?php echo $customerprofile->row(0)->email ?>" readonly>
															</div>
															<div class="col-lg-12 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Address <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark" name="regaddress" id="regaddress" value="<?php echo $customerprofile->row(0)->address ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">City <span>*</span></label>
																<select class="form-control form-control-sm text-dark" style="width:100%;" name="regcity" id="regcity" required>
																	<option value="">Select</option>
																	<?php foreach($citylist->result() as $rowcitylist){ ?>
																	<option value="<?php echo $rowcitylist->city ?>" <?php if($this->session->userdata('loggedin')==1){if($rowcitylist->city==$customerprofile->row(0)->city){echo 'selected';}} ?>><?php echo $rowcitylist->city ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label for="country">country <span>*</span></label><br>
																<select class="form-control form-control-sm text-dark" style="border: 1px solid #ededed;outline:0px !important;box-shadow: none !important;" name="regcountry" id="regcountry" required>
																	<option value="">Select</option>
																	<?php foreach($countrylist->result() as $rowcountrylist){ ?>
																	<option value="<?php echo $rowcountrylist->idtbl_country ?>" <?php if($customerprofile->row(0)->tbl_country_idtbl_country==$rowcountrylist->idtbl_country){echo 'selected';} ?>><?php echo $rowcountrylist->country ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Date of birth <span>*</span></label>
																<input type="date" class="form-control form-control-sm text-dark" name="dob" id="dob" value="<?php echo $customerprofile->row(0)->dob ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">NIC <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark <?php if(!empty($customerprofile->row(0)->nicno)){echo "bg-light";} ?>" name="nic" id="nic" minlength="10" maxlength="12" <?php if(!empty($customerprofile->row(0)->nicno)){echo "readonly";} ?>  value="<?php echo $customerprofile->row(0)->nicno ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Bank & Code</label>
																<div class="row">
																	<select name="regbank" id="regbank" class="col-9 form-control form-control-sm" style="width:75%;" required>
																		<option value="">Select</option>
																		<?php foreach($banklist->result() as $rowbanklist){ ?>
																		<option value="<?php echo $rowbanklist->code ?>" <?php if($this->session->userdata('loggedin')==1 && $customerprofilebank->num_rows()>0){if($rowbanklist->code==$customerprofilebank->row(0)->bankcode){echo 'selected';}} ?>><?php echo $rowbanklist->bank ?></option>
																		<?php } ?>
																	</select>
																	<input type="text" minlength="4" maxlength="4" name="regbankcode" id="regbankcode" class="col-3 bg-grey form-control form-control-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->bankcode;} ?>" placeholder="Code" required readonly>
																</div>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Branch & Code</label>
																<div class="row">
																	<select name="regbranch" id="regbranch" class="col-9 form-control form-control-sm" style="width:75%;" required>
																		<option value="">Select</option>
																	</select>
																	<input type="text" minlength="3" maxlength="3" name="regbranchcode" id="regbranchcode" class="col-3 bg-grey form-control form-control-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->branchcode;} ?>" placeholder="Code" required readonly>
																</div>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Account Name</label>
																<input type="text" class="form-control form-control-sm text-dark" name="regaccount" id="regaccount" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountname;} ?>">
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Account No</label>
																<input type="text" class="form-control form-control-sm text-dark" name="regaccountno" id="regaccountno" maxlength="12" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountno;} ?>">
															</div>
														</div>
														<div class="login_submit">
															<button type="button" class="btn btn-primary btn-sm rounded-0" id="profilesubmitbtn">Update Profile</button>
															<input type="submit" class="d-none" id="btnhidesubmit">
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php //} ?>
							</div>

							<div class="tab-pane" id="commission">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-map-marker">
									<i class="fa fa-handshake"></i>

									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Your Commission</h4>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 mt-5">
										<div class="form-group">
                                        	<label>From*</label>
                                            <input type="date" class="form-control text-dark" name="from" id="from" required>
                                        </div>
									</div>
									
									<div class="col-lg-3 col-md-3 col-sm-3 mt-5">
										<div class="form-group">
                                            <label>To*</label>
                                            <input type="date" class="form-control text-dark" name="to" id="to" required>
                                        </div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 mt-5">
										<button type="button" id="submitbtn" class="btn btn-primary" style="margin-top: 2.2rem;"><i class="fa fa-eye"></i> Commission</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-3 mt-5">
									<h6 class="mb-2 ls-normal">Previous month commission</h4>
									<h6 class="mb-2 ls-normal">Your commission</h4>
									<h6 class="mb-2 ls-normal">Total commission</h4>
									</div>
								</div>
								<p class="mt-2" style="color: #dd5757;">Rs.15.00 will be deducte has been bank charge. Rs.50.00 will be deducte has been donation.</p>

							</div>

							<div class="tab-pane" id="member">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-map-marker">
									<i class="fa fa-user"></i>

									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Your Members</h4>
									</div>
								</div>
								<div class="row mt-3">
                                    <div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading2">
													<a href="#collapse1-1" class="expand">Level 02 - (<span id="memcount2"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist2">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading3">
													<a href="#collapse1-1" class="expand">Level 03 - (<span id="memcount3"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist3">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading4">
													<a href="#collapse1-1" class="expand">Level 04 - (<span id="memcount4"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist4">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading5">
													<a href="#collapse1-1" class="expand">Level 05 - (<span id="memcount5"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist5">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading6">
													<a href="#collapse1-1" class="expand">Level 06 - (<span id="memcount6"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist6">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading7">
													<a href="#collapse1-1" class="expand">Level 07 - (<span id="memcount7"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist7">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading8">
													<a href="#collapse1-1" class="expand">Level 08 - (<span id="memcount8"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist8">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of PageContent -->
		</main>
		<!-- End of Main -->

		<?php include "include/footercontent.php"; ?>
	</div>
	<!-- End of Page Wrapper -->

	<?php include "include/footerscript.php"; ?>
	<script>
		$(document).ready(function(){
			$("#regcity").select2();
			$("#regbank").select2();
			$("#regbranch").select2();

			var branchcode = '<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->branchcode;} ?>';
			if(branchcode!=''){
				var bankcode = $('#regbank').val();
				branchlist(bankcode, branchcode);
			}

			$('#regbank').change(function(){
				var bankcode = $(this).val();
				$('#regbankcode').val(bankcode);
				var branchcode = '';
				branchlist(bankcode, branchcode);
			});

			$('#regbranch').change(function(){
				var branchcode = $(this).val();
				$('#regbranchcode').val(branchcode);
			});

			$('#profilesubmitbtn').click(function(){
				if (!$("#formprofileupdate")[0].checkValidity()) {
					// If the form is invalid, submit it. The form won't actually submit;
					// this will just cause the browser to display the native HTML5 error messages.
					$("#btnhidesubmit").click();
				} else {
					var niccheck=nicvalidation();
					// alert(niccheck);

					if(niccheck==true){
						$("#formprofileupdate").submit();
					}else{
						$('#flashdata').html('<div class="alert alert-danger alert-dismissible" role="alert">Insert valid NIC number or your NIC / DOB mismatch. PLease check and re enter correct data</div>');
					}
				}
			});

			$('.clickacco').click(function(){
				var lvlno=$(this).attr('id');
				const lvlinfo = lvlno.split("heading");
				
				var levelno=lvlinfo[1];
				var dataset='memlist'+levelno;
				var countshow='memcount'+levelno;

				getmemberlist(levelno, dataset, countshow);
			});
		});

		function copyfunction(element) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($(element).text()).select();
			document.execCommand("copy");
			$temp.remove();
		}
		function nicvalidation(e){
			var NICNo = $("#nic").val();
			var Dob = $("#dob").val();

			if (NICNo.length != 10 && NICNo.length != 12) {
				// $("#error").html("Invalid NIC NO");
				return false;
			} else if (NICNo.length == 10 && !$.isNumeric(NICNo.substr(0, 9))) {
				// $("#error").html("Invalid NIC NO");
				return false;
			}
			else {
				// Year
				if (NICNo.length == 10) {
					year = "19" + NICNo.substr(0, 2);
					dayText = parseInt(NICNo.substr(2, 3));
				} else {
					year = NICNo.substr(0, 4);
					dayText = parseInt(NICNo.substr(4, 3));
				}

				// Gender
				if (dayText > 500) {
					gender = "Female";
					dayText = dayText - 500;
				} else {
					gender = "Male";
				}

				// Day Digit Validation
				if (dayText < 1 && dayText > 366) {
					// $("#error").html("Invalid NIC NO");
					return false;
				} else {

					//Month
					if (dayText > 335) {
						day = dayText - 335;
						month = "12";
					}
					else if (dayText > 305) {
						day = dayText - 305;
						month = "11";
					}
					else if (dayText > 274) {
						day = dayText - 274;
						month = "10";
					}
					else if (dayText > 244) {
						day = dayText - 244;
						month = "09";
					}
					else if (dayText > 213) {
						day = dayText - 213;
						month = "08";
					}
					else if (dayText > 182) {
						day = dayText - 182;
						month = "07";
					}
					else if (dayText > 152) {
						day = dayText - 152;
						month = "06";
					}
					else if (dayText > 121) {
						day = dayText - 121;
						month = "05";
					}
					else if (dayText > 91) {
						day = dayText - 91;
						month = "04";
					}
					else if (dayText > 60) {
						day = dayText - 60;
						month = "03";
					}
					else if (dayText < 32) {
						month = "01";
						day = dayText;
					}
					else if (dayText > 31) {
						day = dayText - 31;
						month = "02";
					}

					if(day<10){day='0'+day;}

					var createdob=year+'-'+month+'-'+day;

					// console.log(createdob);
					// console.log(Dob);
					
					if(createdob==Dob){
						return true;
					}
					else{   
						return false;
					}
					// console.log(createdob);
					// if(Dob)
				}
			}
		}
		function branchlist(bankcode, branchcode){
			$.ajax({
				url: "<?php echo base_url('Account/Branchlist');?>",
				method: "POST",
				data: {bankcode:bankcode},
				success: function(data) { //alert(data);
					var objfirst = JSON.parse(data);
					var html = '';
					html += '<option value="">Select</option>';
					$.each(objfirst, function(i, item) {
						//alert(objfirst[i].id);
						html += '<option value="' + objfirst[i].code + '">';
						html += objfirst[i].branch;
						html += '</option>';
					});

					$('#regbranch').empty().append(html);

					if (branchcode != '') {
						$('#regbranch').val(branchcode);
					}
				}
			});
		}
		function getmemberlist(levelno, dataset, countshow){
			$.ajax({
				url: "<?php echo base_url('Loginregister/Getmemberlist');?>",
				method: "POST",
				data: {
					levelno:levelno
				},
				success: function(data) { //alert(data);
					var obj = JSON.parse(data);
					$('#'+dataset).empty().html(obj.htmlview);
					$('#'+countshow).empty().html(obj.htmlcount);
				}
			});
		}
	</script>
</body>

</html>