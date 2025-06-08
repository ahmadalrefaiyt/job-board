<x-layout title="Job Board" pageHeader="Job Board">


    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-100 inline-block align-middle">
                <div class="overflow-hidden">
                    <table
                        class="text-start min-w-full divide-y divide-gray-200 border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Salary</th>

                        </thead>
                        <tbody class="divide-y divide-gray-200">

                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        {{ $job['title'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">${{ $job['salary'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>