<h1> Restful API: Subscription Tracker</h1>
<h3>This is the API for the Subscription Tracker App.</h3> <br>
<h3>Version 1.1.1</h3>
<h4>This API is based on a MVP version  of the app. The app is currently a single use instance where a  user can view their subscriptions, be able to request full details of their subscriptions, add a new subscription, edit and delete an existing subscription.</h4><br>
<ul>
<li>Restful API: Subscription Tracker</a></li>
<li>Subscriptions</a>
<ul>
<li>GET all subscriptions</a></li>
<li>POST a new subscription</li>
<li>PUT an existing subscription in full</li>
<li>PATCH parts of an existing subscription</li>
<li>DELETE a subscription</li>
</ul>
</li>
<h3>Version  1.2</h3>
<h4>Users are able to filter their subscriptions</h4>
<h4>This will use these requests</h4>
<li>Categories</li>
<ul>
<li>GET all categories</li>
<li>GET a specific subscription that is grouped with the same category</li>
</ul>

<h1> Subscriptions  </h1>
<h3>GET all subscriptions</h3>
<p>To get all the subscriptions available, use:</p>
<code>GET /api/subscriptions</code>

<h3>POST a subscription</h3>
<code>POST /api/subscriptions</code> <br>
<strong>Request</strong>
<ul>
    <li>subscription_name</li>
    <li>cost</li>
    <li>start</li>
    <li>payment_date</li>
    <li>notice_period</li>
</ul>

<h3>GET a subscription with given id</h3>
<code>DELETE /api/subscriptions/id</code>

<h3>"EDIT" a subscription</h3>
<code>PUT /api/subscriptions/id</code>
<p>This will update an entire subscription<p>
<strong>Request</strong>
<ul>
    <li>subscription_name</li>
    <li>cost</li>
    <li>start</li>
    <li>payment_date</li>
    <li>notice_period</li>
</ul>

<h3>"EDIT" part of a subscription</h3>
<code>PATCH /api/subscriptions/id</code>
<p>This will update an entire subscription<p>
<strong>Request</strong>
<ul>
    <li>subscription_name</li>
    <li>cost</li>
    <li>start</li>
    <li>payment_date</li>
    <li>notice_period</li>
</ul>

<h3>DELETE a subscriptions</h3>
<code>DELETE /api/subscriptions/id</code>
<br>
<h1>Version 1.2</h1>
<h3>In this instance of the app we would like to allow the user to filter through their subscriptions using a Categories table via Laravel that is already created with it's end-points.</h3>
<br>
<h1>Version 2.0</h1>
<h3>In this instance of the app we would like to create API end points to co-inside with the front-end where a user is able to input their subscription details with a POST request, be stored and allow the user to view with a GET request that is already set up.</h3> <br>
<h1>Version 3.0</h1>
<h3> In this instance of the app we would like to have multiple users, make use of passports and authentication in Laravel, create a log-in system and be able to add a notification feature that gets sent to the user's email address</h3>
<br>
<p>Documents written by Tumeka (TumekaB) and Sophie (ammersive).</p>
