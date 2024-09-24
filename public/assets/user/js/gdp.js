$(function() {
	
	
    $('body').on("change", "#gdp_year", function() {
    	event.preventDefault();
		drawGDP();
	});
	$('body').on("click", "#btn_gdp", function() {
		drawLineGDP();
	});
});
function drawLineGDP() {
		var dataGDPLine =[], yearGDP = [];
		var GDPName = document.getElementById("gdp_name").value;
        for (item in dataGDP) {
		   if(dataGDP[item]['Country Name']== GDPName)
		   {
				yearGDP.push(dataGDP[item]['Year']);
				dataGDPLine.push(dataGDP[item]['Value']);
		   }
		}
				
        require(
	        [
	            'echarts',
	            'echarts/theme/limitless',
	            'echarts/chart/line',
	        ],

	        // Charts setup
	        function (ec, limitless) {

	            var basic_lines = ec.init(document.getElementById('gdp_line_Chart'), limitless);
	         
	            basic_lines_options = {

	                // Setup grid
	                grid: {
	                    x: 10,
	                    x2: 55,
	                    y: 35,
	                    y2: 50
	                },
	                title: {
				        text: GDPName + "'s GDP ",
				        left: 'center',
				        top: 'bottom',
				        textStyle: {
			                color: 'dodgerblue'
			            }
				    },
	                // Add tooltip
	                tooltip: {
	                    trigger: 'axis',
	                    formatter: function (params) {
                        	var res = GDPName + "'s GDP in ";
                        	var value = (params[0][2] + '').split('.');
				            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
				            if(value[1] != null)
				            	value = value + '.' + value[1];
	                        res += params[0][1] + ' : ' +  value + ' USD';
	                        return res;
	                    },
	                    
	                },

	                // Add legend
	                legend: {
	                    data: ['GDP']
	                },
	                // Add custom colors
	                color: ['dodgerblue'],

	                // Enable drag recalculate
	                calculable: true,

	                // Horizontal axis
	                xAxis: [{
	                    type: 'category',
	                    boundaryGap: false,
	                    axisLabel: {
	                        formatter: '{value}'
	                    },
	                    data: yearGDP
	                }],

	                // Vertical axis
	                yAxis: [{
	                	show: false,
	                    type: 'value',
	                    
	                }],

	                // Add series
	                series: [
	                    {
	                        name: 'GDP',
	                        type: 'line',
	                        data: dataGDPLine,
	                    }
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
	};
function drawGDP() {
	var nameCountryfalse = ['Russian Federation', 'Dominica', 'Venezuela, RB', 'Sub-Saharan Africa (IDA & IBRD countries)', 'Cabo Verde', 'Bahamas, The', 'St. Lucia', 'St. Vincent and the Grenadines', 'Cote d\'Ivoire', 'Sao Tome and Principe', 'Equatorial Guinea','Central African Republic', 'Congo, Rep.', 'Congo, Dem. Rep.', 'South Sudan', 'Yemen, Rep.', 'Egypt, Arab Rep.', 'Syrian Arab Republic', 'Iran, Islamic Rep.', 'Czech Republic','Korea, Rep.'];
	var nameCountrytrue = ['Russia', 'Dominican Rep.', 'Venezuela', 'W. Sahara', 'Cape Verde', 'Bahamas', 'Saint Lucia', 'St. Vin. and Gren.', 'Côte d\'Ivoire', 'São Tomé and Principe', 'Eq. Guinea', 'Central African Rep.', 'Congo', 'Dem. Rep. Congo', 'S. Sudan', 'Yemen', 'Egypt', 'Syria', 'Iran', 'Czech Rep.','Korea'];
		
	gdpChart.showLoading();
	var GDPYear = document.getElementById("gdp_year").value;
	dataGDPfinal =[];
	var maxValue=0, minValue=1000000000000000;
	for (item in dataGDP) {
	   if(dataGDP[item].Year == GDPYear)
	   {

		   	var element = {}; 
		   	element.name = dataGDP[item]['Country Name'];
			element.value = dataGDP[item]['Value'];
			if(nameCountryfalse.indexOf(element.name)!= -1){
				element.name = nameCountrytrue[nameCountryfalse.indexOf(element.name)];
			}
			dataGDPfinal.push(element);
			if(element.name =='United States')
				maxValue = element.value;
			else if (minValue > element.value)
				minValue = element.value;
	   }
	}
	gdpChart.hideLoading();
	//config option
	option = {
	    title: {
	        text: 'World GDP ' + GDPYear ,
	        left: 'center',
	        top: 'top'
	    },
	    tooltip: {
	        trigger: 'item',
	        formatter: function (params) {
	        	if( !isNaN(params.value))
	        	{
	        		var value = (params.value + '').split('.');
		            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
		            if(value[1] != null)
		            	value = value + '.' + value[1];
		            return params.seriesName + '<br/>' + params.name + ' : ' + value + ' USD';
	        	}else
	        	return 'not update data.';
	        }
	    },
	    toolbox: {
	        show: true,
	        orient: 'vertical',
	        left: 'right',
	        top: 'center',
	        feature: {
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
	    visualMap: {
	        min: minValue,
	        max: maxValue/10,
	        text:['High','Low'],
	        realtime: false,
	        calculable: true,
	        inRange: {
	            color: ['#99ffff', '#0059b3']
	            //color: ['#80ff80', '#008000']
	        }
	    },
	    series: [
	        {
	            name:'World GDP ' + GDPYear ,
	            type: 'map',
	            mapType: 'world',
	            roam: true,
	            itemStyle: {
		            normal:{
		                borderColor: 'rgba(0, 0, 0, 0.2)', 
		            },
		            emphasis:{
		            	label:{show:true},
		                areaColor: 'yellow',//'#4bed2a',
		                shadowOffsetX: 0,
		                shadowOffsetY: 0,
		                shadowBlur: 20,
		                borderWidth: 0,
		                shadowColor: 'rgba(0, 0, 0, 0.5)'
		            }
		        },
	            data:dataGDPfinal
	        }
	    ]

	};
	 gdpChart.setOption(option, true);
}
