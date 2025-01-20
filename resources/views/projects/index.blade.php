<x-layout>
    <div class="bgimg imgjs">
        <div class="gradientWhite">
            <h2 class="text-2xl font-bold">About</h2>
            Mijn projecten:
            <div class="flex overflow-scroll w-screen">
                @foreach ($projects as $project)
                    <div class="p-4">
                        <h3 class="text-xl font-bold">{{ $project->name }}</h3>
                        <p>{{ $project->description }}</p>
                        @if ($project->image != null || $project->image != '')
                            <img src="{{ $project->image }}" alt="{{ $project->name }}" class="w-64 h-64 object-cover mb-2">
                        @else
                            <img src="../projects/react-native-logo.png" alt="image" title="Default image" class="h-64 w-64 object-cover mb-2">
                        @endif
                        <a href="/projects/{{ $project->id }}" class="p-2 bg-blue-500 hover:bg-blue-600 transition rounded font-bold text-white">View</a>
                        <a href="/projects/{{ $project->id }}/edit" class="p-2 bg-yellow-500 hover:bg-yellow-600 transition rounded font-bold text-white">Edit</a>
                        <form action="/projects/{{ $project->id }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-1 px-2 bg-red-500 hover:bg-red-600 transition rounded font-bold text-white">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <a href="/projects/create" class="p-2 bg-green-500 hover:bg-green-600 transition rounded font-bold text-white">Add</a>
        </div>
    </div>
</x-layout>