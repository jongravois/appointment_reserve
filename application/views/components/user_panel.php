<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
    <li>
    	<label>User&nbsp;&nbsp;&nbsp;</label>
    	<input type="text" disabled="disabled" value="<?= $user['fname'] . ' ' . $user['lname']; ?>" />
    </li>
    <li>
    	<label>Email&nbsp;&nbsp;</label>
    	<input type="text" disabled="disabled" value="<?= $user['email']; ?>" />
	</li>
	<li>	
		<label>Unit&nbsp;&nbsp;&nbsp;</label>
    	<input type="text" disabled="disabled" value="<?= $user['unit']; ?>" />
	</li>
</ul>