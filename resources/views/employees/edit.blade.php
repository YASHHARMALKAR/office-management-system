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

<div class="flex justify-center items-center min-h-screen bg-gray-100">

<form method="POST" action="/employees/{{$employee->id}}" class="bg-white p-6 rounded shadow w-96">
@csrf
@method('PUT')

<h2 class="text-xl font-bold mb-4 text-center">Edit Employee</h2>

<!-- ✅ ERROR BOX INSIDE FORM -->
@if($errors->any())
<div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-sm">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<!-- NAME -->
<input name="name" value="{{ old('name', $employee->name) }}"
class="w-full border p-2 mb-2 rounded">

@error('name')
<p class="text-red-500 text-sm mb-2">{{ $message }}</p>
@enderror

<!-- EMAIL -->
<input name="email" value="{{ old('email', $employee->email) }}"
class="w-full border p-2 mb-2 rounded">

@error('email')
<p class="text-red-500 text-sm mb-2">{{ $message }}</p>
@enderror

<!-- COMPANY -->
<select name="company_id" class="w-full border p-2 mb-2 rounded">
    @foreach($companies as $c)
    <option value="{{$c->id}}" 
        {{ old('company_id', $employee->company_id) == $c->id ? 'selected' : '' }}>
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
    <option value="{{$e->id}}" 
        {{ old('manager_id', $employee->manager_id) == $e->id ? 'selected' : '' }}>
        {{$e->name}}
    </option>
    @endforeach
</select>

<!-- POSITION (UPDATED TO DROPDOWN ✅) -->
<select name="position" class="w-full border p-2 mb-3 rounded">
    <option value="">Select Position</option>
    <option value="Manager" {{ old('position', $employee->position) == 'Manager' ? 'selected' : '' }}>Manager</option>
    <option value="Intern" {{ old('position', $employee->position) == 'Intern' ? 'selected' : '' }}>Intern</option>
    <option value="CEO" {{ old('position', $employee->position) == 'CEO' ? 'selected' : '' }}>CEO</option>
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
Update
</button>

</form>
</div>  
<script>
let countryDropdown = document.getElementById("country");
let stateDropdown = document.getElementById("state");
let cityDropdown = document.getElementById("city");

// Load countries
fetch("https://countriesnow.space/api/v0.1/countries/positions")
.then(res => res.json())
.then(data => {
    data.data.forEach(c => {
        countryDropdown.innerHTML += `<option value="${c.name}">${c.name}</option>`;
    });

    // ✅ Set selected country
    countryDropdown.value = "{{ $employee->country }}";

    // Trigger state load
    if(countryDropdown.value){
        loadStates(countryDropdown.value);
    }
});

// Load states
function loadStates(country){
    fetch("https://countriesnow.space/api/v0.1/countries/states", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({ country: country })
    })
    .then(res => res.json())
    .then(data => {
        stateDropdown.innerHTML = "<option>Select State</option>";

        data.data.states.forEach(s => {
            stateDropdown.innerHTML += `<option value="${s.name}">${s.name}</option>`;
        });

        // ✅ Set selected state
        stateDropdown.value = "{{ $employee->state }}";

        if(stateDropdown.value){
            loadCities(country, stateDropdown.value);
        }
    });
}

// Load cities
function loadCities(country, state){
    fetch("https://countriesnow.space/api/v0.1/countries/state/cities", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({ country: country, state: state })
    })
    .then(res => res.json())
    .then(data => {
        cityDropdown.innerHTML = "<option>Select City</option>";

        data.data.forEach(city => {
            cityDropdown.innerHTML += `<option value="${city}">${city}</option>`;
        });

        // ✅ Set selected city
        cityDropdown.value = "{{ $employee->city }}";
    });
}

// Events
countryDropdown.addEventListener("change", function(){
    loadStates(this.value);
});

stateDropdown.addEventListener("change", function(){
    loadCities(countryDropdown.value, this.value);
});
</script>