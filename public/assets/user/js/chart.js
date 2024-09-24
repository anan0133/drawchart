$(document).ready(function() {
	//button save chart
    $(".save_btn").hide();
    
    /**
     * Get form
     */
    $('body').on('click', '.grid-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('url');
        var type_form = $(this).attr('type-form')
        $.ajax({
            type: 'get',
            url: url,
            cache:false,
            beforeSend:function(){
	        	$('#import .content-step2').html('');    	
	        },
            success: function(data) {

                $('#step02').tab('show');
                $( "#type_form" ).val(type_form);

            	var target = $(this).attr('data-target');
                $('#import .content-step2').html(data);
                $(".colorpicker-show-input").spectrum({
                    showInput: true
                });
            }
        });
    });

    /**
     * Save Chart ->png
     */
    $(".save_btn").click(function() {
        $("#myChart").get(0).toBlob(function(blob) {
            saveAs(blob, "draw_chart.png");
        });
        if ($('.do_login').length > 0) 
        {
            var canvas = document.getElementById("myChart");
            var dataURL = canvas.toDataURL("image/png");
            $('#hidden_data').val(dataURL);
            $('#title_chart').val($(".title-chart input").val()?$(".title-chart input").val():"Draw Chart");
            $('#type_chart').val($("#type option:selected").attr('id-type'));
            var fd = new FormData(document.forms["form1"]);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', $('#url_save').val(), true);

            xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    console.log(percentComplete + '% uploaded');
                    sweetAlert("Info", "Your image was saved in My collection!", "info");
                }
            };
            xhr.onload = function() {};
            xhr.send(fd);
        }
    });

    
    /***************************
     *                         *
     *draw chart theo từng form* 
     *                         *
     ***************************/
     //#minus_col y nút dáu -
	$('body').on("click", "#minus_col", function() {
		if ($(".group_y").length == 2) {
	        $(this).hide();
	    }
	    $(".group_y:last").remove();
	    var index = $(".group_y").length;
	    var width_group = 100/index + '%';
        $('.multi .content-multi-y .group_y').css('width', width_group );
    });

	//#plus_col y
    $('body').on("click", "#plus_col", function() {
    	var color = random_rgba();
    	var row = $(".data_x").find('.content_input').length;
    	var index = $(".group_y").length+1;

    	var html ='<div class="group_y y_data'+index+'"> <header class="sub_header">Y'+index+'</header>';
    	html+='<div class="color_input"><div class="color_data">';
    	html+='<input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+' 0.5)"> </div></div> </div>';
	    $('.data_y').append(html);
	    for(var i=0; i<row; i++) {
	    	$(".group_y:last .sub_header").after('<div class="content_input"> <input type="text" name="y_data" class="input_data"> <span class="focus-border"></span> </div>');
		}
	    
        if (index == 2) {
            $('#minus_col').show();
        }
        $(".colorpicker-show-input").spectrum({
            showInput: true
        });
        var width_group = 100/index + '%';
        $('.multi .content-multi-y .group_y').css('width', width_group );
    });	


    //#minus_input nút dáu -
	$('body').on("click", "#minus_input", function() {
		var type_form = $("#type_form").val();
		if ($(".x_data").find('.content_input').length == 2) {
	        $(this).hide();
	    }
	    switch (type_form) 
	    {
		    case 'form_pie':

			    $(".x_data").find('.content_input:last').remove();
			    $(".y_data").find('.content_input:last').remove();
			    $(".color_data").find('.content_input:last').remove();
			    $('.color_border').find('.content_input:last').remove();

		        break;
		    case 'form_bar':

			    $(".x_data").find('.content_input:last').remove();
			    $(".y_data").find('.content_input:last').remove();
			    $(".color_data").find('.content_input:last').remove();
			    $('.color_border').find('.content_input:last').remove();

		        break;
		    case 'form_line':
			    
			    $(".x_data").find('.content_input:last').remove();
			    $(".y_data").find('.content_input:last').remove();

		        break;
		    case 'form_mix':
			    
			    $(".x_data").find('.content_input:last').remove();
			    $(".y_data").find('.content_input:last').remove();

		        break;
		    case 'form_multi':
		        $(".x_data").find('.content_input:last').remove();
			    $(".group_y").find('.content_input:last').remove();
		        break;
		}
    });

	//#plus_input
    $('body').on("click", "#plus_input", function() {
    	var type_form = $("#type_form").val();
    	var color = random_rgba();
	    switch (type_form) 
	    {
		    case 'form_pie':

		        $('.x_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        $('.y_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        $('.color_data').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'0.5)"> </div>');
		        $('.color_border').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'1)"> </div>');
						
		        break;
		    case 'form_bar':

		        $('.x_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        $('.y_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        $('.color_data').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'0.5)"> </div>');
		        $('.color_border').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'1)"> </div>');
						
		        break;
		    case 'form_line':

			    $('.x_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        $('.y_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        
		        break;
		    case 'form_mix':

			    $('.x_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        $('.y_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
		        
		        break;
		    
		    case 'form_multi':
			    $('.x_data').append('<div class="content_input"> <input type="text" class="input_data"> <span class="focus-border"></span> </div>');
	    		$(".group_y").find(".content_input:last").after('<div class="content_input"> <input type="text" name="y_data" class="input_data"> <span class="focus-border"></span> </div>');
		        break;
		}

        if ($(".x_data").find('.content_input').length == 2) {
            $('#minus_input').show();
        }
        $(".colorpicker-show-input").spectrum({
            showInput: true
        });
    });		    

     //#import exel
    $('body').on('click', '#btn_submit_import', function(e) {
    	var type_form = $("#type_form").val();
	    
        e.preventDefault();

        var url = $('#form_import').attr('action');

        var fd = new FormData(document.forms["form_import"]);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && this.status == 200) {
            	clear_error('form_import');
                var data = JSON.parse(xhr.responseText);
                if (data.errors == null) {
                   
                    switch (type_form) 
				    {
					    case 'form_pie':

							$(".x_data").find('.content_input').remove();
		                    $(".color_data").find('.content_input').remove();
		                    $(".color_border").find('.content_input').remove();
		                    $(".y_data").find('.content_input').remove();
		                    
		                    $.each(data.x_data, function(index, el) {
		                    	var color = random_rgba();
		                        $('.x_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                        $('.color_data').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'0.5)"> </div>');
		                        $('.color_border').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'1)"> </div>');
		                    });
		                    $.each(data.y_data, function(index, el) {
		                        $('.y_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });

					        break;
					    case 'form_bar':

					    	$(".x_data").find('.content_input').remove();
		                    $(".color_data").find('.content_input').remove();
		                    $(".color_border").find('.content_input').remove();
		                    $(".y_data").find('.content_input').remove();
		                    
		                    $.each(data.x_data, function(index, el) {
		                    	var color = random_rgba();
		                        $('.x_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                        $('.color_data').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'0.5)"> </div>');
		                        $('.color_border').append('<div class="content_input"> <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+'1)"> </div>');
		                    });
		                    $.each(data.y_data, function(index, el) {
		                        $('.y_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });

					        break;
					    case 'form_line':

					        $(".x_data").find('.content_input').remove();
		                    $(".y_data").find('.content_input').remove();
		                    $.each(data.x_data, function(index, el) {
		                        $('.x_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });
		                    $.each(data.y_data, function(index, el) {
		                        $('.y_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });

					        break;
					    case 'form_mix':
					        $(".x_data").find('.content_input').remove();
		                    $(".y_data").find('.content_input').remove();
		                    $.each(data.x_data, function(index, el) {
		                        $('.x_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });
		                    $.each(data.bar_data, function(index, el) {
		                        $('.bar_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });
		                    $.each(data.line_data, function(index, el) {
		                        $('.line_data').append('<div class="content_input"> <input type="text" value="' + el + '" class="input_data"> <span class="focus-border"></span> </div>');
		                    });
					        break;
					    case 'form_multi':
					        $(".x_data").find('.content_input').remove();
		                    $(".data_y").find('.group_y').remove();
		                    for (var index = 1; index <data.count_y; index++) 
		                    {
		                    	var color = random_rgba();
	    						var html ='<div class="group_y y_data'+index+'"> <header class="sub_header">Y'+index+'</header>';
						    	html+='<div class="color_input"><div class="color_data">';
						    	html+='<input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba('+color+' 0.5)"> </div></div> </div>';
							    $('.data_y').append(html);
		                    }
		                    var width_group = 100/(data.count_y-1) + '%';
		                    $('.multi .content-multi-y .group_y').css('width', width_group);
		                    for (var index = 0; index <data.x_data.length; index++) 
		                    {
		                        $('.x_data').append('<div class="content_input"> <input type="text" value="' + data.x_data[index] + '" class="input_data"> <span class="focus-border"></span> </div>');
	    						for (var i = 1; i <data.count_y; i++) {
	    							$('.y_data'+i+' .color_input').before('<div class="content_input"> <input type="text"value="' + data.y_data[index*(data.count_y-1) +i -1] + '" name="y_data" class="input_data"> <span class="focus-border"></span> </div>');
			                    }
		                    }
					        break;
					}
                     sweetAlert("Import!", data.success, "success");
                    $(".colorpicker-show-input").spectrum({
                        showInput: true
                    });
                   
                } else {
                    associate_errors(data.errors, 'form_import');
                }
            }
        }
        xhr.open('POST', url, true);
        xhr.onload = function() {};
        xhr.send(fd);
    });

    //Draw chart
    var myPieChart;
	$("#draw").on("click", ".btn_drawchart", function() {
		var type_form = $("#type_form").val();
		var type = $("#type").val();
	    var labels = [];
	    var data = [];
	    var title_chart = $(".title-chart input").val();
	    var title_chart_display = true;
	    if (!title_chart)
	    {
	        title_chart_display = false;
	    } 
	    var bag_color = [];
	    var border_color = [];
	    var border_width = $("#border_width").val();
	    var font_size_title = $("#font_size_title").val();
	    var font_size_label = $("#font_size_label").val();
	    var color_title= $("#color_title").val();
	    var position_title= $("#position_title").val();

        $('#step03').tab('show');
        $('#container_chart .warning-step').hide();
        $('#container_chart .content-step3').show('slow', function() {});
        $(".save_btn").show('slow', function() {});

        $("#container_chart").addClass("chart-size");
       
        $('#myChart').remove(); // this is my <canvas> element
        $('#container_chart').append('<canvas id="myChart"><canvas>');
        canvas = document.querySelector('#myChart'); 
        var ctx = $("#myChart").get(0).getContext("2d"); 
        var width_chart = $('#width_chart').val();
        var height_chart = $('#height_chart').val();
        $('#myChart').width(width_chart).height(height_chart);

	    switch (type_form) 
	    {
		    case 'form_pie':

				$('.x_data input').each(function(index, el) {
		            labels.push($(this).val());
		        });
		        $('.y_data input').each(function(index, el) {
		            data.push($(this).val());
		        });
		        $('.color_data input').each(function(index, el) {
		            bag_color.push($(this).val());
		        });
		        $('.color_border input').each(function(index, el) {
		            border_color.push($(this).val());
		        });

		        myPieChart = new Chart(ctx, {
		            type: type,
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: '',
		                    data: data,
		                    backgroundColor: bag_color,
		                    borderColor: border_color,
		                    borderWidth: border_width
		                }]
		            },
		            options: {
		                responsive: false,
		                maintainAspectRatio: true,
		                title: {
		                    display: title_chart_display,
		                    text: title_chart,
		                    fontSize: parseInt(font_size_title),
		                    fontColor: color_title,
		                    padding: 15,
		                },
		            }
		        });

		        break;
		    case 'form_bar':
				$('.x_data input').each(function(index, el) {
		            labels.push($(this).val());
		        });
		        $('.y_data input').each(function(index, el) {
		            data.push($(this).val());
		        });
		        $('.color_data input').each(function(index, el) {
		            bag_color.push($(this).val());
		        });
		        $('.color_border input').each(function(index, el) {
		            border_color.push($(this).val());
		        });

		        myPieChart = new Chart(ctx, {
		            type: type,
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: '',
		                    data: data,
		                    backgroundColor: bag_color,
		                    borderColor: border_color,
		                    borderWidth: border_width
		                }]
		            },
		            options: {
		                responsive: false,
		                maintainAspectRatio: true,
		                title: {
		                    fontSize: parseInt(font_size_title),
		                    display: title_chart_display,
		                    text: title_chart,                        
		                    fontColor: color_title,
		                    position: position_title,
		                    padding: 15,
		                },
		                scales: {
		                    yAxes: [{
		                        ticks: {
		                            beginAtZero:true,
		                            fontSize: font_size_label,
		                        }
		                    }],
		                    xAxes: [{
		                        ticks: {
		                            fontSize: font_size_label,
		                        },
		                        gridLines: {
		                            drawOnChartArea: true
		                        }
		                    }]
		                }
		            }
		        });
		        break;
		    case 'form_line':
			    
			    $('.x_data input').each(function(index, el) {
		            labels.push($(this).val());
		        });
		        $('.y_data input').each(function(index, el) {
		            data.push($(this).val());
		        });
		        $('.color_data input').each(function(index, el) {
		            bag_color.push($(this).val());
		        });
		        $('.color_border input').each(function(index, el) {
		            border_color.push($(this).val());
		        });
		        var isfill = false;
		        if(type == 'area'){
		        	isfill = true;
		        	type ='line';
		        }
		        if(type == 'radar'){
		        	myPieChart = new Chart(ctx, {
			            type: type,
			            data: {
			                labels: labels,
			                datasets: [{
			                	fill: true,
			                    label: '',
			                    data: data,
			                    backgroundColor: bag_color,
			                    borderColor: border_color,
			                    pointBackgroundColor:border_color,
			                    borderWidth: border_width
			                }]
			            },
			            options: {
			                responsive: false,
			                maintainAspectRatio: true,
			                title: {
			                    fontSize: parseInt(font_size_title),
			                    display: title_chart_display,
			                    text: title_chart,                        
			                    fontColor: color_title,
			                    position: position_title,
			                    padding: 15,
			                },
			                scales: {
			                	ticks: {
			                		fontSize: font_size_label,
					                beginAtZero: true
					            }
			                }
			            }
			        });
		        }
		        else{
		        	myPieChart = new Chart(ctx, {
			            type: type,
			            data: {
			                labels: labels,
			                datasets: [{
			                	fill: isfill,
			                    label: '',
			                    data: data,
			                    backgroundColor: bag_color,
			                    borderColor: border_color,
			                    borderWidth: border_width
			                }]
			            },
			            options: {
			                responsive: false,
			                maintainAspectRatio: true,
			                title: {
			                    fontSize: parseInt(font_size_title),
			                    display: title_chart_display,
			                    text: title_chart,                        
			                    fontColor: color_title,
			                    position: position_title,
			                    padding: 15,
			                },
			                scales: {
			                    yAxes: [{
			                        ticks: {
			                            beginAtZero:true,
			                            fontSize: font_size_label,
			                        }
			                    }],
			                    xAxes: [{
			                        ticks: {
			                            fontSize: font_size_label,
			                        },
			                        gridLines: {
			                            drawOnChartArea: true
			                        }
			                    }]
			                }
			            }
			        });
		        }
		        break;
		    case 'form_mix':
		    	var name_bar = $("#name_bar").val();
	    		var name_line = $("#name_line").val();
	    		var dataBar = [], dataLine = [];

		        $('.x_data input').each(function(index, el) {
		            labels.push($(this).val());
		        });
		        $('.bar_data input').each(function(index, el) {
		            dataBar.push($(this).val());
		            bag_color.push($('.color_data input').val());
		        });
		        $('.line_data input').each(function(index, el) {
		            dataLine.push($(this).val());
		        });
		        border_color = $('.color_border input').val();
		        
		        var isfill = false;
		        if(type == 'bar_area'){
		        	isfill = true;
		        }
		        
	        	myPieChart = new Chart(ctx, {
	                type: 'bar',
	                data: {
	                    labels: labels,
	                    datasets: [{
	                        label: name_bar,
	                        data: dataBar,
	                        backgroundColor: bag_color,
	                        borderWidth: 1,
	                    } , 
	                    {
	                        label: name_line,
	                        data: dataLine,
	                        fill: isfill,
	                        type: 'line',
	                        borderColor:border_color,                        
	                        borderWidth: border_width,
	                    }],
	                },
	                options: {
	                	responsive: false,
			                maintainAspectRatio: true,
			                title: {
			                    fontSize: parseInt(font_size_title),
			                    display: title_chart_display,
			                    text: title_chart,                        
			                    fontColor: color_title,
			                    position: position_title,
			                    padding: 15,
			                },
	                    scales: {
		                    yAxes: [{
		                        ticks: {
		                            beginAtZero:true,
		                            fontSize: font_size_label,
		                        }
		                    }],
		                    xAxes: [{
		                        ticks: {
		                            fontSize: font_size_label,
		                        },
		                        gridLines: {
		                            drawOnChartArea: true
		                        }
		                    }]
		                }
	                }
            	});
		        
		        break;
		    case 'form_multi':
			    $('.x_data input').each(function(index, el) {
			        labels.push($(this).val());
			    });
			    var config = {};
			    var isfill = false;
		        if(type == 'area'){
		        	isfill = true;
		        	type = 'line';
		        }

		        if(type == 'radar')
		        {
		        	isfill = true;
		        	config = {
			            type: type,
			            data: {
			                labels: labels,
			                datasets: [{
			                    borderWidth: border_width
			                }]
			            },
			            options: {
			                responsive: false,
			                maintainAspectRatio: true,
			                title: {
			                    fontSize: parseInt(font_size_title),
			                    display: title_chart_display,
			                    text: title_chart,                        
			                    fontColor: color_title,
			                    position: position_title,
			                    padding: 15,
			                },
			                scales: {
			                	ticks: {
			                		fontSize: font_size_label,
					                beginAtZero: true
					            }
			                }
			            }
			        };
		        }else{
		        	config = {
			            type: type,
			            data: {
			                labels: labels,
			                datasets: []
			            },
			            options: {
			                responsive: false,
			                title: {
			                    fontSize: parseInt(font_size_title),
			                    display: title_chart_display,
			                    text: title_chart,                        
			                    fontColor: color_title,
			                    position: position_title,
			                    padding: 15,
			                },
			                scales: {
			                	yAxes: [{
			                        ticks: {
			                            beginAtZero:true,
			                            fontSize: font_size_label,
			                        }
			                    }],
			                    xAxes: [{
			                        ticks: {
			                            fontSize: font_size_label,
			                        },
			                        gridLines: {
			                            drawOnChartArea: true
			                        }
			                    }]
			                }
			            }
		        	};
		        }
		        var index = $('.group_y').length;

		        for(var i = 1; i <=index; i++)
		        {
		        	var newColor = $('.y_data'+i +' .color_data input').val();
		        	var newDataset = {
		                label: 'Dataset ' + i,
		                backgroundColor: newColor,
		                borderColor: newColor,
		                pointBackgroundColor:newColor,
		                data: [],
		                fill: isfill
		            };
		             newColor = [];
		            $('.y_data'+i +' input').each(function(index, el) {
		            	newDataset.data.push($(this).val());
			        });
			        config.data.datasets.push(newDataset);
		        }
	            console.log(config);
	            myPieChart = new Chart(ctx, config);
		        break;
		}
	});
});
/**
 * random color
 */
function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',';
}
