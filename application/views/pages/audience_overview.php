 <section id="content" style="background-color:#efefef;">

        <?php
          $this->load->view('layout/toolbox');
        ?>
     
        <div class="row"  style="margin-left: 5px; margin-right:5px;">
            <div class="col s12 m12 l12">
              <div class="card-panel" style=" margin-top:-30px !important;">
                <div class="row">
                  <form class="col s12">
                    <div class="row" style="margin-left: 10px; display:none">
                      <div class="col s10 m8 l3"> 
                          <label for="variable">Overview</label>
                         <select onChange="select_changed();" id="select_variable" name="variable">
                            <option value="user" selected>Users</option>
                            <option value="session">Sessions</option>
                            <option value="page_session">Pages/Session</option>
                            <option value="page_view">Pages Views</option>
                            <!--
                            <option value="avg_ses_dur">Avg. Session Duration</option>
                            <option value="new_user">% New Users</option>
                          -->
                          </select>
                      </div>
                       <div class="col s2 m4 l9"><h2></h2> </div>
                       <!--
                       <div class="col s5">
                        <a class="waves-effect waves-light  btn">Daily</a>
                        <a class="waves-effect waves-light  btn">Weekly</a>
                        <a class="waves-effect waves-light  btn">Monthly</a>
                       </div>
                     -->
                    </div>
                    
                    <div class="row">
                      <!-- Chart code -->
                     <div id="first_seen" > 
                    <div id="chartdiv" style="width: 100%;height:300px;font-size:11px;">

                    </div>
                  </div>
                    </div>
                  </form>
                </div>
                <div class="divider"></div>
                <div class="row" style="margin-left:10px;">
                    <div class="col s12 m8 l6">
                        <div class="row">
                            <div class="col s6 m6 l4" style="font-size:13px;margin-top:10px;">Session
                                <h4><span id="sum_session">Loading Data..</span></h4>
                                <div class="chart-block waves-effect waves-light btn white" style="padding:0px"><a href="javascript:scroll_to_div('content');scroll_to_div('content');generate_small_chart('session')">
                                <div id="line1" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div></a>
                                </div> 
                            </div>
                            <div class="col s6 m6 l4" style="font-size:13px;margin-top:10px;">Users
                                <h4><span id="sum_user">Loading Data..</span></h4>
                                <div class="chart-block waves-effect waves-light btn white" style="padding:0px"><a href="javascript:scroll_to_div('content');generate_small_chart('user')">
                                <div id="line2" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div></a>
                                </div> 
                            </div>
                           <div class="col s6 m6 l4" style="font-size:13px;margin-top:10px;">Page Views
                                <h4><span id="sum_page_view">Loading Data..</span></h4>
                                <div class="chart-block waves-effect waves-light btn white" style="padding:0px"><a href="javascript:scroll_to_div('content');generate_small_chart('page_view')">
                                <div id="line3" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div></a>
                                </div> 
                            </div>
                           <div class="col s6 m6 l4" style="font-size:13px;margin-top:10px;">Page/Session
                                <h4><span id="sum_page_session">Loading Data..</span></h4>
                                <div class="chart-block waves-effect waves-light btn white" style="padding:0px"><a href="javascript:scroll_to_div('content');generate_small_chart('page_session')">
                                <div id="line4" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div></a>
                                </div> 
                            </div>
                            <div class="col s6 m6 l4" style="font-size:13px;margin-top:10px;display:none;">Avg. Session Duration
                                <h4><span id="sum_avg_ses_dur">Loading Data..</span></h4>
                                <div class="chart-block waves-effect waves-light btn white" style="padding:0px"><a href="javascript:scroll_to_div('content');generate_small_chart('avg_ses_dur')">
                                <div id="line5" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div></a>
                                </div> 
                            </div>
                            <div class="col s6 m6 l4" style="font-size:13px;margin-top:10px;display:none;">% New Users
                                <h4><span id="sum_new_user">Loading Data..</span></h4>
                                <div class="chart-block waves-effect waves-light btn white" style="padding:0px"><a href="javascript:scroll_to_div('content');generate_small_chart('new_user')">
                                <div id="line6" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div></a>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l6">
                      <p align="center"><span id="chart_pie_title"></span></p>
                      <div id="chart_pie" style="width: 100%;margin-top:10px;"></div>

                      <p align="center"><span id="chart_pie_title2"></span></p>
                      <div id="chart_pie2" style="width: 100%;margin-top:10px;"></div>
                    </div>
                </div>
                <br/>
                <div class="divider"></div>
                <br/>
                <div class="row">
                <div class="col s12 m8 l4">
                <ul class="collection">
                  <a href="#"><li class="collection-item dismissable">
                    <div style="font-size:large; "><b>Top 10 by Category</b>
                    </div>
                  </li></a>
                  <div class="divider"></div>
                  <a href="javascript:generate_table('devi');"><li class="collection-item dismissable">
                    <div>Device<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a href="javascript:generate_table('os_f');"><li class="collection-item dismissable">
                    <div>Operating System<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a style="display:none;" href="javascript:generate_table('path');"><li class="collection-item dismissable">
                    <div>Path<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a style="display:none;" href="javascript:generate_table('refe');"><li class="collection-item dismissable">
                    <div>Referrer <span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <!--
                  <div class="divider"></div>
                  <a href="#"><li class="collection-item dismissable">
                    <div style="font-size:large; "><b>System</b>
                    </div>
                  </li></a>
                  <div class="divider"></div>
                  <a href="#"><li class="collection-item dismissable">
                    <div>Browser<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a href="#"><li class="collection-item dismissable">
                    <div>Operating System<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a href="#"><li class="collection-item dismissable">
                    <div>Service Provider<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <div class="divider"></div>
                  <a href="#"><li class="collection-item dismissable">
                    <div style="font-size:large; "><b>Mobile</b>
                    </div>
                  </li></a>
                  <div class="divider"></div>
                  <a href="#"><li class="collection-item dismissable">
                    <div>Operating System<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a href="#"><li class="collection-item dismissable">
                    <div>Service Provider<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                  <a href="#"><li class="collection-item dismissable">
                    <div>Screen Resolution<span class="secondary-content"><i class="mdi-content-send"></i></span>
                    </div>
                  </li></a>
                -->
                </ul>
              </div>
              <div class="col s12 m12 l8">
                 <div id="striped-table">
      
                <div class="col s12 m12 l12"  id="table_top">
                 

                </div>
            </div>
            </div>
              </div>
            </div>
          </div>
      </div>
        <!--end container-->

      </section>
<script type="text/javascript">
  function autoResizeDiv()
  {
      document.getElementById('chartdiv').style.height = window.innerHeight-375  +'px';
     
  }
  window.onresize = autoResizeDiv;
  autoResizeDiv();

</script>

<script type="text/javascript">
  function scroll_to_div(divid)
  {
    var divid="#"+divid;
     $('html, body').animate({
            scrollTop: $(divid).offset().top
        }, 500); 
  }
</script>

 <script type="text/javascript">
              var config = {
                format: 'DD MMM YYYY',
                showShortcuts: true,
                shortcuts :
                {
                  'prev-days': [3,5,7],
                  'prev': ['week','month','year'],
                  'next-days':null,
                  'next':null
                }
              } 

              $(function() {
                  $('input[name="daterange"]').dateRangePicker(config);
                  $('input[name="daterange2"]').dateRangePicker(config);
              });
              </script>
<script>

    $(window).load(function() {
       generate_all();
    });

$('#date').on('change', function() {
    generate_all();
});

function generate_small_chart(temp)
{
  if(temp == 'session')
  {

  }


 document.getElementById('select_variable').value=temp;
 $('#select_variable').material_select();
 generate_all();
 
}

function select_changed()
{
  generate_all();

    // alert('wa');
}

function generate_all()
{
    generate_line_big();
    generate_sum_small();
    generate_line_small();
    generate_pie();
    generate_table('devi');
}



/*

*/
</script>


<script>
function loading(id)
{
  var new_id="#"+id;
  $(new_id).html('');

  var str='';
        str+= '<div align="center" style="min-height:250px; ">'
        str+= '<div class="preloader-wrapper active" style="position: relative;margin-top: 17.5%;">'
        str+= '<div class="spinner-layer spinner-red-only">'
        str+= '<div class="circle-clipper left">'
        str+= '<div class="circle"></div>'
        str+= '</div>'
        str+= '<div class="gap-patch">'
        str+= '<div class="circle"></div>'
        str+= '</div>'
        str+= '<div class="circle-clipper right">'
        str+= '<div class="circle"></div>'
        str+= '</div>'
        str+= '</div>'
        str+= '</div>'
        str+= '</div>'
  $(new_id).html(str);
  console.log(new_id) 
}

function generate_table(type)
{
        loading('table_top');
        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var is_compare = document.getElementById("compare").checked;
        var type= type;

        
        jQuery.ajax({
        url: '<?php echo base_url() ?>menu/audience/overview/top_table',
        type: 'POST',
        data: {
            date: date, type:type, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {  
          var type_name = '';
          if(type == 'devi')
          {
            type_name='Device';
          }
          else if (type == 'path')
          {
            type_name = 'Path';
          }
          else if (type== 'refe')
          {
            type_name = 'Referrer';
          }
          else if (type == 'os_f')
          {
            type_name = 'Operating System';
          }

        $('#table_top').html('');
        var str='';          
        if(is_compare)
        {
          str+= '<table class="borderless-table">'
          str+= '<thead>'
          str+= '<tr>'
          str+= '<th id="no"></th>'
          str+= '<th data-field="name">'+type_name+'</th>'
          str+= '<th data-field="price" style="text-align:right;">Session</th>'
          str+= '<th data-field="price">&nbsp;&nbsp;&nbsp;&nbsp;% Session</th>'
          str+= '</tr>'
          str+= '</thead>'
          str+= '<tbody>'
           for (var i = 0; i < Object.keys(data['chart']).length; i++) {
          str+= '<tr style="background:#f2f2f2;">'
          str+= '<td>'+(i+1)+'.</td>'
          str+= '<td colspan="3">'+data['chart'][i]['name']+ '</td>'
          str+= '</tr>'
          str+= '<tr>'
          str+= '<td></td>'
          str+= '<td >'+date+ '</td>'
          str+= '<td style="text-align:right;">'+addCommas(data['chart'][i]['value'])+ '</td>'
          str+= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'+'<span style="display:inline-block;background-color:#00bcd4;vertical-align:middle; max-height:10px;max-width:100px; width:'+parseFloat((data['chart'][i]['value']/data['chart'][i]['total'])*100).toFixed(0)+'px;">&nbsp;</span>'
          str+= '&nbsp;'+parseFloat((data['chart'][i]['value']/data['chart'][i]['total'])*100).toFixed(2)+'%</td>'
          str+= '</tr>' 
          str+= '<tr>'
          str+= '<td></td>'
          str+= '<td >'+date2+ '</td>'
          str+= '<td style="text-align:right;">'+addCommas(data['chart2'][i]['value'])+ '</td>'
          str+= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'+'<span style="display:inline-block;background-color:#00bcd4;vertical-align:middle; max-height:10px;max-width:100px; width:'+parseFloat((data['chart2'][i]['value']/data['chart2'][i]['total'])*100).toFixed(0)+'px;">&nbsp;</span>'
          str+= '&nbsp;'+parseFloat((data['chart2'][i]['value']/data['chart2'][i]['total'])*100).toFixed(2)+'%</td>'
          str+= '</tr>'
          str+= '<tr>'
          str+= '<td></td>'
          str+= '<td ><b>% Change</b></td>'
          var session_changed =parseFloat((data['chart'][i]['value']-data['chart2'][i]['value'])/data['chart2'][i]['value']*100).toFixed(2);
          if(session_changed > 0)
          {  
            str+= '<td style="text-align:right;color:rgb(0, 153, 51);"><small>'+session_changed+ ' %</small></td>'
          }else if(session_changed < 0)
          {  
            str+= '<td style="text-align:right;color:rgb(221, 75, 57);"><small>'+session_changed+ ' %</small></td>'
          }else {
            str+= '<td style="text-align:right;"><small>'+session_changed+ ' %</small></td>'
          }
          var persen_session_changed =  parseFloat(((data['chart'][i]['value']/data['chart'][i]['total'])-(data['chart2'][i]['value']/data['chart2'][i]['total']))/(data['chart2'][i]['value']/data['chart2'][i]['total'])*100).toFixed(2);
          if(persen_session_changed > 0)
          {
            str+= '<td style="color:rgb(0, 153, 51)">&nbsp;&nbsp;&nbsp;&nbsp;<small>'+persen_session_changed+'% </small></td>'
          }
          else if(persen_session_changed < 0){
            str+= '<td style="color:rgb(221, 75, 57)">&nbsp;&nbsp;&nbsp;&nbsp;<small>'+persen_session_changed+'% </small></td>'
          }
          else{
            str+= '<td >&nbsp;&nbsp;&nbsp;&nbsp;<small>'+persen_session_changed+'% </small></td>'
          }
          str+= '</tr>'
          }
          str+= '</tbody>'
          str+= '</table>'
        }else
        {
          str+= '<table class="striped">'
          str+= '<thead>'
          str+= '<tr>'
          str+= '<th id="no"></th>'
          str+= '<th data-field="name">'+type_name+'</th>'
          str+= '<th data-field="price" style="text-align:right;">Session</th>'
          str+= '<th data-field="price">&nbsp;&nbsp;&nbsp;&nbsp;% Session</th>'
          str+= '</tr>'
          str+= '</thead>'
          str+= '<tbody>'
           for (var i = 0; i < Object.keys(data['chart']).length; i++) {
          str+= '<tr>'
          str+= '<td>'+(i+1)+'.</td>'
          str+= '<td>'+data['chart'][i]['name']+ '</td>'
          str+= '<td style="text-align:right;">'+data['chart'][i]['value']+ '</td>'
          str+= '<td>&nbsp;&nbsp;&nbsp;&nbsp;'+'<span style="display:inline-block;background-color:#00bcd4;vertical-align:middle; max-height:10px;max-width:100px; width:'+parseFloat((data['chart'][i]['value']/data['chart'][i]['total'])*100).toFixed(0)+'px;">&nbsp;</span>'
          str+= '&nbsp;'+parseFloat((data['chart'][i]['value']/data['chart'][i]['total'])*100).toFixed(2)+'%</td>'
          str+= '</tr>'
          }
          str+= '</tbody>'
          str+= '</table>'
        }
        $('#table_top').html(str);
           
        }
      });
    }

function generate_line_big()
{


        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var overview= document.getElementById('select_variable').value;
        var is_compare = document.getElementById("compare").checked;
    
        loading('chartdiv');
        
        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/overview/line_big',
        type: 'POST',
        data: {
            date: date, overview:overview, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {

          $('#chartdiv').html('');
            //console.log(data); // do with data e.g success message
            if(is_compare){
              var chart = AmCharts.makeChart("chartdiv", {
                  "type": "serial",
                  "theme": "light",
                  "marginRight": 80,
                  "autoMarginOffset": 20,
                  "marginTop": 7,
                  "pathToImages" : "<?php echo base_url() ?>assets/amcharts/images/",
                  "dataProvider": data['chart'],
                  "valueAxes": [{
                      "axisAlpha": 0.2,
                      "dashLength": 1,
                      "position": "left"
                  }],
                  "mouseWheelZoomEnabled": false,
                  "graphs": [{
                      "id": "g1",
                       "balloonText": "<span style='text-align:left;'><b>[[date]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
        
                      "bullet": "round",
                      "bulletBorderAlpha": 1,
                      "bulletColor": "#FFFFFF",
                      "hideBulletsCount": 50,
                      "title": date,
                      "valueField": "value",
                      "categoryField" : "date",
                      "useLineColorForBulletBorder": true
                  },{
                      "id": "g2", 
                      "balloonText": "<span style='text-align:left;'><b>[[date2]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
        
                      "bullet": "round",
                      "bulletBorderAlpha": 1,
                      "bulletColor": "#FFFFFF",
                      "hideBulletsCount": 50,
                      "title": date2,
                      "valueField": "value2",
                      "categoryField" : "date2",
                      "useLineColorForBulletBorder": true 
                  }],

                  "chartCursor": {
                     "limitToGraph":"g1"
                  },
                  "categoryField": "date",
                  "categoryAxis": {
                      "parseDates": false,
                      "axisColor": "#DADADA",
                      "minorGridEnabled": true
                  },
                  "export": {
                      "enabled": true
                  },"legend": {
                  "useGraphSettings": true
                }
              });
          }
          else{
            var chart = AmCharts.makeChart("chartdiv", {
                  "type": "serial",
                  "theme": "light",
                  "marginRight": 80,
                  "autoMarginOffset": 20,
                  "marginTop": 7,
                  "pathToImages" : "<?php echo base_url() ?>assets/amcharts/images/",
                  "dataProvider": data['chart'],
                  "valueAxes": [{
                      "axisAlpha": 0.2,
                      "dashLength": 1,
                      "position": "left"
                  }],
                  "mouseWheelZoomEnabled": false,
                  "graphs": [{
                      "id": "g1",
                        "balloonText": "[[value]]",
                      "bullet": "round",
                      "bulletBorderAlpha": 1,
                      "bulletColor": "#FFFFFF",
                      "hideBulletsCount": 50,
                      "title": date,
                      "valueField": "value",
                      "categoryField" : "date",
                      "useLineColorForBulletBorder": true
                  }],

                  "chartCursor": {
                     "limitToGraph":"g1"
                  },
                  "categoryField": "date",
                  "categoryAxis": {
                      "parseDates": false,
                      "axisColor": "#DADADA",
                      "minorGridEnabled": true
                  },
                  "export": {
                      "enabled": true
                  }
              });
          }

        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
        });
}

function generate_sum_small()
{

        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var overview= document.getElementById('select_variable').value;
        var is_compare = document.getElementById('compare').checked;

        
        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/overview/sum_small',
        type: 'POST',
        data: {
            date: date, overview:overview, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
          if(!is_compare)
          {
          document.getElementById('sum_user').innerHTML= addCommas(data['chart'][0].user);
          document.getElementById('sum_session').innerHTML= addCommas(data['chart'][0].session);
          document.getElementById('sum_page_session').innerHTML= parseFloat(addCommas(data['chart'][0].page_session)).toFixed(2);
          document.getElementById('sum_page_view').innerHTML= addCommas(data['chart'][0].page_view);
          document.getElementById('sum_new_user').innerHTML= '84%';
          document.getElementById('sum_avg_ses_dur').innerHTML= '00:00:48';

          document.getElementById('sum_user').style.color=  "#000000";
          document.getElementById('sum_session').style.color=  "#000000";
          document.getElementById('sum_page_session').style.color=  "#000000";
          document.getElementById('sum_page_view').style.color=  "#000000";
          }
          else{
            var sum_user = (((data['chart'][0].user-data['chart'][0].user2)/data['chart'][0].user2)*100).toFixed(2);
            if(sum_user>0 )
            {
              document.getElementById('sum_user').style.color=  "#009933";
            }else{
              document.getElementById('sum_user').style.color=  "#dd4b39";
            }
            document.getElementById('sum_user').innerHTML=  sum_user+ "%";
            document.getElementById('sum_user').innerHTML+= "<p><small>"+addCommas(data['chart'][0].user)+" vs "+addCommas(data['chart'][0].user2)+"</small></p>";
            
            var sum_session = (((data['chart'][0].session-data['chart'][0].session2)/data['chart'][0].session2)*100).toFixed(2);
            if(sum_session>0 )
            {
              document.getElementById('sum_session').style.color=  "#009933";
            }else{
              document.getElementById('sum_session').style.color=  "#dd4b39";
            }
            document.getElementById('sum_session').innerHTML=  sum_session+ "%";
            document.getElementById('sum_session').innerHTML+= "<p><small>"+addCommas(data['chart'][0].session)+" vs "+addCommas(data['chart'][0].session2)+"</small></p>";
            
            var sum_page_session = (((data['chart'][0].page_session-data['chart'][0].page_session2)/data['chart'][0].page_session2)*100).toFixed(2);
            if(sum_page_session>0 )
            {
              document.getElementById('sum_page_session').style.color=  "#009933";
            }else{
              document.getElementById('sum_page_session').style.color=  "#dd4b39";
            }
            document.getElementById('sum_page_session').innerHTML=  sum_page_session+ "%";
            document.getElementById('sum_page_session').innerHTML+= "<p><small>"+(parseFloat(data['chart'][0].page_session)).toFixed(2)+" vs "+(parseFloat(data['chart'][0].page_session2)).toFixed(2)+"</small></p>";
            
            var sum_page_view = (((data['chart'][0].page_view-data['chart'][0].page_view2)/data['chart'][0].page_view2)*100).toFixed(2);
            if(sum_page_view>0 )
            {
              document.getElementById('sum_page_view').style.color=  "#009933";
            }else{
              document.getElementById('sum_page_view').style.color=  "#dd4b39";
            }
            document.getElementById('sum_page_view').innerHTML=  sum_page_view+ "%";
            document.getElementById('sum_page_view').innerHTML+= "<p><small>"+addCommas(data['chart'][0].page_view)+" vs "+addCommas(data['chart'][0].page_view2)+"</small></p>";
            
          }
        }
      });
    }

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function generate_line_small()
{


        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var overview= document.getElementById('select_variable').value;
        var is_compare = document.getElementById("compare").checked;
    
        loading('line1');
        loading('line2');
        loading('line3');
        loading('line4');
        
        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/overview/line_small',
        type: 'POST',
        data: {
            date: date, overview:overview, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
          $('#line1').html('');
          $('#line2').html('');
          $('#line3').html('');
          $('#line4').html('');
            //console.log(data); // do with data e.g success message
            AmCharts.makeChart( "line1", {
              "type": "serial",
            "theme": "light",

              "dataProvider": data['chart'],
              "categoryField": "date",
              "autoMargins": false,
              "marginLeft": 0,
              "marginRight": 5,
              "marginTop": 0,
              "marginBottom": 0,
              "graphs": [ {
                "valueField": "session",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#67b7dc",
                "fillAlphas": 0.2
              },{"id" :"g2",
                "valueField": "session2",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#fdd400"
              }  ],
              "valueAxes": [ {
                "gridAlpha": 0,
                "axisAlpha": 0
              } ],
              "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "startOnAxis": true
              }
            } );

            AmCharts.makeChart( "line2", {
              "type": "serial",
            "theme": "light",

              "dataProvider": data['chart'],
              "categoryField": "date",
              "autoMargins": false,
              "marginLeft": 0,
              "marginRight": 5,
              "marginTop": 0,
              "marginBottom": 0,
              "graphs": [ {
                "id" :"g1",
                "valueField": "user",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#67b7dc",
                "fillAlphas": 0.2
              },{"id" :"g2",
                "valueField": "user2",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#fdd400"
              } ],
              "valueAxes": [ {
                "gridAlpha": 0,
                "axisAlpha": 0
              } ],
              "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "startOnAxis": true
              }
            } );

            AmCharts.makeChart( "line3", {
              "type": "serial",
            "theme": "light",

              "dataProvider": data['chart'],
              "categoryField": "date",
              "autoMargins": false,
              "marginLeft": 0,
              "marginRight": 5,
              "marginTop": 0,
              "marginBottom": 0,
              "graphs": [ {
                "id":"g1",
                "valueField": "page_view",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#67b7dc",
                "fillAlphas": 0.2
              },{"id" :"g2",
                "valueField": "user2",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#fdd400"
              } ],
              "valueAxes": [ {
                "gridAlpha": 0,
                "axisAlpha": 0
              } ],
              "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "startOnAxis": true
              }
            } );

            AmCharts.makeChart( "line4", {
              "type": "serial",
            "theme": "light",

              "dataProvider": data['chart'],
              "categoryField": "date",
              "autoMargins": false,
              "marginLeft": 0,
              "marginRight": 5,
              "marginTop": 0,
              "marginBottom": 0,
              "graphs": [ {
                "valueField": "pages_per_session",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#67b7dc",
                "fillAlphas": 0.2
              },{"id" :"g2",
                "valueField": "pages_per_session2",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#fdd400"
              } ],
              "valueAxes": [ {
                "gridAlpha": 0,
                "axisAlpha": 0
              } ],
              "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "startOnAxis": true
              }
            } );

            AmCharts.makeChart( "line5", {
              "type": "serial",
            "theme": "light",

              "dataProvider": data['chart'],
              "categoryField": "date",
              "autoMargins": false,
              "marginLeft": 0,
              "marginRight": 5,
              "marginTop": 0,
              "marginBottom": 0,
              "graphs": [ {
                "valueField": "session",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#fdd400",
                "fillAlphas": 0.2
              } ],
              "valueAxes": [ {
                "gridAlpha": 0,
                "axisAlpha": 0
              } ],
              "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "startOnAxis": true
              }
            } );

            AmCharts.makeChart( "line6", {
              "type": "serial",
            "theme": "light",

              "dataProvider": data['chart'],
              "categoryField": "date",
              "autoMargins": false,
              "marginLeft": 0,
              "marginRight": 5,
              "marginTop": 0,
              "marginBottom": 0,
              "graphs": [ {
                "valueField": "session",
                "bulletField": "bullet",
                "showBalloon": false,
                "lineColor": "#67b7dc",
                "fillAlphas": 0.2
              } ],
              "valueAxes": [ {
                "gridAlpha": 0,
                "axisAlpha": 0
              } ],
              "categoryAxis": {
                "gridAlpha": 0,
                "axisAlpha": 0,
                "startOnAxis": true
              }
            } );
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
        });
}
/**
 * Line Chart #1
 */


</script>

<script>

function generate_top()
{
    
}

function generate_pie()
{

        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var overview= document.getElementById('select_variable').value;
        var is_compare = document.getElementById("compare").checked;
        var data = new Array();
        loading('chart_pie');
        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/overview/pie',
        type: 'POST',
        data: {
            date: date, overview:overview, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
          $('#chart_pie').html('');
          //document.getElementById("chart_pie_title").innerHTML="<p>"+date+"</p>";
          //document.getElementById("chart_pie_title2").innerHTML="";
          document.getElementById("chart_pie2").style.display='none';
          document.getElementById("chart_pie").style.minHeight='200px';
          var chart = AmCharts.makeChart("chart_pie", {
            "type": "pie",
            "startDuration": 0,
             "theme": "light",
            "addClassNames": true,
            "legend":{
              "valueText" :"",
              "position":"right",
              "align" : "center"
            },"titles": [
              {
                "text": date,
                "size": 11.5,
                "marginTop": -10
              }
            ],
            "labelRadius": -25,
            "labelText" : "[[percents]]% ",
              "marginTop": 0,
            "marginBottom": 0,
            "marginLeft": 0,
            "marginRight": 0,
            "pullOutRadius" : 0,
            "autoMargins" : false,
            "innerRadius": "30%",
            "defs": {
              "filter": [{
                "id": "shadow",
                "width": "200%",
                "height": "200%",
                "feOffset": {
                  "result": "offOut",
                  "in": "SourceAlpha",
                  "dx": 0,
                  "dy": 0
                },
                "feGaussianBlur": {
                  "result": "blurOut",
                  "in": "offOut",
                  "stdDeviation": 5
                },
                "feBlend": {
                  "in": "SourceGraphic",
                  "in2": "blurOut",
                  "mode": "normal"
                }
              }]
            },
            "dataProvider": data['chart'],
            "valueField": "value",
            "titleField": "user",
            "export": {
              "enabled": true
            }
          }); 

          if(is_compare===true)
          {

          //document.getElementById("chart_pie_title2").innerHTML="<p>"+date2+"</p>";
          
          document.getElementById("chart_pie2").style.minHeight='200px';
          document.getElementById("chart_pie2").style.display='block';
          
                   var chart = AmCharts.makeChart("chart_pie2", {
            "type": "pie",
            "startDuration": 0,
             "theme": "light",
            "addClassNames": true,
            "legend":{
              "valueText" :"",
              "position":"right",
              "align" : "center"
            },"titles": [
              {
                "text": date2,
                "size": 11.5,
                "marginTop": -10
              }
            ],
            "labelRadius": -25,
            "labelText" : "[[percents]]% ",
              "marginTop": 0,
            "marginBottom": 0,
            "marginLeft": 0,
            "marginRight": 0,
            "pullOutRadius" : 0,
            "autoMargins" : false,
            "innerRadius": "30%",
            "defs": {
              "filter": [{
                "id": "shadow",
                "width": "200%",
                "height": "200%",
                "feOffset": {
                  "result": "offOut",
                  "in": "SourceAlpha",
                  "dx": 0,
                  "dy": 0
                },
                "feGaussianBlur": {
                  "result": "blurOut",
                  "in": "offOut",
                  "stdDeviation": 5
                },
                "feBlend": {
                  "in": "SourceGraphic",
                  "in2": "blurOut",
                  "mode": "normal"
                }
              }]
            },
            "dataProvider": data['chart2'],
            "valueField": "value",
            "titleField": "user",
            "export": {
              "enabled": true
            }
          }); 
          }

          chart.addListener("init", handleInit);

          chart.addListener("rollOverSlice", function(e) {
            handleRollOver(e);
          });

          function handleInit(){
            chart.legend.addListener("rollOverItem", handleRollOver);
          }

          function handleRollOver(e){
            var wedge = e.dataItem.wedge.node;
            wedge.parentNode.appendChild(wedge);
          }
                     
                  }
                });


    }

</script>



<!-- Chart code -->


<!-- HTML -->