<?php $b_types = __get("buysell_types") ; ?>
<p>
    <label><?php _e("Offer type", 'buysell') ; ?>:</label> 
    <strong><?php echo isset($detail['s_type']) ? $b_types[$detail['s_type']] : __('Not specified', 'buysell') ; ?></strong>
</p>
