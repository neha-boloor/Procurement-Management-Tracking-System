<article ng-controller="eventCtrl">
    <div class="container-fluid text-center" style="background: #16a085; padding-top: 100px; padding-bottom: 100px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pacifico white" style="text-shadow: 0 5px 5px #222;">About Us</h1>
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
                <div class="event-card" style="padding:40px;">

                    <p class="cuprum gray font30">
                        Procurement Head: <ul>
											<li>Mr. Akshay Jadeja</li>
										</ul>
										</p>
					<p class="cuprum gray font30">
						Dealing Officers: <ul>
											<li>Mr. Sagar Mitra</li>
											<li>Ms. Kavita Soham</li>
											<li>Mrs. Suzan Pinto</li>
											<li>Mr. Jayaprakash Rai</li>
										</ul>
                    </p>

                    <br/>
                </div>
            </div>

        </div>
    </div>
</article>
