<script type="text/javascript">
    <?php
        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_salaryMin') != "" ) {
            $detail['i_salary_min'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_salaryMin');
        }
        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_salaryMax') != "" ) {
            $detail['i_salary_max'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_salaryMax');
        }
    ?>
    $(document).ready(function(){
        $('#plugin-hook input:text, #plugin-hook select').uniform();
        $("#salary-range").slider({
            range: true,
            min: <?php echo job_plugin_salary_min();?>,
            max: <?php echo job_plugin_salary_max();?>,
            step: <?php echo job_plugin_salary_step();?>,
            values: [<?php echo (isset($detail['i_salary_min']) && $detail['i_salary_min']!='')?$detail['i_salary_min']:job_plugin_salary_min();?> , <?php echo (isset($detail['i_salary_max']) && $detail['i_salary_max']!='')?$detail['i_salary_max']:job_plugin_salary_max();?>],
            slide: function(event, ui) {
                $("#salaryRange").val(ui.values[0] + ' <?php echo osc_currency();?> - ' + ui.values[1] + ' <?php echo osc_currency();?>');
            }
        });            
        $("#salaryRange").val($("#salary-range").slider("values", 0) + ' <?php echo osc_currency();?> - ' + $("#salary-range").slider("values", 1) + ' <?php echo osc_currency();?>');
    });
</script>
<style type="" >
.slider h6 { margin-bottom:0px;}
.slider input { background:transparent; border:none; color:#999; margin-bottom:3px; text-align: center; width:90%; }
.slider .ui-slider { margin:0 15px 0 8px; position: relative;}
.slider .ui-widget-content { background:#bdd7df; border-color:#bdd7df; height:5px; }
.slider .ui-widget-header { background:#FFF; }
.slider .ui-slider-horizontal .ui-slider-handle { background:#bac8cd; border-color:#9aafb6; height:15px; top: -0.5em; width:6px; position: absolute;}


</style>

<h2><?php _e("Job attributes", 'jobs_attributes');?></h2>
<div class="box">
    <div class="row">
        <label for="relation"><?php _e('Relation', 'jobs_attributes'); ?></label>
    </div>
    <div class="row _20">
        <?php
            if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_relation') != "" ) {
                $detail['e_relation'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_relation');
            }
        ?>
        <label for="hire"><?php _e('Hire someone', 'jobs_attributes'); ?></label>
        <input type="radio" name="relation" value="HIRE" id="hire" <?php if( @$detail['e_relation'] == 'HIRE' ) { echo 'checked'; }; ?>/>
    </div>
    <div class="row _20">
        <?php
            if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_relation') != "" ) {
                $detail['e_relation'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_relation');
            }
        ?>
        <label for="look"><?php _e('Looking for a job', 'jobs_attributes'); ?></label>
        <input type="radio" name="relation" value="LOOK" id="look" <?php if( @$detail['e_relation'] == 'LOOK' ) { echo 'checked'; }; ?>/>
    </div>
    <div class="row _200">
        <?php
            if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_companyName') != "" ) {
                $detail['s_company_name'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_companyName');
            }
        ?>
        <label for="companyName"><?php _e('Company name', 'jobs_attributes'); ?></label>
        <input type="text" name="companyName" value="<?php echo @$detail['s_company_name']; ?>" />
    </div>
    <div class="row _200 auto">
        <?php
            if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_positionType') != "" ) {
                $detail['e_position_type'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_positionType');
            }
        ?>
        <label for="positionType"><?php _e('Position type', 'jobs_attributes'); ?></label>
        <select name="positionType" id="positionType">
            <option value="UNDEF" <?php if( @$detail['e_position_type'] == 'UNDEF' ) { echo 'selected'; }; ?>><?php _e('Undefined', 'jobs_attributes'); ?></option>
            <option value="PART" <?php if( @$detail['e_position_type'] == 'PART' ) { echo 'selected'; }; ?>><?php _e('Part time', 'jobs_attributes'); ?></option>
            <option value="FULL" <?php if( @$detail['e_position_type'] == 'FULL' ) { echo 'selected'; }; ?>><?php _e('Full-time', 'jobs_attributes'); ?></option>
        </select>
    </div>
    <div style="height: 60px;" class="row _100 auto">
        <?php
            if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_salaryPeriod') != "" ) {
                $detail['e_salary_period'] = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_salaryPeriod');
            }
        ?>
        <label for="salaryRange"><?php _e('Salary range', 'jobs_attributes'); ?></label>
        <div class="auto">
            
            <input type="text" id="salaryRange" name="salaryRange" style="width: auto;border:0; color:#f6931f; font-weight:bold;" readonly/>
            <select name="salaryPeriod" id="salaryPeriod">
                <option value="HOUR" <?php if(@$detail['e_salary_period']=='HOUR') { echo 'selected'; }; ?>><?php _e('Hour', 'jobs_attributes'); ?></option>
                <option value="DAY" <?php if(@$detail['e_salary_period']=='DAY') { echo 'selected'; }; ?>><?php _e('Day', 'jobs_attributes'); ?></option>
                <option value="WEEK" <?php if(@$detail['e_salary_period']=='WEEK') { echo 'selected'; }; ?>><?php _e('Week', 'jobs_attributes'); ?></option>
                <option value="MONTH" <?php if(@$detail['e_salary_period']=='MONTH') { echo 'selected'; }; ?>><?php _e('Month', 'jobs_attributes'); ?></option>
                <option value="YEAR" <?php if(@$detail['e_salary_period']=='YEAR') { echo 'selected'; }; ?>><?php _e('Year', 'jobs_attributes'); ?></option>
            </select>
            <div class="slider" style="width:200px;clear: both;padding-left:130px;padding-top: 10px;" >
                <div id="salary-range"></div>
            </div>
        </div>
    </div>

<?php
    $locales = osc_get_locales();
    if(count($locales)==1) {
        $locale = $locales[0];
?>
        <div class="row">
            <?php
                if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                    $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                    $detail['locale'][$locale['pk_c_code']]['s_desired_exp'] = $data[$locale['pk_c_code']]['desired_exp'];
                }
            ?>
            <label for="desired_exp"><?php _e('Desired experience', 'jobs_attributes'); ?></label>
            <input type="text" name="<?php echo @$locale['pk_c_code']; ?>#desired_exp" id="desired_exp" value="<?php echo @$detail['locale'][$locale['pk_c_code']]['s_desired_exp']; ?>" />
        </div>
        <div class="row">
            <?php
                if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                    $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                    $detail['locale'][$locale['pk_c_code']]['s_studies'] = $data[$locale['pk_c_code']]['studies'];
                }
            ?>
            <label for="studies"><?php _e('Studies', 'jobs_attributes'); ?></label>
            <input type="text" name="<?php echo @$locale['pk_c_code']; ?>#studies" id="studies" value="<?php echo  @$detail['locale'][$locale['pk_c_code']]['s_studies']; ?>" />
        </div>
        <div class="row">
            <?php
                if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                    $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                    $detail['locale'][$locale['pk_c_code']]['s_minimum_requirements'] = $data[$locale['pk_c_code']]['min_reqs'];
                }
            ?>
            <label for="min_reqs"><?php _e('Minimum requirements', 'jobs_attributes'); ?></label>
            <textarea name="<?php echo @$locale['pk_c_code']; ?>#min_reqs" id="min_reqs" ><?php echo @$detail['locale'][$locale['pk_c_code']]['s_minimum_requirements']; ?></textarea>
        </div>
        <div class="row">
            <?php
                if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                    $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                    $detail['locale'][$locale['pk_c_code']]['s_desired_requirements'] = $data[$locale['pk_c_code']]['desired_reqs'];
                }
            ?>
            <label for="desired_reqs"><?php _e('Desired requirements', 'jobs_attributes'); ?></label>
            <textarea name="<?php echo @$locale['pk_c_code']; ?>#desired_reqs" id="desired_reqs" ><?php echo @$detail['locale'][$locale['pk_c_code']]['s_desired_requirements']; ?></textarea>
        </div>
        <div class="row">
            <?php
                if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                    $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                    $detail['locale'][$locale['pk_c_code']]['s_contract'] = $data[$locale['pk_c_code']]['contract'];
                }
            ?>
            <label for="contract"><?php _e('Contract', 'jobs_attributes'); ?></label>
            <input type="text" name="<?php echo @$locale['pk_c_code']; ?>#contract" id="contract"  value="<?php echo @$detail['locale'][$locale['pk_c_code']]['s_contract']; ?>" />
        </div>
        <div class="row">
            <?php
                if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                    $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                    $detail['locale'][$locale['pk_c_code']]['s_company_description'] = $data[$locale['pk_c_code']]['company_desc'];
                }
            ?>
            <label for="company_desc"><?php _e('Company description', 'jobs_attributes'); ?></label>
            <textarea name="<?php echo @$locale['pk_c_code']; ?>#company_desc" id="company_desc" ><?php echo @$detail['locale'][$locale['pk_c_code']]['s_company_description']; ?></textarea>
        </div>
    <?php } else { ?>
        <div class="tabber">
        <?php foreach($locales as $locale) {?>
            <div class="tabbertab">
                <h2><?php echo $locale['s_name']; ?></h2>
                <div class="row">
                    <?php
                        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                            $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                            $detail['locale'][$locale['pk_c_code']]['s_desired_exp'] = $data[$locale['pk_c_code']]['desired_exp'];
                        }
                    ?>
                    <label for="desired_exp"><?php _e('Desired experience', 'jobs_attributes'); ?></label>
                    <input type="text" name="<?php echo @$locale['pk_c_code']; ?>#desired_exp" id="desired_exp" value="<?php echo @$detail['locale'][$locale['pk_c_code']]['s_desired_exp']; ?>" />
                </div>
                <div class="row">
                    <?php
                        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                            $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                            $detail['locale'][$locale['pk_c_code']]['s_studies'] = $data[$locale['pk_c_code']]['studies'];
                        }
                    ?>
                    <label for="studies"><?php _e('Studies', 'jobs_attributes'); ?></label>
                    <input type="text" name="<?php echo @$locale['pk_c_code']; ?>#studies" id="studies" value="<?php echo @$detail['locale'][$locale['pk_c_code']]['s_studies']; ?>" />
                </div>
                <div class="row">
                    <?php
                        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                            $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                            $detail['locale'][$locale['pk_c_code']]['s_minimum_requirements'] = $data[$locale['pk_c_code']]['min_reqs'];
                        }
                    ?>
                    <label for="min_reqs"><?php _e('Minimum requirements', 'jobs_attributes'); ?></label>
                    <textarea name="<?php echo @$locale['pk_c_code']; ?>#min_reqs" id="min_reqs" ><?php echo @$detail['locale'][$locale['pk_c_code']]['s_minimum_requirements']; ?></textarea>
                </div>
                <div class="row">
                    <?php
                        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                            $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                            $detail['locale'][$locale['pk_c_code']]['s_desired_requirements'] = $data[$locale['pk_c_code']]['desired_reqs'];
                        }
                    ?>
                    <label for="desired_reqs"><?php _e('Desired requirements', 'jobs_attributes'); ?></label>
                    <textarea name="<?php echo @$locale['pk_c_code']; ?>#desired_reqs" id="desired_reqs" ><?php echo @$detail['locale'][$locale['pk_c_code']]['s_desired_requirements']; ?></textarea>
                </div>
                <div class="row">
                    <?php
                        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                            $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                            $detail['locale'][$locale['pk_c_code']]['s_contract'] = $data[$locale['pk_c_code']]['contract'];
                        }
                    ?>
                    <label for="contract"><?php _e('Contract', 'jobs_attributes'); ?></label>
                    <input type="text" name="<?php echo @$locale['pk_c_code']; ?>#contract" id="contract" value="<?php echo @$detail['locale'][$locale['pk_c_code']]['s_contract']; ?>" />
                </div>
                <div class="row">
                    <?php
                        if( ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data') != "" ) {
                            $data = ClassLoader::getInstance()->getClassInstance( 'Session' )->_getForm('pj_data');
                            $detail['locale'][$locale['pk_c_code']]['s_company_description'] = $data[$locale['pk_c_code']]['company_desc'];
                        }
                    ?>
                    <label for="company_desc"><?php _e('Company description', 'jobs_attributes'); ?></label>
                    <textarea name="<?php echo @$locale['pk_c_code']; ?>#company_desc" id="company_desc"><?php echo @$detail['locale'][$locale['pk_c_code']]['s_company_description']; ?></textarea>
                </div>
                <div style="clear:both;"></div>
            </div>
        <?php } ?>
        </div>
<?php } ?>
<script type="text/javascript">
    tabberAutomatic();
</script>