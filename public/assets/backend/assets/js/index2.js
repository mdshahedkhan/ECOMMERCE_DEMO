$(function () {
	"use strict";
	// chart 1
	var options = {
		series: [{
			name: 'Income',
			data: [18, 51, 80, 38, 88, 50, 40, 52, 88, 80, 60, 70]
		}, {
			name: 'Expenses',
			data: [27, 38, 60, 77, 40, 50, 49, 29, 42, 27, 42, 50]
		}],
		chart: {
			foreColor: '#9ba7b2',
			type: 'area',
			height: 340,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: false,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.10,
			}
		},
		legend: {
			position: 'top',
			horizontalAlign: 'left',
			offsetX: -25
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2.3,
			curve: 'smooth'
		},
		tooltip: {
			theme: 'dark',
			y: {
				formatter: function (val) {
					return "$ " + val + " "
				}
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'light',
				gradientToColors: ['#377dff', '#00c9db'],
				shadeIntensity: 1,
				type: 'vertical',
				inverseColors: false,
				opacityFrom: 0.4,
				opacityTo: 0.1,
				//stops: [0, 50, 65, 91]
			},
		},
		grid: {
			show: true,
			borderColor: '#f8f8f8',
			strokeDashArray: 5,
		},
		colors: ["#377dff", "#00c9db"],
		yaxis: {
			labels: {
				formatter: function (value) {
					return value + "$";
				}
			},
		},
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		}
	};

});
jQuery('#location-map').vectorMap({
	map: 'world_mill_en',
	backgroundColor: 'transparent',
	borderColor: '#818181',
	borderOpacity: 0.25,
	borderWidth: 1,
	zoomOnScroll: false,
	color: '#009efb',
	regionStyle: {
		initial: {
			fill: '#007bff'
		}
	},
	markerStyle: {
		initial: {
			r: 9,
			'fill': '#fff',
			'fill-opacity': 1,
			'stroke': '#000',
			'stroke-width': 5,
			'stroke-opacity': 0.4
		},
	},
	enableZoom: true,
	hoverColor: '#009efb',
	markers: [{
		latLng: [21.00, 78.00],
		name: 'I Love My India'
	}],
	hoverOpacity: null,
	normalizeFunction: 'linear',
	scaleColors: ['#b6d6ff', '#005ace'],
	selectedColor: '#c9dfaf',
	selectedRegions: [],
	showTooltip: true,
	onRegionClick: function (element, code, region) {
		var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
		alert(message);
	}
});
