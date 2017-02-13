 <section id="content" style="background-color:#efefef;">

        
        <?php
          $this->load->view('layout/toolbox');
        ?>
     
        <div class="row"  style="margin-left: 5px; margin-right:5px; " >
          <div class="col s12 m12 l12" style="margin-top:-35px;">
            <div class="card-panel" >
              <div class="row" style="margin-left:10px;" >
                <div class="col s12 m12 l12">
                  <!--DataTables example-->
                  <div>
                    <div class="row" id="chartdiv">
                      <div class="col s12 m12 l12" id="table-datatables" style="margin-left:-12.5px;" >
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0" style="height:100%;width:100%;">
                          <thead>
                              <tr>
                                  <th>Client ID</th>
                                  <th>Page Views</th>
                                  <th>Session</th>
                                  <th>Page / Session</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
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
  generate_table();
    //generate_table('devi');
}



/*

*/
</script>


<script>
function generate_table()
{
         var date = document.getElementById('date').value;
         var date2 = document.getElementById('date2').value;
         var is_compare = document.getElementById('compare').checked;
         if(is_compare)
        var table= $('#data-table-simple').DataTable({ 
           "bLengthChange": false,
          "bDestroy": true,
            "bFilter": false,
            "bProcessing": true,
            "serverSide": true,
               "columns": [
              { "data": "id_track" },
              { "data": "pageviews.first" },
              { "data": "session.first" },
              { "data": "pages_per_session.first" }
              ],
              "columnDefs": [
              {
              "render": function ( data, type, row ) {
                var first = row.pageviews.first ? row.pageviews.first : 0;
                var second = row.pageviews.second ? row.pageviews.second : 0;
                var change = parseFloat((first-second)/second*100).toFixed(2);
                if (change ==='Infinity')
                {
                  change = '&#8734';
                }
                var color = '#000000';
                if(first>second){
                color = '#009933';
                }
                else {
                  color = '#dd4b39';
                }
                var value = '<small>' + first + ' vs ' + second + '<span style="color:'+color+'"> ('+ change+' %)' +'</small>';
              return value;
              },
              "targets": 1
              },{
              "render": function ( data, type, row ) {
                var first = row.session.first ? row.session.first : 0;
                var second = row.session.second ? row.session.second : 0;
                var change = parseFloat((first-second)/second*100).toFixed(2);
                if (change ==='Infinity')
                {
                  change = '&#8734';
                }
                var color = '#000000';
                if(first>second){
                color = '#009933';
                }
                else {
                  color = '#dd4b39';
                }
                var value = '<small>' + first + ' vs ' + second + '<span style="color:'+color+'"> ('+ change+' %)' +'</small>';
              return value;
              },
              "targets": 2
              },{
              "render": function ( data, type, row ) {
                var first = row.pages_per_session.first ? row.pages_per_session.first : 0;
                var second = row.pages_per_session.second ? row.pages_per_session.second : 0;
                var change = parseFloat((first-second)/second*100).toFixed(2);
                if (change ==='Infinity')
                {
                  change = '&#8734';
                }
                var color = '#000000';
                if(first>second){
                color = '#009933';
                }
                else {
                  color = '#dd4b39';
                }
                var value = '<small>' + first + ' vs ' + second + '<span style="color:'+color+'"> ('+ change+' %)' +'</small>';
              return value;
              },
              "targets": 3
              }
              ],  
         
         "ajax":{
            url :"<?php echo base_url()?>menu/audience/user_explorer", // json datasource
            type: "post",
            data: {"date":date, "date2" :date2, "is_compare":is_compare},  // type of method  , by default would be get
            error: function(){  // error handling code
              $("#data-table-simple_processing").css("display","none");
            }
          }
        });
      else
      var table= $('#data-table-simple').DataTable({ 
           "bLengthChange": false,
          "bDestroy": true,
            "bFilter": false,
            "bProcessing": true,
            "serverSide": true,
               "columns": [
              { "data": "id_track" },
              { "data": "pageviews.first" },
              { "data": "session.first" },
              { "data": "pages_per_session.first" }
              ],
                      
         "ajax":{
            url :"<?php echo base_url()?>menu/audience/user_explorer", // json datasource
            type: "post",
            data: {"date":date, "date2" :date2, "is_compare":is_compare},  // type of method  , by default would be get
            error: function(){  // error handling code
              $("#data-table-simple_processing").css("display","none");
            }
          }
        }); 
}

function loading(id)
{
  var new_id="#"+id;
  $(new_id).html('');

  var str='';
        str+= '<div align="center" style="min-height:250px; ">'
        str+= '<div class="preloader-wrapper active" style="position: relative;margin-top: 10%;">'
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
  console.log(new_id);
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

<script>

</script>



<!-- Chart code -->


<!-- HTML -->