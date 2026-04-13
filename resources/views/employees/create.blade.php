<script src="https://cdn.tailwindcss.com"></script>

<!-- Navbar -->
<div class="bg-gray-800 text-white p-4 flex justify-between">
    <span class="font-bold">Office System</span>
    <div class="flex gap-4">
        <a href="/" class="hover:underline">Home</a>
        <a href="/companies" class="hover:underline">Companies</a>
        <a href="/employees" class="hover:underline">Employees</a>
    </div>
</div>

<!-- Page -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">

<form method="POST" action="/employees" class="bg-white p-6 rounded shadow w-96">
@csrf

<h2 class="text-xl font-bold mb-4 text-center">Add Employee</h2>

<!-- ✅ ERROR BOX INSIDE FORM -->
@if($errors->any())
<div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-sm">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<!-- NAME -->
<input name="name" placeholder="Name"
class="w-full border p-2 mb-2 rounded"
value="{{ old('name') }}">
@error('name')
<p class="text-red-500 text-sm mb-2">{{ $message }}</p>
@enderror

<!-- EMAIL -->
<input name="email" placeholder="Email"
class="w-full border p-2 mb-2 rounded"
value="{{ old('email') }}">
@error('email')
<p class="text-red-500 text-sm mb-2">{{ $message }}</p>
@enderror

<!-- COMPANY -->
<select name="company_id" class="w-full border p-2 mb-2 rounded">
    <option value="">Select Company</option>
    @foreach($companies as $c)
    <option value="{{$c->id}}" {{ old('company_id') == $c->id ? 'selected' : '' }}>
        {{$c->name}}
    </option>
    @endforeach
</select>
@error('company_id')
<p class="text-red-500 text-sm mb-2">{{ $message }}</p>
@enderror

<!-- MANAGER -->
<select name="manager_id" class="w-full border p-2 mb-2 rounded">
<option value="">No Manager</option>
@foreach($employees as $e)
<option value="{{$e->id}}" {{ old('manager_id') == $e->id ? 'selected' : '' }}>
{{$e->name}}
</option>
@endforeach
</select>

<!-- POSITION -->
<select name="position" class="w-full border p-2 mb-3 rounded">
    <option value="">Select Position</option>
    <option value="Manager">Manager</option>
    <option value="Intern">Intern</option>
    <option value="CEO">CEO</option>
</select>

<!-- COUNTRY -->
<select id="country" name="country" class="w-full border p-2 mb-2 rounded">
    <option value="">Select Country</option>
</select>

<!-- STATE -->
<select id="state" name="state" class="w-full border p-2 mb-2 rounded">
    <option value="">Select State</option>
</select>

<!-- CITY -->
<select id="city" name="city" class="w-full border p-2 mb-3 rounded">
    <option value="">Select City</option>
</select>

<!-- SUBMIT -->
<button type="submit"
class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
Save
</button>

</form>
</div>

<!-- KEEP YOUR API SCRIPT -->
<script>
const token = "YOUR_API_TOKEN";

if(token !== "YOUR_API_TOKEN") {

// Load countries
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
        state.innerHTML = "<option value=''>Select State</option>";
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
        city.innerHTML = "<option value=''>Select City</option>";
        data.forEach(c => {
            city.innerHTML += `<option value="${c.city_name}">${c.city_name}</option>`;
        });
    });
});

}
</script>   