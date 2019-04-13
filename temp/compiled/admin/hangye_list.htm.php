<!-- $Id: area_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<div class="form-div">
<form method="post" action="hangye.php" name="theForm" onsubmit="return insert()">
添加行业：
<input type="text" name="name" maxlength="150" size="40" />
<input type="hidden" name="pid" value="<?php echo $this->_var['pid']; ?>" />
<input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
</form>
</div>

<!-- start category list -->
<div class="list-div">
<table cellspacing='1' cellpadding='3' id='listTable'>
  <tr>
    <th><?php echo $this->_var['area_here']; ?></th>
  </tr>
</table>
</div>
<div class="list-div" id="listDiv">
<?php endif; ?>

<table cellspacing='1' cellpadding='3' id='listTable'>
  <tr>
    <?php $_from = $this->_var['hangyes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');$this->_foreach['area_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['area_name']['total'] > 0):
    foreach ($_from AS $this->_var['list']):
        $this->_foreach['area_name']['iteration']++;
?>
      <?php if ($this->_foreach['area_name']['iteration'] > 1 && ( $this->_foreach['area_name']['iteration'] - 1 ) % 3 == 0): ?>
      </tr><tr>
      <?php endif; ?>
      <td class="first-cell" align="left">
       <span onclick="listTable.edit(this, 'edit_name', '<?php echo $this->_var['list']['id']; ?>'); return false;"><?php echo htmlspecialchars($this->_var['list']['name']); ?></span>
       <span class="link-span">
       <?php if ($this->_var['pid'] == 0): ?>
       <a href="hangye.php?act=list&pid=<?php echo $this->_var['list']['id']; ?>" title="管理">
         管理</a>&nbsp;&nbsp;
       <?php endif; ?>
       <a href="javascript:listTable.remove(<?php echo $this->_var['list']['id']; ?>, '确定删除该行业吗？', 'remove')" title="<?php echo $this->_var['lang']['drop']; ?>"><?php echo $this->_var['lang']['drop']; ?></a>
       </span>
      </td>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
</div>


<script language="JavaScript">
<!--

onload = function() {
  document.forms['theForm'].elements['region_name'].focus();
  // 开始检查订单
  startCheckOrder();
}

/**
 * 新建区域
 */
function insert()
{
    var name = Utils.trim(document.forms['theForm'].elements['name'].value);
    var pid   = Utils.trim(document.forms['theForm'].elements['pid'].value);

    if (name.length == 0)
    {
        alert('行业名称不能为空');
    }
    else
    {
      Ajax.call('hangye.php?is_ajax=1&act=insert',
        'pid=' + pid + '&name=' + name,
        listTable.listCallback, 'POST', 'JSON');
    }

    return false;
}

//-->
</script>


<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>