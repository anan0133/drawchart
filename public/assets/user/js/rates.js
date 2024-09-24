$(function() {
    require.config({
        paths: {
            echarts: 'assets/admin/js/plugins/visualization/echarts'
        }
    });
    var apiRates = "275d2b8eb15652ef433f1c15";

    /*selection code*/
    $(".choose_code select").before('<div class = "flag-rate"><div class="flag"><span>&nbsp;</span></div></div> ');
   
    const codeMoney = ['VND', 'USD', 'EUR', 'AUD', 'KRW', 'KWD', 'MYR', 'NOK', 'RUB', 'SEK', 'SGD', 'THB', 'CAD', 'CHF', 'DKK', 'GBP', 'HKD', 'INR', 'JPY', 'SAR'];
    const code_full = ['Vietnamese Dong', 'United States Dollar', 'Euro', 'Saudi Riyal', 'South Korean Won', 'Kuwaiti Dinar', 'Malaysian Ringgit', 'Norwegian Krone', 'Russian Ruble', 'Swedish Krona', 'Singapore Dollar', 'Thai Baht', 'Canadian Dollar', 'Swiss Franc', 'Danish Krone', 'British Pound Sterling', 'Hong Kong Dollar', 'Indian Rupee', 'Japanese Yen', 'Saudi Riyal'];
    for (i = 0; i < codeMoney.length; i++) { 
        $(".choose_code select").append($('<option></option>').val(codeMoney[i]).html(codeMoney[i] + " - " + code_full[i]));

        if(codeMoney[i] == 'VND'){
            $(".convert-content #base").append($('<option selected></option>').val(codeMoney[i]).html(codeMoney[i])); 
        }else{
            $(".convert-content #base").append($('<option></option>').val(codeMoney[i]).html(codeMoney[i])); 
        }

        if(codeMoney[i] == 'USD')
            $(".convert-content #target").append($('<option selected></option>').val(codeMoney[i]).html(codeMoney[i]));
        else
            $(".convert-content #target").append($('<option></option>').val(codeMoney[i]).html(codeMoney[i]));
    }    
        
    var strSource = 'VND',
        unitX = [],
        dataNow = [],
        dataYesterday = [],
        dataLastYear = [],
        index = 0;
    var nowDate = new Date();
    $('.choose_code select').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var index = optionSelected.index();
        var pos = (-25*index)+'px';
        $("#rate search .choose_code .flag-rate .flag").css('background-position-x', pos);
	
    });
    //yesterday
    var yesterday = formatDate(nowDate.getTime() - 86400000);
    $.ajax({
        url: 'http://openexchangerates.org/api/historical/'+yesterday+'.json?app_id=e151b954b7ca41d5ab99fc3615030a74',
        dataType: "json",
        type: "get",
        success: function(data) {
        	dataYesterday = data;
       	}
   	}); 
   	//lastYear
   	var lastYear = formatDate(nowDate.setFullYear(nowDate.getFullYear() - 1)) ;
    $.ajax({
        url: 'http://openexchangerates.org/api/historical/'+lastYear+'.json?app_id=e151b954b7ca41d5ab99fc3615030a74',
        dataType: "json",
        type: "get",
        success: function(data) {
        	dataLastYear = data;
       	}
   	}); 

    $('.rate_btn').click(function() {
        $(".choose_code select option:selected").each(function() {
            strSource = $(this).val();
            unitX =  ['VND', 'USD', 'EUR', 'AUD', 'KRW', 'KWD', 'MYR', 'NOK', 'RUB', 'SEK', 'SGD', 'THB', 'CAD', 'CHF', 'DKK', 'GBP', 'HKD', 'INR', 'JPY', 'SAR'];
            index = $(this).index();
            unitX[index] = 'VND';
            unitX[0] = strSource;
            unitX.splice(0, 1);
           
        });
        
        $.ajax({
            url: 'https://v3.exchangerate-api.com/bulk/' + apiRates + '/' + strSource,
            dataType: "json",
            type: "GET",
            success: function(data) {
                var quotesNow = [],
		        quotesYesterday = [],
		        quotesLastYear = [];
                var rates = data.rates;
                console.log(unitX);
                for (var i = 0; i < unitX.length; i++) {
                    var temp = 1 / rates[unitX[i]];
                    quotesNow.push(temp);

                    quotesYesterday.push( dataYesterday.rates[strSource] *(1/dataYesterday.rates[unitX[i]]) );
                    quotesLastYear.push( dataLastYear.rates[strSource] *(1/dataLastYear.rates[unitX[i]]) );
                }
            
                console.log(quotesNow);
                console.log(quotesYesterday);
               
                require(
                    [
                        'echarts',
                        'echarts/theme/limitless',
                        'echarts/chart/bar'
                    ],

                    // Charts setup
                    function(ec, limitless) {

                        var basic_lines = ec.init(document.getElementById('basic_lines'), limitless);

                        basic_lines_options = {

                            // Setup grid
                            grid: {
                                x: 100,
                                x2: 30,
                                y: 35,
                                y2: 55
                            },

                            // Add tooltip
                            tooltip: {
                                trigger: 'axis',
                                formatter: function (params) {
                                	var res = code_full[params[0].dataIndex],value;
                                	if(params[0].dataIndex == index){
										res = 'Vietnamese Dong';
                                	}else if(params[0].dataIndex == 0){
										res = code_full[index];
                                	}
                                	value = (params[0].value + '').split('.');
						            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
						            if(value[1] != null)
						            	value = value + '.' + value[1];
			                        res += '<br/>Now:  1 ' + params[0].name + ' = ' + value + ' '+ strSource;
			                        value = (params[2].value + '').split('.');
						            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
						            if(value[1] != null)
						            	value = value + '.' + value[1];
			                        res += '<br/>Yesterday:  1 ' + params[0].name + ' = ' + value + ' '+ strSource;
			                        value = (params[2].value + '').split('.');
						            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
						            if(value[1] != null)
						            	value = value + '.' + value[1];
			                        res += '<br/>Last Year:  1 ' + params[0].name + ' = ' + value + ' '+ strSource;
			                        return res;
			                    }
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
			                    end: 20,
			                    height: 30
			                },
                            // Add legend
                            legend: {
                                data: ['Now', yesterday, lastYear]
                            },

                            // Add custom colors
                            color: ['#EF5350','#213047','#66BB6A'],

                            // Enable drag recalculate
                            calculable: true,

                            // Horizontal axis
                            xAxis: [{
                                type: 'category',
                                boundaryGap: true,
                                data: unitX
                            }],

                            // Vertical axis
                            yAxis: [{
                                type: 'value',
                                axisLabel: {
                                    formatter: '{value}' + ' ' + strSource
                                }
                            }],

                            // Add series
                            series: [
		                        {
		                            name: 'Now',
		                            type: 'bar',
		                            data: quotesNow,
			                    },
		                        {
		                            name: yesterday,
		                            type: 'bar',
		                            data: quotesYesterday
	                        	},
	                        	{
		                            name: lastYear,
		                            type: 'bar',
		                            data: quotesLastYear,
	                        	}
	                        ]
                        };

                        basic_lines.setOption(basic_lines_options);

                        window.onresize = function() {
                            setTimeout(function() {
                                basic_lines.resize();
                            }, 200);
                        }
                    }
                );
            },

        });
        // drawchart
        var key = "e151b954b7ca41d5ab99fc3615030a74";
 		var uri = encodeURI("http://openexchangerates.org/latest.json?app_id=" + key);


    })





    /*EXCHANGE RATE*/
    //return selected base currency
    $('#curr1').on('input', helperUpdate);

    function helperUpdate() {
        var base = $('#base option:selected').text();
        var url = 'https://v3.exchangerate-api.com/bulk/' + apiRates + '/' + base;

        updateCurrencyCalculation(url);

    }
    //Clear input fields when changing currency
    $('#base').on('change', clearInput);

    function clearInput() {
        $('#curr1').val('');
        $('#curr2').val('');
    };

    //Event recognition for target currency option change
    $('select#target').on('change', helperUpdate);

    function updateCurrencyCalculation(url) {
        //Second AJAX call sets base currency
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data2) {
                var target = $('#target option:selected').text();
                var curr1 = $('#curr1').val();
                var curr2 = $('#curr2').val();
                var converted = curr1 * data2.rates[target];

                $('#curr2').val(converted.toFixed(6));
                console.log(converted);
            },
            dataType: 'json'
        });
    }

    //Swap currencies
    function swapCurrencies() {
        var temp = $("#base").val();
        $("#base").val($("#target").val());
        $("#target").val(temp);

        helperUpdate();
    }

    $('#swap').on('click', swapCurrencies);

    
    function formatDate(date) {
	    var d = new Date(date),
	        month = '' + (d.getMonth() + 1),
	        day = '' + d.getDate(),
	        year = d.getFullYear();

	    if (month.length < 2) month = '0' + month;
	    if (day.length < 2) day = '0' + day;

	    return [year, month, day].join('-');
	}

});