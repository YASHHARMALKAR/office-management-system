<script src="https://cdn.tailwindcss.com"></script>
@if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="bg-gray-800 text-white p-4 flex justify-between">

    <span class="font-bold">Office System</span>

    <div class="flex gap-4">
        <a href="/" class="hover:underline">Home</a>
        <a href="/companies" class="hover:underline">Companies</a>
        <a href="/employees" class="hover:underline">Employees</a>
    </div>

</div>
<div class="flex justify-center items-center min-h-screen bg-gray-100">
<form method="POST" action="/employees" class="bg-white p-6 rounded shadow w-96">
@csrf

<h2 class="text-xl font-bold mb-4 text-center">Add Employee</h2>

<input name="name" placeholder="Name"
class="w-full border p-2 mb-3 rounded">

<input name="email" placeholder="Email"
class="w-full border p-2 mb-3 rounded">



<select name="company_id" class="w-full border p-2 mb-3 rounded">

    <option value="">Select Company</option>

    @foreach($companies as $c)
    <option value="{{$c->id}}">{{$c->name}}</option>
    @endforeach

</select>

<select name="manager_id" class="w-full border p-2 mb-3 rounded">
<option value="">No Manager</option>
@foreach($employees as $e)
<option value="{{$e->id}}">{{$e->name}}</option>
@endforeach
</select>

<input name="position" placeholder="Position"
class="w-full border p-2 mb-3 rounded">

<select id="country" name="country" class="w-full border p-2 mb-3 rounded">
    <option value="">Select Country</option>
</select>

<select id="state" name="state" class="w-full border p-2 mb-3 rounded">
    <option value="">Select State</option>
</select>

<select id="city" name="city" class="w-full border p-2 mb-3 rounded">
    <option value="">Select City</option>
</select>

<div class="flex gap-2">
    <button type="submit"
    class="flex-1 bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
    Save
    </button>

    <a href="/employees"
    class="flex-1 bg-gray-500 text-white p-2 rounded hover:bg-gray-600 text-center">
    Cancel
    </a>
</div>
</form>
</div>

<script>
const token = "YOUR_API_TOKEN"; // wed is down, so I can't get a new token. Please replace with your own token from https://www.universal-tutorial.com/rest-apis/free-rest-api-for-country-state-city. You can also comment out the code below if you don't want to use the API for location data.


fetch("https://www.universal-tutorial.com/api/countries", {
    headers: {
        "Authorization": "Bearer " + token,
        "Accept": "application/json"
    }
})
.then(res => res.json())
.then(data => {
    let country = document.getElementById("country");
    data.forEach(c => {
        country.innerHTML += `<option value="${c.country_name}">${c.country_name}</option>`;
    });
});

// Load states
document.getElementById("country").addEventListener("change", function() {
    fetch(`https://www.universal-tutorial.com/api/states/${this.value}`, {
        headers: {
            "Authorization": "Bearer " + token
        }
    })
    .then(res => res.json())
    .then(data => {
        let state = document.getElementById("state");
        state.innerHTML = "<option>Select State</option>";
        data.forEach(s => {
            state.innerHTML += `<option value="${s.state_name}">${s.state_name}</option>`;
        });
    });
});

// Load cities
document.getElementById("state").addEventListener("change", function() {
    fetch(`https://www.universal-tutorial.com/api/cities/${this.value}`, {
        headers: {
            "Authorization": "Bearer " + token
        }
    })
    .then(res => res.json())
    .then(data => {
        let city = document.getElementById("city");
        city.innerHTML = "<option>Select City</option>";
        data.forEach(c => {
            city.innerHTML += `<option value="${c.city_name}">${c.city_name}</option>`;
        });
    });
});
</script>