 <section id="content" style="background-color:#efefef;">

                <?php
          $this->load->view('layout/toolbox');
        ?>
     
        <div class="row"  style="margin-left: 5px; margin-right:5px;">
            <div class="col s12 m12 l12">
              <div class="card-panel" style=" margin-top:-30px !important;">
                <div class="row">
                  <form class="col s12">
                    <div class="row" style="margin-left: 10px; display:none;">
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
                     
                    <div id="chartdiv" style="width: 100%;height:300px;font-size:11px;">

                    </div>
                    </div>
                  </form>
                </div>
                <div class="divider"></div>
                <div class="row" style="margin-left:10px;">
                    <div class="col s12 m8 l12">
                        <div class="row">
                            <div class="col s6 m6 l3" style="font-size:13px;margin-top:10px;">1-Day Active Users
                                <h4><span id="sum_1day">Loading Data..</span></h4>

                            </div>
                            <div class="col s6 m6 l3" style="font-size:13px;margin-top:10px;">7-Day Active Users
                                <h4><span id="sum_7day">Loading Data..</span></h4>

                            </div>
                           <div class="col s6 m6 l3" style="font-size:13px;margin-top:10px;">14-Day Active Users
                                <h4><span id="sum_14day">Loading Data..</span></h4>

                            </div>
                           <div class="col s6 m6 l3" style="font-size:13px;margin-top:10px;">30-Day Active Users
                                <h4><span id="sum_30day">Loading Data..</span></h4>

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

 
function generate_all()
{
    generate_line_big();
    generate_sum_small();
}


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
}
/*

*/
</script>


<script>


function generate_line_big()
{


        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var overview= document.getElementById('select_variable').value;

        var is_compare = document.getElementById("compare").checked;
    
        loading('chartdiv');
        
        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/active_users/line_big',
        type: 'POST',
        data: {
            date: date, overview:overview, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {

          $('#chartdiv').html('');
            //console.log(data); // do with data e.g success message
            if(!is_compare)
            {
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "marginRight": 80,
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
        "legendValueText": ": [[value]]",
        "title": "1-Day Active Users",
        "valueField": "1day_active_users",
        "useLineColorForBulletBorder": true,
    },{
        "id": "g2",
        "balloonText": "",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "legendValueText": ": [[value]]",
          "title": "7-Day Active Users",
        "valueField": "7day_active_users",
        "useLineColorForBulletBorder": true
    },{
        "id": "g3",
        "balloonText": "",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "legendValueText": ": [[value]]",
          "title": "14-Day Active Users",
        "valueField": "14day_active_users",
        "useLineColorForBulletBorder": true
    },{
        "id": "g4",
        "balloonText": "",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "legendValueText": ": [[value]]",
          "title": "30-Day Active Users",
        "valueField": "30day_active_users",
        "useLineColorForBulletBorder": true
    }],
        "legend": {
        "equalWidths": false,
        "useGraphSettings": true,
        "valueAlign": "left",
        "valueWidth": 120,
        "position" : "top"
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
else{
  var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "marginRight": 80,
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
        "lineColor" :"#67b7dc",
        "legendValueText": ": [[value]]",
        "title": "1-Day Active Users",
        "valueField": "1day_active_users",
        "useLineColorForBulletBorder": true
    },{
        "id": "g2",
        "balloonText": "<span style='text-align:left;'><b>[[date]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
       "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "lineColor" :"#fdd400",
        "hideBulletsCount": 50,
        "legendValueText": ": [[value]]",
          "title": "7-Day Active Users",
        "valueField": "7day_active_users",
        "useLineColorForBulletBorder": true
    },{
        "id": "g3",
         "balloonText": "<span style='text-align:left;'><b>[[date]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "lineColor" :"#448e4d",
        "hideBulletsCount": 50,
        "legendValueText": ": [[value]]",
          "title": "14-Day Active Users",
        "valueField": "14day_active_users",
        "useLineColorForBulletBorder": true
    },{
        "id": "g4",
         "balloonText": "<span style='text-align:left;'><b>[[date]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "lineColor" :"#cc4748",
        "legendValueText": ": [[value]]",
          "title": "30-Day Active Users",
        "valueField": "30day_active_users",
        "useLineColorForBulletBorder": true
    },{
        "id": "g5",
         "balloonText": "<span style='text-align:left;'><b>[[date2]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
       "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "lineColor" :"#06474c",
        "lineAlpha" : 0.8,
        "hideBulletsCount": 50,
        "title": "1-Day Active Users",
        "valueField": "1day_active_users2",
        "useLineColorForBulletBorder": true,
          "visibleInLegend": false
         
    },{
        "id": "g6",
        "balloonText": "<span style='text-align:left;'><b>[[date2]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
       "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "lineColor" :"#877205",
        "lineAlpha" : 0.8,
        "hideBulletsCount": 50,
        "title": "7-Day Active Users",
        "valueField": "7day_active_users2",
        "useLineColorForBulletBorder": true,
          "visibleInLegend": false
    },{
        "id": "g7",
        "balloonText": "<span style='text-align:left;'><b>[[date2]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
       "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "lineColor" :"#06440e",
        "lineAlpha" : 0.8,
        "hideBulletsCount": 50,
        "title": "14-Day Active Users",
        "valueField": "14day_active_users2",
        "useLineColorForBulletBorder": true,
          "visibleInLegend": false
    },{
        "id": "g8",
        "balloonText": "<span style='text-align:left;'><b>[[date2]]</b></span><p style='text-align: left;'><span style='font-size:11px; color:#000000;'>[[title]] : <b>[[value]]</b></span></p>",
       "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "lineColor" :"#510506",
        "lineAlpha" : 0.8,
        "hideBulletsCount": 50,
        "title": "30-Day Active Users",
        "valueField": "30day_active_users2",
        "useLineColorForBulletBorder": true,
          "visibleInLegend": false
    }],
        "legend": {
        "equalWidths": false,
        "useGraphSettings": true,
        "valueAlign": "left",
        "valueWidth": 120,
        "position" : "top", 
        "clickMarker": handleLegendClick,
        "clickLabel": handleLegendClick
        
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

function handleLegendClick( graph ) {
  var chart = graph.chart;
  var hidden = graph.hidden;
  
  for( var i = 0; i < chart.graphs.length; i++ ) {
    if ( hidden )
      chart.showGraph(chart.graphs[i]);
    else
      chart.hideGraph(chart.graphs[i]);
  }
 //console.log(graph.id);
  if ( graph.id === 'g1' )
  {
    for( var i = 0; i < chart.graphs.length; i++ ) {
        if(chart.graphs[i].id==='g1' || chart.graphs[i].id==='g5')
         chart.showGraph(chart.graphs[i]);
     }
  }else if ( graph.id === 'g2' )
  {
    for( var i = 0; i < chart.graphs.length; i++ ) {
        if(chart.graphs[i].id==='g2' || chart.graphs[i].id==='g6')
         chart.showGraph(chart.graphs[i]);
     }
  }else if ( graph.id === 'g3' )
  {
    for( var i = 0; i < chart.graphs.length; i++ ) {
        if(chart.graphs[i].id==='g3' || chart.graphs[i].id==='g6')
         chart.showGraph(chart.graphs[i]);
     }
  }else if ( graph.id === 'g4' )
  {
    for( var i = 0; i < chart.graphs.length; i++ ) {
        if(chart.graphs[i].id==='g4' || chart.graphs[i].id==='g8')
         chart.showGraph(chart.graphs[i]);
     }
  }
  
  // return false so that default action is canceled
  return false;
}

        },
        error: function(xhr, textStatus, errorThrown) {
            //console.log(textStatus.reponseText);
        }
        });
}

function generate_sum_small()
{

        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var overview= document.getElementById('select_variable').value;
        var is_compare = document.getElementById("compare").checked;

        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/active_users/sum_small',
        type: 'POST',
        data: {
            date: date, overview:overview, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
            if(!is_compare)
            {
          document.getElementById('sum_1day').innerHTML= addCommas(data['chart'][0]._1day_active_users);
          document.getElementById('sum_7day').innerHTML= addCommas(data['chart'][0]._7day_active_users);
          document.getElementById('sum_14day').innerHTML= addCommas(data['chart'][0]._14day_active_users);
          document.getElementById('sum_30day').innerHTML= addCommas(data['chart'][0]._30day_active_users);

          document.getElementById('sum_1day').style.color=  "#000000";
          document.getElementById('sum_7day').style.color=  "#000000";
          document.getElementById('sum_14day').style.color=  "#000000";
          document.getElementById('sum_30day').style.color=  "#000000";
            }
            else {
            var sum_1day = (((data['chart'][0]._1day_active_users-data['chart'][0]._1day_active_users2)/data['chart'][0]._1day_active_users)*100).toFixed(2);
            if(sum_1day>0 )
            {
              document.getElementById('sum_1day').style.color=  "#009933";
            }else{
              document.getElementById('sum_1day').style.color=  "#dd4b39";
            }
            document.getElementById('sum_1day').innerHTML=  sum_1day+ "%";
            document.getElementById('sum_1day').innerHTML+= "<p><small>"+addCommas(data['chart'][0]._1day_active_users)+" vs "+addCommas(data['chart'][0]._1day_active_users2)+"</small></p>";
            
            var sum_7day = (((data['chart'][0]._7day_active_users-data['chart'][0]._7day_active_users2)/data['chart'][0]._7day_active_users)*100).toFixed(2);
            if(sum_7day>0 )
            {
              document.getElementById('sum_7day').style.color=  "#009933";
            }else{
              document.getElementById('sum_7day').style.color=  "#dd4b39";
            }
            document.getElementById('sum_7day').innerHTML=  sum_7day+ "%";
            document.getElementById('sum_7day').innerHTML+= "<p><small>"+addCommas(data['chart'][0]._7day_active_users)+" vs "+addCommas(data['chart'][0]._7day_active_users2)+"</small></p>";
            
            var sum_14day = (((data['chart'][0]._14day_active_users-data['chart'][0]._14day_active_users2)/data['chart'][0]._14day_active_users)*100).toFixed(2);
            if(sum_14day>0 )
            {
              document.getElementById('sum_14day').style.color=  "#009933";
            }else{
              document.getElementById('sum_14day').style.color=  "#dd4b39";
            }
            document.getElementById('sum_14day').innerHTML=  sum_14day+ "%";
            document.getElementById('sum_14day').innerHTML+= "<p><small>"+addCommas(data['chart'][0]._14day_active_users)+" vs "+addCommas(data['chart'][0]._14day_active_users2)+"</small></p>";
            
            var sum_30day = (((data['chart'][0]._30day_active_users-data['chart'][0]._30day_active_users2)/data['chart'][0]._30day_active_users)*100).toFixed(2);
            if(sum_30day>0 )
            {
              document.getElementById('sum_30day').style.color=  "#009933";
            }else{
              document.getElementById('sum_30day').style.color=  "#dd4b39";
            }
            document.getElementById('sum_30day').innerHTML=  sum_30day+ "%";
            document.getElementById('sum_30day').innerHTML+= "<p><small>"+addCommas(data['chart'][0]._30day_active_users)+" vs "+addCommas(data['chart'][0]._30day_active_users2)+"</small></p>";
            
            }   
        },
        error: function(xhr, textStatus, errorThrown) {
            //console.log(textStatus.reponseText);
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



</script>



<!-- Chart code -->


<!-- HTML -->