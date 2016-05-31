<script type="text/javascript">
function validate_form ( ) { 
    valid = true;
    if ( document.form.pagetitle.value == "" ) { 
	alert ( "Please enter the page title." ); 
	valid = false;
	} else if ( document.form.linklabel.value == "" ) { 
	alert ( "Please enter info for the link label." ); 
	valid = false;
	} else if ( document.form.pagebody.value == "" ) { 
	alert ( "Please enter some info into the page body." ); 
	valid = false;
	}
	return valid;
}
</script>
<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>Page Editor</h1>
								<p> Edit your pages and save them for later or publish now.</p>
							</div>
<div class="indent">
{display_editor}
</div>
</article>
</div>
