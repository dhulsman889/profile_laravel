<x-layout>
    <h2 class="text-2xl font-bold">{{ $type == "add" ? "Voeg project toe" : "Bewerk project id[$project->id]" }}</h2>
    <form method="POST" action="{{ $type == 'add' ? route('projects.store') : route('projects.update', $project->id) }}" class="p-4"  enctype="multipart/form-data">
        @csrf
        @if($type == 'edit')
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ $type == 'edit' ? $project->name : '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $type == 'edit' ? $project->description : '' }}</textarea>
        </div>
        @if($project->image != null || $project->image != '')
            <img src="../../{{ $project->image }}" alt="image" class="h-52 object-cover">
        @endif
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link</label>
            <input type="text" name="link" id="link" value="{{ $type == 'edit' ? $project->link : '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="p-2 mb-9 bg-blue-500 hover:bg-blue-600 transition rounded font-bold text-white">{{ $type == 'add' ? 'Add' : 'Update' }}</button>
    </form>
</x-layout>