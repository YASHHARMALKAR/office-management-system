<script src="https://cdn.tailwindcss.com"></script>


<div class="p-6 bg-gray-100 min-h-screen">

    <h1 class="text-3xl font-bold mb-6">Office Management System</h1>

    <div class="flex gap-4 mb-6">
        <a href="/companies/create"
           class="bg-green-500 text-white px-4 py-2 rounded">
           Add Company
        </a>

        <a href="/employees"
           class="bg-blue-500 text-white px-4 py-2 rounded">
           View Employees
        </a>
    </div>

    <h2 class="text-xl font-semibold mb-4">Companies</h2>

    @foreach($companies as $c)
    <div class="bg-white p-4 mb-3 shadow rounded flex justify-between items-center">

        <span>{{ $c->name }} - {{ $c->location }}</span>

        <a href="/companies"
           class="text-blue-500 text-sm">
           Manage
        </a>

    </div>
    @endforeach

</div>