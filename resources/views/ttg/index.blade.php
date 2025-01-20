<x-layout>
    <div class="bgimg imggpu">
        <div class="gradientWhite">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Playercount</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                @foreach ($ttgs as $ttg)
                    <tr class="even:bg-gray-200">
                        <td class="p-2 text-center">{{ $ttg->id }}</td>
                        <td class="p-2 text-center">{{ $ttg->name }}</td>
                        <td class="p-2 text-center">{{ $ttg->description }}</td>
                        <td class="p-2 text-center">{{ $ttg->numberofplayers }}</td>
                        <td class="p-2 text-center">{{ $ttg->created_at->format('d-m-Y') }}</td>
                        <td class="p-2 text-center">{{ $ttg->updated_at->format('d-m-Y') }}</td>
                        <td><a href="/ttg/{{ $ttg->id }}"
                                class="p-3 bg-blue-400 hover:bg-blue-500 transition rounded text-white font-bold m-2">Show</a>
                        </td>
                        <td><a href="/ttg/{{ $ttg->id }}/edit"
                                class="p-3 bg-yellow-400 hover:bg-yellow-500 transition rounded text-white font-bold m-2">Edit</a>
                        </td>
                        <td>
                            <form action="/ttg/{{ $ttg->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-red-500 hover:bg-red-600 transition rounded font-bold text-white m-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="/ttg/create" class="p-2 bg-green-500 hover:bg-green-600 transition rounded font-bold text-white">Add</a>
        </div>
    </div>
</x-layout>
