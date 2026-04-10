<h2>Add Company</h2>

<form method="POST" action="/companies">
@csrf

<input name="name" placeholder="Company Name"><br><br>
<input name="location" placeholder="Location"><br><br>

<button type="submit">Save</button>

</form>