<!--start toolbox on top-->
        <div class="row"  style="margin-left: 5px; margin-right:5px;">
          <div class="col s12 m12 l12">
              <div class="card-panel" style="padding-bottom:0px !important; ">
          <div class="row">

            <div class="col s12 m12 l2"><?php
            $state_root= ucfirst($this->session->userdata['state_root']); 
            $state_leaf_arr = explode('_', $this->session->userdata['state_leaf']);
            $state_leaf='';
            $i=0;
            foreach($state_leaf_arr as $cat) {
              $cat = trim($cat);
              $state_leaf .= ucfirst($cat) . ' ';
              if($i==0)
              {
                $state_leaf .='- ';
              }
              $i++;
          }
            echo $state_leaf;?> 
           <a style="display:none;" target="_blank" href="<?php if(isset($this->session->userdata['ACTIVE_WEBSITE'])) echo 'http://'.$this->session->userdata['ACTIVE_WEBSITE']; ?>">(<?php if(isset($this->session->userdata['ACTIVE_WEBSITE'])) echo $this->session->userdata['ACTIVE_WEBSITE']; ?>)</a>
         
         </div>
            <?php 
            if($this->session->userdata['state_leaf'] == 'audience_overview')
            echo '<div class="col s12 m12 l3"> <select onChange="select_changed();" id="select_variable" name="variable">
                            <option value="user" selected>Users</option>
                            <option value="session">Sessions</option>
                            <option value="page_session">Pages/Session</option>
                            <option value="page_view">Pages Views</option>
                            <!--
                            <option value="avg_ses_dur">Avg. Session Duration</option>
                            <option value="new_user">% New Users</option>
                          -->
                          </select></div><div class="col s12 m12 l2">&nbsp;</div>';
            else{
              echo '<div class="col s12 m12 l5">&nbsp;</div>';
            }
            ?>

           <div class="col s12 m12 l5" align="right">
            <?php if(isset($this->session->userdata['is_compare']) && $this->session->userdata['is_compare']=="true" ){  ?>
                     <input type="checkbox" id="compare" checked>
                     <?php } else{ ?>
                      <input type="checkbox" id="compare">
                    <?php } ?>
                      <label style="padding-left:25px;" for="compare">Compare? </label>&nbsp;
            <input  style="max-width:200px;" id="date" type="text" name="daterange" value="<?php 
            
            if(isset($this->session->userdata['date'])){
              $date_session=$this->session->userdata['date']; 
              echo $date_session; 
            }
            else {
              $date_no_session= date('d M Y', strtotime('-7 days')).' to '.date('d M Y', strtotime('-2 days'));
              echo $date_no_session;
            }
            ?>" /> 
            <button id="btn1" class="waves-effect waves-light  btn" onClick="javascript:generate_all();"> Go</button>
             
           </div>
            </div>
           <?php if(isset($this->session->userdata['is_compare']) && $this->session->userdata['is_compare']=="true" ){  ?>
            
                        <div class="row" id="row_date_compare" style="display:block;margin-top:-40px;" align="right">

          <?php } else { ?>

                        <div class="row" id="row_date_compare" style="display:none;margin-top:-40px;" align="right">
          <?php } ?>
                <div class="col s12 m12 l4">&nbsp;</div>
                <div class="col s12 m12 l4">&nbsp;</div>
                 <div class="col s12 m12 l4"><label></label>
                <input  style="max-width:200px;" id="date2" type="text" name="daterange2" value="<?php 
                
                if(isset($this->session->userdata['date2'])){
                  $date_session2=$this->session->userdata['date2']; 
                  echo $date_session2; 
                }
                else {
                  $date_no_session2= date('d M Y', strtotime('-15 days')).' to '.date('d M Y', strtotime('-8 days'));
                  echo $date_no_session2;
                }
                ?>" />
                 <button id="btn2" style="visibility:hidden;" class="waves-effect waves-light  btn" onClick="javascript:generate_all();"> Go</button>
             
            </div>
          </div>  
          </div>
        </div>
        </div>
        <!--End toolbox on top-->
        <script type="text/javascript">
          $('#compare').click(function() {
            generate_all();
            if(this.checked)
            {
                document.getElementById('row_date_compare').style.display='block';

                
            }else
            {
               document.getElementById('row_date_compare').style.display='none';

            }
        });
        </script>
        