				<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>Welcome to your Dashboard</h1>
								<p>An overview of your Admin Panel</p>
							</div>
						</article>
							<div class="content-outer">

        <div class="content-inner">

          <div class="title_border">

            <h1>Quick Tasks</h1>

          </div>

          <div class=" jcarousel-skin-horizontal">
		<div class="jcarousel-container jcarousel-container-horizontal" style="display: block;">
			<div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="true"></div>
			<div class="jcarousel-next jcarousel-next-horizontal" style="display: block;" disabled="false"></div>
			<div class="jcarousel-clip jcarousel-clip-horizontal">
				<ul class="jcarousel-list jcarousel-list-horizontal" id="slider_horizontal" style="width: 1984px; left: 0px;">

         			   <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" jcarouselindex="1"><a class="q1" href="users"><span>User Management Tools</span></a></li>

        			   <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-2-horizontal" jcarouselindex="3"><a class="q2" href="gallery"><span>Manage photo galleries</span></a></li>

				   <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-3-horizontal" jcarouselindex="4"><a class="q3" href="themes"><span>Change site templates</span></a></li>

        			   <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-4-horizontal" jcarouselindex="5"><a class="q4" href="settings"><span>SEO Tools and Settings</span></a></li>

       				<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-5-horizontal" jcarouselindex="6"><a class="q5" href="mail"><span>Email Settings and Templates</span></a></li>

				<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" jcarouselindex="6"><a class="q6" href="reports"><span>Statistics and Reports</span></a></li>
          			</ul>
			</div>
			</div>
			</div>

        	</div>

           </div>
<p>&nbsp;</p>
<div class="content-outer">

        <div class="content-inner">

          <div class="title_border">

            <h1>Analytics</h1>

          </div>
<article>
{literal}<script>
(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>{/literal}
<div id="embed-api-auth-container"></div>
<div id="chart-container"></div>
<div id="view-selector-container"></div>
{literal}<script>

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '1021111961423-t0cqcntfmgc5q9ha64111q3jg20hik1d.apps.googleusercontent.com'
  });


  /**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector-container'
  });

  // Render the view selector to the page.
  viewSelector.execute();


  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "chart-container".
   */
  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });


  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
  viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
  });

});
</script>{/literal}
</article></div>


           </div>



<p>&nbsp;</p>
<div class="content-outer">

        <div class="content-inner">

          <div class="title_border">

            <h1>Unpaid Orders</h1>

          </div>
<article>
{invoice_display_unpaid} 
</article></div>


           </div>
<p>&nbsp;</p>	
<div class="content-outer">

        <div class="content-inner">

          <div class="title_border">

            <h1>Recently Paid Invoices</h1>

          </div>
<article>
{invoice_display_paid}

</tbody></table>						</article></div>


           </div>				
<ul class="states">
								<li class="error">Error : This is an error placed text message.</li>
								<li class="warning">Warning: This is a warning placed text message.</li>
								<li class="succes">Success : This is a succes placed text message.</li>
							</ul>
					</div>
				</div>
