<div class="tabs">
	<div id="tab-1" class="tab">
		<article>
			<div class="text-section">
				<h1>Pages</h1>
				<p >Here you can add, edit, delete or order your pages.</p>
			</div>
			<p class="text-indent"><a href="edit?action=add&amp;type=page" class="button1">Create New Page</a></p>
			{pagelist}
<script language="JavaScript" type="text/javascript">
function delpage(id, title)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'pages?delpage=' + id;
  }
}
</script>
		</article>
	</div>
</div>
