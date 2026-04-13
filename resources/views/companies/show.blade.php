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

<div class="p-6 bg-gray-100 min-h-screen">

    <h2 class="text-2xl font-bold mb-4">
        {{ $company->name }} - Employees
    </h2>

    @if($employees->isEmpty())
        <p class="text-gray-600">No employees found for this company.</p>
    @else
        @foreach($employees as $emp)
        <div class="bg-white p-3 mb-2 shadow rounded flex justify-between">
            <span>{{ $emp->name }} ({{ $emp->position }})</span>
        </div>
        @endforeach
    @endif

</div>