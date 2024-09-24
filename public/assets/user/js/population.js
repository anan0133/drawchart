$(function() {
   var searchName = document.getElementById("searchName").value;
   var searchYear = document.getElementById("searchYear").value;
	$('body').on("click", "#btn_calculate", function() {
		searchName = document.getElementById("searchName").value;
   		searchYear = document.getElementById("searchYear").value;
		if(searchYear.length && searchName.length)
			popSearch();
		event.preventDefault();
	});

	popSearch();
	    
	function popSearch() {
	
	    $.ajax({
	        url: 'http://api.population.io/1.0/population/' + searchYear + '/' + searchName + '/',
	        dataType: "json",
	        type: "GET",
	        success: function(data) {
	        	var females = [],
	        	    males = [],
	        	    age = [],
	        	    total = [];

	            for (var i = 0; i < data.length; i++) {
	                females.push(data[i].females);
	                males.push(data[i].males);
	                total.push(data[i].total);
	                age.push(data[i].age);
	            }
	              require(
			        [
			            'echarts',
			            'echarts/theme/limitless',
			            'echarts/chart/bar',
			            
			        ],

			        // Charts setup
			        function (ec, limitless) {

			            var basic_lines = ec.init(document.getElementById('population_Chart'), limitless);
			         
			            basic_lines_options = {

			                // Setup grid
			                grid: {
			                    x: 100,
			                    x2: 35,
			                    y: 35,
			                    y2: 60
			                },
			                title: {
						        text: searchName + "'s population in " + searchYear,
						        left: 'center',
						        top: 'bottom',
						        textStyle: {
					                color: '#fff'
					            }
						    },
			                // Add tooltip
			                tooltip: {
			                    trigger: 'axis',
			                    formatter: function (params) {
                                	var res = params[0].name + ' age';
			                        res += '<br/> ' + params[0][0] + ' : ' + params[0][2] ;
			                        res += '<br/> '+ params[1][0] + ' :' + params[1][2] ;
			                        return res;
			                    },
			                    axisPointer: {
			                        type: 'shadow'
			                    }
			                },

			                // Add legend
			                legend: {
			                    data: ['Females', 'Males']
			                },
			                // Add toolbox
			                toolbox: {
			                    show: true,
			                    x: 'right',
			                    y: 100,
			                    orient: 'vertical',
			                    feature: {
			                        mark: {
			                            show: true,
			                            title: {
			                                mark: 'Markline switch',
			                                markUndo: 'Undo markline',
			                                markClear: 'Clear markline'
			                            }
			                        },
			                        dataZoom: {
			                            show: true,
			                            title: {
			                                dataZoom: 'Data zoom',
			                                dataZoomReset: 'Reset zoom'
			                            }
			                        },
			                        dataView: {
			                            show: true,
			                            readOnly: false,
			                            title: 'View data',
			                            lang: ['View chart data', 'Close', 'Update']
			                        },
			                        restore: {
			                            show: true,
			                            title: 'Restore'
			                        },
			                        saveAsImage: {
			                            show: true,
			                            title: 'Same as image',
			                            lang: ['Save']
			                        }
			                    }
			                },

			                // Enable data zoom
			                dataZoom: {
			                    show: true,
			                    realtime: true,
			                    start: 0,
			                    end: 15,
			                    height: 30
			                },

			                // Add custom colors
			                //color: ['#EF5350', '#66BB6A'],

			                // Enable drag recalculate
			                calculable: true,

			                // Horizontal axis
			                xAxis: [{
			                    type: 'category',
			                    boundaryGap: true,
			                    axisLabel: {
			                        formatter: '{value} age'
			                    },
			                    data: age, 
			                    
			                }],

			                // Vertical axis
			                yAxis: [{
			                    type: 'value',
			                    axisLabel: {
			                        formatter: function(value) {return value > 1000 ? (value/1000 +'k'):(value);}
			                    }
			                }],

			                // Add series
			                /*series: [
			                    {
			                        name: 'Females',
			                        type: 'bar',
			                        data: females,
			                        markLine: {
			                            data: [{
			                                type: 'average',
			                                name: 'Average'
			                            }]
			                        }
			                    },
			                    {
			                        name: 'Males',
			                        type: 'bar',
			                        data: males,
			                        markLine: {
			                            data: [{
			                                type: 'average',
			                                name: 'Average'
			                            }]
			                        }
			                    }
			                ]*/
			                // Add series
			                series: [
			                    {
			                        name: 'Females',
			                        type: 'bar',
			                        stack: 'Total',
			                        itemStyle: {
			                            normal: {
			                                color: '#ffb400',
			                                label: {
			                                    show: true,
			                                    position: 'inside',
			                                    formatter: function(p) {return p.value > 1000 ? (p.value/1000 +'k'):(p.value);}
			                                }
			                            },
			                            emphasis: {
			                                color: '#99ffff',
			                                label: {
			                                    show: true
			                                }
			                            }
			                        },
			                        data:females
			                    },
			                    {
			                        name: 'Males',
			                        type: 'bar',
			                        stack: 'Total',
			                        itemStyle: {
			                            normal: {
			                                color: '#213047',
			                                label: {
			                                    show: true,
			                                    position: 'inside',
			                                    formatter: function(p) {return p.value > 1000 ? (p.value/1000 +'k'):(p.value);}
			                                }
			                            },
			                            emphasis: {
			                                color: '#0059b3',
			                                label: {
			                                    show: true
			                                }
			                            }
			                        },
			                        data:males
			                    },
			                    
			                ]
			            };

			            basic_lines.setOption(basic_lines_options);

			            window.onresize = function () {
			                setTimeout(function () {
			                    basic_lines.resize();
			                }, 200);
			            }
			        }
			    );
	        },
	    })
	    var x = document.getElementById("searchYear").value;
	    var z = document.getElementById("searchName").value;

	    if (isNaN(x)) {
	        alert("Please put in a number");
	        return;
	    }
	    if ((z) === (z).toLowerCase() || (z) === (z).toUpperCase()) {
	        alert("Please make sure the first letter  only is capitalized");
	        return; 
	    }
	}

	$('.container').addClass('animated zoomIn');
});