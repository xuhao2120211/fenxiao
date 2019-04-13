<!-- $Id: ads_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php echo $this->fetch('pageheader.htm'); ?>

<script language="javascript" type="text/javascript" src="../js/DatePicker/WdatePicker.js"></script>

<div class="main-div">

<form action="ads.php" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">

  <table width="100%" id="general-table">

    <tr>

      <td  class="label">

        <a href="javascript:showNotice('NameNotic');" title="<?php echo $this->_var['lang']['form_notice']; ?>">

        <img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>"></a><?php echo $this->_var['lang']['ad_name']; ?></td>

      <td>

        <input type="text" name="ad_name" value="<?php echo $this->_var['ads']['ad_name']; ?>" size="35" />

        <br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="NameNotic"><?php echo $this->_var['lang']['ad_name_notic']; ?></span>

      </td>

    </tr>

    <tr>

      <td  class="label">图片宽</td>

      <td><input type="text" name="ad_width" value="<?php echo $this->_var['ads']['ad_width']; ?>" size="35" />APP广告使用</td>

    </tr>





    <tr>

      <td  class="label">站点</td>

      <td>

     <select name="city_id" id="selCities" >

          <option value=''>请选择</option>

            <?php $_from = $this->_var['site_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>

              <option value="<?php echo $this->_var['region']['city_id']; ?>" <?php if ($this->_var['region']['city_id'] == $this->_var['ads']['city_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['region_name']; ?></option>

            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>



        </select>

      </td>

    </tr>

    <tr>

      <td  class="label"><?php echo $this->_var['lang']['position_id']; ?></td>

      <td>

        <select name="position_id">

        <option value='0'>请选择</option>

        <?php echo $this->html_options(array('options'=>$this->_var['position_list'],'selected'=>$this->_var['ads']['position_id'])); ?>

        </select>

      </td>

    </tr>

  <?php if ($this->_var['ads']['media_type'] == 0 || $this->_var['action'] == "add"): ?>

    <tbody id="0">

    <tr>

      <td  class="label"><?php echo $this->_var['lang']['ad_link']; ?></td>

      <td>

        <input type="text" name="ad_link" value="<?php echo $this->_var['ads']['ad_link']; ?>" size="35" />

      </td>

    </tr>

    <tr>

      <td  class="label">

        <a href="javascript:showNotice('AdCodeImg');" title="<?php echo $this->_var['lang']['form_notice']; ?>">

        <img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>"></a><?php echo $this->_var['lang']['upfile_img']; ?></td>

      <td>

        <input type='file' name='ad_img' size='35' />

        <br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="AdCodeImg"><?php echo $this->_var['lang']['ad_code_img']; ?></span>

      </td>

    </tr>

    <tr>

      <td  class="label"><?php echo $this->_var['lang']['img_url']; ?></td>

      <td><input type="text" name="img_url" value="<?php echo $this->_var['url_src']; ?>" size="35" /></td>

    </tr>

    </tbody>

  <?php endif; ?>

  <?php if ($this->_var['ads']['media_type'] == 1 || $this->_var['action'] == "add"): ?>

    <tbody id="1" style="<?php if ($this->_var['ads']['media_type'] != 1 || $this->_var['action'] == 'add'): ?>display:none<?php endif; ?>">

    <tr>

      <td  class="label">

        <a href="javascript:showNotice('AdCodeFlash');" title="<?php echo $this->_var['lang']['form_notice']; ?>">

        <img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>"></a><?php echo $this->_var['lang']['upfile_flash']; ?></td>

      <td>

        <input type='file' name='upfile_flash' size='35' />

        <br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="AdCodeFlash"><?php echo $this->_var['lang']['ad_code_flash']; ?></span>

      </td>

    </tr>

    <tr>

      <td class="label"><?php echo $this->_var['lang']['flash_url']; ?></td>

      <td>

        <input type="text" name="flash_url" value="<?php echo $this->_var['flash_url']; ?>" size="35" />

      </td>

    </tr>

    </tbody>

  <?php endif; ?>



  <?php if ($this->_var['ads']['media_type'] == 2 || $this->_var['action'] == "add"): ?>

    <tbody id="2" style="<?php if ($this->_var['ads']['media_type'] != 2 || $this->_var['action'] == 'add'): ?>display:none<?php endif; ?>">

      <tr>

        <td  class="label"><?php echo $this->_var['lang']['enter_code']; ?></td>

        <td><textarea name="ad_code" cols="50" rows="7"><?php echo $this->_var['ads']['ad_code']; ?></textarea></td>

      </tr>

    </tbody>

  <?php endif; ?>



  <?php if ($this->_var['ads']['media_type'] == 3 || $this->_var['action'] == "add"): ?>

    <tbody id="3" style="<?php if ($this->_var['ads']['media_type'] != 3 || $this->_var['action'] == 'add'): ?>display:none<?php endif; ?>">

    <tr>

      <td  class="label"><?php echo $this->_var['lang']['ad_link']; ?></td>

      <td>

        <input type="text" name="ad_link2" value="<?php echo $this->_var['ads']['ad_link']; ?>" size="35" />

      </td>

    </tr>

    <tr>

      <td  class="label"><?php echo $this->_var['lang']['ad_code']; ?></td>

      <td><textarea name="ad_text" cols="40" rows="3"><?php echo $this->_var['ads']['ad_code']; ?></textarea></td>

    </tr>

    </tbody>

 <?php endif; ?>



    <tr>

      <td  class="label"><?php echo $this->_var['lang']['enabled']; ?></td>

      <td>

        <input type="radio" name="enabled" value="1" <?php if ($this->_var['ads']['enabled'] == 1): ?> checked="true" <?php endif; ?> /><?php echo $this->_var['lang']['is_enabled']; ?>

        <input type="radio" name="enabled" value="0" <?php if ($this->_var['ads']['enabled'] == 0): ?> checked="true" <?php endif; ?> /><?php echo $this->_var['lang']['no_enabled']; ?>

      </td>

    </tr>

    <tr>

      <td class="label">&nbsp;</td>

      <td>

        <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />

        <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button" />

        <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />

        <input type="hidden" name="id" value="<?php echo $this->_var['ads']['ad_id']; ?>" />

        <input type="hidden" name="media_type" value="0" />

        </td>

    </tr>

 </table>



</form>

</div>

<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="JavaScript">

  document.forms['theForm'].elements['ad_name'].focus();

  <!--

  var MediaList = new Array('0', '1', '2', '3');

  

  function showMedia(AdMediaType)

  {

    for (I = 0; I < MediaList.length; I ++)

    {

      if (MediaList[I] == AdMediaType)

        document.getElementById(AdMediaType).style.display = "";

      else

        document.getElementById(MediaList[I]).style.display = "none";

    }

  }



  /**

   * 检查表单输入的数据

   */

  function validate()

  {

    validator = new Validator("theForm");

    validator.required("ad_name",     ad_name_empty);

    return validator.passed();

  }



  onload = function()

  {

    // 开始检查订单

    startCheckOrder();

    document.forms['theForm'].reset();

  }



  //-->

  

</script>

<?php echo $this->fetch('pagefooter.htm'); ?>