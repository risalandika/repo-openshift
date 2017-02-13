 <section id="content" style="background-color:#efefef;">

        <?php
          $this->load->view('layout/toolbox');
        ?>
     
        <div class="row"   style="margin-left: 5px; margin-right:5px;">
            <div class="col s12 m12 l12">
              <div class="card-panel" style=" margin-top:-30px !important;">
               <div class="row" id="row_website_list">
                
              <div class="col s12 m12 128">
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
 /* function autoResizeDiv()
  {
      document.getElementById('row_website_list').style.height = window.innerHeight-375  +'px';
     
  }
  window.onresize = autoResizeDiv;
  autoResizeDiv();
  */

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


 

function select_changed()
{
  generate_all();

    // alert('wa');
}

function generate_all()
{
    //generate_sum_small();
    generate_table();
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

function generate_table()
{
        loading('table_top');
        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var is_compare = document.getElementById("compare").checked;
        
        jQuery.ajax({
        url: '<?php echo base_url() ?>menu/home/website_table',
        type: 'POST',
        data: {
            date: date, date2:date2, is_compare:is_compare
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {  
          

        $('#table_top').html('');
        var str='';          
        if(is_compare)
        {
           str+= '<table class="bordered">'
          str+= '<thead>'
          str+= '<tr>'
          str+= '<th id="no"></th>'
          str+= '<th data-field="name">Choose a Website</th>'
          str+= '<th data-field="price">Session</th>'
          str+= '<th data-field="price">Users</th>'
          str+= '</tr>'
          str+= '</thead>'
          str+= '<tbody>'
           for (var i = 0; i < Object.keys(data['chart']).length; i++) {
          str+= '<tr>'
          str+= '<td>'+(i+1)+'.</td>'
           if(data['chart'][i]['SESSION'] != null && data['chart'][i]['USER'] != null )
          str+= '<td><a href=javascript:change_website("'+data['chart'][i]['web']+'")>'+data['chart'][i]['web']+ '</a></td>'
          else 
           str+= '<td>'+data['chart'][i]['web']+ '</td>'
           
          if(data['chart'][i]['SESSION'] != null){
            var persen_session=data['chart'][i]['SESSION']-data['chart'][i]['SESSION2']/data['chart'][i]['SESSION2']*100;
            if(data['chart'][i]['SESSION'] > data['chart'][i]['SESSION2']) 
              str+= '<td><big style="color:rgb(221, 75, 57);">'+parseFloat(addCommas(persen_session)).toFixed(2)+ ' %</big> <p><small style="color:#777">'+data['chart'][i]['SESSION']+ ' vs '+data['chart'][i]['SESSION2']+'</small></p></td>'
            else if(data['chart'][i]['SESSION'] < data['chart'][i]['SESSION2'])
               str+= '<td><big style="color:rgb(0, 153, 51);">'+parseFloat(addCommas(persen_session)).toFixed(2)+ ' %</big> <p><small style="color:#777">'+data['chart'][i]['SESSION']+ ' vs '+data['chart'][i]['SESSION2']+'</small></p></td>'
             else
               str+= '<td><big style="color:rgb(0, 0, 0);">'+parseFloat(addCommas(persen_session)).toFixed(2)+ ' %</big> <p><small style="color:#777">'+data['chart'][i]['SESSION']+ ' vs '+data['chart'][i]['SESSION2']+'</small></p></td>'
           
          }
          else 
               str+= '<td><big style="color:rgb(0, 0, 0);">-</big> <p><small style="color:#777">- vs -</small></p></td>'

          if(data['chart'][i]['USER'] != null){
            var persen_USER=data['chart'][i]['USER']-data['chart'][i]['USER2']/data['chart'][i]['USER2']*100;
            if(data['chart'][i]['USER'] > data['chart'][i]['USER2']) 
              str+= '<td><big style="color:rgb(221, 75, 57);">'+parseFloat(addCommas(persen_USER)).toFixed(2)+ ' %</big> <p><small style="color:#777">'+data['chart'][i]['USER']+ ' vs '+data['chart'][i]['USER2']+'</small></p></td>'
            else if(data['chart'][i]['USER'] < data['chart'][i]['USER2'])
               str+= '<td><big style="color:rgb(0, 153, 51);">'+parseFloat(addCommas(persen_USER)).toFixed(2)+ ' %</big> <p><small style="color:#777">'+data['chart'][i]['USER']+ ' vs '+data['chart'][i]['USER2']+'</small></p></td>'
             else
               str+= '<td><big style="color:rgb(0, 0, 0);">'+parseFloat(addCommas(persen_USER)).toFixed(2)+ ' %</big> <p><small style="color:#777">'+data['chart'][i]['USER']+ ' vs '+data['chart'][i]['USER2']+'</small></p></td>'
           
          }
          else 
               str+= '<td><big style="color:rgb(0, 0, 0);">-</big> <p><small style="color:#777">- vs -</small></p></td>'
         
          str+= '</tr>'
          }
          str+= '</tbody>'
          str+= '</table>'
        }
        else
        {
          str+= '<table class="bordered">'
          str+= '<thead>'
          str+= '<tr>'
          str+= '<th id="no"></th>'
          str+= '<th data-field="name">Choose a Website</th>'
          str+= '<th data-field="price">Session</th>'
          str+= '<th data-field="price">Users</th>'
          str+= '</tr>'
          str+= '</thead>'
          str+= '<tbody>'
           for (var i = 0; i < Object.keys(data['chart']).length; i++) {
          str+= '<tr>'
          str+= '<td>'+(i+1)+'.</td>'
           if(data['chart'][i]['SESSION'] != null && data['chart'][i]['USER'] != null )
          str+= '<td><a href=javascript:change_website("'+data['chart'][i]['web']+'")>'+data['chart'][i]['web']+ '</a></td>'
          else 
           str+= '<td>'+data['chart'][i]['web']+ '</td>'
           
          if(data['chart'][i]['SESSION'] != null)
          str+= '<td>'+addCommas(data['chart'][i]['SESSION'])+ '</td>'
          else 
          str+= '<td>-</td>'

          if(data['chart'][i]['USER'] != null)
          str+= '<td>'+addCommas(data['chart'][i]['USER'])+ '</td>'
          else 
          str+= '<td>-</td>'
         
          str+= '</tr>'
          }
          str+= '</tbody>'
          str+= '</table>'
        }
        $('#table_top').html(str);
           
        }
      });
    }



function generate_sum_small()
{

        var date = document.getElementById('date').value;
        var date2 = document.getElementById('date2').value;
        var is_compare = document.getElementById('compare').checked;

        
        jQuery.ajax({
        url: '<?php echo base_url()?>menu/audience/overview/sum_small',
        type: 'POST',
        data: {
            date: date, date2:date2, is_compare:is_compare
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



</script>
<script type="text/javascript">
          function change_website(website)
      {
        var txt = website;

        jQuery.ajax({
        url: '<?php echo base_url(); ?>menu/website/'+txt,
        type: 'POST',
        data: {
            txt: txt,
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
            console.log(data); // do with data e.g success message
            location.href='<?php echo base_url()?>dashboard/page/audience_overview';
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
        });
      }
    </script>



<!-- Chart code -->


<!-- HTML -->