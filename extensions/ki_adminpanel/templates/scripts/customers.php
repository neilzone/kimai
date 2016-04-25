<a href="#" onclick="floaterShow('floaters.php','add_edit_customer',0,0,450); $(this).blur(); return false;"><img src="<?php echo $this->skin('grfx/add.png'); ?>" width="22" height="16" alt="<?php echo $this->kga['lang']['new_customer']?>"></a> <?php echo $this->kga['lang']['new_customer']?>
<br/><br/>
<table>
	<thead>
		<tr class="headerrow">
			<th><?php echo $this->kga['lang']['options']?></th>
			<th><?php echo $this->kga['lang']['customer']?></th>
			<th><?php echo $this->kga['lang']['contactPerson']?></th>
			<th><?php echo $this->kga['lang']['groups']?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	if (!isset($this->customers) || $this->customers == '0' || count($this->customers) == 0)
	{
		?>
		<tr>
			<td nowrap colspan="3"><?php echo $this->error(); ?></td>
		</tr>
		<?php
	}
	else
	{
		foreach ($this->customers as $row)
		{
			$isHidden = $row['visible'] != 1;
			?>
			<tr class="<?php echo $this->cycle(array("odd","even"))->next()?>">
				<td class="option">
					<a href="#" onclick="editSubject('customer',<?php echo $row['customerID']?>); $(this).blur(); return false;"><img
						src="<?php echo $this->skin('grfx/edit2.gif'); ?>" width="13" height="13" alt="<?php echo $this->kga['lang']['edit']?>"
						title="<?php echo $this->kga['lang']['edit']?>" border="0" /></a>
					&nbsp;
					<a href="#" id="delete_customer<?php echo $row['customerID']?>" onclick="adminPanel_extension_deleteCustomer(<?php echo $row['customerID']?>)"><img
						src="<?php echo $this->skin('grfx/button_trashcan.png'); ?>" title="<?php echo $this->kga['lang']['delete_customer']?>"
						width="13" height="13" alt="<?php echo $this->kga['lang']['delete_customer']?>" border="0"></a>
				</td>
				<td class="clients <?php if ($isHidden) { echo 'hidden'; } ?>">
					<?php echo $this->escape($row['name']);?>
				</td>
				<td class="<?php if ($isHidden) { echo 'hidden'; } ?>">
					<?php echo $this->escape($row['contact']);?>
				</td>
				<td class="<?php if ($isHidden) { echo 'hidden'; } ?>">
					<?php echo $this->escape($row['groups'])?>
				</td>
			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>
