$(function () {
	"use strict";
	// chart 1
	var options = {
		series: [{
			name: 'Likes',
			data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 400,
			type: 'line',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
			dropShadow: {
				enabled: true,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.10,
			}
		},
		stroke: {
			width: 5,
			curve: 'smooth'
		},
		xaxis: {
			type: 'datetime',
			categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001', '4/11/2001', '5/11/2001', '6/11/2001'],
		},
		title: {
			text: 'Line Chart',
			align: 'left',
			style: {
				fontSize: "16px",
				color: '#666'
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'light',
				gradientToColors: ['#673ab7'],
				shadeIntensity: 1,
				type: 'horizontal',
				opacityFrom: 1,
				opacityTo: 1,
				stops: [0, 100, 100, 100]
			},
		},
		markers: {
			size: 4,
			colors: ["#673ab7"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		colors: ["#673ab7"],
		yaxis: {
			title: {
				text: 'Engagement',
			},
		}
	};


	// chart 4
	var options = {
		series: [{
			name: 'series1',
			data: [31, 40, 28, 51, 42, 109, 100]
		}, {
			name: 'series2',
			data: [11, 32, 45, 32, 34, 52, 41]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 400,
			type: 'area',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		colors: ["#673ab7", '#198fed'],
		title: {
			text: 'Area Chart',
			align: 'left',
			style: {
				fontSize: "16px",
				color: '#666'
			}
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'smooth'
		},
		xaxis: {
			type: 'datetime',
			categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
		},
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		},
	};
});
