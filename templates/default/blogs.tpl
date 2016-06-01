<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>Blog</h1>
								<p> View/Edit/Delete your Posts.</p>
							</div>
<div class="indent">
<p class="text-indent"><a href="edit?action=add&amp;type=post" class="button1">Create New Post</a></p>
{blog_admin_display}

<script language="JavaScript" type="text/javascript">
function delpost(id, title)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'blogs?delpost=' + id;
  }
}
</script>
</div>
</article>
</div>
</div>