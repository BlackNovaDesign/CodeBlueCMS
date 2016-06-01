<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>Statistics and Repots</h1>
								<p>View your site performance</p>
							</div>
<div class="indent">
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

           </div>
