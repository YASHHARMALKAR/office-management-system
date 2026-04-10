<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gray-800 text-white p-4 flex justify-between">

    <span class="font-bold">Office System</span>

    <div class="flex gap-4">
        <a href="/" class="hover:underline">Home</a>
        <a href="/companies" class="hover:underline">Companies</a>
        <a href="/employees" class="hover:underline">Employees</a>
    </div>

</div>
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Companies</h2>

    <a href="/companies/create"
       class="bg-green-500 text-white px-4 py-2 rounded">
       Add Company
    </a>

    <div class="mt-4">
@foreach($companies as $c)
<div class="bg-white p-4 mb-3 shadow rounded flex justify-between items-center">

    <span class="font-medium">
        {{ $c->name }} - {{ $c->location }}
    </span>

    <div class="flex items-center gap-2">

        <a href="/companies/{{$c->id}}/edit"
           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 text-sm rounded">
           Edit
        </a>

        <form method="POST" action="/companies/{{$c->id}}" class="inline-flex items-center m-0">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Are you sure?')"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-sm rounded m-0">
                Delete
            </button>
        </form>
    </div>

</div>
@endforeach
    </div>
</div>