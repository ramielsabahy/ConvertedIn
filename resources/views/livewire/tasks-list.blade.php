<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="-mb-2 py-4 flex flex-wrap flex-grow justify-between">
                <div class="flex items-center py-2">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-searcg" type="text" placeholder="Search">
                </div>
                <div class="flex items-center py-2">
                    <a href="{{ route('tasks.create') }}"
                       class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
                        Create new task
                    </a>
                </div>
            </div>
            <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block w-full shadow overflow-x-auto sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full" style="width: 100%">
                        <!-- HEAD start -->
                        <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-3 text-center font-medium">
                                ID
                            </th>
                            <th class="px-6 py-3 text-center font-medium">
                                Title
                            </th>
                            <th class="px-6 py-3 text-center font-medium">
                                Assigned By
                            </th>
                            <th class="px-6 py-3 text-center font-medium">
                                Assigned To
                            </th>
                            <th class="px-6 py-3 text-center font-medium">
                                Created At
                            </th>
                            <th class="px-6 py-3 text-center font-medium">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <!-- HEAD end -->
                        <!-- BODY start -->
                        <tbody class="bg-white">
                        @foreach($tasks as $key => $task)
                            <tr @if($key % 2 == 0) class="bg-gray-100" @endif>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200">
                                    {{ $task->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200">
                                    {{ $task->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200">
                                    {{ $task->assigner->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200">
                                    {{ $task->assignee->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200">
                                    {{ $task->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="" class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline">
                                        Edit
                                    </a>
                                    <a href="" class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <!-- BODY end -->
                    </table>
                </div>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>
