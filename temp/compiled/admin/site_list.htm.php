<!-- $Id: link_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<form method="post" action="" name="listForm">
<!-- start ads list -->
<div class="list-div" id="listDiv">
<?php endif; ?>

<table cellpadding="3" cellspacing="1">
  <tr>
    <th>站点城市</th>
    <!--th>站点LOGO</th-->
    <th><a href="javascript:listTable.sort('link_url'); ">站点状态</a></th>
    <th>操作</th>
  </tr>
  <tr>
  <?php $_from = $this->_var['links_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
  <tr>
    <td align="center"><?php echo $this->_var['link']['region_name']; ?></td>
    <!--td align="center"><span><?php if ($this->_var['link']['site_logo']): ?><img src="../<?php echo $this->_var['link']['site_logo']; ?>"  style="size:100px; height:100px"><?php endif; ?></span></td-->
    <td align="center"><img src="images/<?php if ($this->_var['link']['close'] == 1): ?>yes<?php else: ?>no<?php endif; ?>.gif"  onclick="listTable.toggle(this, 'is_close', <?php echo $this->_var['link']['id']; ?>)" style="cursor:pointer;"/></td>
    <td align="center" class="bnt_a">
    <a href="site.php?act=edit&id=<?php echo $this->_var['link']['id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>"><?php echo $this->_var['lang']['edit']; ?></a>
    <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['link']['id']; ?>, '请慎重操作')" title="<?php echo $this->_var['lang']['remove']; ?>"><?php echo $this->_var['lang']['remove']; ?></a></span></td>
    </td>
  </tr>
  <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10">暂未开通</td></tr>
  <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <tr>
    <td align="right" nowrap="true" colspan="10"><?php echo $this->fetch('page.htm'); ?></td>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
</div>
<!-- end ad_position list -->
</form>

<script type="text/javascript" language="JavaScript">
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
  onload = function()
  {
    // 开始检查订单
    startCheckOrder();
  }
  
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>
