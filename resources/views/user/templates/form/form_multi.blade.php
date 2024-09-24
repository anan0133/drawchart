<div class="chart-data multi">  
    <div class="title-chart">
        <label>@lang('text.draw.step2.title')</label>
        <input class="title" type="text" value="@lang('text.draw.title_default')" placeholder="">
        <span class="focus-border"></span>
    </div> 
    <div class="btn_import">            
        <form action="{{ route('customer.importExcel') }}" method="post" enctype="multipart/form-data" name="form_import" id="form_import">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="example">
                <a href="{{ URL::asset('File-template-multi.xls')}}" class="btn-example">@lang('text.draw.step2.template')</a>
            </div>
            <div class="input-choose" id="import_file">
                <input type="file" name="import_file"/>
                <strong><span class="help-block"></span></strong>
            </div>
            <div class="input-import">
                <a class="btn-import" id="btn_submit_import" >@lang('text.draw.step2.import')</a>
            </div>
        </form>
    </div>     
    <div class="setting">
        <header class="header_data">@lang('text.draw.step2.setting')</header>
        <div class="setting_data">
            <div class="content_input">
                <label>@lang('text.lbl.type')</label>
                <select class="select" id="type">
                <?php $name_locale = 'name'.'_'.App::getLocale(); ?>
                @foreach ($type_list as $index => $item)
                    <option value="{{$item->key}}" id-type="{{$item->id}}"
                    {{$item->id == $type->id? 'selected':''}}>{{$item->$name_locale}}
                </option>
                @endforeach
                </select>
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.color_title')</label>
                <input type="text" id="color_title" class="form-control colorpicker-show-input " data-preferred-format="hex" value="#213047">
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.size_label') (Ox, Oy)</label>
                <select class="select" id="font_size_label" >
                   <option value="14">14</option>
                   <option selected value="16">16</option>
                   <option value="18">18</option>
                   <option value="20">20</option>
                   <option value="24">24</option>
                </select>
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.width')</label>
                <select class="select" id="width_chart" >
                    <option selected value="900">900</option>
                    <option value="800">800</option>
                    <option value="700">700</option>
                    <option value="600">600</option>
                    <option value="500">500</option>
                    <option value="400">400</option>
                    <option value="300">300</option>
                </select>            
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.position_title')</label>
                <select class="select" id="position_title">
                   <option selected value="top">@lang('text.draw.step2.position_top')</option>
                   <option value="right">@lang('text.draw.step2.position_right')</option>
                   <option value="bottom">@lang('text.draw.step2.position_bottom')</option>
                   <option value="left">@lang('text.draw.step2.position_left')</option>
               </select>
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.size_title')</label>
                <select class="select" id="font_size_title" >
                   <option selected value="25">25</option>
                   <option value="23">23</option>
                   <option selected value="20">20</option>
                   <option value="18">18</option>
                   <option value="15">15</option>
               </select>
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.width') @lang('text.draw.step2.border') </label>
                <select class="select" id="border_width">
                   <option value="5">5</option>
                   <option value="4">4</option>
                   <option value="3">3</option>
                   <option value="2">2</option>
                   <option selected value="1">1</option>
                   <option value="0">0</option>
                </select>
            </div>
            <div class="content_input">
                <label>@lang('text.draw.step2.height')</label>
                <select class="select" id="height_chart">
                    <option value="900">900</option>
                    <option value="800">800</option>
                    <option value="700">700</option>
                    <option value="600">600</option>
                    <option selected value="500">500</option>
                    <option value="400">400</option>
                    <option value="300">300</option>
                </select>
            </div>          
       </div>
    </div>       
    <div class="content_data">
        <div class="content-multi-x">
            <div class="data_x x_data">      
                <header class="header_data">@lang('text.draw.step2.category')</header>
                <header class="sub_header">X</header>   
                <div class="content_input">
                    <input type="text" name="x_data" class="input_data">
                    <span class="focus-border"></span>
                </div>
                <div class="content_input">
                    <input type="text" name="x_data" class="input_data">
                    <span class="focus-border"></span>
                </div>
                <div class="content_input">
                    <input type="text" name="x_data" class="input_data">
                    <span class="focus-border"></span>
                </div>
                <div class="content_input">
                    <input type="text" name="x_data" class="input_data">
                    <span class="focus-border"></span>
                </div>
            </div>
            <div class="add">
                <div class="minus">
                    <i class="fa fa-minus" id="minus_input" aria-hidden="true"></i>
                </div>
                <div class="plus">
                    <i class="fa fa-plus" id="plus_input"  aria-hidden="true"></i>
                </div>
            </div>
        </div>    
        <div class="content-multi-y">
           <div class="data_y ">
                <header class="header_data">@lang('text.draw.step2.value')</header>
                <div class="add">
                    <div class="minus">
                        <i class="fa fa-minus" id="minus_col" aria-hidden="true"></i>
                    </div>
                    <div class="plus">
                        <i class="fa fa-plus" id="plus_col"  aria-hidden="true"></i>
                    </div>
                </div>
                <div class="group_y y_data1">
                    <header class="sub_header">Y1</header>
                    <div class="content_input">
                        <input type="text" name="y_data" class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="content_input">
                        <input type="text" name="y_data" class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="content_input">
                        <input type="text" name="y_data" class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="content_input">
                        <input type="text" name="y_data"  class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="color_input">
                        <div class="color_data">
                              <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba(54, 162, 235, 0.5)">
                        </div>
                    </div>
                </div>               
                <div class="group_y y_data2">
                    <header class="sub_header">Y2</header>
                    <div class="content_input">
                        <input type="text" name="y_data" class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="content_input">
                        <input type="text" name="y_data" class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="content_input">
                        <input type="text" name="y_data" class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="content_input">
                        <input type="text" name="y_data"  class="input_data">
                        <span class="focus-border"></span>
                    </div>
                    <div class="color_input">
                        <div class="color_data">
                            <input type="text" class="form-control colorpicker-show-input " data-preferred-format="hex" value="rgba(255,99,132, 0.5)">
                        </div>
                    </div>
                </div>   
            </div>
       </div>
    </div>
    <form method="post" accept-charset="utf-8" name="form1">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>       
        <input name="hidden_data" id='hidden_data' type="hidden"/>
        <input name="title_chart" id='title_chart' type="hidden"/>
        <input name="type_chart" id='type_chart' type="hidden"/>
        <input name="url_save" id='url_save' value="{{route('customer.save')}}" type="hidden"/>
    </form>
   <div class="text-center">
       <a  class="btn btn-contact btn_drawchart wow tada">
           <span>@lang('text.draw.step2.draw')</span>
       </a>
   </div>
</div>
