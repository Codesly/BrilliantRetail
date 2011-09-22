<?php
/************************************************************/
/*	BrilliantRetail 										*/
/*															*/
/*	@package	BrilliantRetail								*/
/*	@Author		David Dexter 								*/
/* 	@copyright	Copyright (c) 2011, Brilliant2.com 			*/
/* 	@license	http://brilliantretail.com/license.html		*/
/* 	@link		http://brilliantretail.com 					*/
/*															*/
/************************************************************/
/* NOTICE													*/
/*															*/
/* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF 	*/
/* ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED	*/
/* TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 		*/
/* PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT 		*/
/* SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY */
/* CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION	*/
/* OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR 	*/
/* IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 		*/
/* DEALINGS IN THE SOFTWARE. 								*/	
/************************************************************/

	echo form_open('&D=cp&C=addons_modules&M=show_module_cp&module=brilliant_retail&method=config_gateway_update',
					array(	'method' 	=> 'POST', 
							'id' 		=> 'gateway_edit',
							'class' 	=> 'b2r_category', 
							'encrypt' 	=> 'multipart/form-data'),
					array(	'config_id' => $config_id));
?>
<div id="b2r_page" class="b2r_category">
	<table id="gateway_tbl" class="mainTable" cellpadding="0" cellspacing="0" style="clear:both">
    	<thead>
    		<tr>
    			<th colspan="2">
    				<?=$title?></th>
    		</tr>
    	</thead>
    	<tbody>
	    	<tr class="odd">
	        	<td class="cell_1">
	        		<?=lang('label')?></td>
	        	<td>
	            	<input type="text" class="{required:true}" title="<?=lang('br_label')?> is required" value="<?=$label?>" name="label"></td>
	    	</tr>
	    	<tr>
	        	<td class="cell_1">
	        		<?=lang('br_enabled')?></td>
	        	<td>
	            	<select class="" title="" name="enabled">
	            		<?php
	            			if($enabled == 1){
	            				$yes = "selected";
	            				$no = "";
	            			}else{
	            				$yes = "";
	            				$no = "selected";
	            			}
	            		?>
	            		<option value="1" <?=$yes?>><?=lang('br_yes')?></option>
	            		<option value="0" <?=$no?>><?=lang('br_no')?></option>
	            	</select></td>
	    	</tr>
	    	<tr class="odd">
	        	<td class="cell_1">
	        		<?=lang('br_sort')?></td>
	        	<td>
	            	<input type="text" class="{required:true,digit:true}" title="<?=lang('br_sort')?> is required" value="<?=$sort?>" name="sort"></td>
	    	</tr>
	    	<?php
		    	$i=0;
		    	foreach($fields as $f){
					$class = ($i % 2 == 0) ? 'odd' : '' ;
					$req = ($f["required"] == 1) ? ' * ' : '' ;
					echo '	<tr class="'.$class.'">
					        	<td class="cell_1">
					        		'.$f["label"].$req.'</td>
					        	<td>
					            	'.$f["input"];
						if(trim($f["descr"]) != ''){
							echo '<div style="width:85%"><p>'.$f["descr"].'</p></div>';					
						}
					echo '		</td>
					    	</tr>';
					$i++;
				}
	    	?>
		</tbody>
    </table>
	<div id="header_buttons">
	    <?=form_submit(array('name' => 'submit', 'value' => lang('save'), 'class'=>'submit'))?>
		<div class="b2r_clearboth"><!-- --></div>
    </div>
</div>
</form>                     
<script type="text/javascript">
	$(function(){
		$('#gateway_edit').validate();
	});
</script>