<x-layout>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $ttg->name }} [id:{{ $ttg->id }}]</h1>
        <table class="min-w-full bg-white">
            <tbody>
                <tr class="even:bg-gray-100">
                    <td class="border px-4 py-2 font-bold">Description</td>
                    <td class="border px-4 py-2">{{ $ttg->description }}</td>
                </tr>
                <tr class="even:bg-gray-100">
                    <td class="border px-4 py-2 font-bold">Playercount</td>
                    <td class="border px-4 py-2">{{ $ttg->numberofplayers }}</td>
                </tr>
                <tr class="even:bg-gray-100">
                    <td class="border px-4 py-2 font-bold">Created At</td>
                    <td class="border px-4 py-2">{{ $ttg->created_at->format('d-M-Y H:i') }}</td>
                </tr>
                <tr class="even:bg-gray-100">
                    <td class="border px-4 py-2 font-bold">Updated At</td>
                    <td class="border px-4 py-2">{{ $ttg->updated_at->format('d-M-Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <a href="/ttg/{{ $ttg->id }}/edit" class="p-3 bg-yellow-400 hover:bg-yellow-500 transition rounded text-white font-bold m-2">Edit</a>
            <form action="/ttg/{{ $ttg->id }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 bg-red-500 hover:bg-red-600 transition rounded font-bold text-white m-2">Delete</button>
            </form>
        </div>
    </div>
</x-layout>