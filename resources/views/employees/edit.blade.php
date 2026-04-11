<script src="https://cdn.tailwindcss.com"></script>

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

<input name="name" value="{{ $employee->name }}"
class="w-full border p-2 mb-3 rounded">

<input name="email" value="{{ $employee->email }}"
class="w-full border p-2 mb-3 rounded">

<select name="company_id" class="w-full border p-2 mb-3 rounded">
    @foreach($companies as $c)
    <option value="{{$c->id}}" {{ $employee->company_id == $c->id ? 'selected' : '' }}>
        {{$c->name}}
    </option>
    @endforeach
</select>

<select name="manager_id" class="w-full border p-2 mb-3 rounded">
    <option value="">No Manager</option>
    @foreach($employees as $e)
    <option value="{{$e->id}}" {{ $employee->manager_id == $e->id ? 'selected' : '' }}>
        {{$e->name}}
    </option>
    @endforeach
</select>

<input name="position" value="{{ $employee->position }}"
class="w-full border p-2 mb-3 rounded">

<button type="submit"
class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
Update
</button>

</form>
</div>