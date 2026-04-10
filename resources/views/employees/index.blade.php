<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gray-800 text-white p-4 flex justify-between">

    <span class="font-bold">Office System</span>

    <div class="flex gap-4">
        <a href="/" class="hover:underline">Home</a>
        <a href="/companies" class="hover:underline">Companies</a>
        <a href="/employees" class="hover:underline">Employees</a>
    </div>

</div>
<div class="p-6 bg-gray-100 min-h-screen">

    <h2 class="text-2xl font-bold mb-4">Employees</h2>

    <a href="/employees/create"
       class="bg-green-500 text-white px-4 py-2 rounded shadow">
       Add Employee
    </a>

    <div class="mt-6 overflow-x-auto">
      <table id="employeeTable" class="w-full bg-white shadow rounded">

            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Company</th>
                    <th class="p-3 text-left">Manager</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($employees as $emp)
                <tr class="border-b">
                    <td class="p-3">{{ $emp->name }}</td>
                    <td class="p-3">{{ $emp->email }}</td>
                    <td class="p-3">{{ optional($emp->company)->name ?? 'No Company' }}</td>
                   <td class="p-3">{{ optional($emp->manager)->name ?? 'None' }}</td>
                    <td class="p-3 align-middle">
                        <div class="inline-flex items-center gap-2">
                            <a href="/employees/{{$emp->id}}/edit"
                               class="bg-blue-500 text-white px-3 py-1 rounded">
                               Edit
                            </a>

                            <form method="POST" action="/employees/{{$emp->id}}" class="inline-flex items-center m-0">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded m-0">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

<script>
$(document).ready(function () {
    $('#employeeTable').DataTable();
});
</script>