<article ng-controller="eventCtrl">
    <div class="container-fluid text-center" style="background:#e74c3c; padding-top: 100px; padding-bottom: 100px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pacifico white" style="text-shadow: 0 5px 5px #222;">Department of Electrical Support</h1>
            </div>
        </div>
        <div class="row" ng-repeat="event in events" ng-if="events">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="event-card">
                    <h3 class="cuprum" ng-bind="::event.name"></h3>
                    <hr />

                    <div ng-bind="::event.description"></div>
                    <hr />
                    <h4 class="cuprum" ng-bind="::event.contact"></h4>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row" ng-if="events == undefined">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="event-card" style="padding:60px;">

                   <!-- <p class="cuprum gray font30">
                        Procurement Head: <ul>
											<li>Mr. Mohan Reddy</li>
										</ul>
										</p>-->

					<p class="cuprum gray font30" style="text-align:left">
                     	<img src="images/e.png" style="float:right" width="380px" height="200px"/>
						Officers:
						                <ul style="text-align:left">
											<li>Mrs. Bhavana Kohli</li>
											<li>Mrs. Gargi</li>
											<li>Mr. Yuvraj Singh</li>

										</ul>

                    </p>

                    <br/>
                </div>
            </div>

        </div>
    </div>
</article>
