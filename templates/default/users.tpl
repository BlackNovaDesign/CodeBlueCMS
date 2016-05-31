<script language="JavaScript" type="text/javascript">
  function deluser(id, title)
  {
      if (confirm("Are you sure you want to delete '" + title + "'"))
      {
          window.location.href = 'users.php?deluser=' + id;
      }
  }
  </script>
<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>User Management</h1>
								<p >Here you can add, edit, delete your users.</p>
							</div>
							<p class="text-indent"><a href="add-user" class="button1">Add New User</a></p>
							{DisplayUsersAdmin}
						</article>
					</div>
				</div>
